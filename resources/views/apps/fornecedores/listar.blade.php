@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu" style="margin: 5px">
            <ul>
                <li> <a href="{{ route('app.fornecedor.adicionar') }}">Novo Fornecedor</a> </li>
                <li> <a href="{{ route('app.fornecedor') }}">Consultar</a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                
                    @foreach ($fornecedores as $fornecedor)
                        <tbody>
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            </tr>
                        </tbody>
                        
                    @endforeach

                </table>
                {{ $fornecedores->links() }}
            </div>
            
        </div>
    </div>
@endsection