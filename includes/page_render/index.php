<?php

register_shutdown_function('page_render_' . FTGR_MODE);

function page_render_normal()
{
	if (defined('FTGR_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug, $reemon, $pluff, $dragiri, $ghostslicer, $nightwing, $reebee;
	ob_start();
	require_once __DIR__ . FTGR_SLASH . 'page.html';
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
		'<!-- ENERGY_REEMON -->' => $reemon->energy,
		'<!-- ENERGY_PLUFF -->' => $pluff->energy,
		'<!-- ENERGY_DRAGIRI -->' => $dragiri->energy,
		'<!-- ENERGY_GHOSTSLICER -->' => $ghostslicer->energy,
		'<!-- ENERGY_NIGHTWING -->' => $nightwing->energy,
		'<!-- ENERGY_REEBEE -->' => $reebee->energy,
		'<!-- STARTING_ENERGY_REEMON -->' => FTGR_REEMON_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_PLUFF -->' => FTGR_PLUFF_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_DRAGIRI -->' => FTGR_DRAGIRI_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_GHOSTSLICER -->' => FTGR_GHOST_SLICER_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_NIGHTWING -->' => FTGR_NIGHTWING_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_REEBEE -->' => FTGR_REE_BEE_STARTING_ENERGY,
		'<!-- NAME_REEMON -->' => FTGR_REEMON_NAME,
		'<!-- NAME_PLUFF -->' => FTGR_PLUFF_NAME,
		'<!-- NAME_DRAGIRI -->' => FTGR_DRAGIRI_NAME,
		'<!-- NAME_GHOSTSLICER -->' => FTGR_GHOST_SLICER_NAME,
		'<!-- NAME_NIGHTWING -->' => FTGR_NIGHTWING_NAME,
		'<!-- NAME_REEBEE -->' => FTGR_REE_BEE_NAME,
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	echo $page;
}

function page_render_api()
{
	global $debug, $errors, $reemon, $pluff, $dragiri, $ghostslicer, $nightwing, $reebee;
	if (defined('FTGR_HELP'))
	{
		echo 'help';
		return;
	}
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
	echo json_encode(array(
		'dump' => ($_SESSION['ftgr']['debug'] AND FTGR_DEBUG) ? print_r($GLOBALS, TRUE) : '',
		'reemon_energy' => $reemon->energy,
		'pluff_energy' => $pluff->energy,
		'dragiri_energy' => $dragiri->energy,
		'ghostslicer_energy' => $ghostslicer->energy,
		'nightwing_energy' => $nightwing->energy,
		'reebee_energy' => $reebee->energy,
		'response' => $response,
		'errors' => ($errors === array()) ? '' : FTGR_THERE_WERE_ERRORS . PHP_EOL . (FTGR_DEBUG ? array_to_lines($errors) : FTGR_ERRORS_HIDDEN)
	));
}
