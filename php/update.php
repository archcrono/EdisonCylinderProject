<?php


if(isset($_REQUEST)){
  $con = mysql_connect("tropht.com:3306","trophtco_Brake","StrongPassword1") or die('Cannot connect to DB' . mysql_error());
  $db = mysql_select_db('trophtco_cylinderProject') or die('Cannot select DB');

// Variables
  $cylinderID = $_POST['id'];
  $cylinderNumber = $_POST['number'];
  $cylinderTake = $_POST['take'];
  $cylinderMold = $_POST['mold'];
  $cylinderTitle = $_POST['title'];
  $cylinderArtist = $_POST['artist'];
  $cylinderMonthYear = $_POST['monthYear'];
  $cylinderRecordLabel = $_POST['recordLabel'];
  $cylinderComments = $_POST['comments'];
  $cylinderEQSettings = $_POST['eqSettings'];
  $cylinderBoxNumber = $_POST['boxNumber'];
  $cylinderCondition = $_POST['condition'];
  // Flat Edge Checkbox
  $flatEdge = $_POST['edge'];
  if ($flatEdge) {
      $flatEdge = true;
  }else{
      $flatEdge = false;
  }
  // Playable Checkbox
  $crackedPlayable = $_POST['playable'];
  if ($crackedPlayable) {
      $crackedPlayable = true;
  }else{
      $crackedPlayable = false;
  }
  // Unplayed Checkbox
  $crackedUnplayable = $_POST['unplayable'];
  if ($crackedUnplayable) {
      $crackedUnplayable = true;
  }else{
      $crackedUnplayable = false;
  }
  // In UCSB Checkbox
  $inUCSBdb = $_POST['ucsb'];
  if ($inUCSBdb) {
      $inUCSBdb = true;
  }else{
      $inUCSBdb = false;
  }
  $cylinderOtherComments = $_POST['otherComments'];


  $sql = "UPDATE cylinderMetaData SET cylinderNumber='$cylinderNumber',
                                      cylinderTake='$cylinderTake',
                                      cylinderMold='$cylinderMold',
                                      cylinderTitle='$cylinderTitle',
                                      cylinderArtist='$cylinderArtist',
                                      cylinderMonthYear='$cylinderMonthYear',
                                      cylinderRecordLabel='$cylinderRecordLabel',
                                      cylinderComments='$cylinderComments',
                                      cylinderEQSettings='$cylinderEQSettings',
                                      cylinderCondition='$cylinderCondition',
                                      flatEdge='$flatEdge',
                                      crackedPlayable='$crackedPlayable',
                                      crackedUnplayable='$crackedUnplayable',
                                      inUCSBdb='$inUCSBdb',
                                      cylinderOtherComments='$cylinderOtherComments'
                    WHERE cylinderID = '$cylinderID'";

  $result = mysql_query($sql);
  if($result){
    echo "Update Successful!";
  }else{
    echo "Unable to update";
  }


}

 ?>
