<?php

  // Define $username and $password
  $username=$_POSTS['username'];
  $password=$_POSTS['password'];
  //echo $username." ".$password;

  $idmiofile = fopen("utenti.txt", "r");

  if (!$idmiofile) {
    	echo "Errore di accesso";
  }
  else {
    $trovate = false;
    while(!feof($idmiofile) && !$trovate) {
      $letta=fgets($idmiofile);
      $dati=explode(";;",$letta);
      if ($dati[0]==$username && $dati[1]==$password)
          $trovate = true;
    }
  }

  if ($trovate==true)
    echo "<p>Welcome</p>";
  else
    echo "No";

?>
