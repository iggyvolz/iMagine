<?php

namespace iMagine;

function page_render()
{
	global $iMagine;
	$DIR=__DIR__;
	$response="";
	if (!empty($iMagine->returns))
	{
		foreach ($iMagine->returns as $value)
		{
			$response.=$value.PHP_EOL;
		}
	}
	$globals_dump = $GLOBALS;
	unset($globals_dump['GLOBALS']);
	echo json_encode(array(
		'dump' => ($iMagine->debug || IMAGINE_DEBUG) ? $globals_dump : '',
		'tony_energy' => $iMagine->people["tony"]->energy,
		'edyn_energy' => $iMagine->people["edyn"]->energy,
		'strag_energy' => $iMagine->people["strag"]->energy,
		'response' => $response,
		'errors' => ($iMagine->errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (IMAGINE_DEBUG ? "<p>" . implode("</p><p>", $iMagine->errors) . "</p>" : _("Errors have been hidden by an administrator, but they may have been logged."))
	));
}
