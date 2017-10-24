<?php
class ExpediaApi
{    
    
    //Set as default values
    protected $url = '';
    protected $method = '';
    protected $protocol = '';
    protected $ver = '';
    
    //Setter & Getter
    public function set_url( $url ){
        $this->url = $url;
    }
    public function set_method( $method ){
        $this->method = $method;
    }
    public function set_protocol( $protocol ){
        $this->protocol = $protocol;
    }
    public function set_ver( $ver ){
        $this->ver = $ver;
    }

 
    
    //API CALL
    public function callApi($name, $args){
        //Perepare ApiURL with query params
        $url = $this->protocol . $this->url . $this->ver .'/'. $name;

        //CURL initilize
        $ch = curl_init();

        if (count($args)) {
            assert(count($args) == 1);

            $url .= '?' . http_build_query($args);
            echo $url;
            if( $this->method == 'GET' ) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            }
            else {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            }
        }
        
        
        $header[] = "Accept: application/json";
        $header[] = "Content-length: 0";

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        $response = json_decode($result, true);
        
        return $response;
    }
}
