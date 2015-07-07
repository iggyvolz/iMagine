<?php

namespace iMagine;
require_once 'includes/classes/imagine_functions/index.php';
class Person
{
	use \iMagine_functions\_debug_off;
	use \iMagine_functions\_debug_on;
	use \iMagine_functions\_move;
	use \iMagine_functions\_update_recursive_scandir;
	use \iMagine_functions\_update_remove_folder;
	use \iMagine_functions\auth_code;
	use \iMagine_functions\changeto;
	use \iMagine_functions\debug;
	use \iMagine_functions\magine;
	use \iMagine_functions\test;
	use \iMagine_functions\update;
	use \iMagine_functions\version;
	public $energy=0;
	public $moves=[];
}
