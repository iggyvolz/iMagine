<?php
function iMagine_action_reset($person,$pars)
{
	session_destroy();
	init_session();
	return array('');
}