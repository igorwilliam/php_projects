<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{url('cadastroReserva')}}" method="post">
      <input type="text" name="_token" value="{{csrf_token()}}" hidden>
      <input type="date" name="data" value="{{date("d.m.y")}}">
      {{date("d.m.y")}}
      <input type="number" name="reservado" value="1" hidden>
      <input type="number" name="id_recurso" value="{{$recurso->id}}" >
      <input type="submit" >
    </form>
  </body>
</html>
