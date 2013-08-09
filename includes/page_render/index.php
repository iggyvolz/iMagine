<?php
register_shutdown_function('page_render');
function page_render()
{
	global $use_get;
	if(isset($no_render_page))
	{
		return;
	}
	$page=file_get_contents('../../page.html');
	$response='Welcome to iMagine - the unofficial Magi Nation video game!';
	$response.=PHP_EOL;
	$response.='For help, type help';
	if(!empty($_SESSION['iMagine']['returns']))
	{
		foreach($_SESSION['iMagine']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	$replacements=array(
	'<!-- RESPONSE -->' => $response,
	'<!-- METHOD -->' => $use_get ? 'GET' : 'POST',
	'<!-- DUMP -->' => $_SESSION['iMagine']['debug']?print_r($GLOBALS,TRUE):'',
	'<!-- ENERGY_TONY -->' => $_SESSION['iMagine']['people']['tony']['energy'],
	'<!-- ENERGY_EDYN -->' => $_SESSION['iMagine']['people']['edyn']['energy'],
	'<!-- ENERGY_STRAG -->' => $_SESSION['iMagine']['people']['strag']['energy'],
	);
	$page=str_replace(array_keys($replacements),array_values($replacements),$page);
	echo $page;
}
