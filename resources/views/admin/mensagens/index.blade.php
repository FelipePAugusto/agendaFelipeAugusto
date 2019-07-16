@extends('layout.site')

@section('titulo','Mensagens')

@section('conteudo')
    <div class="container">
        <h5 class="center">Lista de Mensagens</h5>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th class="center">Titulo</th>
                    <th class="center">Descrição</th>
                </tr>
                </thead>

                <a class="btn green right" href="{{ route('admin.mensagens.adicionar') }}">Adicionar</a>

                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td class="center">{{ $registro->id }}</td>
                        <td class="center">{{ $registro->titulo }}</td>
                        <td class="center">{{ $registro->descricao }}</td>
                        <td class="center">
                            <a class="btn orange" href="{{ route('admin.mensagens.editar',$registro->id) }}">Editar</a>
                            <a class="btn red" href="{{ route('admin.mensagens.deletar',$registro->id) }}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
