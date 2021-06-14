<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Upload";
$active='upload'; 
/*// LAYOUT */
require_once 'includes/header.php';
/*// CHECK */
$getUserConfig = $auth->getMemberByID($_SESSION["member_id"]);
if ($isMemberTypye == 1) {
} else {
    $util->redirect("./");
}
?>

<body>
<?php
if(isset($_POST['submit'])!=""){
    $allowed_types = array('zip');
    $version=$_POST['version'];
    $stype=$_POST['type'];
    $name=$_FILES['file']['name'];
    $size=$_FILES['file']['size'];
    $type=$_FILES['file']['type'];
    $temp=$_FILES['file']['tmp_name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $nn = pathinfo($name, PATHINFO_FILENAME);
    $fname = $nn.'_v'.$version.'.'.$ext;
    if (in_array(strtolower($ext), $allowed_types)) {
        $move =  move_uploaded_file($temp,"uploads/".$fname);
        if($move){
            $auth->upload($name,$fname,$stype,$version);
                header("location: index.php");
        }
    }
}
?>

<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>


            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Upload</h1>
                    
                </div>


                <div class="row mt-5">
                <div class="col-xl-6 offset-xl-3">
                    <form enctype="multipart/form-data" action="" name="form" method="post" class="shadow p-5 mb-5 bg-body rounded border">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control" name="file" type="file" id="file" required>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Type</label>
                            <select class="form-select" name="type" aria-label="Default select example" required>
                                <option selected disabled value="">--Select one--</option>
                                <option value="1">Chrome extensions</option>
                                <option value="2">LIFT Core</option>
                                <option value="3">LIFT Addons for Visual Composer</option>
                                <option value="4">LIFT Blocks</option>
                                <option value="5">LIFT CleanUp</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Version</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">v</span>
                                <input type="text" class="form-control" placeholder="3.0.2" name="version" required>
                            </div>
                        </div>
                        <button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    
                </div>




            </main>
        </div>
    </div>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="keyworkds_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Keywords saved</strong>
                <small>1s ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your keywords list has been saved
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php';?>

</body>

</html>