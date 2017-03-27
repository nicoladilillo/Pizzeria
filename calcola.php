<?php
  session_start();

  $db = require_once __DIR__.'/configure.php';
  if(isset($_SESSION['login_user']))
    $errore = $_SESSION['errore'];
  else
    $errore = '';
  $_SESSION['errore'] = '';
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Conto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <link rel="stylesheet" href="assets/css/calcola.css">
    <link rel="icon" href="assets/images/Pizza-icon.png">
  </head>

  <body>

    <h1>Pizzeria</h1>

    <div class="contents">

      <div class="calcola">
        <?php
          if( isset($_POST['consegna']) )
            if( $_POST['consegna'] == true )
              echo "<p>Il vostro ordine vi sarà consegnato fra poco</p>";
          else
            echo "<p>Il vostro ordine sarà pronto a breve</p>";
        ?>
        <img src="./assets/images/vistp.png">
        <p>L'importo da pagare è pari a <strong>
        <?php

          $importo = 0;

          $sth = $db->prepare("SELECT * FROM pizze");
          $sth->execute();
          $row = $sth->fetchAll(PDO::FETCH_OBJ);

          foreach ($row as $pizza)
          {
            $quantita = $_POST[$pizza->name];
            $importo = $importo + ($quantita*$pizza->price);
          }

          if( isset($_POST['consegna']) && $_POST['consegna'] == true )
              $importo = $importo+7;

          echo $importo;

        ?>
        </strong>€</p>
        <button class="home">
          Home
        </button>
      </div>

    </div>

    <div class="footer">
      <p>Dilillo Nicola</p>
    </div>

    <script src="assets/vendor/jquery-3.1.1.min.js"></script>
    <script src="assets/javascript/calcola.js"></script>

  </body>
<html>

