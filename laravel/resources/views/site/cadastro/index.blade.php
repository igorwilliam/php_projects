@extends('site.templates.template2')

@section('content')

<h1>Cadastro de Usuario</h1>
<form class="" action="{{url('cadastroUsuario')}}" method="post">
  <div class="form-group">
      <input type="text"  name="_token" value="{{csrf_token()}}" hidden>
      <input type="text"  name="name" value="" placeholder="Insira o Nome">
      <input type="text"  name="email" value="" placeholder="Insira o Email">
      <input type="password"  name="password" value="" placeholder="Insira o Senha">
      <input type="number" name="isAdm" value="0" hidden>
      <input type="submit" value="Cadastrar">
  </div>
</form>
<a href="{{url('login')}}" class="btn btn-dark btn-sm" >Login</a>
@endsection
