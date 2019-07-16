@extends('layout.site')

@section('titulo','Mensagens')

@section('conteudo')
    <div class="container">
        <h5 class="center">Adicionar Mensagem</h5>
        <div class="row">
            <form class="center" action="{{route('admin.mensagens.salvar')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.mensagens._form')
                <button class="btn green">Salvar</button>
            </form>
        </div>
    </div>
@endsection
