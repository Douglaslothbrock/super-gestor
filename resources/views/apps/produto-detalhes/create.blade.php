@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão - Detalhes do Produtos')
    
@section('conteudo')
   <br><br>

   <div class="conteudo-pagina">
      <div class="titulo-pagina">
        <p><i class="bi bi-bag-plus"></i> NOVO DETALHES DO PRODUTO</p>
      </div>

      <div class="informacao-pagina">
         <div style="width: 50%; margin-left: auto; margin-right: auto;">
            @include('apps.produto-detalhes._form')
         </div>
     </div>
   </div>
@endsection