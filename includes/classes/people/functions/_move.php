<?php

namespace people_functions;

trait _move
{

	public function _move($name, $power, $accuracy, $target = NULL)
	{
		if ($target === NULL)
		{
			if (rand(1, 100) <= $accuracy)
			{
				return array(sprintf(\iMagine\_("%s used %s!"), ucfirst(explode('\\', get_class($this))[1]), $name));
			}
			else
			{
				return array(sprintf(\iMagine\_("%s used %s and it missed!"), ucfirst(explode('\\', get_class($this))[1]), $name));
			}
		}
		if (rand(1, 100) <= $accuracy)
		{
			return array(sprintf(\iMagine\_("%s used %s and caused %d damage on %s!"), ucfirst(explode('\\', get_class($this))[1]), $name, $power, ucfirst($target)));
		}
		else
		{
			return array(sprintf(\iMagine\_("%s used %s on %s and it missed!"), ucfirst(explode('\\', get_class($this))[1]), $name, ucfirst($target)));
		}
	}

}
