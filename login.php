<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $idmiofile = fopen("utenti.txt", "r");

  if (!$idmiofile) {
    	echo "Errore di accesso";
  }
  else {
    $trovate = false;
    while(!feof($idmiofile) && !$trovate) {
      $letta=fgets($idmiofile);
      $dati=explode(";;",$letta);
      if ($dati[0]==$username && $dati[1]==$password) {
          $trovate = true;
          $nome = $dati[2];
          $_SESSION['login_user']=$nome;
      }
    }
  }

  if ($trovate==true)
    header("location: index.php");
  else
    echo "No";

?>
