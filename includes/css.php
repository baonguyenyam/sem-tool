<?php
$cssList = [
	'assets/css/bootstrap/bootstrap-icons.css',
	'assets/css/vendor/bootstrap.min.css',
	'assets/css/vendor/all.min.css',
	'assets/css/vendor/codemirror.min.css',
	'assets/css/vendor/theme/monokai.css',
	'assets/css/dist/main.min.css',
];
if(LIFT_DEV) {
    foreach ($cssList as $value) {
        echo '<link rel="stylesheet" href="/'.$value.'?v='.LIFT_VERSION.'">';
    }
} else {
	echo AssetPacker::css('/assets/css/dist/bundled/lift-bundled-v-'.LIFT_VERSION.'.css',$cssList);
}
?>