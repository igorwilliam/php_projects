<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="signin.css" rel="stylesheet">

  </head>
  <title>Cadastro</title>
  <body  class="text-center">
    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

      $email = $_POST["email"];
      $pass = $_POST["pass"];

      addUser($email,$pass);
    }


      function addUser($email, $pass){
        $connection = mysqli_connect("localhost", "root", "", "webmail");
        $operation = "insert into usuario (email, pass) values ('".$email."', '".$pass."')";
        mysqli_query($connection, $operation);
        header("location:index.php");

      }


    ?>

    <!-- <form action="addUser.php" method="post">
        <input type="email"  name="email" placeholder="Enter email">
        <input type="password" name="pass" placeholder="Password">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="index.php">Fazer Login</a>

    </form> -->

    <form class="form-signin" action="addUser.php" method="post">
      <h1 class="h3 mb-3 font-weight-bold">WebMail</h1>
      <h1 class="h3 mb-3 font-weight-normal">Cadastre-se</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-success btn-block" type="submit">Cadastre-se</button>
      <a class="btn btn-lg btn-info btn-block" href="index.php">Entre</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  </body>
</html>
