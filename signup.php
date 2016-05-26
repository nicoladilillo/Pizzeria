<?php
  $username=$_POST['user'];
  $password=$_POST['password'];
  $conferma=$_POST['confermapassword'];
  $nome=$_POST['nome'];

  $idmiofile = fopen("utenti.txt", "a+");

  if (!$idmiofile) {
    echo "Impossibile iscriversi al sito!";
  }
  else {
    $trovate = false;
    while(!feof($idmiofile)) {
      $letta=fgets($idmiofile);
      $dati=explode(";;",$letta);
      if($dati[0]==$username)
        $trovate = true;
  }

  echo "ciao";

  if ($trovate == true) {
    echo "Username gia' esistente";
  }
  else if ($password != $conferma) {
    echo "La password non corrisponde";
  }
  else {
    $record = ($username . ";;" . $password . ";;" . $nome . "\n");
    fwrite($idmiofile, $record);
  }

  echo "Registrazione eseguita con successo";

?>
