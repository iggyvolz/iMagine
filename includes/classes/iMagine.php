<?php

namespace iMagine;

class iMagine
{
	public $me="tony";
	public $debug=false;
	public $errors=[];
	public $init=true;
	public $returns=[];
	public $people;
	public $version=IMAGINE_VERSION;
	public $valid_session=IMAGINE_ALLOW_ANY_UPDATE;
	public function __construct()
	{
		$this->people=["tony"=>new Tony,"edyn"=>new Edyn,"strag"=>new Strag];
	}
}
