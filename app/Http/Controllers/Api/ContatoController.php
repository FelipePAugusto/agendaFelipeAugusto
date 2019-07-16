<?php

namespace App\Http\Controllers\Api;

use App\Mensagem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contato;
use Symfony\Component\VarDumper\Cloner\Cursor;

class ContatoController extends Controller
{
    private $contato;

    public function __construct(Contato $contato){
        $this->contato = $contato;
    }

    /**  */
    public function index(){
        $data = ['data' => $this->contato->all()];

        return response()->json($data);
        /*$registros = Contato::all();

        /*$registross = Contato::where('id')->get();
        dd($registross);
        $registrosMensagem = Mensagem::where('contato_id', $id)->get();
        $count = count($registrosMensagem);
        dd($count);*/
        /*return view('admin.contatos.index', compact('registros'));*/
    }

    /**  */
    public function adicionar(){
        $registrosMensagem = Mensagem::all();
        return view('admin.contatos.adicionar', compact('registrosMensagem'));
    }

    /**  */
    public function salvar(Request $req){
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
        Contato::create($dados);

        return redirect()->route('admin.contatos');
    }

    /**  */
    public function editar($id){
        $registro = Contato::find($id);

        $registrosMensagem = Mensagem::all();

        return view('admin.contatos.editar', compact('registro', 'registrosMensagem'));
    }

    /**  */
    public function atualizar(Request $req, $id){
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

        Contato::find($id)->update($dados);

        return redirect()->route('admin.contatos');
    }

    /**  */
    public function mensagens($id){
        $registro = Contato::find($id);

        $registrosMensagem = Mensagem::where('contato_id', $id)->get();
        $count = count($registrosMensagem);

        return view('admin.contatos.mensagens', compact('registrosMensagem', 'registro'));
    }

    /**  */
    public function deletar($id){
        Contato::find($id)->delete();

        return redirect()->route('admin.contatos');
    }
}
