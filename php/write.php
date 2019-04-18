<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <title>Escrever</title>
  <body>
    <?php
    require_once("phpmailer/class.phpmailer.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

      $to = $_POST["email"];
      $content = $_POST["content"];

      $email = new PHPMailer();
      $email -> isSMTP();
      $email -> Host = "smtp.gmail.com";
      $email -> Port = 587;
      $email -> SMTPSecure = 'tsl';
      $email -> SMTPAuth = true;
      $email -> Username = "igorwm9@gmail.com";
      $email -> Password = "";    /////////////////////////////////////////////////////////////MUDAR SENHA AKI
      $email -> SetFrom("igorwm9@gmail.com","igorwm9");

      $email -> AddAddress($to);
      $email -> Subject = "igorwm9";

      $email -> msgHTML($content);
      $email -> send();

      registerEmail($to,$content);


    }


      function registerEmail($to, $content){
        $connection = mysqli_connect("localhost", "root", "", "webmail");
        $operation = "insert into email (email, content,dest) values ('".$_SESSION['email']."','".$content."', '".$to."')";
        mysqli_query($connection, $operation);

      }


    ?>

    <form action="write.php" method="post">
        <input type="email"  name="email" placeholder="Enter email">
        <textarea name="content" rows="8" cols="80">Mensagem</textarea>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="inbox.php">Voltar</a>

    </form>

  </body>
</html>
