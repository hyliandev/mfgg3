<?php
function respond($response=false){
	if($response == false){
		$response=$GLOBALS['response'];
	}
	
	die(json_encode($response));
}

header('Content-type:application/json');

$response=[
	'success'=>false,
	'data'=>[]
];

if(empty($data=$_POST['data']) || empty($data['purpose'])){
	respond();
}

switch($data['purpose']){
	case 'verify-registration':
		$response['data']=Users::CreateError($data);
		
		respond();
	break;
}

respond();
?>