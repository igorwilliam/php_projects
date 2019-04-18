<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">

    <title>Caixa de Entrada</title>

  </head>

  <body>
    <?php

      $connection = mysqli_connect("localhost", "root", "", "webmail");
      $operation = "select * from email where dest ='" . $_SESSION['email'] . "'";
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

    <a href="write.php">Escrever E-mail</a>
    <a href="outbox.php">Caixa de Saida</a>

  </body>
</html>
