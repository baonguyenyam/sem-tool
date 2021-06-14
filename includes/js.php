<?php
echo AssetPacker::js('/assets/js/dist/bundled/lift-bundled-v-'.LIFT_VERSION.'.js',
[
	'assets/js/vendor/jquery.min.js',
	'assets/js/vendor/clipboard.min.js',
	'assets/js/vendor/jquery.fileDownload.js',
	'assets/js/vendor/codemirror.min.js',
	'assets/js/vendor/mode/xml/xml.js',
]);
?>
<script src="/assets/js/vendor/tinymce/js/tinymce/tinymce.min.js?v=<?=LIFT_VERSION?>"></script>
<script src="/assets/js/vendor/tinymce/js/tinymce/jquery.tinymce.min.js?v=<?=LIFT_VERSION?>"></script>