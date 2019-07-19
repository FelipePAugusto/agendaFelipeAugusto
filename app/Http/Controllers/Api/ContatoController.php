<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Cloner\Cursor;

class ContatoController extends Controller
{
    private $contato;

    public function __construct(Contato $contato){
        $this->contato = $contato;
    }

    /**  */
    public function index($id = null){
        if ($id == null) {
            try{
                $data = ['data' => $this->contato->all()];

                $msgReturn = ['data' => ['msg' => 'Todos Contatos encontrados com sucesso!']];

                return response()->json($data, 200, $msgReturn);
            } catch (\Exception $e){
                if(config('app.debug')){
                    return response()->json(ApiError::errorMessage($e->getMessage(), 400));
                }
                return response()->json(ApiError::errorMessage('Nenhum Contato encontrado na base.', 400));
            }
        } else {
            $data = ['data' => $id];
            $retorno = $this->contato->find($data);

            if(count($retorno) == 1){
                $msgReturn = ['data' => ['msg' => 'Busca pelo Contato feita com sucesso!']];
                return response()->json($retorno, 200, $msgReturn);
            }else{
                $msgReturn = ['data' => ['msg' => 'Contato nao encontrado na base.']];
                return response()->json($msgReturn, 206);
            }
        }
    }

    /**  */
    public function salvar(Request $req){
        $dados = Validator::make($req->all(), [
            'nome' => 'required|string|min:1|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string',
            'imagem' => 'required|string|max:255'
        ],
            [
                'nome.required' => 'Campo Nome nao pode ser vazio',
                'sobrenome.required' => 'Campo Sobrenome nao pode ser vazio',
                'email.required' => 'Campo Email nao pode ser vazio',
                'telefone.required' => 'Campo Telefone nao pode ser vazio',
                'imagem.required' => 'Campo Imagem nao pode ser vazio',
            ]);

        if ($dados->fails()) {
            $msgReturn = ['data' => ['msg' => 'Erro ao criar Contato por falta de campos obrigatorios.']];

            return response()->json($msgReturn, 206);
        }

        try{
            $dados = $req->all();

            if($req->hasFile('imagem')){
                $criadorImagem = $req->file('imagem');
                $numeroIdentificador = rand(1111,9999);
                $diretorio = "img/contatos/";
                $extensaoArquivo = $criadorImagem->guessClientExtension();
                $nomeImagem = "imagem_".$numeroIdentificador.".".$extensaoArquivo;
                $criadorImagem->move($diretorio,$nomeImagem);
                $dados['imagem'] = $diretorio."/".$nomeImagem;
            }

            $this->contato->create($dados);

            $msgReturn = ['data' => ['msg' => 'Contato criado com sucesso!']];

            return response()->json($msgReturn, 201);
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao criar o contato', 1011), 400);
        }
    }

    /**  */
    public function editar($id = null){
        if ($id == null) {
            $msgReturn = ['data' => ['msg' => 'Matricula do Contato nao foi informada!']];

            return response()->json($msgReturn, 200);
        }

        try{
            $data = $this->contato->find($id);

            if($data){
                $msgReturn = ['data' => ['msg' => 'Busca pelo Contato feita com sucesso!']];
                return response()->json($data, 200, $msgReturn);
            }else{
                $msgReturn = ['data' => ['msg' => 'Contato nao encontrado.']];
                return response()->json($msgReturn, 206);
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao buscar o contato', 1012), 400);
        }
    }

    /**  */
    public function atualizar(Request $req, $id = null){
        if ($id == null) {
            $msgReturn = ['data' => ['msg' => 'Matricula do Contato nao foi informada!']];

            return response()->json($msgReturn, 200);
        }

        $dados = Validator::make($req->all(), [
            'nome' => 'required|string|min:1|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string',
            'imagem' => 'required|string|max:255'
        ],
            [
                'nome.required' => 'Campo Nome nao pode ser vazio',
                'sobrenome.required' => 'Campo Sobrenome nao pode ser vazio',
                'email.required' => 'Campo Email nao pode ser vazio',
                'telefone.required' => 'Campo Telefone nao pode ser vazio',
                'imagem.required' => 'Campo Imagem nao pode ser vazio',
            ]);

        if ($dados->fails()) {
            $msgReturn = ['data' => ['msg' => 'Erro ao alterar o  por falta de campos obrigatorios.']];

            return response()->json($msgReturn, 206);
        }

        try{
            $dados = $req->all();

            $contato = $this->contato->find($id);

            if($contato == null){
                $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
                return response()->json($msgReturn, 206);
            }

            if($req->hasFile('imagem')){
                $criadorImagem = $req->file('imagem');
                $numeroIdentificador = rand(1111,9999);
                $diretorio = "img/contatos/";
                $extensaoArquivo = $criadorImagem->guessClientExtension();
                $nomeImagem = "imagem_".$numeroIdentificador.".".$extensaoArquivo;
                $criadorImagem->move($diretorio,$nomeImagem);
                $dados['imagem'] = $diretorio."/".$nomeImagem;
            }

            $contato->update($dados);

            $msgReturn = ['data' => ['msg' => 'Contato editado com sucesso!']];

            return response()->json($msgReturn, 202);

            //return response()->json($data);
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1013), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao editar o contato', 1014), 400);
        }
    }

    /**  */
    public function deletar($id = null){
        if ($id == null) {
            $msgReturn = ['data' => ['msg' => 'Matricula do Contato nao foi informada!']];

            return response()->json($msgReturn, 200);
        }

        try{
            $data = $this->contato->find($id);

            if($data){
                $data->delete();

                $msgReturn = ['data' => ['msg' => 'Contato excluido com sucesso!']];

                return response()->json($msgReturn, 200);
            }else{
                $msgReturn = ['data' => ['msg' => 'Contato nao encontrado para ser excluido.']];

                return response()->json($msgReturn, 206);
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1015), 400);
            }
            return response()->json(ApiError::errorMessage('Falha ao buscar o Contato para exclusao.', 1015), 400);
        }
    }
}
