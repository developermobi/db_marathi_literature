<?php
session_start();
include('../classes/functions.php');
$con = new functions();
$current_date_time = $con->get_datetime();
//-----------------------------------------

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'saveMediaLink'){

	$link = $_REQUEST['link'];
	$type = $_REQUEST['type'];

	if ($type == 'mlf') {
		
	}else if ($type == 'glf') {
		
	}else{
		echo 2;
		exit;
	}

	$sql_insert = "INSERT INTO media_link(link, type) VALUES ('".$link."','".$type."')";

	$data_insert = $con->data_insert($sql_insert);

	if($data_insert > 0){
		echo 0;
		exit;
	}else{
		echo 1;
		exit;
	}
	
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'getMediaLink'){

	$response = array();

	$response['status'] = 400;
	$response['message'] = 'Bad Request';
	$response['data'] = '';

	$type = $_REQUEST['type'];

	$website = "";

	if ($type == 'mlf') {
		//$website = "http://marathiliteraturefestival.com";
	}else if ($type == 'glf') {
		//$website = "http://glf.mobisofttech.co.in";
	}else{
		echo json_encode($response);
		exit;
	}

	$sql_select = "SELECT * FROM media_link WHERE type = '".$type."' ";
	$data_select = $con->data_select($sql_select);

	if($data_select != 'no'){

		$html = '';
		$sr = 1;

		foreach ($data_select as $key => $value) {
			$html .= '<tr>
                        <td>'.$sr.'</td>
                        <td>
                        	<iframe width="300" height="200" src="'.$data_select[$key]["link"].'"></iframe>
						</td>
                        <td>'.$data_select[$key]["link"].'</td>
                        <td class="text-center">   
                            <a onclick=deleteLink('.$data_select[$key]["id"].'); class="btn-group" role="group">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button> 
                                <button type="button" class="btn btn-default btn-sm" title="Delete Link"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>';
            $sr++;
		}

		$response['status'] = 200;
		$response['message'] = 'Success';
		$response['data'] = $html;

	}else{
		$response['status'] = 204;
		$response['message'] = 'Not Found';
		$response['data'] = '';
	}

	echo json_encode($response);
	exit;
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteMediaLinkSingle'){

	$id = $_REQUEST['id'];

	$sql_delete = "DELETE FROM media_link WHERE id = ".$id;
	$data_delete = $con->data_delete($sql_delete);

	if($data_delete > 0){
		echo $data_delete;
		exit;
	}else{
		echo 0;
		exit;
	}

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'getMediaData'){

	$response = array();

	$response['status'] = 400;
	$response['message'] = 'Bad Request';
	$response['data'] = '';

	$type = $_REQUEST['type'];

	$website = "";

	if ($type == 'mlf') {
		//$website = "http://marathiliteraturefestival.com";
	}else if ($type == 'glf') {
		//$website = "http://glf.mobisofttech.co.in";
	}else{
		echo json_encode($response);
		exit;
	}

	$sql_select = "SELECT * FROM media_link WHERE type = '".$type."' ";
	$data_select = $con->data_select($sql_select);

	if($data_select != 'no'){

		$html = '';
		$sr = 1;

		foreach ($data_select as $key => $value) {
			$html .= '<div class="col-md-3" style="height: 200px !important;">
						<iframe width="300" height="200" src="'.$data_select[$key]["link"].'"></iframe>
					</div>';
            $sr++;
		}

		$response['status'] = 200;
		$response['message'] = 'Success';
		$response['data'] = $html;

	}else{
		$response['status'] = 204;
		$response['message'] = 'Not Found';
		$response['data'] = '';
	}

	echo json_encode($response);
	exit;
}

?>