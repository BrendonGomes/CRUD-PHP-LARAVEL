@extends('template.template')
@section('titulo')
Times
@endsection

@section('conteudo')
<br> <br>
<h1 class="text-center">Gerenciamento de Jogadores</h1>
<div class="col-8 m-auto text-center mt-3 mb-4">
<a href="#"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Cadastrar Jogador</button></a>
</div>
<div class="col-8 m-auto">
<br>
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Camisa</th>
      <th scope="col">Time</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      @foreach($jogadores as $jogador)
      @php
      $time=$jogador->find($jogador->id)->relTime;
      @endphp
      <tr>
      <th scope="row">{{$jogador->id}}</th>
      <td>{{$jogador->nome}}</td>
      <td>{{$jogador->cpf}}</td>
      <td>{{$jogador->numero_camisa}}</td>
      <td>{{$time->nome_time}}</td>
      <td>
          <a href="javascript:func()" onclick='setar("{{$jogador->id}}","{{$jogador->nome}}","{{$jogador->cpf}}","{{$jogador->numero_camisa}}","{{$time->id}}")'><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit">Editar</button></a>
          <a href="href="{{url("$jogadores/$jogador->id")}}"" class="js-del" onClick='setardeletar("{{$jogador->id}}")'><button type="button" class="btn btn-danger">Excluir</button></a>
        </td>
      
    </tr>
      @endforeach
  </tbody>
</table>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Jogador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="cadJogador" id="cadJogador" action="{{url('jogadores')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">CPF:</label>
                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF (Somente Numeros)" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Numero da Camisa:</label>
                <input type="number" class="form-control" id="numero_camisa" name="numero_camisa" placeholder="Numero" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time: </label>
                <select class="form-control" name="id_time" id="id_time" required> 
                  <option value="">Selecione</option>
                  @foreach($times as $time)
                  <option value="{{$time->id}}">{{$time->nome_time}}</option>
                  @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Jogador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="editTime" id="editTime" action='{{url("jogadores/0")}}'>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome:</label>
                <input type="text" class="form-control" id="nome_edit" name="nome_edit" placeholder="Nome Completo" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">CPF:</label>
                <input type="number" class="form-control" id="cpf_edit" name="cpf_edit" placeholder="CPF (Somente Numeros)" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Numero da Camisa:</label>
                <input type="number" class="form-control" id="numero_camisa_edit" name="numero_camisa_edit" placeholder="Numero" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time: </label>
                <select class="form-control" name="time_edit" id="time_edit" required> 
                  <option value="">Selecionar:</option>
                  @foreach($times as $time)
                  <option value="{{$time->id}}">{{$time->nome_time}}</option>
                  @endforeach
                </select>
            </div>
            <input type="hidden" id="id_jogador_edit" name="id_jogador_edit">
            <input type="hidden" id="id_time_edit" name="id_time_edit">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
            </form>
      </div>

    </div>
  </div>
</div>
<script>
  var id_jogador_deletar;
  function setar(id_jogador,nome,cpf,numero,id_time){
    document.getElementById('id_jogador_edit').value = id_jogador;
    document.getElementById('id_time_edit').value = id_time;
    document.getElementById('nome_edit').value = nome;
    document.getElementById('cpf_edit').value = cpf;
    document.getElementById('numero_camisa_edit').value = numero;
  }
  function setardeletar(id_set){
    id_jogador_deletar = id_set;
  }
  function confirmDel(event){
    event.preventDefault();
    let token = document.getElementsByName("_token")[0].value;
    //console.log(event.target.);
    if(confirm("Deseja mesmo apagar?")){
      let ajax = new XMLHttpRequest();
      ajax.open("DELETE", "jogadores/" + id_jogador_deletar);
      ajax.setRequestHeader('X-CSRF-TOKEN', token);
      ajax.onreadystatechange=function(){
        if(ajax.readyState === 4 && ajax.status === 200){
          window.location.href="jogadores";
        }
      };
      ajax.send();
    }else{
      return false
    }
  }
  if(document.querySelector('.js-del')){
    let btn = document.querySelectorAll('.js-del');
    for(let i=0; i<btn.length; i++){
      btn[i].addEventListener('click', confirmDel, false);
    }
  }
</script>
@endsection