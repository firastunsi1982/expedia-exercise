<?php
require_once 'config/config.php';
require_once 'API/ExpediaApi.php';

// create an instance
$expedia = new ExpediaApi();

//set ApiURL,method Type, verion, ...etc
$expedia->set_method($config['API_METHOD']);
$expedia->set_protocol($config['API_PROTOCOL']);
$expedia->set_apiUrl($config['API_URL']);
$expedia->set_ver($config['API_VER']);

//Basic params for getOffer API
$apiParams = array(
    'scenario' => $config['API_SCENARIO'],
    'page' => $config['API_PAGE'],
    'uid' => $config['API_UID'],
    'productType' => $config['API_PRODUCT_TYPE'],
);

//Prepare additional params for search
if (isset($_GET['searchBtn']) && $_GET['searchBtn'] == 'Search') {
    (isset($_GET['destName']) && !empty($_GET['destName']) ? $apiParams['destinationName'] = trim($_GET['destName']) : '');
    (isset($_GET['destCity']) && !empty($_GET['destCity']) ? $apiParams['destinationCity'] = trim($_GET['destCity']) : '');
    (isset($_GET['minTripSt']) && !empty($_GET['minTripSt']) ? $apiParams['minTripStartDate'] = trim($_GET['minTripSt']) : '');
    (isset($_GET['maxTripSt']) && !empty($_GET['maxTripSt']) ? $apiParams['maxTripStartDate'] = trim($_GET['maxTripSt']) : '');
    (isset($_GET['lenStay']) && !empty($_GET['lenStay']) ? $apiParams['lengthOfStay'] = trim($_GET['lenStay']) : '');
    (isset($_GET['regionIds']) && !empty($_GET['regionIds']) ? $apiParams['regionIds'] = trim($_GET['regionIds']) : '');
    (isset($_GET['minRateSt']) && !empty($_GET['minRateSt']) ? $apiParams['minStarRating'] = trim($_GET['minRateSt']) : '');
    (isset($_GET['maxRateSt']) && !empty($_GET['maxRateSt']) ? $apiParams['maxStarRating'] = trim($_GET['maxRateSt']) : '');
    (isset($_GET['minTotlRate']) && !empty($_GET['minTotlRate']) ? $apiParams['minTotalRate'] = trim($_GET['minTotlRate']) : '');
    (isset($_GET['maxTotlRate']) && !empty($_GET['maxTotlRate']) ? $apiParams['maxTotalRate'] = trim($_GET['maxTotlRate']) : '');
    (isset($_GET['minGustRate']) && !empty($_GET['minGustRate']) ? $apiParams['minGuestRating'] = trim($_GET['minGustRate']) : '');
    (isset($_GET['maxGustRate']) && !empty($_GET['maxGustRate']) ? $apiParams['maxGuestRating'] = trim($_GET['maxGustRate']) : '');
}

//Call API with dynamic names. here it is "getOffers" API
$offers = $expedia->callApi('getOffers', $apiParams);
$hotels = $offers['offers']['Hotel'];

//view page
include 'views/hotels.php';