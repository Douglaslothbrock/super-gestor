@if (isset($produto_detalhe))
    <form action="{{ route('produto-detalhe.update', $produto_detalhe->id) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('produto-detalhe.store') }}" method="POST">
@endif
    @csrf
    <label for="produto_id" style="float: left">Produto *</label>
    <select name="produto_id" class="form-control" id="produto_id">
        <option value=""><-- Selecione --></option>
        @foreach ($produtos as $produto )
            <option value="{{ $produto->id }}" {{ ($produto_detalhe->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <label for="comprimento" style="float: left">Comprimento *</label>
    <input type="number" class="form-control" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" id="comprimento" placeholder="Insira o comprimento">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <label for="largura" style="float: left">Largura *</label>
    <input type="number" class="form-control" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" id="largura" placeholder="Insira o largura">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <label for="altura" style="float: left">Altura *</label>
    <input type="number" class="form-control" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" id="altura" placeholder="Insira o altura">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <label for="unidade_id" style="float: left">Unidade *</label>
    <select class="form-control" name="unidade_id" id="unidade_id">
        <option value=""><-- Selecione --></option>
        @foreach ($unidades as $key => $unidade)
            <option value="{{ ($unidade->id) }}" {{ ( $produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id  ? 'selected' : '' }} >{{ $unidade->unidade }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <br><br>
    <div class="row justify-content-end col">
        {{-- <button class="btn btn-secondary btn-sm col-md-3" style="margin-right: 15px" onclick="location.href='{{ route('produto-detalhe.index') }}'">
        <i class="bi bi-arrow-counterclockwise"></i> VOLTAR
        </button> --}}
        
        {{-- <a href="{{ route('produto-detalhe.index') }}" class="btn btn-secondary btn-sm col-md-3 mr-3" style="margin-right: 15px" role="button"> <i class="bi bi-arrow-counterclockwise"></i> VOLTAR</a> --}}

        <button type="submit" class="btn btn-success btn-sm col-md-3" style="margin-right: 10px">{!! isset($produto_detalhe) ? '<i class="bi bi-check2-circle"></i> ATUALIZAR' : '<i class="bi bi-check-circle"></i> SALVAR' !!}</button>
    </div>
</form>