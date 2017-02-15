<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $db = require_once __DIR__.'/configure.php';

  $sth = $db->prepare("SELECT password
                        FROM utenti
                        WHERE username = :username");
  $sth->bindValue(':username', "%{$username}%");
  $sth->execute();
  $row = $sth->fetchAll(PDO::FETCH_OBJ);

  if ($row) {
   //$row = mysql_fetch_assoc($pw);
   if($password == $row[0]->password) {
     $_SESSION['login_user']=$username; // Inizializzazione Sessione
     header("location: index.php");
   }
   else {
     echo "Password wrong";
   }
  }
  else echo "The username does not exist";
