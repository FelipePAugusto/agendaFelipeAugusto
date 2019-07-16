@extends('layout.site')

@section('titulo','Mensagens')

@section('conteudo')
    <div class="container">
        <h5 class="center">Editando Mensagem</h5>
        <div class="row">
            <form class="center" action="{{route('admin.mensagens.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.mensagens._form')
                <button class="btn green">Editar</button>
                <button class="btn red" href="{{ route('admin.mensagens') }}">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
