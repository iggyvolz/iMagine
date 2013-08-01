<?php
function iMagine_action_tothedreamplane($person,$parameter)
{
	if(!isset($_SESSION['iMagine']['dreamcreatures'][$person]))
	{
		return array('Error: '.$person.' cannot go to the Dream Plane!');
	}
	if(isset($_SESSION['iMagine']['dreamplane'][$person]))
	{
		return array('Error: '.$person.' is already in the Dream Plane!');
	}
	$_SESSION['iMagine']['dreamplane'][$person] = $person;
	return array(ucfirst($person).', to the Dream Plane!');
}