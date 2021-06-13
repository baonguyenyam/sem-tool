<?php 
/*// HEADER */
$title = "Crawler";
$active='crawler'; 
/*// LAYOUT */
require_once 'includes/header.php';

?>

<body>


<?php require 'includes/nav.php'; ?>


    <div class="container-fluid">
        <div class="row">
        <?php require 'includes/sidebar.php'; ?>

            <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4 px-xxl-5 mt-xxl-4">
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="shadow p-4 p-xxl-5 mb-5 bg-body rounded border">

                                <h1 class="h2 mt-0 mb-3">Crawler User Agents <span id="countAgent" class="badge bg-success fs-6"></span></h1>

                                <div id="crawlerTable"></div>

                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    
    <?php require 'includes/footer.php';?>

    <script>
        $.ajax({
            url: '/assets/crawler-user-agents.json',
            dataType: 'json',
            async: false,
            success: function(json) {
                var crawlerTable = '<table class="table table-bordered table-striped table-hover"><thead class="table-dark"><tr><th>Name</th><th>Bot Name</th></tr></thead>'
                for (let index = 0; index < json.length; index++) {
                    crawlerTable += '<tr>'
                    crawlerTable += '<td>'+JSON.stringify(json[index]['pattern'].replace("\\/", "").replace("\\", ""))+'</td>'
                    let mu = json[index]['instances']
                    crawlerTable += '<td class="small"><ul>'
                    for (let y = 0; y < mu.length; y++) {
                        crawlerTable += '<li>'+JSON.stringify(mu[y])+'</li>'
                    }
                    crawlerTable += '</ul></td>'
                    crawlerTable += '</tr>'
                }
                crawlerTable += '</table>';
                $('#crawlerTable').html(crawlerTable)
                $('#countAgent').html(json.length+' crawlers')
            }
        });
    </script>

</body>

</html>