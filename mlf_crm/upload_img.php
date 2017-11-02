<?php

 include('classes/functions.php');
    error_reporting(0);
    $con = new functions();
    session_start(); 
    $date = $con->get_datetime();


//Loop through each file
for($i=0; $i<count($_FILES['image']['name']); $i++) {

  if(isset($_FILES["image"])) {

    @list(, , $imtype, ) = getimagesize($_FILES['image']['tmp_name'][$i]);
    // Get image type.
    // We use @ to omit errors
    if ($imtype == 3){ // cheking image type
      $ext="png";
    }
    elseif ($imtype == 2){
      $ext="jpeg";
    }
    elseif ($imtype == 1){
      $ext="gif";
    }
    else{
      $msg = 'Error: unknown file format';
       echo $msg;
      exit;
    }
    if(getimagesize($_FILES['image']['tmp_name'][$i]) == FALSE){
      echo "Please select an image.";
    }
    else{
      $image= addslashes($_FILES['image']['tmp_name'][$i]);
      $name= addslashes($_FILES['image']['name'][$i]);
      $image= file_get_contents($image);
      $image= base64_encode($image);      
      saveimage($name,$image);
    }
  }
}

function saveimage($name,$image){
  $con1 = new functions();
  //Add images for Event.....
  if($_REQUEST['action']=='event')
  {
    $check="SELECT * FROM event_img WHERE name = '$name' AND event_id = ".$_REQUEST['event_id'];

   $data = $con1->data_select($check);

  if($data != 'no') {
    echo ($name . " " . "Image already exists.\n");
  }
  else{
    $qry="insert into event_img (name,image,event_id) values ('$name','$image',".$_REQUEST['event_id'].")";
    $result=$con1->data_insert($qry);
    if($result){
      echo ($name . " " . "Image uploaded.\n");
    }
    else{
      echo ($name . " " . "Image not uploaded.\n");
    }
  }
  }
   
   //Add images for Awards.....
   if($_REQUEST['action']=='award')
  {
    $check="SELECT * FROM award_img WHERE name = '$name' AND award_id = ".$_REQUEST['award_id'];

   $data = $con1->data_select($check);

  if($data != 'no') {
    echo ($name . " " . "Image already exists.\n");
  }
  else{
    $qry="insert into award_img (name,image,award_id) values ('$name','$image',".$_REQUEST['award_id'].")";
    $result=$con1->data_insert($qry);
    if($result){
      echo ($name . " " . "Image uploaded.\n");
    }
    else{
      echo ($name . " " . "Image not uploaded.\n");
    }
  }
  }

  //Add images for Conference...
   if($_REQUEST['action']=='conference')
  {
    $check="SELECT * FROM conference_img WHERE name = '$name' AND conference_id = ".$_REQUEST['conference_id'];

   $data = $con1->data_select($check);

  if($data != 'no') {
    echo ($name . " " . "Image already exists.\n");
  }
  else{
    $qry="insert into conference_img (name,image,conference_id) values ('$name','$image',".$_REQUEST['conference_id'].")";
    $result=$con1->data_insert($qry);
    if($result){
      echo ($name . " " . "Image uploaded.\n");
    }
    else{
      echo ($name . " " . "Image not uploaded.\n");
    }
  }
  }
  mysql_close($con1);
}
mysql_close($con);
?>