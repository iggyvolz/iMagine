<?php

namespace iMagine;

session_start();

class iMagine
{
	public $me="tony";
	public $debug=false;
	public $init=true;
	public $returns=[];
	public $cutscene=null;
	public $people;
	public $version=IMAGINE_VERSION;
	public $valid_session=IMAGINE_ALLOW_ANY_UPDATE;
	public function __construct()
	{
		$people=[new Tony,new Edyn,new Strag];
	}
}

if(isset($_SESSION["iMagine"]))
{
	$iMagine=unserialize($_SESSION["iMagine"]);
}
else
{
	$iMagine=new iMagine();
}
