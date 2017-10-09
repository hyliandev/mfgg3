<?php
function respond($response=false){
	if($response == false){
		$response=$GLOBALS['response'];
	}
	
	die(json_encode($response));
}

header('Content-type:application/json');

$response=[
	'success'=>true,
	'data'=>[]
];

if(empty($data=$_POST['data']) || empty($data['purpose'])){
	$response['success']=false;
	respond();
}

switch($data['purpose']){
	case 'verify-registration':
		
	break;
}

respond();
?>