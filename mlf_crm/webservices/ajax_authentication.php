<?php
session_start();
include('../classes/functions.php');
$con = new functions();
$current_date_time = $con->get_datetime();
//-----------------------------------------

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'doLogin'){

	$username = $con->test_input($_REQUEST['username']);
	$password = $con->test_input($_REQUEST['password']);

	$sql_login = "SELECT username, password FROM admin WHERE username = '".$username."' AND password = '".$password."' AND status = 1 ";
	$result_login = $con->data_select($sql_login);

	if($result_login !='no'){

		if($result_login[0]['username'] == $username && $result_login[0]['password'] == $password){
			$_SESSION['username'] = $result_login[0]['username'];
			echo 1;
			exit;
		}else{
			echo 1;
			exit;
		}
		//$_SESSION['username'] = $result_login[0]['username'];
		//$_SESSION['role'] = $result_login[0]['role'];
		
	}else{
		echo 0;
		exit;
	}
}

?>