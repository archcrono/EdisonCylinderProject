<?php


if(isset($_REQUEST)){
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

  $artist = $_POST['artist'];
  $id = $_POST['id'];
  $title = $_POST['title'];
  $url= $_POST['url'];
  $condition = $_POST['condition'];
  $mold = $_POST['mold'];
  $number = $_POST['number'];
  $take = $_POST['take'];
  $comments = $_POST['comments'];
  // Playable Checkbox
  $playable = $_POST['playable'];
  if ($playable) {
      $playable = 1;
  }else{
      $playable = 0;
  }
  // Unplayed Checkbox
  $unplayable = $_POST['unplayable'];
  if ($unplayable) {
      $unplayable = 1;
  }else{
      $unplayable = 0;
  }

  // Flat Edge Checkbox
  $edge = $_POST['edge'];
  if ($edge) {
      $edge = 1;
  }else{
      $edge = 0;
  }

  // In UCSB Checkbox
  $ucsb = $_POST['ucsb'];
  if ($ucsb) {
      $ucsb = 1;
  }else{
      $ucsb = 0;
  }

  // On Website
  $website = $_POST['website'];
  if ($website) {
      $website = 1;
  }else{
      $website = 0;
  }


  $sql = "INSERT INTO cylinders (id, number, take, mold, title, artist, comments, onWebsite, cylinderCondition, flatEdge, crackedPlayable, crackedUnplayable, inUCSBdb, url)
    VALUES ('$id', '$number', '$take', '$mold', '$title', '$artist', '$comments', '$website', '$condition', '$edge', '$playable', '$unplayable', '$ucsb', '$url')";

  $result = mysql_query($sql);
  if($result){
    echo "I hope this saved the data";
  }


}

 ?>
