@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('app.fornecedor.adicionar') }}">Novo Fornecedor</a> </li>
                <li> <a href="{{ route('app.fornecedor') }}">Consultar</a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                
                @if (isset($fornecedor))
                    <form action="{{ route('app.fornecedor.atualizar', $fornecedor->id) }}" method="POST">
                    @method('PUT')
                @else
                    {{ $msg }}
                    <form action="{{ route('app.fornecedor.adicionar') }}" method="POST">
                @endif
                    @csrf
                    <input type="text" name="nome" id="fornecedor" value="{{ (isset($fornecedor)) ? $fornecedor->nome : old('nome') }}"  placeholder="Insira o nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="email" name="email" id="email" value="{{ (isset($fornecedor)) ? $fornecedor->email : old('email') }}"  placeholder="Insira o E-mail">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <input type="text" name="site" id="site" value="{{ (isset($fornecedor)) ? $fornecedor->site : old('site') }}"  placeholder="Insira o site">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" id="uf" value="{{ (isset($fornecedor)) ? $fornecedor->uf : old('uf') }}"  placeholder="Insira o Uf">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <button type="submit"> {{ (isset($fornecedor)) ? 'ATUALIZAR' : 'CADASTRAR' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection