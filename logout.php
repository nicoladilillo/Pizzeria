<?php
  session_start();
  // elimina tutte le variabili di sessione
  session_unset();
  // elimina la sessione
  session_destroy();

  session_start();
  $_SESSION['errore'] = 'Log out';
  header('Location: index.php');
