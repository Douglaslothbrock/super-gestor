@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Fornecedor - Listar</p>
    </div>

    <div class="menu mt-2 mb-2" style="margin-right: 5%">
        <ul>
            <li class="me-2">
                <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{route('app.fornecedor.adicionar') }}'"> <i class="bi bi-plus-circle"></i> NOVO FORNECEDOR
                </button>
            </li>
            <li>
                <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{ route('app.fornecedor') }}'"> <i class="bi bi-search"></i> CONSULTAR
                </button>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table class="table table-striped table-hover table-bordered"  width="100%">
                <thead class="table-primary">
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td width="10%">
                                <button class="btn btn-primary btn-sm" onclick="location.href='{{ route('app.fornecedor.editar', $fornecedor->id) }}'"><i class="bi bi-pencil-square"></i> Editar</button>
                            </td>
                            <td width="10%">
                                <button class="btn btn-danger btn-sm" onclick="location.href='{{ route('app.fornecedor.excluir', $fornecedor->id) }}'"><i class="bi bi-trash"></i> Excluir</button>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table class="table table-striped table-hover table-bordered">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->Produtos as $produtos )
                                        
                                        <tr>
                                            <td>
                                                {{ ($produtos->id) ? $produtos->id : 'Não possuí'}}
                                            </td>
                                            <td>
                                                {{ ($produtos->nome) ? $produtos->nome : 'Não possuí' }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            
            <div class="navegation">
                {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection