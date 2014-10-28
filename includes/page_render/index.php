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
				'<!-- ENERGY_BLAZER -->' => $blazer->energy,
				'<!-- ENERGY_CURLEAF -->' => $curleaf->energy,
				'<!-- ENERGY_DRAGIRI -->' => $dragiri->energy,
				'<!-- ENERGY_FENIIXIS -->' => $feniixis->energy,
				'<!-- ENERGY_FIREEBEE -->' => $fireebee->energy,
				'<!-- ENERGY_FLIKE -->' => $flike->energy,
				'<!-- ENERGY_GHOSTSLICER -->' => $ghostslicer->energy,
				'<!-- ENERGY_HARTVILE -->' => $hartvile->energy,
				'<!-- ENERGY_KRABULOUS -->' => $krabulous->energy,
				'<!-- ENERGY_NIGHTWING -->' => $nightwing->energy,
				'<!-- ENERGY_PLANTSY -->' => $plantsy->energy,
				'<!-- ENERGY_PLUFF -->' => $pluff->energy,
				'<!-- ENERGY_REEBEE -->' => $reebee->energy,
				'<!-- ENERGY_REEMON -->' => $reemon->energy,
				'<!-- ENERGY_SKELESTORM -->' => $skelestorm->energy,
				'<!-- ENERGY_STRAB -->' => $strab->energy,
				'<!-- STARTING_ENERGY_BLAZER -->' => IMAGINE_BLAZER_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_CURLEAF -->' => IMAGINE_CURLEAF_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_DRAGIRI -->' => IMAGINE_DRAGIRI_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_FENIIXIS -->' => IMAGINE_FENIIXIS_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_FIREEBEE -->' => IMAGINE_FIREE_BEE_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_FLIKE -->' => IMAGINE_FLIKE_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_GHOSTSLICER -->' => IMAGINE_GHOST_SLICER_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_HARTVILE -->' => IMAGINE_HARTVILE_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_KRABULOUS -->' => IMAGINE_KRABULOUS_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_NIGHTWING -->' => IMAGINE_NIGHTWING_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_PLANTSY -->' => IMAGINE_PLANTSY_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_PLUFF -->' => IMAGINE_PLUFF_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_REEBEE -->' => IMAGINE_REE_BEE_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_REEMON -->' => IMAGINE_REEMON_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_SKELESTORM -->' => IMAGINE_SKELESTORM_STARTING_ENERGY,
				'<!-- STARTING_ENERGY_STRAB -->' => IMAGINE_STRAB_STARTING_ENERGY,
				'<!-- JQUERY_1X_VERSION -->' => IMAGINE_JQUERY_1X_VERSION,
				'<!-- JQUERY_2X_VERSION -->' => IMAGINE_JQUERY_2X_VERSION,
				'<!-- NAME_BLAZER -->' => _("Blazer"),
				'<!-- NAME_CURLEAF -->' => _("Curleaf"),
				'<!-- NAME_DRAGIRI -->' => _("Dragiri"),
				'<!-- NAME_FENIIXIS -->' => _("Feniixis"),
				'<!-- NAME_FIREEBEE -->' => _("FireeBee"),
				'<!-- NAME_FLIKE -->' => _("Flike"),
				'<!-- NAME_GHOSTSLICER -->' => _("GhostSlicer"),
				'<!-- NAME_HARTVILE -->' => _("Hartvile"),
				'<!-- NAME_KRABULOUS -->' => _("Krabulous"),
				'<!-- NAME_NIGHTWING -->' => _("Nightwing"),
				'<!-- NAME_PLANTSY -->' => _("Plantsy"),
				'<!-- NAME_PLUFF -->' => _("Pluff"),
				'<!-- NAME_REEBEE -->' => _("ReeBee"),
				'<!-- NAME_REEMON -->' => _("Reemon"),
				'<!-- NAME_SKELESTORM -->' => _("Skelestorm"),
				'<!-- NAME_STRAB -->' => _("Strab"),
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
			if (!empty($_SESSION['ftgr']['returns']))
			{
				foreach ($_SESSION['ftgr']['returns'] as $value)
				{
					$response.=PHP_EOL;
					$response.=$value;
				}
			}
			$globals_dump = $GLOBALS;
			unset($globals_dump['GLOBALS']);
			echo json_encode(array(
				'dump' => ($_SESSION['ftgr']['debug'] || IMAGINE_DEBUG) ? $globals_dump : '',
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