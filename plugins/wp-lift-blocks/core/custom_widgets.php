<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    .lift-displaypostadmin{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .lift-displaypostadmin > div{
        flex: 0 0 50%;
        font-size: 1.5rem;
        font-weight: 200;
    }
</style>
</head>
<body>
<?php
$count_posts = wp_count_posts( 'post' )->publish;
$count_pages = wp_count_posts( 'page' )->publish;
?>
<div class="lift-displaypostadmin">
    <div>Articles: <strong><?php echo number_format($count_posts);?></strong></div>
    <div>Page: <strong><?php echo number_format($count_pages);?></strong></div>
</div>
<div class="he"><hr>
<small>© <?=Date('Y')?> <a href="https://liftcreations.com/" target="_blank">LIFT Creations</a></small>
</div>


</body>
</html>