@extends('site.templates.template1')

@section('content')

<h2>Gerenciamento de Reservas</h2>
<br><br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
      </tr>
    </thead>

  @foreach($recursos as $recurso)
    <tr>
      <td>{{$recurso->nome}}</td>
      <td>{{$recurso->descricao}}</td>
      <td><a href="{{url('showReserva',$recurso->id)}}">Reservar</a></td>
    </tr>
  @endforeach
  </table>



@endsection
