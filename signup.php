<?php

  $username=$_POST['user'];
  $password=$_POST['password'];
  $conferma=$_POST['confermapassword'];
  $nome=$_POST['nome'];

  $host = getenv("MYSQL_HOST");
  $pwd = getenv("MYSQL_PASSWORD");
  echo "host: $host e password:$pwd";

  $connection = mysql_connect("$host", "root", "$pwd", "pizzeria");

  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }

  if($password==$conferma) {
    $query = mysql_query("select * from utenti where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);

    if ($rows == 1) {
      echo "Il contato esiste gia'";
    }
    else {
      $sq = mysql_query("INSERT INTO utenti (id,username,password,nome) VALUES (NULL,'$username','$password','$nome')");
      echo "Registrazione eseguita con successo";
      header("location: index.php");
    }
  }
  else {
    echo "La password non corrisponde";
  }

  mysql_close($connection); // Closing Connection

?>
