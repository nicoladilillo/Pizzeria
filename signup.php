<?php

  $username=$_POST['user'];
  $password=$_POST['password'];
  $conferma=$_POST['confermapassword'];
  $nome=$_POST['nome'];

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');

  $conn = mysql_connect("$host", "root", "$pwd");
  $db = mysql_select_db("pizzeria", $conn);
  //Controll connection database
  if (!$db) {
    die("Connection failed: " . mysql_error());
  }

  if($password==$conferma) {
    $query = mysql_query("select * from utenti where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);

    if ($rows == 1) {
      echo "Il contato esiste gia'";
    }
    else {
      $sq = mysql_query("INSERT INTO utenti (id,username,password,nome)
                         VALUES (NULL,'$username','$password','$nome')");
      header("location: index.php");
    }
  }
  else {
    echo "La password non corrisponde";
  }

  mysql_close($connection); // Closing Connection

?>
