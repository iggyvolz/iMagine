<?php

namespace iMagine;
class Person
{
	use \people_functions\_debug_off;
	use \people_functions\_debug_on;
	use \people_functions\_move;
	use \people_functions\_update_recursive_scandir;
	use \people_functions\_update_remove_folder;
	use \people_functions\auth_code;
	use \people_functions\changeto;
	use \people_functions\debug;
	use \people_functions\magine;
	use \people_functions\test;
	use \people_functions\update;
	use \people_functions\version;
	public $energy=0;
	public $moves=[];
	public $dreamcreatures=[];
}
