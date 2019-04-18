@extends('site.templates.template1')

@section('content')


  <h2>Reservas</h2>
 <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Recurso</th>
        <th>Usuario</th>
        <th>Data</th>
      </tr>
    </thead>

    @foreach($reservas as $reserva)
      @if ($reserva->recurso_id == $id)
        <tr>
          <td>

            @foreach ($recursos as $recurso)
              @if ($recurso->id==$reserva->recurso_id)
                {{$recurso->nome}}
              @endif
            @endforeach

          </td>

          <td>

            @foreach ($users as $user)
              @if ($user->id==$reserva->user_id)
                {{$user->email}}
              @endif
            @endforeach

          </td>
          <td>{{$reserva->data}}</td>
        </tr>
      @endif
    @endforeach
  <tr>
  </table>

  <form class="" action="{{url('cadastroReserva',$id)}}" method="post">
    <input type="text" name="_token" value="{{csrf_token()}}" hidden>
    <input type="date" name="data" value="" >
    <input type="number" name="recurso_id" value="{{$id}}" hidden>
    <input type="number" name="user_id" value="{{Session::get('id')}}" hidden>
    <input type="submit" value="Reservar">
  </form>

@endsection
