<?php 
/*// HEADER */
$title = "Favicon generator";
$active='favicon'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class="pe-md-4">
                        <h1 class="h2">Favicon generator</h1>
                        <p>With so many platforms and icons, it's hard to know exactly what you should do. What are the dimensions of favicon.ico? How many Touch icons do I need? LIFT did the reseach and testing for you.</p>
                    </div>
                    <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-sm btn-primary" id="boiler">Generator</button>
                        </div>
                    </div>
                </div>


                <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                    <div class="row">
                        <div class="col-lg">
                            <h5 class="mb-3">Upload</h5>
                            <div class="input-group mb-5">
                                <input type="file" class="form-control" id="filePreview">
                                <button class="btn btn-primary" type="button" id="loadpreviewimg" onclick="loadfilePreview()">Upload</button>
                            </div>
                            <h5 class="mb-3">Preview</h5>
                            <div id="favicon-preview">
                                <h6>Default theme</h6>
                                <div class="favicon themelight mb-4">
                                    <div class="d-flex justify-content-start flex-nowrap align-items-center flex-wrap">
                                        <img src="/assets/img/chrome-left-light.png" alt="">
                                        <div class="faicon"></div>
                                        <span><?=LIFT_TITLE?></span>
                                        <img src="/assets/img/chrome-right-light.png" alt="">
                                    </div>
                                </div>
                                <h6>Dark theme / Incognito</h6>
                                <div class="favicon themedark mb-4">
                                    <div class="d-flex justify-content-start flex-nowrap align-items-center flex-wrap">
                                        <img src="/assets/img/chrome-left-dark.png" alt="">
                                        <div class="faicon"></div>
                                        <span><?=LIFT_TITLE?></span>
                                        <img src="/assets/img/chrome-right-dark.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3">Icons</h5>
                            <div class="mb-5 mb-lg-0 d-flex align-items-baseline flex-wrap" id="favicon-preview-icon">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:30px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:60px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:90px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:120px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:140px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:160px">
                                <img src="/assets/img/android-icon.png" class="imgfavi img-thumbnail me-3 mb-3" style="width:180px">
                            </div>
						</div>
                        <div class="col-lg-6" id="faviboxres">
                            <h5 class="mb-3">Results</h5>
                            <div class="rv">
                                <div class="alert alert-warning">Nothing to show</div>
                            </div>
                            <div class="tv d-none">
                                <textarea class="form-control form-control-sm d-none" id="favisresult" rows="1"></textarea>
                                <textarea class="form-control form-control-sm" id="favisresulte" rows="30"></textarea>
                                <div class="mt-3">
                                    <button class="btn btn-success" data-clipboard-target="#favisresult">Copy</button>
                                </div>
                            </div>
						</div>
                    </div>
                </div>



            </main>
        </div>
    </div>

    <script>
        function loadfilePreview() {
            if(LIFT_APP.code) {
                LIFT_APP.code.toTextArea()
            }
            var myFavicon = '<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">\n'+
            '<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">\n'+
            '<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">\n'+
            '<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">\n'+
            '<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">\n'+
            '<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">\n'+
            '<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">\n'+
            '<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">\n'+
            '<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">\n'+
            '<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">\n'+
            '<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">\n'+
            '<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">\n'+
            '<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">\n'+
            '<link rel="manifest" href="/manifest.json">\n'+
            '<meta name="msapplication-TileColor" content="#ffffff">\n'+
            '<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">\n'+
            '<meta name="theme-color" content="#ffffff">';
            var gFile = $('#filePreview').get(0).files[0];
            if (gFile) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#favicon-preview .faicon').css({
                        'background-image': 'url('+e.target.result+')'
                    });
                    $('#favicon-preview-icon .imgfavi').attr('src', e.target.result)
                }
                reader.readAsDataURL(gFile);
                $('#faviboxres .rv').addClass('d-none');
                $('#faviboxres .tv').removeClass('d-none');
                $('#favisresult').val(myFavicon);
                $('#favisresulte').val(myFavicon);
                LIFT_APP.code = CodeMirror.fromTextArea(document.getElementById("favisresulte"), {
                    mode: "text/html",
                    lineNumbers: true,
                    styleActiveLine: true,
                    matchBrackets: true,
                    smartIndent: true,
                    indentWithTabs: true
                });
                LIFT_APP.code.setOption("theme", 'default')
            } else {
                alert('Please upload favicon')
            }
        }
    </script>


    <?php require 'includes/footer.php';?>

</body>

</html>