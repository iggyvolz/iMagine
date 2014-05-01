<?php

namespace ftgr_functions;

trait _move
{
	public function _move($name, $power, $accuracy, $target = NULL)
	{
		if ($target === NULL)
		{
			if (rand(1, 100) <= $accuracy)
			{
				return array(sprintf(\ftgr\_("%s used %s!"), ucfirst(explode('\\', get_class($this))[1]), $name));
			}
			else
			{
				return array(sprintf(\ftgr\_("%s used %s and it missed!"), ucfirst(explode('\\', get_class($this))[1]), $name));
			}
		}
		if (rand(1, 100) <= $accuracy)
		{
			return array(sprintf(\ftgr\_("%1 used %2 and caused %3 damage on %4!"), ucfirst(explode('\\', get_class($this))[1]), $name, $power, ucfirst($target)));
		}
		else
		{
			return array(sprintf(\ftgr\_("%1 used %2 on %3 and it missed!"), ucfirst(explode('\\', get_class($this))[1]), $name, ucfirst($target)));
		}
	}
}