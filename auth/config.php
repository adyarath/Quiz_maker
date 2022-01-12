<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once '../database/db_test.php';
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('367903777177-vcoh9d8tr4u0tj0d9dvco1ndg3m73lme.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('KlDbkInZTY66I5hi4UewUIUn');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://radoncosmos.in/auth/');

//
$google_client->addScope('email');

$google_client->addScope('profile');

?>