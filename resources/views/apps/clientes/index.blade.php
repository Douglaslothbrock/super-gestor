@extends('apps.layouts.basico')

@section('titulo', 'Super Gestão-Clientes')
    
@section('conteudo')
   <br><br>
   <div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p> LISTA DOS CLIENTES </p>
    </div>

        <div class="menu mt-2 mb-2" style="margin-right: 5%">
        <ul>
            <li>
                <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{route('cliente.create') }}'"> <i class="bi bi-plus-circle"></i> NOVO CLIENTE
                </button>
            </li>
        </ul>
        </div>

      <div class="informacao-pagina">
         <div style="width: 95%; margin-left: auto; margin-right: auto;">
            <table class="table table-striped table-hover table-bordered">
               <thead class="table-primary">
                  <tr>
                     <th>Id</th>
                     <th>Nome</th>
                     <th colspan="3">Ações</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($clientes as $cliente )
                  <tr>
                     <td>{{ $cliente->id }}</td>
                     <td>{{ $cliente->nome }}</td>
                
                     <td width="10%">
                        <button class="btn btn-secondary btn-sm" type="" onclick="location.href='{{ route('cliente.show', $cliente->id) }}'">
                           <i class="bi bi-eye"></i> Visualizar
                        </button>
                     </td>

                     <td width="10%">
                        <button class="btn btn-primary btn-sm" type="" onclick="location.href='{{ route('cliente.edit', $cliente->id) }}'"> <i class="bi bi-pencil-square"></i> Editar
                        </button>
                     </td>

                     <td width="10%">
                        <form action="{{ route('cliente.destroy', $cliente->id)}}" method="POST">
                           @method('DELETE')
                           @csrf
                           <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Excluir</button>
                        </form>
                     </td>
                  </tr> 
                  @endforeach
               </tbody>
            </table>
            <div class="navegation">
                {{ $clientes->appends($request)->links() }}
            </div>
         </div>
     </div>
   </div>
@endsection