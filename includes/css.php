<?php
echo AssetPacker::css('/assets/css/dist/bundled/lift-bundled-v-'.LIFT_VERSION.'.css',
[
	'assets/css/bootstrap/bootstrap-icons.css',
	'assets/css/vendor/bootstrap.min.css',
	'assets/css/vendor/all.min.css',
	'assets/css/vendor/codemirror.min.css',
	'assets/css/vendor/theme/monokai.css',
	'assets/css/dist/main.min.css',
]);
?>