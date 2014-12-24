<?php
/** 
* 500px the easy way
*
* @requires php_curl
* @see  https://github.com/500px/api-documentation
*
* @author Hugo Osorio @hugovom <https://github.com/hugovom>
* @based on https://github.com/GobiernoFacil/bbva/blob/master/BBVA.php
*
*/

class PICS {
	
  /*
  * config data
  * -------------------------------------------------------------
  */

  // ENDPOINTS
  const PHOTO_ENDPOINT = "https://api.500px.com/v1/photos";


  // CREDENTIALS
  public $app_id;
  public $key;
  
  
  // MORE STUFF
  public $ch;
  
  /*
  * constructor
  * -------------------------------------------------------------
  */
  function __construct($consumer_key, $consumer_secret){
    $this->consumer_key 	= $consumer_key;
    $this->consumer_secret  = $consumer_secret;
  }

  /**
  * base functions
  * -------------------------------------------------------------
  */
  public function get_user(){
	    // Params for the Photo
		$apiParams = array (
	  		'feature'		=> 'user',
	  		'username'		=> 'your_user_name',
	  		'rpp'			=> 60,
	  		'consumer_key'  => $this->consumer_key
 		);
 		
 		return $this->make_conn(self::PHOTO_ENDPOINT, $apiParams);
  }



  /*
  * helpers
  * -------------------------------------------------------------
  */


  private function make_conn($url, $params){
	  
    $this->ch = curl_init();
    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // set the params, if avaliable
    $url = empty($params) ? $url : $url . '?' . http_build_query($params);
    curl_setopt($this->ch, CURLOPT_URL, $url);

    // finish the thing
    $response = curl_exec($this->ch);
    curl_close($this->ch);
    return $response;
  }
}