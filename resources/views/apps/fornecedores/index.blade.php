@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('app.fornecedor.adicionar') }}">Novo Fornecedor</a> </li>
                <li> <a href="{{ route('app.fornecedor') }}">Consultar</a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.listar') }}" method="POST">
                    @csrf
                    <label for="fornecedor">Nome *</label>
                    <input type="text" name="nome" id="fornecedor" placeholder="Insira o nome">

                    <label for="email">E-mail *</label>
                    <input type="email" name="email" id="email" placeholder="Insira o E-mail">

                    <label for="site">Site *</label>
                    <input type="text" name="site" id="site" placeholder="Insira o site">

                    <label for="uf">Uf *</label>
                    <input type="text" name="uf" id="uf" placeholder="Insira o Uf">

                    <button type="submit">PESQUISAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection