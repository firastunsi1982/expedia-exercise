<?php

$config = array(
    // Site Config
    'SITE_PROTOCOL' => 'https://',
    'BASEURL' => 'expedia-exercise-firas.herokuapp.com',
    'APP' => '',
    // API Config
    'API_PROTOCOL' => 'https://',
    'API_METHOD' => 'GET', 
    'API_URL' => 'offersvc.expedia.com/offers/',
    'API_VER' => 'v2',
    // getOffers API params Config
    'API_SCENARIO'=>'deal-finder',
    'API_PAGE'=>'foo',
    'API_UID'=>'foo',
    'API_PRODUCT_TYPE'=>'Hotel',
    // Rooms Status
    'ROOM_STATUS' => [
        'AVAILABLE'   => [0=>'AVAILABLE',1=>'AVAILABLE'],
        'ALMOST_SOLD' => [0=>'ALMOST_SOLD',1=>'SOLD'],
    ],
);
