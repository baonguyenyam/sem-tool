<?php require 'functions/functions.php'; ?>
<?php $active='plugingen'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nguyen Pham">
    <title>LIFT SEM Tools</title>
    <?php require 'includes/header.php'; ?>
</head>

<?php
if(isset($_POST['submit'])) {

    if($_POST['name'] && $_POST['shortname'] && $_POST['slug']) {
       
     $num = '_'.getRandomKey(10);
     $attrs = array(
         'name' => $_POST['name'],
         'shortname' => $_POST['shortname'],
         'slug' => $_POST['slug'],
     );
       
     $src = dirname( __FILE__ )."/plugins/@wp-lift-custompost-src-to-generator";
     $dist = dirname( __FILE__ )."/tmp/wp-lift-custompost".$num;
     if(!is_dir($dist)){
         mkdir("tmp/wp-lift-custompost".$num);
     }
 
     copy_directory( $src, $dist );
     $it = new RecursiveDirectoryIterator($dist);
     foreach(new RecursiveIteratorIterator($it) as $file) {
         if ($file->getExtension() == 'php') {
             $lines = file( $file );
             for ( $i = 0; $i < count( $lines ); $i++ ) {
                 $lines[ $i ] = replaceGeneratorPlugins($lines[ $i ],$num,$attrs); 
                 file_put_contents( $file,$lines );
             }
         }
     }
    
    zipDataPlugins($dist, './tmp/wp-lift-custompost'.$num.'.zip',"wp-lift-custompost".$num);
    $downloadDone = 'wp-lift-custompost'.$num.'.zip';
 
    } else {
        $errorNoti = 'Something wrong!';
    } 

}
?>

<body>

    <?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Plugin Generator</h1>

                </div>


                <div class="row mb-3">
                    <div class="col-md-4 offset-md-4">
                        <?php if(isset($downloadDone)) {?>
                            <div class="alert alert-success my-3">
                                <p>Thank you!</p>
                                <p class="mb-0">
                                    <a href="/tmp/<?=$downloadDone?>" class="btn btn-primary">Download</a>
                                </p>
                            </div>
                        <?php } else { ?>
                        <form action="" class="shadow p-3 mb-5 bg-body rounded border" method="POST">
                            <?php if(isset($errorNoti)) {?>
                                <div class="alert alert-danger">
                                    <?=$errorNoti?>
                                </div>
                            <?php } ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="e.g: LIFT Member" required>
                                <div id="emailHelp" class="form-text">Don't add (s) after name</div>
                            </div>
                            <div class="mb-3">
                                <label for="shortname" class="form-label">Short Name</label>
                                <input type="text" class="form-control" id="shortname" name="shortname" placeholder="e.g: Member" required>
                                <div id="emailHelp" class="form-text">Don't add (s) after short name</div>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" pattern="[\w,./_=?-]+" placeholder="e.g: member" required>
                                <div id="emailHelp" class="form-text">Don't add space for slug</div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>