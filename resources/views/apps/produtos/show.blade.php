@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Produtos')
    
@section('conteudo')
   <br><br>

   <div class="conteudo-pagina">
      <div class="titulo-pagina">
          <p>DADOS DO PRODUTO</p>
      </div>

      <div class="informacao-pagina">
         <div style="width: 50%; margin-left: auto; margin-right: auto;">
            
            <table class="table table-bordered">
                <tr>
                    <th class="table-dark">NOME :</th>
                    <td>{{ $produto->nome }}</td>
                </tr>
                <tr>
                    <th class="table-dark">PESO :</th>
                    <td>{{ $produto->peso }} Kg</td>
                </tr>
                <tr>
                    <th class="table-dark">DESCRIÇÃO :</th>
                    <td>{{ $produto->descricao }}</td>
                </tr>
                <tr>
                    <th class="table-dark">UNIDADE :</th>
                    <td>{{ $produto->unidade_id }}</td>
                </tr>
            </table>

                <br><br>
                <div class="row justify-content-end col">
                    <a href="{{ route('produto.index') }}" class="btn btn-secondary btn-sm col-md-3 mr-3" style="margin-right: 15px"><i class="bi bi-arrow-counterclockwise"></i> VOLTAR</a>
                </div>
         </div>
     </div>
   </div>
   
@endsection