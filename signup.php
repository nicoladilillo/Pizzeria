<?php
  session_start();

  $db = require_once __DIR__.'/configure.php';
  $errore = $_SESSION['errore'];
  $_SESSION['errore'] = '';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="icon" href="assets/images/Pizza-icon.png">
  </head>

  <body>
    <div class="signup">
      <?php
        if($errore != '')
          echo $errore;
      ?>
      <form action="sign.php" method="post">
        <input name="user" type="text" placeholder="username" />
        <input name="password" type="password" placeholder="password" />
        <input name="confirmation" type="password" placeholder="confirmation password" />
        <input name="name" type="text" placeholder="name" />
        <input name="surname" type="text" placeholder="surname" />
        <input name="email" type="email" placeholder="email" />

        <div class="accesso">
            <input type="submit" value="Registra" />
            <input type="reset" value="Reset" />
        </div>

      </form>
    </div>

    <script src="assets/vendor/jquery-3.1.1.min.js"></script>
    <script src="assets/javascript/script.js"></script>

  </body>
</html>
