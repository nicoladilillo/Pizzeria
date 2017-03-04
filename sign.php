<?php
  session_start();

  $username = $_POST['user'];
  $password = $_POST['password'];
  $confirmation = $_POST['confirmation'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];

  $db = require_once __DIR__.'/configure.php';

  if($password == $confirmation) {
    $sth = $db->prepare("SELECT password
                          FROM utenti
                          WHERE username = :username");
    $sth->bindValue(':username', $username);
    $sth->execute();
    $row = $sth->fetchAll(PDO::FETCH_OBJ);
    if ($row) {
       $_SESSION['errore'] = "L'username esiste già";
       header("location: signup.php");
    }
    else {
      $password = crypt($password, $password);
      $sql = $db->prepare("INSERT INTO utenti (username, name, surname, email, password)
                           VALUES (:username, :name, :surname, :email, :password)");
      $sql->bindValue(':username', $username);
      $sql->bindValue(':name', $name);
      $sql->bindValue(':surname', $surname);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':password', $password);
      $sql->execute();
      //$db->query($sql);
      $_SESSION['login_user'] = $username; // Inizializzazione Sessione
      header("location: index.php");
    }
  }
  else {
     $_SESSION['errore'] = "Le password sono diverse";
     header("location: signup.php");
  }
