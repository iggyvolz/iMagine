<?php
function iMagine_action_changeto($person,$parameter)
{
	if(!isset($_SESSION['iMagine']['people'][$parameter]))
	{
		return array('Error: '.$parameter.' is not a playable person.');
	}
	$_SESSION['iMagine']['me']=$parameter;
	return array($parameter.' is now selected.');
}