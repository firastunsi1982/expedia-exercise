Expedia-PHP-API - READ ME
=========================

-GitHub link : https://github.com/firastunsi1982/expedia-exercise
-Site URL: https://expedia-exercise-firas.herokuapp.com/hotels.php


-Instructions for setting the site up :

-In the configuration file "config.php" you can set your application setting like:
    'SITE_PROTOCOL' => 'https://' OR 'http://'
    'BASEURL' => 'BASEURL', Your baseURL in case you want to run it on your machine change it to "localhost" or "yoursitename.com"
    'APP' => 'THE_APP_NAME', The application name in case you want to name your application yoursitename.com/APP_NAME or leave it empty
    // API Config
    'API_PROTOCOL' => 'https://' OR 'http://', Expedia API Protocol 
    'API_METHOD' => 'GET' Or 'POST' , in this example it is GET method
    'API_URL' => 'offersvc.expedia.com/offers/', API URL
    'API_VER' => 'v2', the version of API
    // getOffers API params Config
    'API_SCENARIO'=>'deal-finder', // Expedia param for this example
    'API_PAGE'=>'foo', // Expedia param for this example
    'API_UID'=>'foo', // Expedia param for this example
    'API_PRODUCT_TYPE'=>'Hotel', // Expedia param for this example

