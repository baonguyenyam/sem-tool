<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Favicon generator";
$active='favicon'; 
/*// LAYOUT */
require_once 'includes/header.php';
require_once 'core/class-php-ico.php';
?>

<?php
    $downloadDone = '';
    if (!empty($_POST["uploadfrm"])) {
        $allowed_types = array('jpg','gif', 'png');
        $output = '';
        
        try {
            $num = '_'.getRandomKey(10);
            $dist = getcwd()."/tmp/favicon_".$num;
            if(!is_dir($dist)){
                mkdir($dist);
            }
            $attrs = array(
                'sitename' => $_POST['sitename'],
                'sitecolor' => $_POST['sitecolor'],
            );
            copy_directory(getcwd()."/@dev/plugins/@favicon", getcwd()."/tmp/favicon_".$num);
            $it = new RecursiveDirectoryIterator($dist);
            foreach(new RecursiveIteratorIterator($it) as $file) {
                if ($file->getExtension() == 'xml' || ($file->getExtension() == 'json')) {
                    $lines = file( $file );
                    for ( $i = 0; $i < count( $lines ); $i++ ) {
                        $lines[ $i ] = replaceFavicon($lines[ $i ],$num,$attrs); 
                        file_put_contents( $file,$lines );
                    }
                }
            }
            foreach ($_FILES['file']['name'] as $key => $val) {
                $file_name = $_FILES['file']['name'][$key];
                $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                if (in_array(strtolower($ext), $allowed_types)) {
                    $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
                    $createfolder = "favicon_".$num;
                    $filename_to_store = 'favicon.png';
                    try {
                        move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd() . '/tmp/' . $createfolder . '/' . $filename_to_store);
                        $getpath = getcwd() . '/tmp/' . $createfolder . '/' . $filename_to_store;
                        $destination = getcwd() . '/tmp/' . $createfolder . '/favicon.ico';
                        create_square_thumbnail($getpath, 57, 57, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 60, 60, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 72, 72, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 76, 76, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 114, 114, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 120, 120, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 144, 144, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 152, 152, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 180, 180, 'apple-icon-', true);
                        create_square_thumbnail($getpath, 192, 192, 'apple-icon-precomposed', true, true);
                        create_square_thumbnail($getpath, 192, 192, 'apple-icon', true, true);
                        create_square_thumbnail($getpath, 36, 36, 'android-icon-', true);
                        create_square_thumbnail($getpath, 48, 48, 'android-icon-', true);
                        create_square_thumbnail($getpath, 72, 72, 'android-icon-', true);
                        create_square_thumbnail($getpath, 96, 96, 'android-icon-', true);
                        create_square_thumbnail($getpath, 144, 144, 'android-icon-', true);
                        create_square_thumbnail($getpath, 192, 192, 'android-icon-', true);
                        create_square_thumbnail($getpath, 16, 16, 'favicon-', true);
                        create_square_thumbnail($getpath, 32, 32, 'favicon-', true);
                        create_square_thumbnail($getpath, 96, 96, 'favicon-', true);
                        create_square_thumbnail($getpath, 70, 70, 'ms-icon-', true);
                        create_square_thumbnail($getpath, 114, 114, 'ms-icon-', true);
                        create_square_thumbnail($getpath, 150, 150, 'ms-icon-', true);
                        create_square_thumbnail($getpath, 310, 310, 'ms-icon-', true);
                        $ico_lib = new PHP_ICO( $getpath );
                        $ico_lib->save_ico( $destination );
                    } finally {
                        zipData($dist, './tmp/favicon_'.$num.'.zip',"favicon_".$num);
                        $downloadDone = 'favicon_'.$num.'.zip';
                    }
                } else {
                    $output .= 'Error';
                }
            }
        } finally {
        }
    }
    
    ?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>

            <form enctype="multipart/form-data" action="" id="getfrmSubmit" name="upload" method="post">
                <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                        <div class="pe-md-4">
                            <h1 class="h2">Favicon generator</h1>
                            <p>With so many platforms and icons, it's hard to know exactly what you should do. What are the dimensions of favicon.ico? How many Touch icons do I need? LIFT did the reseach and testing for you.</p>
                        </div>
                        <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                            <div class="btn-group">
                                <input type="submit" class="btn btn-sm btn-primary" name="uploadfrm" value="Generator">
                            </div>
                        </div>
                    </div>


                    <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">
                        <div class="row gx-5">
                            <div class="col-xxl">
                                <h5 class="mb-3">Upload</h5>
                                <div class="input-group mb-3">
                                    <input type="file" name="file[]" class="form-control" id="filePreview">
                                    <button class="btn btn-primary" type="button" id="loadpreviewimg" onclick="loadfilePreview()">Upload</button>
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h6>Site's name</h6>
                                            <input type="text" name="sitename" class="form-control" id="sitename" placeholder="Your site's name" required>
                                        </div>
                                        <div class="col-md-12">
                                            <h6>Color theme</h6>
                                            <input type="color" name="sitecolor" class="form-control form-control-color" id="sitecolor" value="#ffffff" title="Choose your color" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-7" id="faviboxres">
                                <div class="rv<?=isset($_POST['favisresult']) ? ' d-none' : ''?>">
                                    <h5 class="mb-3">Preview</h5>
                                    <div id="favicon-preview">
                                        <div class="row gx-0">
                                            <div class="col-sm-6">
                                                <h6>Default theme</h6>
                                                <div class="favicon themelight mb-4">
                                                    <div class="d-flex justify-content-start flex-nowrap align-items-center flex-wrap">
                                                        <img src="/assets/img/chrome-left-light.png" alt="">
                                                        <div class="faicon"></div>
                                                        <span><?=LIFT_TITLE?></span>
                                                        <img src="/assets/img/chrome-right-light.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
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
                               
                                <div class="tv<?=isset($_POST['favisresult']) ? '' : ' d-none'?>">
                                    <h5 class="mb-3">Results</h5>
                                    <?php if(isset($downloadDone)) {?>
                                        <p><a href="download?filename=<?=md5($downloadDone)?>&f=<?=$downloadDone?>&dir=tmp" class="btn btn-sm btn-success">Download (.zip)</a></p>
                                    <?php } ?>
                                    <textarea class="form-control form-control-sm d-none" id="favisresult" name="favisresult" rows="1"><?=isset($_POST['favisresult']) ? $_POST['favisresult'] : ''?></textarea>
                                    <textarea class="form-control form-control-sm" id="favisresulte" rows="30"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>



                </main>
            </form>
        </div>
    </div>

    <?php require 'includes/footer.php';?>
        
    <?php
    if(isset($_POST['favisresult'])) {
        echo '<script>
        $("#favisresulte").val($("#favisresult").val());
        LIFT_APP.code = CodeMirror.fromTextArea(document.getElementById("favisresulte"), {
            mode: "text/html",
            lineNumbers: true,
            styleActiveLine: true,
            matchBrackets: true,
            smartIndent: true,
            indentWithTabs: true
        });
        LIFT_APP.code.setOption("theme", "default")</script>';
    }
    ?>

</body>

</html>