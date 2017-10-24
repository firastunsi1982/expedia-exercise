<?php
require_once 'API/ExpediaApi.php';
// create an instance
$expedia = new ExpediaApi();
//set ApiURL,method Type, verion, ...etc
$expedia->set_method('GET');
$expedia->set_protocol('https://');
$expedia->set_apiUrl('offersvc.expedia.com/offers/');
$expedia->set_ver('v2');

//Call API with dynamic names here it is "getOffers"
$offers = $expedia->callApi('getOffers', array(
    'scenario' => 'deal-finder',
    'page' => 'foo',
    'uid' => 'foo',
    'productType' => 'Hotel'
));
$hotels = $offers['offers']['Hotel'];


include 'views/hotels.php';