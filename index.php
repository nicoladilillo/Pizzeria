<?php
  session_start();

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');
  
  $conn = mysql_connect("$host", "root", "$pwd");
  $db = mysql_select_db("pizzeria", $conn);
  //Controll connection database
  if (!$db) {
    die("Connection failed: " . mysql_error());
  }
  mysql_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="assets/css/mystyle.css">
  </head>

  <body>

    <h1>Pizzeria</h1>

    <div class="menu">
      <a href="#" id="1">Home</a>
      <a href="#" id="2">Pizze</a>
      <a href="#" id="3">Chi siamo</a>
    </div>

    <div class="contents">

      <div class="home">
          <img src="./assets/images/pizza_in_forno.jpg" class="prima-immagine">
          <img src="./assets/images/arredamento_pizzerie.jpg" class="seconda-immagine">
          <img src="./assets/images/ristorante_e_pizzeria.jpg" class="terza-immagine">
      </div>

      <div class="pizze">
        <?php
        if(!isset($_SESSION['login_user'])) {
          echo "<div class='login'>
                  <form action='login.php' method='post'>
                    <input name='username' placeholder='username' type='text' />
                    <input name='password' placeholder='**********' type='password' />
                    <div class='accesso'>
                        <input name='signin' type='submit' value='Sign in' />
                  </form>
                    <form action='signup.html'>
                        <input name='signup' type='submit' value='Sign up' />
                    </form>
                    </div>
                </div>";
        }
        else {
          include('pizze.php');
        }
        ?>
      </div>

      <div class="who-we-are">
        <div>
          <h3>NOI E IL NOSTRO LAVORO</h3>
          <p>
            Lavoriamo da oltre 25 anni ed offriamo ai nostri clienti un eccellente
            servizio sia a domicilio, da oggi anche tramite prenotamento online
            grazie al nuovo ed innivativo sito web.
          </p>
        </div>
      </div>

    </div>

    <div class="footer">
      <p>Dilillo Nicola</p>
    </div>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/javascript/script.js"></script>

  </body>
<html>
