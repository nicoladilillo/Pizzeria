<?php

  $importo = 0;

  $db = require_once __DIR__.'/configure.php';

  $sth = $db->prepare("SELECT * FROM pizze");
  $sth->execute();
  $row = $sth->fetchAll(PDO::FETCH_OBJ);

  foreach ($row as $pizza)
  {
    $quantita = $_POST[$pizza->name];
    $importo = $importo + ($quantita*$pizza->price);
  }

  if($_POST['consegna'])
    $importo = $importo+7;

  echo $importo;

?>
