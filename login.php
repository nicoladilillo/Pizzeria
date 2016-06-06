<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');

  $connection = mysql_connect("$host", "root", "$pwd", "pizzeria");
  mysql_select_db("pizzeria", $connection);

    $query = mysql_query("select * from utenti where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);
    if ($rows == 1) {
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: index.php");
    }
    else echo "no";

  mysql_close($connection); // Closing Connection

?>
