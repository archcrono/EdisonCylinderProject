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
  $cylinderNumber = $_POST['$cylinderNumber'];
  $take = $_POST['take'];
  $comments = $_POST['comments'];
  // Playable Checkbox
  $playable = $_POST['playable'];
  if ($playable) {
      $playable = true;
  }else{
      $playable = false;
  }
  // Unplayed Checkbox
  $unplayable = $_POST['unplayable'];
  if ($unplayable) {
      $unplayable = true;
  }else{
      $unplayable = false;
  }

  // Flat Edge Checkbox
  $edge = $_POST['edge'];
  if ($edge) {
      $edge = true;
  }else{
      $edge = false;
  }

  // In UCSB Checkbox
  $ucsb = $_POST['ucsb'];
  if ($ucsb) {
      $ucsb = true;
  }else{
      $ucsb = false;
  }

  // On Website
  $website = $_POST['website'];
  if ($website) {
      $website = true;
  }else{
      $website = false;
  }


  $sql = "INSERT INTO cylinderMetaData (id, cylinderNumber, take, mold, title, artist, comments, onWebsite, cylinderCondition, flatEdge, crackedPlayable, crackedUnplayable, inUCSBdb, url)
    VALUES ('$id', '$number', '$take', '$mold', '$title', '$artist', '$comments', '$website', '$condition', '$edge', '$playable', '$unplayable', '$ucsb', '$url')";

  $result = mysql_query($sql);
  if($result){
    echo "Save Successful!";
  }else{
    echo "Unable to save";
  }


}

 ?>
