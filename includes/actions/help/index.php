<?php
function iMagine_action_help($person,$parameter)
{
	header('Location: http://localhost/iMagine/help.php');
	return array('Opened help');
}