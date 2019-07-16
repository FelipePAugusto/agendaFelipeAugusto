@extends('layout.site')

@section('titulo','Contatos')

@section('conteudo')
    <div class="container">
        <h5 class="center">Lista de Contatos</h5>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Matricula</th>
                    <th class="center">Nome</th>
                    <th class="center">Sobrenome</th>
                    <th class="center">E-mail</th>
                    <th class="center">Telefone</th>
                    <th>Imagem</th>
                    <th class="center">Mensagem</th>
                    <th class="center">Ação</th>
                </tr>
                </thead>

                <a class="btn green right" href="{{ route('admin.contatos.adicionar') }}">Adicionar</a>

                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td class="center">{{ $registro->id }}</td>
                        <td class="center">{{ $registro->nome }}</td>
                        <td class="center">{{ $registro->sobrenome }}</td>
                        <td class="center">{{ $registro->email }}</td>
                        <td class="center">{{ $registro->telefone }}</td>
                        <td class="center"><img height="60" src="{{asset($registro->imagem)}}" alt="{{ $registro->nome }}" /></td>
                        <td class="center">{{ $registro->mensagem }}</td>
                        <td class="center">
                            <a class="btn orange" href="{{ route('admin.contatos.editar',$registro->id) }}">Editar</a>
                            <a class="btn red" href="{{ route('admin.contatos.deletar',$registro->id) }}">Deletar</a>
                            <a class="btn purple" href="{{ route('admin.contatos.mensagens',$registro->id) }}">Mensagens</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
