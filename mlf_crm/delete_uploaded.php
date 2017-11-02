<?php

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$action = $_GET['action'];
$type = $_GET['type'];

//$folder_name = $type.'_images/'.$action;

$folder_name = $action."/".$type;

$upload_handler = new UploadHandler($folder_name);
$upload_handler->delete();
