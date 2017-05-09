<?php
  if($_POST){
    $conn = mysqli_connect("tropht.com:3306","trophtco_Brake","StrongPassword1", "trophtco_cylinderProject") or die("Cannot connect to DB" . mysql_error());
    // $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins where username = '$username' and password = '$password'";


    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
      session_start();
      $_SESSION['auth']='true';
      header('location:admin.php');
    }
    else{
      echo 'wrong username or password';
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Login page!</h1>
    <form method="POST">
      <label>Username</label>
      <br>
      <input type="text" name="username">
      <br>
      <label>Password</label>
      <br>
      <input type="text" name="password">
      <br>
      <button type="submit" name="button">Submit</button>
    </form>
  </body>
</html>
