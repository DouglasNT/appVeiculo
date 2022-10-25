@extends('padrao')
@section('content')
<section>
<img class="imgCadastroCarro" src="{{'/img/cadastroCarro.png'}}"/>
<p class="text-xl-start fs-1 fw-bold text-danger">Cadastro de Carro</p>
<div class="container cadastroCaminhao">
<form class="row g-3" method="post" action="{{route('alterar-banco-carro', $registrosCarros->id)}}">
  @csrf
  @method('put')
  <div class="col-md-12">
    <label for="inputModelo" class="form-label">Modelo</label>
    <input type="text" name="modelo" value="{{old('modelo', $registrosCarros->modelo)}}" class="form-control" id="inputModelo" placeholder="Fusca">
  @error('modelo')
    <div class="text-sm-start text-danger">*Preencher o campo Modelo.</div>
  @enderror
  </div>
  
  <div class="col-12">
    <label for="inputMarca" class="form-label">Marca</label>
    <input type="text" name="marca" value="{{old('marca', $registrosCarros->marca)}}" class="form-control" id="inputMarca" placeholder="BMW">
  @error('marca')
    <div class="text-sm-start text-danger">*Preencher o campo Marca.</div>
  @enderror
  </div>

  <div class="col-12">
    <label for="inputAno" class="form-label">Ano</label>
    <input type="text" name="ano" value="{{old('ano', $registrosCarros->ano)}}" class="form-control" id="inputAno" placeholder="2000">
  @error('ano')
    <div class="text-sm-start text-danger">*Preencher o campo Ano.</div>
  @enderror
  </div>

  <div class="col-md-12">
    <label for="inputCor" class="form-label">Cor</label>
    <input type="text" name="cor" value="{{old('cor', $registrosCarros->cor)}}" class="form-control" id="inputCor" placeholder="02569-9874">
  @error('cor')
    <div class="text-sm-start text-danger">*Preencher o campo Cor.</div>
  @enderror
  </div>
 
  <div class="col-md-12">
    <label for="inputZip" class="form-label">Valor</label>
    <input type="text" name="valor" value="{{old('valor', $registrosCarros->valor)}}" class="form-control" id="inputZip" placeholder="25.660,23">
  @error('valor')
    <div class="text-sm-start text-danger">*Preencher o campo Valor.</div>
  @enderror
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </div>
</form>
</div>
</section>
@endsection
