<?php

namespace people_functions;

trait version
{

	public function version(...$excess)
	{
		if(!is_dir(__DIR__."/../../../.git"))
		{
			return array(sprintf(\iMagine\_("On version %s."),IMAGINE_VERSION));
		}
		if(`git 2>&1|grep "command not found"`!==NULL)
		{
			return array(sprintf(\iMagine\_("On version %s."),IMAGINE_VERSION));
		}
		$DIR=__DIR__;
		$describe=`cd "$DIR";git describe --tags|tr -d '\n'`;
		if(strpos($describe,"-")===FALSE)
		{
			return array(sprintf(\iMagine\_("On version %s."),$describe));
		}
		return [sprintf(\iMagine\_("Ahead of %s by %u commits."),...explode("-",$describe)),sprintf(\iMagine\_("Last commit: %s, message \"%s\""),`cd "$DIR";git log -1 --pretty=%H|tr -d '\n'`,`cd "$DIR";git log -1 --pretty=%B|tr -d '\n'`)];
	}
}
