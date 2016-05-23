<?php

  if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Username or Password is invalid";
    }
    else
    {
    // Define $username and $password
    $username=$_POST['username'];
    $password=$_POST['password'];
    }
  }

    idmiofile = fopen("utenti.txt", "r");

    if (!$idmiofile) {
      	die("Errore di accesso");
    }
    else {
      $trovate = false;
      while(!feof($idmiofile) && !$trovate) {
        $letta=fgets($idmiofile);
        $dati=explode("\t",$letta);
        if ($dati[0]==$username && $dati[1]==$password)
            $trovate = true;
      }
    }

    if ($trovate==true) {
      echo "Benvenuto \t" . $dati[2]. "\t" . $dati[3];
    }

?>
