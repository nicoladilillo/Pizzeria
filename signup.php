<?php

  $username=$_POST['user'];
  $password=$_POST['password'];
  $conferma=$_POST['confermapassword'];
  $nome=$_POST['nome'];

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');

  $connection = mysql_connect("$host", "root", "$pwd", "pizzeria");
  mysql_select_db("pizzeria", $connection);

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
