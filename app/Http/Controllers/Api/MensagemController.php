<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Exceptions\ApiError;


class MensagemController extends Controller
{
    private $mensagem;

    public function __construct(Mensagem $mensagem){
        $this->mensagem = $mensagem;
    }

    /**  */
    public function listar($id = null){
        try{
            $retorno = Contato::find($id);

            if($retorno == null){
                $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
                return response()->json($msgReturn, 206);
            }

            $data = $this->mensagem->all()->where('contato_id', '=', "{$id}");

            if($data){
                $msgReturn = ['data' => ['msg' => 'Busca pelo Contato feita com sucesso!']];
                return response()->json($data, 200, $msgReturn);
            }else{
                $msgReturn = ['data' => ['msg' => 'Nao foi encontrado Mensagens deste Contato.']];
                return response()->json($msgReturn, 206);
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao buscar Mensagens do Contato', 1012), 400);
        }
    }

    /**  */
    public function adicionar(Request $req, $id = null){
        if($id == null){
            $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
            return response()->json($msgReturn, 206);
        }

        $dados = Validator::make($req->all(), [
            'titulo' => 'required|string|min:1|max:255',
            'descricao' => 'required|string|min:1|max:255'
        ],
            [
                'titulo.required' => 'Campo Titulo nao pode ser vazio',
                'descricao.required' => 'Campo Descricao nao pode ser vazio'
            ]);

        if ($dados->fails()) {
            $msgReturn = ['data' => ['msg' => 'Erro ao criar Mensagem por falta de campos obrigatorios.']];
            return response()->json($msgReturn, 206);
        }

        try{
            $dados = $req->all();

            $retorno = Contato::find($id);

            if($retorno == null){
                $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
                return response()->json($msgReturn, 206);
            }

            $dados['contato_id'] = $id;

            $this->mensagem->create($dados);

            $msgReturn = ['data' => ['msg' => 'Mensagem criada para o Contato com sucesso!']];
            return response()->json($msgReturn, 201);
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao criar a mensagem', 1011), 400);
        }
    }

    /**  */
    public function modificar(Request $req, $id = null, $idmensagem = null){
        $dados = Validator::make($req->all(), [
            'titulo' => 'required|string|min:1|max:255',
            'descricao' => 'required|string|min:1|max:255'
        ],
            [
                'titulo.required' => 'Campo Titulo nao pode ser vazio',
                'descricao.required' => 'Campo Descricao nao pode ser vazio'
            ]);

        if ($dados->fails()) {
            $msgReturn = ['data' => ['msg' => 'Erro ao editar a Mensagem por falta de campos obrigatorios.']];
            return response()->json($msgReturn, 206);
        }

        try{
            $dados = $req->all();

            $retorno = Contato::find($id);

            if($retorno == null){
                $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
                return response()->json($msgReturn, 206);
            }

            $dados['contato_id'] = $id;

            try{
                $data = $this->mensagem->find($idmensagem);

                if($id == $data['contato_id']){
                    $data = $this->mensagem->all()->where('contato_id', '=', "{$id}");

                    if($data){
                        $mensagem = $this->mensagem->find($idmensagem);

                        $mensagem->update($dados);

                        $msgReturn = ['data' => ['msg' => 'Mensagem alterada com sucesso!']];
                        return response()->json($msgReturn, 202);
                    }else{
                        $msgReturn = ['data' => ['msg' => 'Nao foi encontrado Mensagens deste Contato.']];
                        return response()->json($msgReturn, 206);
                    }
                }else{
                    if ($data == null){
                        $msgReturn = ['data' => ['msg' => 'Encontramos o Contato, mas a Mensagem nao exite no base.']];
                        return response()->json($msgReturn, 206);
                    }
                    $msgReturn = ['data' => ['msg' => 'Esta Mensagem nao e deste Contato.']];
                    return response()->json($msgReturn, 203);
                }
            } catch (\Exception $e){
                if(config('app.debug')){
                    return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 400);
                }
                return response()->json(ApiError::errorMessage('Erro ao buscar Mensagens do Contato', 1012), 400);
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao Editar a Mensagem', 1011), 400);
        }
    }

    /**  */
    public function excluir($id = null, $idmensagem = null){
        if ($id == null) {
            $msgReturn = ['data' => ['msg' => 'Matricula do Contato nao foi informada!']];

            return response()->json($msgReturn, 200);
        }

        $retorno = Contato::find($id);

        if($retorno == null){
            $msgReturn = ['data' => ['msg' => 'Contato nao cadastrado na base.']];
            return response()->json($msgReturn, 206);
        }

        try{
            $data = $this->mensagem->find($idmensagem);

            if($id == $data['contato_id']){
                $data = $this->mensagem->all()->where('contato_id', '=', "{$id}");

                if($data){
                    $mensagem = $this->mensagem->find($idmensagem);

                    $mensagem->delete();

                    $msgReturn = ['data' => ['msg' => 'Mensagem excluida com sucesso!']];
                    return response()->json($msgReturn, 202);
                }else{
                    $msgReturn = ['data' => ['msg' => 'Nao foi encontrado Mensagens deste Contato para ser excluida.']];
                    return response()->json($msgReturn, 203);
                }
            }else{
                if ($idmensagem == null) {
                    $msgReturn = ['data' => ['msg' => 'Encontramos o Contato, mas a Mensagem não foi informada']];

                    return response()->json($msgReturn, 200);
                }else {
                    if ($data == null) {
                        $msgReturn = ['data' => ['msg' => 'Encontramos o Contato, mas a Mensagem nao exite no base.']];
                        return response()->json($msgReturn, 206);
                    }
                    $msgReturn = ['data' => ['msg' => 'Esta Mensagem nao e deste Contato.']];
                    return response()->json($msgReturn, 203);
                }
            }
        } catch (\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 400);
            }
            return response()->json(ApiError::errorMessage('Erro ao buscar Mensagens do Contato', 1012), 400);
        }
    }
}
