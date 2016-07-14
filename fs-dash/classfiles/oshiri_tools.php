<?php
function getBaseAddress(){
	$raw_address = $_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"];
	$last_slash = strrpos($raw_address, '/', -1);

	$address = substr($raw_address, 0, $last_slash-strlen($raw_address));

	return("http://".$address);
}

function getArrayOcurrencies($value, $array){
	$keyArray = array();
	$index = 0;
	
	foreach($array as $element){
		if(strcmp($element, $value) == 0) array_push($keyArray, $index);
		$index ++;
	}
	
	return $keyArray;
}

function redirect($address){
	header("Location: ".$address); 
	exit;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function handleMenuExceptions($inputarray){
	if($inputarray != null){
		return $inputarray;
	}
	else{
		return array("dashboard");
	}
}
?>
