@extends('layout.site')

@section('titulo','Contatos')

@section('conteudo')
    <div class="container">
        <h5 class="center">Editando Contato</h5>
        <div class="row">
            <form class="center" action="{{route('admin.contatos.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                @include('admin.contatos._form')
                <button class="btn green">Editar</button>
                <button class="btn red" href="{{ route('admin.contatos') }}">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
