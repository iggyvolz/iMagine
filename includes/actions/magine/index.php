<?php
function iMagine_action_magine($person,$parameter)
{
	if($person=='i')
	{
		$person=$_SESSION['iMagine']['me'];
	}
	if(!isset($_SESSION['iMagine']['people'][$person]))
	{
		return array('Error: '.$person.' is not a playable person.');
	}
	if(!isset($_SESSION['iMagine']['people'][$person]['animite'][$parameter]))
	{
		return array('Error: '.$person.' does not have that animite!');
	}
	if(!isset($_SESSION['iMagine']['dreamplane'][$parameter]))
	{
		return array('Error: '.$parameter.' is already in battle!');
	}
	if($_SESSION['iMagine']['people'][$person]['energy']<100)
	{
		return array('Error: '.$person.' does not have enough energy!');
	}
	$_SESSION['iMagine']['people'][$person]['energy']=$_SESSION['iMagine']['people'][$person]['energy']-100;
	$data=array();
	$data[]=ucfirst($person).': With this animite, I magine '.ucfirst($parameter).'!';
	$data[]=ucfirst($parameter).': '.$_SESSION['iMagine']['people'][$person]['animite'][$parameter]['catchphrase'];
	unset($_SESSION['iMagine']['dreamplane'][$parameter]);
	return $data;
}