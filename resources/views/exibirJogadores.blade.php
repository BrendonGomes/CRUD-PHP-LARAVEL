@extends('template.template')
@section('titulo')
Jogadores
@endsection

@section('conteudo')
<br> <br>
<h1 class="text-center">Jogadores do Time</h1>
<div class="col-8 m-auto text-center mt-3 mb-4">
</div>
<div class="col-8 m-auto">
<br>
{{$jogadores}}
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Camisa</th>
    </tr>
    @foreach($jogadores as $jogador)
      <tr>
      <th scope="row">{{$jogador->id}}</th>
      <td>{{$jogador->nome}}</td>
      <td>{{$jogador->cpf}}</td>
      <td>{{$jogador->numero_camisa}}</td>    
    </tr>
      @endforeach
  </thead>
  <tbody>

  </tbody>
</table>
</div>
@endsection