<?php
  session_start();
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];

  $host = getEnv('MYSQL_HOST');
  $pwd = getEnv('MYSQL_PASSWORD');
  $key = getEnv('PASSWORD_SALT');

  $conn = mysql_connect("$host", "root", "$pwd");
  $db = mysql_select_db("pizzeria", $conn);
  // Controll connection database
  if (!$db) {
    die("Connection failed: " . mysql_error());
  }

  $pw = mysql_query("select password from utenti where
                        username='$username'", $conn);

  if (mysql_num_rows($pw)==1) {
    $row = mysql_fetch_assoc($pw);
    if($row['password']==crypt($password, $key)) {
      mysql_close($conn);
      $_SESSION['login_user']=$username; // Initializing Session
      header("location: index.php");
    }
    else {
      echo "Password wrong";
    }
  }
  else echo "The username does not exist";

  mysql_close($conn); // Closing Connection

?>
