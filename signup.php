<?php

  $username = $_POST['user'];
  $password = $_POST['password'];
  $confirmation = $_POST['confermapassword'];
  $name = $_POST['nome'];

  $db = require_once __DIR__.'/configure.php';

  if($password == $confirmation) {
    $sth = $db->prepare("SELECT password
                          FROM utenti
                          WHERE username = :username");
    $sth->bindValue(':username', "%{$username}%");
    $sth->execute();
    $row = $sth->fetchAll(PDO::FETCH_OBJ);
    if ($row) {
      echo "L'username esiste già";
     }
    else {
      $sql =("INSERT INTO utenti (username, name, password)
              VALUES ('$username', '$name', '$password')");
      $db->query($sql);
      session_start();
      $_SESSION['login_user']=$username; // Inizializzazione Sessione
      header("location: index.php");
    }
  }
  else {
    echo "Le password sono diverse";
  }
