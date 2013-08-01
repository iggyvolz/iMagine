<?php
if(!isset($_SESSION['iMagine']['init']))
{
	init_session();
}
function init_session()
{
	$_SESSION['iMagine']=array();
	$_SESSION['iMagine']['me']='tony';
	$_SESSION['iMagine']['debug']=FALSE;
	$_SESSION['iMagine']['init']=TRUE;
	$_SESSION['iMagine']['returns']=array();
	$_SESSION['iMagine']['people']=array();
	$_SESSION['iMagine']['people']['tony']=array(
	'animite' => array(
		'furok' => array(
			'catchphrase' => 'Let the fur fly!',
			),
		),
	'energy' => 1000,
	);
	$_SESSION['iMagine']['people']['strag']=array(
	'animite' => array(
		'freep' => array(
			'catchphrase' => 'Whose noggin needs knockin\'?',
			),
		),
	'energy' => 1000,
	);
	$_SESSION['iMagine']['people']['edyn']=array(
	'animite' => array(
		'ugger' => array(
			'catchphrase' => '(Ugger\'s catchphrase)',
			),
		),
	'energy' => 1000,
	);
	$_SESSION['iMagine']['dreamplane']=array(
	'furok' => 'furok',
	'freep' => 'freep',
	'ugger' => 'ugger',
	);
	$_SESSION['iMagine']['dreamcreatures']=$_SESSION['iMagine']['dreamplane'];
}