<?php
function parse_contents($contents)
{
	if(strpos($contents,'.')===false)
	{
		$actionWithPars=$contents;
		$person='N/A';
	}
	else
	{
		$person=explode('.',$contents)[0];
		$actionWithPars=explode('.',$contents)[1];
	}
	$action=explode('(',$actionWithPars)[0];
	if(strpos($contents,'(')===false)
	{
		$pars='N/A';
	}
	else
	{
		$pars=explode('(',$actionWithPars)[1];
		$pars=explode(')',$pars)[0]; //furok
	}
	$data=array('action' => $action, 'person' => $person, 'pars' => $pars);
	if(isset($pars))
	{
		$data['pars']=$pars;
	}
	else
	{
		$data['pars']='N/A';
	}
	if(isset($person))
	{
		$data['person']=$person;
	}
	else
	{
		$data['person']='N/A';
	}
	return $data;
}