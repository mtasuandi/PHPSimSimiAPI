<?php
require_once('simsimi_api_class.php');

$obj = new SimSimiAPI();

try{
	
	$result = $obj->simSimiConversation('en', '1.0', 'Hi simi');
}catch(Exception $e){
	
	echo $e->getMessage();
}

var_dump($result);