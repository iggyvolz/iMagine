target:=iMagine.phar
php:=php
d:=$$
reset-settings:
	@cp config.default.php config.php
generate-phar: reset-settings
	@$(php) -d phar.readonly=Off generate-phar.php $(target)
