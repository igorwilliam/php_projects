@extends('site.templates.template1')

@section('content')
  <h2>Gerenciamento de Recursos</h2>
  <br>
  <a href="{{url('cadastroRecurso')}}" class="btn btn-success">Cadastrar Novo Recurso</a>
  <br><br>
  
  <table class="table table-striped">
  <thead >
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
    </tr>
  </thead>

  @foreach($recursos as $recurso)
    <tr>
      <td>{{$recurso->nome}}</td>
      <td>{{$recurso->descricao}}</td>
      <td><a href="{{url('editarRecurso',$recurso->id)}}">Editar</a></td>
      <td><a href="{{url('deletarRecurso',$recurso->id)}}">Deletar</a></td>
    </tr>
  @endforeach
  </table>

@endsection
