<?php

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');
  $key = getEnv('PASSWORD_SALT');

  $conn = mysql_connect("$host", "root", "$pwd");
  $db = mysql_select_db("pizzeria", $conn);
  // Controll connection database
  if (!$db) {
    die("Connection failed: " . mysql_error());
  }

 ?>
