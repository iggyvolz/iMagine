all: minifycss minifyjs
minifycss:
	yuicompressor src/css/init.css -o src/css/init.min.css
minifyjs:
	yuicompressor src/js/init.js -o src/js/init.min.js
test:
	phpunit tests
