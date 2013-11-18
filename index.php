<?php

error_reporting(E_ALL);
@session_start(); // Don't return an error if session already started
require './includes/index.php';
if (!isset($_POST['contents']))
{
	die;
}
$_POST['contents'] = htmlspecialchars($_POST['contents']); // Sanitize input
$contents = strtolower($_POST['contents']);
$_SESSION['iMagine']['returns'][] = '>' . $contents;
if (parse_contents($contents)) // Set $action, $person, $pars
{
	$_SESSION['iMagine']['returns'][] = 'Who is ' . $person . '???';
	die;
}
if (!is_callable(array($$person, $action)))
{
	$_SESSION['iMagine']['returns'][] = ucfirst($person) . ': How do I "' . $action . '"?';
	die;
}
$returned = call_user_func(array($$person, $action), $pars);
foreach ($returned as $value)
{
	$_SESSION['iMagine']['returns'][] = $value;
}