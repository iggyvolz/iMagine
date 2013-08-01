<?php
@session_start(); // Don't return an error if session already started
include './includes/index.php';
require './kint/Kint.class.php';
$use_get=FALSE;
if($use_get)
{
	if(!isset($_GET['contents']))
	{
		die;
	}
	export_array(parse_contents($contents=strtolower($_GET['contents'])));
}
else
{
	if(!isset($_POST['contents']))
	{
		die;
	}
	export_array(parse_contents($contents=strtolower($_POST['contents'])));
}
$_SESSION['iMagine']['returns'][]='>'.$contents;
if(isset($error))
{
	$_SESSION['iMagine']['returns'][]=$error;
	die;
}
if(!function_exists('iMagine_action_'.$action))
{
	$_SESSION['iMagine']['returns'][]='Error: Invalid function';
	die;
}
$returned=call_user_func('iMagine_action_'.$action,$person,$pars);
foreach($returned as $value)
{
	$_SESSION['iMagine']['returns'][]=$value;
}