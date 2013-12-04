<?php

if (defined('FTGR_MODE') && FTGR_MODE === 'api') // Only set error handler if we are in API mode
{
	$errors = array();

	function ftgr_error_handler($errno, $errstr, $errfile, $errline)
	{
		global $errors;
		$errors[] = '<b>' . ftgr_name_to_error($errno) . '</b>:  ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b><br />';
		return TRUE;
	}

	function ftgr_name_to_error($errno)
	{
		switch ($errno)
		{
			case E_ERROR:
				return 'Fatal error';
				break;
			case E_WARNING:
				return 'Warning';
				break;
			case E_PARSE:
				return 'Parse error';
				break;
			case E_NOTICE:
				return 'Notics';
				break;
			case E_CORE_ERROR:
				return 'Fatal core error';
				break;
			case E_CORE_WARNING:
				return 'Core warning';
				break;
			case E_COMPILE_ERROR:
				return 'Fatal compiler error';
				break;
			case E_COMPILE_WARNING:
				return 'Compiler warning';
				break;
			case E_USER_ERROR:
				return 'User-generated fatal error';
				break;
			case E_USER_WARNING:
				return 'User-generated warning';
				break;
			case E_USER_NOTICE:
				return 'User-generated notice';
				break;
			case E_STRICT:
				return 'Strict error';
				break;
			case E_RECOVERABLE_ERROR:
				return 'Recoverable fatal error';
				break;
			case E_DEPRECATED:
				return 'Depreciation error';
				break;
			default:
				return 'Unknown error';
				break;
		}
	}

	set_error_handler('ftgr_error_handler');
}