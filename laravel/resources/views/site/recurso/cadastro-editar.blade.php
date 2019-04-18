@extends('site.templates.template1')

@section('content')

  @if (isset($recurso))
    <h2>Alterar Dados do Recursos</h2>
  @else
    <h2>Cadastro de Recursos</h2>
  @endif
<br>
  @if (isset($recurso))
    <form class="" action="{{url('updateRecurso',$recurso->id)}}" method="post">
      {{-- {!! method_field('PUT') !!} --}}
  @else
    <form class="" action="{{url('cadastroRecurso')}}" method="post">
  @endif
    <div class="form-group">
      <input type="text" name="_token" value="{{csrf_token()}}" hidden>

      <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" placeholder="Nome do Recurso" value="{{$recurso->nome or ''}}">
      <br>
      <textarea name="descricao" class="form-control" rows="8" cols="80" placeholder="Descrição">{{$recurso->descricao or ''}}</textarea>


    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
  </body>
</html>


@endsection
