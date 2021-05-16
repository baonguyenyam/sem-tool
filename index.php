<?php require 'functions/functions.php'; ?>
<?php $active='home'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Nguyen Pham">
  <title>LIFT SEM Tools</title>
  <?php require 'includes/header.php';?>
</head>

<body>


<?php require 'includes/nav.php'; ?>


  <div class="container-fluid">
    <div class="row">
    <?php require 'includes/sidebar.php'; ?>

      <main class="col-md-9 ms-sm col-lg-10 col-xl px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row g-4 p-3 p-xl-5 row-cols-1 row-cols-lg-3">
          <div class="col d-flex align-items-start mb-4">

            <div>
              <h2>Keywords generator</h2>
              <p class="text-muted">The tool works by allowing you to input general words and phrases into the 5 boxes,
                and then quickly generate keyword lists that can include your basic phrases and your long-tail terms.
              </p>
              <a href="keywork_generator.php" class="btn btn-primary">
                Generate keyworks
              </a>
            </div>
          </div>
          <div class="col d-flex align-items-start mb-4">

            <div>
              <h2>Wordpress Post generator</h2>
              <p class="text-muted">The tool auto-generation posts from the keywords list you have.
              </p>
              <a href="post_generator.php" class="btn btn-primary">
                Generate Posts
              </a>
            </div>
          </div>
          <div class="col d-flex align-items-start mb-4">

            <div>
              <h2>HTML Code validator</h2>
              <p class="text-muted">Find missing or unbalanced HTML tags in your documents, stray characters, duplicate
                IDs, missing or invalid attributes and other recommendations.
              </p>
              <a href="html_validator.php" class="btn btn-primary">
                HTML Validator
              </a>
            </div>
          </div>
          <div class="col d-flex align-items-start mb-4">

            <div>
              <h2>Chrome extensions</h2>
              <p class="text-muted">This is a LIFT's Chrome extensions. All-in-one tool for SEO/SEM services.
              </p>
              <a href="chrome_extensions.php" class="btn btn-primary">
                Download
              </a>
            </div>
          </div>

        </div>


      </main>
    </div>
  </div>


  <?php require 'includes/footer.php';?>

</body>

</html>