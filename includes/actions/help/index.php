<?php
function iMagine_action_help($person,$parameter)
{
	header('Location: help.php');
	return array('Opened help');
}