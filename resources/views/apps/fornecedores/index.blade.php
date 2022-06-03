@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor</p>
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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{ ($msg) ?? '' }}
                <form action="{{ route('app.fornecedor.listar') }}" method="POST">
                    @csrf
                    <label for="fornecedor" style="float: left">Nome</label>
                    <input type="text" class="form-control" name="nome" id="fornecedor" placeholder="Insira o nome">

                    <label for="email" style="float: left">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Insira o E-mail">

                    <label for="site" style="float: left">Site</label>
                    <input type="text" class="form-control" name="site" id="site" placeholder="Insira o site">

                    <label for="uf" style="float: left">Uf</label>
                    <input type="text" class="form-control" name="uf" id="uf" placeholder="Insira o Uf">
                    <br>
                    <button type="submit">PESQUISAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection