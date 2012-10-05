<?php
/**
 * Simsimi API Class
 *
 * @author     M Teguh A Suandi
 * @link       http://mtasuandi.wordpress.com
 * @license    http://creativecommons.org/licenses/by/3.0/
 *
 */
require_once('simsimi_api_request.php');

class SimSimiAPI{

	private $api_key	= '';
	
	private function verifyResponse($response){
	
		if($response === False){
			
			throw new Exception("Coul not connect to YellowPages");
		}else{
			
			return ($response);
		}
	}
	
	private function querySimSimi($parameters){
	
		return yellowpages_api_request($this->api_key, $parameters);
	}
	
	public function simSimiConversation($lc, $ft, $text){
		
		# lc for Language Code e.g en
		# ft filter Double (0.0 ~ 1.0)
		# text string query message
		$parameters		= array("lc"	=>	$lc, 
								"ft"	=>	$ft,
								"text"	=>	$text);
		$json_response 	= $this->querySimSimi($parameters);
		
		return $json_response;
	}
		
}