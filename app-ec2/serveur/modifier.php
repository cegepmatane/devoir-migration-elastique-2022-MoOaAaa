<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once "Poutine.php";
require_once "PoutineDAO.php";

$poutineJSON = file_get_contents('php://input');
$poutineObjet = json_decode($poutineJSON);
$poutine = new Poutine($poutineObjet);

PoutineDAO::modifier($poutine);
echo $poutine->id;