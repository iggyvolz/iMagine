target:=iMagine.phar
php:=php
d:=$$
generate-phar:
	@$(php) -d phar.readonly=Off generate-phar.php $(target)
