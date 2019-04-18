@extends('site.templates.template2')

@section('content')

  <h1>Login</h1>
  <form class="" action="{{url('loginUsuario')}}" method="post">
    <div class="form-group">
      <input type="text" name="_token" value="{{csrf_token()}}" hidden>
      <input type="text" name="email" value="" placeholder="E-mail">
      <input type="password" name="password" value="" placeholder="Senha">
      <input type="submit" value="Entrar" >
    </div>
  </form>

  <a href="{{url('cadastro')}}" class="btn btn-dark btn-sm" >Cadastro</a>


@endsection
