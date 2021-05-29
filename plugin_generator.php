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
      
   $mydir = dirname( __FILE__ )."/tmp/wp-lift-custompost";
   if(!is_dir($mydir)){
    mkdir("tmp/wp-lift-custompost");
   }
   // Move all images files
   $files = glob("plugins/wp-lift-custompost/*.*");
   foreach($files as $file){
   $file_to_go = str_replace("plugins/wp-lift-custompost","tmp/wp-lift-custompost",$file);
         copy($file, $file_to_go);
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
                        <form action="" class="shadow p-3 mb-5 bg-body rounded border" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="shortname" class="form-label">Short Name</label>
                                <input type="text" class="form-control" id="shortname" name="shortname">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <?php require 'includes/footer.php'; ?>

</body>

</html>