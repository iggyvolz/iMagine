all: minifycss minifyjs test
minifycss:
	yuicompressor css/init.css -o css/init.min.css
minifyjs:
	yuicompressor js/init.js -o js/init.min.js
test:
	phpunit tests
