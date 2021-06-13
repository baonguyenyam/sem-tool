<?php 
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

            <form action="" id="pingmyDomain" name="pingmyDomain" method="post">
                <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
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
                            <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">

                                
                            <?php if (!empty($_POST["pinglistaddress"])) {?>
                                <table id="loadingCheck" class="table table-bordered table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Ping to</th>
                                            <th scope="col" width="50">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pustpingList">
                                        
                                    </tbody>
                                </table>
                            <?php } else {?>

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

                </main>
            </form>
        </div>
    </div>


    <?php require 'includes/footer.php';?>

    <script>
    <?php if (!empty($_POST["pinglistaddress"])) {?>
        $.ajax({
            url: '/assets/ping.txt',
            dataType: 'text',
            async: false,
            success: function(json) {
                $('#pingList').html(json)

                lines = json.split("\n")

                var sendToServer = function(lines, index){
                if (index > lines.length) return; // guard condition
                item = lines[index];
                if (item.trim().length != 0){
                    $.ajax({
                    type: 'GET',
                    url: 'doping',
                    dataType: 'html',
                    data: 'data=' + item.replace(/___YOURDOMAIN___/gi, '<?=parse_url($_POST["url"])['host']?>')+'',
                    success: function(msg){
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
                else { sendToServer(lines, index+1); }
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
                }
            });
    <?php } ?>
    </script>

</body>

</html>