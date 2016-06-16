<?php

  $importo = 0;

  include('configure.php');

  $result = mysql_query("SELECT * FROM pizze");
  while($row = mysql_fetch_array($result, MYSQL_ASSOC))
  {
    $quantita = $_POST[$row['name']];
    $importo = $importo + ($quantita*$row['price']);
  }

  if($_POST['consegna'])
    $importo = $importo+7;

  echo $importo;

?>
