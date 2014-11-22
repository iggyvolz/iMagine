<?php

namespace iMagine_functions;

trait test
{
	public function test($args = NULL)
	{
		return explode("\n",`make test`);
	}
}
