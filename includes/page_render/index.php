<?php

register_shutdown_function('page_render_' . FTGR_MODE);

function page_render_normal()
{
	if (defined('FTGR_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug, $nechka, $shade, $apparition;
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
		'<!-- ENERGY_NECHKA -->' => $nechka->energy,
		'<!-- ENERGY_SHADE -->' => $shade->energy,
		'<!-- ENERGY_APPARITION -->' => $apparition->energy,
		'<!-- NECHKA_STARTING_ENERGY -->' => FTGR_NECHKA_STARTING_ENERGY,
		'<!-- SHADE_STARTING_ENERGY -->' => FTGR_SHADE_STARTING_ENERGY,
		'<!-- APPARITION_STARTING_ENERGY -->' => FTGR_APPARITION_STARTING_ENERGY,
		'<!-- NECHKA_NAME -->' => FTGR_NECHKA_NAME,
		'<!-- SHADE_NAME -->' => FTGR_SHADE_NAME,
		'<!-- APPARITION_NAME -->' => FTGR_APPARITION_NAME,
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	echo $page;
}

function page_render_api()
{
	global $debug, $errors, $nechka, $shade, $apparition;
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
	echo json_encode(array('dump' => ($_SESSION['ftgr']['debug'] AND FTGR_DEBUG) ? print_r($GLOBALS, TRUE) : '', 'nechka_energy' => $nechka->energy, 'shade_energy' => $shade->energy, 'apparition_energy' => $apparition->energy, 'response' => $response, 'errors' => ($errors === array()) ? '' : FTGR_THERE_WERE_ERRORS . PHP_EOL . (FTGR_DEBUG ? array_to_lines($errors) : FTGR_ERRORS_HIDDEN)));
}

function page_render_PY_test()
{
	if ($_GET['ver'] === FTGR_VERSION)
	{
		echo 'true';
	}
	else
	{
		echo 'false';
	}
}

function page_render_PY()
{
	echo end($_SESSION['ftgr']['returns']);
}
