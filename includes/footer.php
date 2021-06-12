<?php
echo AssetPacker::js('/assets/js/dist/bundled/lift-loader-bundled-v-'.LIFT_VERSION.'.js',
[
    'assets/js/vendor/bootstrap.bundle.min.js',
    'assets/js/dist/function.prod.js',
    'assets/js/dist/lift.prod.js',
    'assets/js/dist/html_validator.prod.js',
    'assets/js/dist/keywords_generator.prod.js',
    'assets/js/dist/post_generator.prod.js',
    'assets/js/dist/content_generator.prod.js',
    'assets/js/dist/robots_generator.prod.js',
]);
?>