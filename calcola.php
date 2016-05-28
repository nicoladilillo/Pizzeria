<?php

  $importo = 0;

  $idmiofile = fopen("pizze.txt", "r");
  if (!$idmiofile)
    echo "Errore di accesso";

  while(!feof($idmiofile)) {
    $letta = fgets($idmiofile);
    $dati = explode(";;",$letta);
    $dati[0] = strtoupper($dati[0]);
    if(!empty($dati[0])) {
      $quantita = $_POST[$dati[0]];
      $importo = $importo + ($quantita*$dati[1]);
    }
  }

  if($_POST['consegna'])
    $importo = $importo+7;

  echo $importo;

?>
