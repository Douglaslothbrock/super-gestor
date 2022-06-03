@if (isset($produto))
    <form action="{{ route('produto.update', $produto->id) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('produto.store') }}" method="POST">
@endif
    @csrf
    <label for="nome" style="float: left">Nome *</label>
    <input type="text" class="form-control" value="{{ $produto->nome ?? old('nome') }}" name="nome" id="nome" placeholder="Insira o nome">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <label for="Peso" style="float: left">Peso *</label>
    <input type="number" class="form-control" value="{{ $produto->peso ?? old('peso') }}" name="peso" id="peso" placeholder="Insira o Peso">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

    <label for="descricao" style="float: left">Descrição</label>
    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3">{{ $produto->descricao ?? old('descricao') }}</textarea>
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

    <label for="unidade_id" style="float: left">Unidade *</label>
    <select class="form-control" name="unidade_id" id="unidade_id">
        <option value="">--> Selecione <--</option>
        @foreach ($unidades as $key => $unidade)
            <option value="{{ ($unidade->id) }}" {{ ( $produto->unidade_id ?? old('unidade_id')) == $unidade->id  ? 'selected' : '' }} >{{ $unidade->unidade }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <br><br>
    <div class="row justify-content-end col">
        {{-- <button class="btn btn-secondary btn-sm col-md-3" style="margin-right: 15px" onclick="location.href='{{ route('produto.index') }}'">
        <i class="bi bi-arrow-counterclockwise"></i> VOLTAR
        </button> --}}
        
        <a href="{{ route('produto.index') }}" class="btn btn-secondary btn-sm col-md-3 mr-3" style="margin-right: 15px" role="button"> <i class="bi bi-arrow-counterclockwise"></i> VOLTAR</a>

        <button type="submit" class="btn btn-success btn-sm col-md-3" style="margin-right: 10px">{!! isset($produto) ? '<i class="bi bi-check2-circle"></i> ATUALIZAR' : '<i class="bi bi-check-circle"></i> SALVAR' !!}</button>
    </div>
</form>