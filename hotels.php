<?php
require_once 'API/ExpediaApi.php';

// create an instance
$expedia = new ExpediaApi();
$expedia->set_method('GET');
$expedia->set_protocol('https://');
$expedia->set_apiUrl('offersvc.expedia.com/offers/');
$expedia->set_ver('v2');

$offers = $expedia->callApi('getOffers', array(
    'scenario' => 'deal-finder',
    'page' => 'foo',
    'uid' => 'foo',
    'productType' => 'Hotel'
));

$hotels = $offers['offers']['Hotel'];

print_r($hotels);