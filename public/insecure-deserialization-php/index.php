<?php

require('InsecureDeserializationFileManager.php');
require('InsecureDeserializationAuth.php');

$retorno = '';
if (isset($_COOKIE['session']) && !empty($_COOKIE['session'])) {

    $session = unserialize($_COOKIE['session']);

    if ($session->isAuth()) {
        $retorno = "You're authenticated!";

        $fileManager = new InsecureDeserializationFileManager();

        $fileManager->writeLog("test log");
        $log = $fileManager->readLog();

        echo $retorno;
        die;
    } 
}

$session = new InsecureDeserializationAuth();
setcookie("session", serialize($session), time() + 3600);
$retorno = "You are not authenticated!";
echo $retorno;
die;