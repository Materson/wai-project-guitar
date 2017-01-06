<?php
require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';

session_start();
if(!isset($_SESSION['log']))
{
	$_SESSION['log'] = false;
	$_SESSION['login'] = "";
}

$action_url = $_GET['action'];
dispatch($routing, $action_url);

