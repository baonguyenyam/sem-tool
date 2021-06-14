<?php 
require_once 'includes/variables.php';
/*// HEADER */
$title = "Ping to search engines";
$active='ping'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

<body>

<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
                <form action="" id="pingmyDomain" name="pingmyDomain" method="post">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                        <div class="pe-md-4">
                            <h1 class="h2">Ping to search engines</h1>
                            <p>Pinging is an act to inform search engines and directories that your website has new content. The process is simple; just enter a URL of your site in ping website tool free, press “Ping Now” button and the site will be pinged on the net. Once you ping your website, search engines are ready to do several things.</p>
                        </div>
                        <div class="btn-toolbar align-items-center flex-nowrap text-nowrap mb-2 mb-md-0">
                            <div class="btn-group">
                                <input type="submit" class="btn btn-sm btn-primary" name="pinglistaddress" value="Ping Now">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border mt-xxl-5 mx-xxl-5">

                                
                            <?php if (!empty($_POST["pinglistaddress"])) {?>

                                <div class="d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap pb-2">
                                    <h5 class="mb-3"><span id="pingCount"></span> address</h5>
                                    <div class="ifLoading">
                                        <i class="fas fa-spinner fa-lg1 fa-pulse"></i>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="loadingCheck" class="table table-bordered table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col" width="10">No.</th>
                                                <th scope="col">Ping to</th>
                                                <th scope="col" width="50">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pustpingList">
                                            
                                        </tbody>
                                    </table>
                            </div>
                            <?php } else {?>

                                <h5 class="mb-3"><span id="pingCount"></span> address</h5>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?=isset($_GET['url'])?$_GET['url']:''?>" class="form-control" placeholder="Enter URL" aria-label="Enter your domain" aria-describedby="pingHTML" id="pingHTML_URL" name="url" required>
                                </div>
                                
                                <div class="input-group mb-3 mb-lg-0 d-none">

                                    <textarea class="form-control form-control-sm" name="pingList" id="pingList" rows="12"></textarea>
                                </div>
                            <?php } ?>

                            </div>
                        </div>
                    </div>

                </form>
            </main>
        </div>
    </div>


    <?php require 'includes/footer.php';?>

    <script>
    <?php if (!empty($_POST["pinglistaddress"])) {
        $doamin = isset(parse_url($_POST["url"])['host']) ? parse_url($_POST["url"])['host'] : $_POST["url"];
        ?>
        $.ajax({
            url: '/assets/ping.txt',
            dataType: 'text',
            async: false,
            success: function(json) {
                $('#pingList').html(json)
                
                var lines = json.split("\n")
                
                $('#pingCount').html(addCommas(lines.length.toFixed(0)))
                var sendToServer = function(lines, index){
                if (index > lines.length) return; // guard condition
                item = lines[index];
                if (item.trim().length != 0){
                    if(index < 1) {
                        $('#pustpingList').prepend('<tr class="onloadtb"><td colspan="3">Loading...</td></tr>');
                    }
                    $.ajax({
                    type: 'GET',
                    url: 'doping',
                    dataType: 'html',
                    data: 'data=' + item.replace(/___YOURDOMAIN___/gi, '<?=$doamin?>')+'&number='+(index+1),
                    success: function(msg){
                        if(index == 0) {
                            $('#pustpingList .onloadtb').remove();
                        }
                        $('#pustpingList').prepend(msg);
                        setTimeout(
                        function () { 
                            sendToServer(lines, index+1); 
                        }, 
                        5000 
                        );             
                    }
                    });
                }
                else { 
                    sendToServer(lines, index+1); 
                }
                };
                sendToServer(lines, 0);
            }
        });
        <?php } else { ?>
            $.ajax({
                url: '/assets/ping.txt',
                dataType: 'text',
                async: false,
                success: function(json) {
                    $('#pingList').html(json)
                    var lines = json.split("\n")
                    $('#pingCount').html(addCommas(lines.length.toFixed(0)))
                }
            });
    <?php } ?>
    </script>

</body>

</html>