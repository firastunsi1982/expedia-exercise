<?php

require_once 'API/Expedia.php';

use API\Expedia\Expedia;

// create an instance
$expedia = new Expedia();
$expedia->set_method('GET');
$expedia->set_protocol('https://');
$expedia->set_apiUrl('offersvc.expedia.com/offers/');
$expedia->set_ver('v2');

$hotels = $expedia->callApi('getOffers', array(
    'scenario' => 'deal-finder',
    'page' => 'foo',
    'uid' => 'foo',
    'productType' => 'Hotel'
));

print_r($hotels);
