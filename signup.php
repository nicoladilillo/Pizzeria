<?php

  $username = $_POST['user'];
  $password = $_POST['password'];
  $confirmation = $_POST['confermapassword'];
  $name = $_POST['nome'];

  include('configure.php');

  if($password==$confirmation) {
    $query = mysql_query("select * from utenti where username='$username'", $conn);
    $rows = mysql_num_rows($query);

    if ($rows == 1) {
      echo "The contact is already existing";
    }
    else {

      $password = crypt($password, $key);
      mysql_query("INSERT INTO utenti (username,password,name)
                   VALUES ('$username','$password','$name')");
      mysql_close($conn);
      header("location: index.php");
    }
  }
  else {
    echo "The password does not match";
  }

  mysql_close($conn); // Closing Connection

?>
