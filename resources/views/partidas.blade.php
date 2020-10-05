@extends('template.template')
@section('titulo')
Partidas
@endsection

@section('conteudo')
<br> <br>
<h1 class="text-center">Gerenciamento de Partidas</h1>
<div class="col-8 m-auto text-center mt-3 mb-4">
<a href="#"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Cadastrar Partida</button></a>
</div>
<div class="col-8 m-auto">
<br>
@csrf
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TIMES</th>
      <th scope="col">PLACAR</th>
      <th scope="col">INICIO</th>
      <th scope="col">FIM</th>
      <th scope="col">AÇÕES</th>
    </tr>
    @foreach($partidas as $partida)
    @php
      $time_A=$partida->find($partida->id)->relTimeA;
      $time_B=$partida->find($partida->id)->relTimeB;
    @endphp
      <tr>
      <th scope="row">{{$partida->id}}</th>
      <td>{{$time_A->nome_time}} X {{$time_B->nome_time}}</td>
      <td>{{$partida->placara}}-{{$partida->placarb}}</td>
      <td>{{$partida->hora_ini}}</td>
      <td>{{$partida->hora_fim}}</td>  
      <td>
          
          <a href="{{url("$partidas/$partida->id")}}" class="js-del" onClick='setardeletar("{{$partida->id}}")'><button type="button" class="btn btn-danger">Excluir</button></a>
        </td>   
    </tr>
      @endforeach
  </thead>
  <tbody>

  </tbody>
</table>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Partida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="cadPartida" id="cadPartida" action="{{url('partidas')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Hora Inicio:</label>
                <input type="time" class="form-control" id="hora_ini" name="hora_ini" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Hora Fim:</label>
                <input type="time" class="form-control" id="hora_fim" name="hora_fim" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Gols A:</label>
                <input type="number" class="form-control" id="placara" name="placara" placeholder="Numero" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Gols B:</label>
                <input type="number" class="form-control" id="placarb" name="placarb" placeholder="Numero" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time A: </label>
                <select class="form-control" name="id_time_a" id="id_time_a" required> 
                  <option value="">Selecione</option>
                  @foreach($times as $time)
                  <option value="{{$time->id}}">{{$time->nome_time}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time B: </label>
                <select class="form-control" name="id_time_b" id="id_time_b" required> 
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
<script>
    var id_partida_deletar;
  function setardeletar(id_set){
    id_partida_deletar = id_set;
  }
  function confirmDel(event){
    event.preventDefault();
    let token = document.getElementsByName("_token")[0].value;
    if(confirm("Deseja mesmo apagar?")){
      let ajax = new XMLHttpRequest();
      ajax.open("DELETE", "partidas/" + id_partida_deletar);
      ajax.setRequestHeader('X-CSRF-TOKEN', token);
      ajax.onreadystatechange=function(){
        if(ajax.readyState === 4 && ajax.status === 200){
          window.location.href="partidas";
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