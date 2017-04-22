<?php

$fileName = $_FILES["file1"]["name"];
$fileTmpLoc = $_FILES["file1"]["tmp_name"];
$fileType = $_FILES["file1"]["type"];
$fileSize = $_FILES["file1"]["size"];
$fileErrorMsg = $_FILES["file1"]["error"];


if(!$fileTmpLoc){
  echo "ERROR: You have not selected a file to be uploaded.";
  exit();
}
if(move_uploaded_file($fileTmpLoc, "../img/$fileName")){
  echo "$fileName upload is complete";
}else{
  echo "move_uploaded_file function failed";
}


 ?>
