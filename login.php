<?php
  session_start();

  $db = require_once __DIR__.'/configure.php';

  $username=$_POST['username'];
  $password=$_POST['password'];

  $sth = $db->prepare("SELECT password
                        FROM utenti
                        WHERE username = :username");
  $sth->bindValue(':username', "$username");
  $sth->execute();
  $row = $sth->fetchAll(PDO::FETCH_OBJ);

  if ($row) {
    if (strcmp(crypt($password, $password), $row[0]->password) == 0) {
      $_SESSION['login_user'] = $username; // Inizializzazione Sessione
      $_SESSION['errore'] = '';
    }
    else
      $_SESSION['errore'] = "Password wrong";
  }
  else
    $_SESSION['errore'] =  "The username does not exist";

  header("location: index.php");
