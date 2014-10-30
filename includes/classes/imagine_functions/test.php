<?php

namespace iMagine_functions;

trait test
{
	public function test($args = NULL)
	{
		if (!$_SESSION['iMagine']['valid_session'])
		{
			return array(\iMagine\_('You cannot test.  Please enter the auth code with auth_code()'));
		}
		return explode("\n",`make test`);
	}
}