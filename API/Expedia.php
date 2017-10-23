<?php

namespace API\Expedia;

require_once dirname(__FILE__) . '/Exception.php';

class Expedia
{    
    protected $api_url = 'offersvc.expedia.com/offers/';
    protected $method = 'GET';
    protected $protocol = 'https://';
    protected $ver = 'v2';
    
    public function set_ver( $ver ){
        $this->$ver = $ver;
    }
    
    public function set_apiUrl( $api_url ){
        $this->$api_url = $api_url;
    }
    
    public function set_method( $method ){
        $this->method = $method;
    }

    public function set_protocol( $protocol ){
        $this->protocol = $protocol;
    }

    public function callApi($name, $args){
        $url = $this->protocol . $this->api_url . $this->ver .'/'. $name; // name is : getOffers

        $ch = curl_init();

        if (count($args)) {
            assert(count($args) == 1);

            $data = $args[0];

            print_r($data) . '<br/>';
            
            $url .= '?' . http_build_query($data);

            print $url;
            exit;
        
            if( $this->method == 'GET' ) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            }
            else {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            }
        }
        

        $header[] = "Accept: application/json";
        $header[] = "Accept-Encoding: gzip";
        $header[] = "Content-length: 0";

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_VERBOSE, true);

        curl_setopt($ch, CURLOPT_STDERR, $verbose);

        $result = curl_exec($ch);

        $response = json_decode($result, true);

        $response = current( $response );

        return $response;
    }
}
