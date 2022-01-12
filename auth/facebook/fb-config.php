<?php
require_once '../../database/db_test.php';
require_once 'fb-vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '906089870127594',
  'app_secret'     => 'e1b0f1601f9c39f2c0687af0a334440d',
  'default_graph_version'  => 'v2.10'
]);

?>