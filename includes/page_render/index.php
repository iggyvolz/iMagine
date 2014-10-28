<?php

namespace iMagine;

if (!defined("IMAGINE_NO_OUTPUT"))
{
	if (IMAGINE_MODE === 'normal')
	{
		register_shutdown_function(function()
		{
			if (defined('IMAGINE_REFRESH'))
			{
				echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
				die;
			}
			global $debug,
			$blazer,
			$curleaf,
			$dragiri,
			$feniixis,
			$fireebee,
			$flike,
			$ghostslicer,
			$hartvile,
			$krabulous,
			$nightwing,
			$plantsy,
			$pluff,
			$reebee,
			$reemon,
			$skelestorm,
			$strab;
			$page = file_get_contents(__DIR__ . '/page.html');
			$response = _(sprintf("Welcome to iMagine v%s!", IMAGINE_VERSION));
			$response.=PHP_EOL;
			$response.=_("Please be patient, we are under a major code rewrite at the moment.");
			$response.=_("For help and credits, type help then press enter.");
			$response = $response;
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
				'<!-- ENERGY_TONY -->' => $tony->energy,
				'<!-- ENERGY_EDYN -->' => $edyn->energy,
				'<!-- ENERGY_STRAG -->' => $strag->energy,
				'<!-- STARTING_ENERGY_TONY -->' => IMAGINE_TONY_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_EDYN -->' => IMAGINE_EDYN_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_STRAG -->' => IMAGINE_STRAG_STARTING_ENERGY,
				'<!-- JQUERY_1X_VERSION -->' => IMAGINE_JQUERY_1X_VERSION,
				'<!-- JQUERY_2X_VERSION -->' => IMAGINE_JQUERY_2X_VERSION,
				'<!-- NAME_TONY -->' => _("Tony"),
				'<!-- NAME_EDYN -->' => _("Edyn"),
				'<!-- NAME_STRAG -->' => _("Strag"),
			);
			$page = str_replace(array_keys($replacements), array_values($replacements), $page);
			$page = utf8_decode($page); // Change ASCII code to actual letter
			echo $page;
		});
	}

	if (IMAGINE_MODE === 'api')
	{
		register_shutdown_function(function()
		{
			global $debug,
			$errors,
			$blazer,
			$curleaf,
			$dragiri,
			$feniixis,
			$fireebee,
			$flike,
			$ghostslicer,
			$hartvile,
			$krabulous,
			$nightwing,
			$plantsy,
			$pluff,
			$reebee,
			$reemon,
			$skelestorm,
			$strab;
			if (defined('IMAGINE_HELP'))
			{
				echo json_encode('help');
				return;
			}
			$response = sprintf("Welcome to Fightmon the Game: Reemon v%s!", IMAGINE_VERSION);
			$response.=PHP_EOL;
			$response.=_("For help and credits, type help then press enter.");
			$response = trim($response);
			if (!empty($_SESSION['iMagine']['returns']))
			{
				foreach ($_SESSION['iMagine']['returns'] as $value)
				{
					$response.=PHP_EOL;
					$response.=$value;
				}
			}
			$globals_dump = $GLOBALS;
			unset($globals_dump['GLOBALS']);
			echo json_encode(array(
				'dump' => ($_SESSION['iMagine']['debug'] || IMAGINE_DEBUG) ? $globals_dump : '',
				'cutscene' => defined('IMAGINE_SHOW_CUTSCENE'),
				'blazer_energy' => $blazer->energy,
				'curleaf_energy' => $curleaf->energy,
				'dragiri_energy' => $dragiri->energy,
				'feniixis_energy' => $feniixis->energy,
				'fireebee_energy' => $fireebee->energy,
				'flike_energy' => $flike->energy,
				'ghostslicer_energy' => $ghostslicer->energy,
				'hartvile_energy' => $hartvile->energy,
				'krabulous_energy' => $krabulous->energy,
				'nightwing_energy' => $nightwing->energy,
				'plantsy_energy' => $plantsy->energy,
				'pluff_energy' => $pluff->energy,
				'reebee_energy' => $reebee->energy,
				'reemon_energy' => $reemon->energy,
				'skelestorm_energy' => $skelestorm->energy,
				'strab_energy' => $strab->energy,
				'response' => $response,
				'errors' => ($errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (IMAGINE_DEBUG ? "<p>" . implode("</p><p>", $errors) . "</p>" : _("Errors have been hidden by an administrator, but they may have been logged."))
			));
		});
	}
}