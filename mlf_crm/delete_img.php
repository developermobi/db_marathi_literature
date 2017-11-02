<?php

   include('classes/functions.php');
    error_reporting(0);
    $con = new functions();
    session_start(); 
  $id = $_REQUEST['id'];

  if($_REQUEST['action']=='event')
  {
    $qry = "DELETE FROM event_img WHERE id=$id";
  $result = $con->data_delete($qry);  
  }

  if($_REQUEST['action']=='award')
  {
    $qry = "DELETE FROM award_img WHERE id=$id";
  $result = $con->data_delete($qry);  
  }

  if($_REQUEST['action']=='conference')
  {
    $qry = "DELETE FROM conference_img WHERE id=$id";
  $result = $con->data_delete($qry);  
  }
  
  
  if($result){
    echo "Image deleted.";
  }
  else{
    echo "Image not deleted.";
  }
?>