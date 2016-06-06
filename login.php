<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');

  $conn = mysql_connect("$host", "root", "$pwd");
  $db = mysql_select_db("pizzeria", $conn);
  //Controll connection database
  if (!$db) {
    die("Connection failed: " . mysql_error());
  }

  $query = mysql_query("select * from utenti where password='$password'
                        AND username='$username'", $conn);
  $rows = mysql_num_rows($query);
  if ($rows==1) {
    mysql_close($connection);
    $_SESSION['login_user']=$username; // Initializing Session
    header("location: index.php");
  }
  else echo "no";

?>
