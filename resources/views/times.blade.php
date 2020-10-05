@extends('template.template')
@section('titulo')
Times
@endsection

@section('conteudo')
<br> <br>
<h1 class="text-center">Gerenciamento de Times</h1>
<div class="col-8 m-auto text-center mt-3 mb-4">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Cadastrar Time</button>
</div>
<div class="col-8 m-auto">
<br>
@csrf
<table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome Time</th>

      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      @foreach($times as $time)
      <tr>
      <th scope="row">{{$time->id}}</th>
      <td>{{$time->nome_time}}</td>

      <td>
          <a href='javascript:func()' onclick='setar("{{$time->nome_time}}","{{$time->id}}")'><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaledit">Editar</button></a>
          <a href="{{url("$times/$time->id")}}" class="js-del" onClick='setardeletar("{{$time->id}}")'><button type="button" class="btn btn-danger">Excluir</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="cadTime" id="cadTime" action="{{url('times')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do Time:</label>
                <input type="text" class="form-control" id="nome_time" name="nome_time" placeholder="Nome" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="editTime" id="editTime" action='{{url("times/0")}}'>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome do Time:</label>
                <input type="text" class="form-control" id="nome_time_edit" name="nome_time_edit" placeholder="Nome" required>
            </div>
            <input type="hidden" class="form-control" id="id_time" name="id_time">
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
  var id_time_deletar;
  function setar(nome,id_set){
    document.getElementById('nome_time_edit').value = nome;
    document.getElementById('id_time').value = id_set;
  }
  function setardeletar(id_set){
    id_time_deletar = id_set;
  }
  function confirmDel(event){
    event.preventDefault();
    let token = document.getElementsByName("_token")[0].value;
    //console.log(event.target.);
    if(confirm("Deseja mesmo apagar?")){
      let ajax = new XMLHttpRequest();
      ajax.open("DELETE", "times/" + id_time_deletar);
      ajax.setRequestHeader('X-CSRF-TOKEN', token);
      ajax.onreadystatechange=function(){
        if(ajax.readyState === 4 && ajax.status === 200){
          window.location.href="times";
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