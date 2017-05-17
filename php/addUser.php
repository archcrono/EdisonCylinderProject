<?php
if(isset($_REQUEST)){
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

// Variables
  $userID = $_POST['userid'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO admins (userID, username, password)
  VALUES ('$userID','$username','$password')";

  // echo $userID . " " . $username . " " . $password;

  $result = mysql_query($sql);
  if($result){
    echo "Save Metadata To Database Successfully!";
  }else{
    echo "Unable to save to the database";

  }

}
 ?>
