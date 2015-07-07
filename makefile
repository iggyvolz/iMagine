compress: compress-css compress-js
compress-css:
	yuicompressor css/init.css>css/init.min.css
compress-js:
	yuicompressor js/init.js>js/init.min.js
