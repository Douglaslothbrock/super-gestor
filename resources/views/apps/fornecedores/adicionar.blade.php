@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Fornecedores')
    
@section('conteudo')
<br><br>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <p>Fornecedor - Adicionar</p>
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
                
                @if (isset($fornecedor))
                    <form action="{{ route('app.fornecedor.atualizar', $fornecedor->id) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('app.fornecedor.adicionar') }}" method="POST">
                @endif
                    @csrf

                    <label for="nome" style="float: left">Nome *</label>
                    <input type="text" class="form-control" name="nome" id="fornecedor" value="{{ (isset($fornecedor)) ? $fornecedor->nome : old('nome') }}"  placeholder="Insira o nome">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <label for="email" style="float: left">E-mail *</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ (isset($fornecedor)) ? $fornecedor->email : old('email') }}"  placeholder="Insira o E-mail">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <label for="site" style="float: left">Site *</label>
                    <input type="text" class="form-control" name="site" id="site" value="{{ (isset($fornecedor)) ? $fornecedor->site : old('site') }}"  placeholder="Insira o site">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <label for="uf" style="float: left">UF *</label>
                    <input type="text" class="form-control" name="uf" id="uf" value="{{ (isset($fornecedor)) ? $fornecedor->uf : old('uf') }}"  placeholder="Insira o Uf">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <br>
                    <button type="submit"> {{ (isset($fornecedor)) ? 'ATUALIZAR' : 'CADASTRAR' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection