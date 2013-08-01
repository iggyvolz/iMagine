<?php
function iMagine_action_debug($person,$parameter)
{
	$_SESSION['iMagine']['debug']=!$_SESSION['iMagine']['debug'];
	$data='Debug mode is now ';
	$data.=$_SESSION['iMagine']['debug'] ? 'on' : 'off';
	return array($data);
}