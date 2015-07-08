phar-target:=iMagine.phar
session-target:=session
php:=php
reset-settings:
	@cp config.default.php config.php
reset-session:
	@php -r "namespace iMagine;include 'config.php';include 'includes/index.php'; echo serialize(new iMagine());">$(session-target)
generate-phar: reset-settings
	@$(php) -d phar.readonly=Off generate-phar.php $(phar-target)
