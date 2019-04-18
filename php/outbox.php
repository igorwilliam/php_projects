<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Caixa de Saida</title>

    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <table border="1">

        <?php

        $connection = mysqli_connect("localhost", "root", "", "webmail");
        $operation = "select * from email where email ='" . $_SESSION['email'] . "'";
        $sql = mysqli_query($connection, $operation);

        while($show = mysqli_fetch_assoc($sql)){
          echo "<tr>";
          echo "<td>";
          echo $show['email'];
          echo "</td>";
          echo "<td>";
          echo $show['content'];
          echo "</td>";
          echo "</str>";

        }
        ?>

    </table>
    <a href="write.php">Escrever E-mail</a>
    <a href="inbox.php">Caixa de Entrada</a>

  </body>
</html>
