<?php 
require_once 'includes/variables.php';
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

          <div class="mt-xxl-5 mx-xxl-5">

            <?php if ($isMemberTypye != 3) { ?>
                <?php include 'dashboard/dashboard_lift.php'; ?>
            <?php } else { ?>
                <?php include 'dashboard/dashboard_customers.php'; ?>
            <?php } ?>

            <h4>Control Panel</h4>
            <ul>
            <li>
                <a href="profile">
                  <i class="bi bi-person fa-3x fa-fw me-1"></i>
                  <span>My Account</span>
                </a>
            </li>  
            <li>
                <a href="changepass">
                  <i class="bi bi-shield-check fa-3x fa-fw me-1"></i>
                  <span>Change password</span>
                </a>
            </li>  
            <li>
                  <a href="logout">
                    <i class="bi bi-box-arrow-right fa-3x fa-fw me-1"></i>
                    <span>Logout</span>
                  </a>
              </li>
            </ul>



          </div>


              
          </div>
        </div>

      </main>
    </div>
  </div>


  <?php require 'includes/footer.php';?>

</body>

</html>