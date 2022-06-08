@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Produtos')
    
@section('conteudo')
   <br><br>
   <div class="conteudo-pagina">
      <div class="titulo-pagina">
          <p> LISTA DOS PRODUTOS </p>
      </div>

      <div class="menu mt-2 mb-2" style="margin-right: 5%">
          <ul>
              <li>
               <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{route('produto.create') }}'"> <i class="bi bi-plus-circle"></i> NOVO PRODUTO
               </button>
                 {{-- <a href="{{ route('produto.create') }}" class="btn btn-primary btn-sm">Novo Produto</a> --}}
               </li>
              {{-- <li>
               <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{ route('produto.index') }}'"> <i class="bi bi-pencil-square"></i> CONSULTAR
               </button>
                 {{-- <a href="{{ route('produto.index') }}" class="btn btn-primary btn-sm">Consultar</a> --} }
               </li> --}}
          </ul>
      </div>

      <div class="informacao-pagina">
         <div style="width: 95%; margin-left: auto; margin-right: auto;">
            <table class="table table-striped table-hover table-bordered">
               <thead class="table-primary">
                  <tr>
                     <th>Id</th>
                     <th>Fornecedor</th>
                     <th>Site Fornecedor</th>
                     <th>Nome Produto</th>
                     <th>Descricao</th>
                     <th>Peso</th>
                     <th>Comprimento</th>
                     <th>Altura</th>
                     <th>Largura</th>
                     <th colspan="3">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($produtos as $produto )
                  <tr>
                     <td>{{ $produto->id }}</td>
                     <td>{{ $produto->Fornecedor->nome }}</td>
                     <td>{{ $produto->Fornecedor->site }}</td>
                     <td>{{ $produto->nome }}</td>
                     <td>{{ $produto->descricao }}</td>
                     <td>{{ $produto->peso }}Kg</td>
                     <td>{{ $produto->ProdutoDetalhe->comprimento ?? '-' }}</td>
                     <td>{{ $produto->ProdutoDetalhe->altura ?? '-'}}</td>
                     <td>{{ $produto->ProdutoDetalhe->largura ?? '-' }}</td>
                     <td width="10%">
                        <button class="btn btn-secondary btn-sm" type="" onclick="location.href='{{ route('produto.show', $produto->id) }}'">
                           {{-- <a href="{{ route('produto.show', $produto->id)}}" class="btn btn-secondary btn-sm"><i class="bi bi-eye"></i> Visualizar</a> --}}
                           <i class="bi bi-eye"></i> Visualizar
                        </button>
                     </td>
                     <td width="10%">
                        <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{ route('produto.edit', $produto->id) }}'"> <i class="bi bi-pencil-square"></i> Editar
                           {{-- <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a> --}}
                        </button>
                     </td>
                     <td width="10%">
                        <form action="{{ route('produto.destroy', $produto->id)}}" method="POST">
                           @method('DELETE')
                           @csrf
                           <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</button>
                        </form>
                     </td>
                  </tr> 
                  @endforeach
               </tbody>
            </table>
         </div>
     </div>
   </div>
   
@endsection