<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensagem;
use App\Contato;


class MensagemController extends Controller
{
    /**  */
    public function index(){
        $registros = Mensagem::all();
        return view('admin.mensagens.index', compact('registros'));
    }

    /**  */
    public function adicionar(){
        $registros = Contato::all();
        return view('admin.mensagens.adicionar', compact('registros'));
    }

    /**  */
    public function salvar(Request $req){
        $dados = $req->all();
        $dados['contato_id'] = '2';
        Mensagem::create($dados);

        return redirect()->route('admin.mensagens');
    }

    /**  */
    public function editar($id){
        $registro = Mensagem::find($id);
        $registros = Contato::all();
        return view('admin.mensagens.editar', compact('registro', 'registros'));
    }

    /**  */
    public function atualizar(Request $req, $id){
        $dados = $req->all();
        Mensagem::find($id)->update($dados);

        return redirect()->route('admin.mensagens');
    }

    /**  */
    public function deletar($id){
        Mensagem::find($id)->delete();

        $registro = Contato::find($id);

        $registrosMensagem = Mensagem::where('contato_id', $id)->get();
        $count = count($registrosMensagem);

        return view('admin.contatos.mensagens', compact('registrosMensagem', 'registro'));
    }
}
