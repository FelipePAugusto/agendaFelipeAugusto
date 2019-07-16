@extends('layout.site')

@section('titulo','Contatos')

@section('conteudo')
    <div class="container">
        <h5 class="center">Adicionar Contato</h5>
        <div class="row">
            <form class="center" action="{{route('admin.contatos.salvar')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.contatos._form')
                <button class="btn green">Salvar</button>
            </form>
        </div>
    </div>
@endsection
