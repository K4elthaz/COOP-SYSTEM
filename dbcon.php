<?php

require __DIR__."/vendor/autoload.php";

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;




$factory = (new Factory)
    ->withServiceAccount('erdb-multi-purpose-coope-7a7d9-firebase-adminsdk-ba6v0-df775153e2.json')
    ->withDatabaseUri('https://erdb-multi-purpose-coope-7a7d9-default-rtdb.asia-southeast1.firebasedatabase.app/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>