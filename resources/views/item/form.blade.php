@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Item '.$item_id : 'Novo Item' }}</h1>
<p class="mb-4">Veja ou edite um item do inventário. O usuário que está efetuando a edição ou inserção será o responsável.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do item </h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_item', [ 'item_id' => $item_id ]) : route('criar_item') }}">
    {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{ $user_id }}">
      <input type="hidden" name="fornecedor_id" value="1">

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nome">Nome*</label>
          <input type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $nome }}" placeholder="">
          <small class="erro">{{ $errors->first('nome') }}</small>
        </div>
        <div class="form-group col-md-6">
          <label for="serial">Serial Number*</label>
          <input type="text" class="form-control" name="serial" value="{{ old('serial') ? old('serial') : $serial }}" placeholder="">
          <small class="erro">{{ $errors->first('serial') }}</small>
        </div>    
      </div>

      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" name="descricao" value="{{ old('descricao') ? old('descricao') : $descricao }}" placeholder="">
        <small class="erro">{{ $errors->first('descricao') }}</small>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="valor">Valor patrimonial*</label>
          <input type="text" class="form-control" name="valor" value="{{ old('valor') ? old('valor') : $valor }}" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" value="" data-type="currency" placeholder="R$ 1,000.00">
          <small class="erro">{{ $errors->first('valor') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="entrada">Data da compra</label>
          <input type="date" class="form-control" name="entrada" value="{{ old('entrada') ? old('entrada') : $entrada }}" placeholder="00/00/000">
          <small class="erro">{{ $errors->first('entrada') }}</small>
        </div>  
        <div class="form-group col-md-4">
          <label for="nota">Nota fiscal</label>
          <input type="text" class="form-control" name="nota" value="{{ old('nota') ? old('nota') : $nota }}" placeholder="">
          <small class="erro">{{ $errors->first('nota') }}</small>
        </div>  
      </div>

      <div class="form-row">

        <div class="form-group col-md-3">
          <label for="status">Status</label>
          <select name="status" class="form-control">
            @foreach( $status_array as $stat )
              <option value="{{ $stat }}" {{ $status == $stat ? 'selected="selected"' : '' }}>{{ $stat }}</option>
            @endforeach
          </select>
        </div>   

        <div class="form-group col-md-3">
          <label for="tipo">Tipo</label>
          <select name="tipo" class="form-control">
          @foreach( $tipos_array as $tipos )
              <option value="{{ $tipos }}" {{ $tipo == $tipos ? 'selected="selected"' : '' }}>{{ $tipos }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="setor_id">Setor</label>
          <select name="setor_id" class="form-control">
            @foreach( $setores as $setor )
              <option value="{{ $setor->id }}" {{ $setor_id == $setor->id ? 'selected="selected"' : '' }}>{{ $setor->nome }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('setor_id') }}</small>
        </div>

        <div class="form-group col-md-3">
          <label for="local_id">Local</label>
          <select name="local_id" class="form-control">
            @foreach( $locais as $local )
              <option value="{{ $local->id }}" {{ $local_id == $local->id ? 'selected="selected"' : '' }}>{{ $local->nome }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('local_id') }}</small>
        </div>
        
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>

@endsection