<?php
  $dbHost = 'localhost';
  $dbName = 'pizzeria';
  $dbUser = 'root';
  $dbPass = '';
  try {
      $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUser, $dbPass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
      echo 'Connection failed. There was an error: '.$e->getMessage();
  }
  return $db;
