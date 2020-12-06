<?php

include_once __DIR__ . "/Config/config.php";

/**
 * Class responsible for defining basic requests to other APIs.
 */
class Integration extends Config {

    private $key;
    private $api_address;
    private $headers;
    private $params;
    private $url;

    function __construct() {
        $this->api_address = null;
        $this->headers = null;   
        $this->params = null;
        $this->url = null;

        $this->setup();
    }

    function setupApiAddress(){
        $this->api_address = null;
    }

    function setupUrl(){
        $this->url = null;
    }

    function setupParams(){
        $this->params = null;
    }

    function setupHeaders(){
        $this->headers = [];
    }

    function setup(){
        $this->setup_api_address();
        $this->setup_url();
        $this->setup_params();
        $this->setup_headers();
    }

    function makeGet($url, $params, $headers){
 
    }

    function makePost($data, $url, $headers, $params){

    }

    function makePut($data, $url, $headers){

    }

    function makeRequest($endpoint = null, $params = null) {
        $uri = $this->url . $endpoint . "?". $params;

        if (!empty($params)){
            $ch = curl_init();
            $timeout = 5;
            curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . $this->key));
            curl_setopt ($ch, CURLOPT_URL, $uri);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            curl_close($ch);

            return $file_contents;

        } else {
            $this->error = true;
            return false;
        }

    } 

}
