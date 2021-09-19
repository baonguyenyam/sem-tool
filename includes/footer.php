<?php
$jsList = [
    'assets/js/vendor/bootstrap.bundle.min.js',
    'assets/js/dist/function.prod.js',
    'assets/js/dist/lift.prod.js',
    'assets/js/dist/html_validator.prod.js',
    'assets/js/dist/keywords_generator.prod.js',
    'assets/js/dist/post_generator.prod.js',
    'assets/js/dist/post_multi_generator.prod.js',
    'assets/js/dist/content_generator.prod.js',
    'assets/js/dist/json_generator.prod.js',
    'assets/js/dist/robots_generator.prod.js',
    'assets/js/dist/qr_generator.prod.js',
    'assets/js/dist/favicon_generator.prod.js',
    'assets/js/dist/geo_generator.prod.js',
    'assets/js/dist/keygen_generator.prod.js',
];
if(LIFT_DEV) {
    foreach ($jsList as $value) {
        echo '<script src="/'.$value.'"></script>';
    }
} else {
    echo AssetPacker::js('/assets/js/dist/bundled/lift-loader-bundled-v-'.LIFT_VERSION.'.js', $jsList);
}
?>