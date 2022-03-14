<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json; charset=utf-8");

require_once "Poutine.php";
require_once("PoutineDAO.php");

$potuineJSON = file_get_contents('php://input');
$poutineObjet = json_decode($potuineJSON);
$poutine = new Poutine($_GET);
$poutine = PoutineDAO::chercherParId($poutine->id);
$poutine = PoutineDAO::modifier($poutineObjet);