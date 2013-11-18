<?php

register_shutdown_function('page_render');

function page_render()
{
	if (defined('iMAGINE_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug, $tony, $edyn, $strag;
	ob_start();
	require_once __DIR__ . '/page.html';
	$page = ob_get_contents();
	ob_end_clean();
	$response = 'Welcome to iMagine - the unofficial Magi Nation video game!';
	$response.=PHP_EOL;
	$response.='For help and credits, type help then press enter.';
	if (!empty($_SESSION['iMagine']['returns']))
	{
		foreach ($_SESSION['iMagine']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	$replacements = array(
		'<!-- RESPONSE -->' => $response,
		'<!-- DUMP -->' => $_SESSION['iMagine']['debug'] ? '<pre>' . print_r($GLOBALS, TRUE) . '</pre>' : '',
		'<!-- ENERGY_TONY -->' => $tony->energy,
		'<!-- ENERGY_EDYN -->' => $edyn->energy,
		'<!-- ENERGY_STRAG -->' => $strag->energy,
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	echo $page;
}
