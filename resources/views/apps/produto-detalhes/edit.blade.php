@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão - Detalhes do Produtos')
    
@section('conteudo')
   <br><br>

   <div class="conteudo-pagina">
      <div class="titulo-pagina">
        <p><i class="bi bi-pencil-square"></i> EDITAR DETALHES DO PRODUTO </p>
      </div>

      <div class="informacao-pagina">
         <h4>PRODUTO</h4>
         <div><h5>Nome: {{ $produto_detalhe->Produto->nome }}</h5></div>
              
         <div><h5>Descrição: {{ $produto_detalhe->Produto->descricao }}</h5></div>
         <br>
         <div style="width: 50%; margin-left: auto; margin-right: auto;">
            @include('apps.produto-detalhes._form')
            <a href="{{ route('produto-detalhe.index') }}" class="btn btn-secondary btn-sm col-md-3" style="margin-left: 120px; margin-top: -57px" role="button"> <i class="bi bi-arrow-counterclockwise"></i> VOLTAR</a>
         </div>
     </div>
   </div>
@endsection