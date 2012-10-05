<?php
/**
 * Simsimi API Class
 *
 * @author     M Teguh A Suandi
 * @link       http://mtasuandi.wordpress.com
 * @license    http://creativecommons.org/licenses/by/3.0/
 *
 */
function simsimi_api_request($api_key, $params){

	$method	= "GET";
	$host	= "http://api.simsimi.com/request.p".$api_key.$params;
	$params["key"]   	= $api_key;
	
	ksort($params);
 
    $canonicalized_query = array();
 
    foreach ($params as $param=>$value)
    {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
 
    $canonicalized_query = implode("&", $canonicalized_query);
	
	$request = $host."?".$canonicalized_query;
	
	$ch = curl_init();
    
	curl_setopt($ch, CURLOPT_URL,$request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    
	$json_response = curl_exec($ch);
	curl_close($ch);
	
	$result = json_decode($json_response,true);
	
	echo $request."<p/>";
	
	if ($json_response === False)
    {
        return False;
    }
    else
    {
    	return $result;
	}
}
?>