<?php 
/*// HEADER */
$title = "Dashboard";
$active='home'; 
/*// LAYOUT */
require_once 'includes/header.php';
?>

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

        <div class="row" id="home-menu">
          <div class="col-12 my-3">
              <ul>
                <li>
                  <a href="keywork_generator.php">
                    <i class="bi bi-type-h1 fa-3x fa-fw me-1"></i>
                    <span>Keywords generator</span>
                  </a>
                </li>
                <li>
                  <a href="post_generator.php">
                    <i class="bi bi-stickies fa-3x fa-fw me-1"></i>
                    <span>WordPress Post generator</span>
                  </a>
                </li>
                <li>
                  <a href="content_generator.php">
                    <i class="bi bi-bullseye fa-3x fa-fw me-1"></i>
                    <span>Content SEO Generator</span>
                  </a>
                </li>
                <li>
                  <a href="plugin_generator.php">
                    <i class="bi bi-cloud-download fa-3x fa-fw me-1"></i>
                    <span>Plugin Generator</span>
                  </a>
                </li>
              
                <li>
                  <a href="wp_plugins.php">
                    <i class="bi bi-archive fa-3x fa-fw me-1"></i>
                    <span>WordPress plugins</span>
                  </a>
                </li>
                <li>
                  <a href="chrome_extensions.php">
                    <i class="bi bi-box-seam fa-3x fa-fw me-1"></i>
                    <span>Chrome extensions</span>
                  </a>
                </li>
                <li>
                  <a href="html_validator.php">
                    <i class="bi bi-check2-all fa-3x fa-fw me-1"></i>
                    <span>HTML Code validator</span>
                  </a>
                </li>
              
                <li>
                  <a href="https://docs.myseo.website/" target="_blank">
                    <i class="bi bi-journal-bookmark fa-3x fa-fw me-1"></i>
                    <span>Guideline</span>
                  </a>
                </li>
                <li>
                  <a href="https://myseo.website/wp" target="_blank">
                    <i class="bi bi-braces fa-3x fa-fw me-1"></i>
                    <span>Testing site</span>
                  </a>
                </li>
              </ul>
              <h4>Control Panel</h4>
              <ul>
              <li>
                    <a href="profile.php">
                      <i class="bi bi-person fa-3x fa-fw me-1"></i>
                      <span>Profile</span>
                    </a>
                </li>  
              <li>
                    <a href="logout.php">
                      <i class="bi bi-box-arrow-right fa-3x fa-fw me-1"></i>
                      <span>Logout</span>
                    </a>
                </li>
              </ul>
          </div>
        </div>

      </main>
    </div>
  </div>


  <?php require 'includes/footer.php';?>

</body>

</html>