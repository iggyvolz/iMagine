<?php

register_shutdown_function('page_render');

function page_render()
{
	if (defined('FTGR_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug, $nechka, $shade, $apparition;
	ob_start();
	require_once __DIR__ . '/page.html';
	$page = ob_get_contents();
	ob_end_clean();
	$response = FTGR_INTRO_LINE_ONE;
	$response.=PHP_EOL;
	$response.=FTGR_INTRO_LINE_TWO;
	if (!empty($_SESSION['ftgr']['returns']))
	{
		foreach ($_SESSION['ftgr']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	$replacements = array(
		'<!-- RESPONSE -->' => $response,
		'<!-- DUMP -->' => $_SESSION['ftgr']['debug'] ? '<pre>' . print_r($GLOBALS, TRUE) . '</pre>' : '',
		'<!-- ENERGY_NECHKA -->' => $nechka->energy,
		'<!-- ENERGY_SHADE -->' => $shade->energy,
		'<!-- ENERGY_APPARITION -->' => $apparition->energy,
		'<!-- NECHKA_NAME -->' => FTGR_NECHKA_NAME,
		'<!-- SHADE_NAME -->' => FTGR_SHADE_NAME,
		'<!-- APPARITION_NAME -->' => FTGR_APPARITION_NAME
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	echo $page;
}
