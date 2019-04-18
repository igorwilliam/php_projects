<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PSW2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </head>
  <body>
{{--
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Sair</a>
        </nav> --}}

        <nav class="navbar navbar-expand navbar-dark bg-dark">
           <a class="navbar-brand" href="#">Reserva de Recursos</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>

           <div class="collapse navbar-collapse" id="navbarsExample02">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
               </li>
               <li class="nav-item">
               </li>
             </ul>
             <form class="form-inline my-2 my-md-0">
              <a class="btn btn-danger" href="{{url('logout')}}">Sair</a>
             </form>
           </div>
         </nav>


        <main role="main" class="container">
          <br>
          <div class="jumbotron">
            @yield('content')

          </div>
        </main>

  </body>
</html>
