@extends('layout.site')

@section('titulo','Mensagens')

@section('conteudo')
    <div class="container">
        <h5 class="center">Lista de Mensagens</h5>
        <div class="row">
            <a class="btn green right" href="{{ route('admin.mensagens.adicionar') }}">Adicionar</a>
        </div>
        <div class="row">
            @foreach($registrosMensagem as $mensagem)
                <div class="col s16 m4">
                    <div class="card">
                        <div class="card-content">
                            <h5>{{$mensagem->titulo}}</h5>
                            <p>{{$mensagem->descricao}}</p>
                        </div>
                        <div class="card-action center">
                            <a class="btn orange" href="{{ route('admin.mensagens.editar',$mensagem->id) }}">Editar</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn red" href="{{ route('admin.mensagens.deletar',$mensagem->id) }}">Deletar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
