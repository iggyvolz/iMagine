target:=iMagine.phar
php:=php
d:=$$
generate-phar: test-readonly
	@$(php) generate-phar.php $(target)
test-readonly:
	@if [[ `$(php) -r "echo ini_get('readonly');"` != "" ]];then echo "ERROR: phar.readonly must be set to Off in php.ini to build a phar." exit 1;fi
