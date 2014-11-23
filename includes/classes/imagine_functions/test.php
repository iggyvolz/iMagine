<?php

namespace iMagine_functions;

trait test
{
	public function test($args = NULL)
	{
		return file_get_contents(str_replace("api","test",IMAGINE_API_URL)."?pre=false");
	}
}
