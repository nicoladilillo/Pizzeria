<!DOCTYPE html>
<html>

  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <title>Pizzeria</title>
    <link rel="stylesheet" href="assets/css/mystyle.css">
  </head>

  <body>

      <form action="#" method="post">
            <input name="user" type="text" placeholder="username" />

            <input name="password" type="password" placeholder="password" />

            <input name="confermapassword" type="password" placeholder="conferma password" />

            <input name="nome" type="text" placeholder="nome" />
>
            <input name="cognome" type="text" placeholder="cognome" />

            <input name="email" type="text" placeholder="email" />


        <div class="accesso">
            <input type="submit" value="Registra"/>

            <input type="reset" value="Reset"/>
        </div>
      </form>

      <?php
        $username=$_POST['user'];
        $password=$_POST['password'];
        $nome=$_POST['nome'];
        $cognome=$_POST['cognome'];
        $email=$_POST['email'];
        $conferma=$_POST['confermapassword'];

        $idmiofile = fopen("Utenti.txt", "a+");

        if (!$idmiofile) {
        	die("Impossibile iscriversi al sito!");
        }
        else {
          $trovate = false;
          while(!feof($idmiofile)) {
            $letta=fgets($idmiofile);
            $dati=explode("\t",$letta);
            if($dati[0]==$username)
              $trovate = true;
          }
        }

        if($trovate == true) {
          echo "Username gia' esistente";
        }
        else if ($password != $conferma)
          echo "La password non corrisponde";
        else {
          $record = $username . "\t" . $password . "\t" . $nome . "\t" .$cognome. "\n";
          fwrite($idmiofile, $record);
          header("location: index.php");
        }

        fclose($idmiofile);
      ?>

  </body>

</html>
