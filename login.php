<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $host = getenv("MYSQL_HOST");
  $pwd = getenv("MYSQL_PASSWORD");
  echo "host: $host e password:$pwd";

  $connection = mysql_connect("$host", "root", "$pwd", "pizzeria");

  if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
  }
  else {
    $query = mysql_query("select * from utenti where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);
    if ($rows == 1) {
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: index.php");
    }
  }

  mysql_close($connection); // Closing Connection

?>
