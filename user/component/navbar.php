<?php
include '../../database/dbconnect.php';
session_start();

$first_name = "Guest"; // Default to 'Guest'

if (isset($_SESSION['id'])) {
  try {
    $stmt = $pdo->prepare("SELECT first_name FROM user_test WHERE id = :id");
    $stmt->execute(['id' => $_SESSION['id']]);
    $user = $stmt->fetch();

    if ($user && !empty($user['first_name'])) {
      $first_name = $user['first_name'];
    }
  } catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- BOOTSTRAP CSS-->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="../../assets/css/navbar.css">

  <!-- BOOTSTRAP ICON LINK -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
  <title>Interllux</title>
</head>

<body>
  <!--########### NAV BAR ############-->
  <nav class="navbar fixed-top bg-light shadow-sm">
    <div class="container-fluid d-flex position-relative">
      <div class="d-flex">
        <button class="navbar-toggler border-0 m-0 px-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideNav" aria-controls="sideNav">
          <span class="bi bi-filter-left fs-1 ms-1 ms-lg-0"></span>
        </button>
      </div>
      <a class="navbar-brand me-0 dm-serif-display letter-spacing-1 text-dark ms-lg-5 ps-lg-5" href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24" class="ms-4">
        Interllux
      </a>

      <div class="d-flex justify-content-center align-items-center me-md-3 position-relative">

        <!-- DESKTOP VIEW DROPDOWN-->
        <?php if ($first_name !== "Guest") : ?>
          <div class="dropdown d-lg-block">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo htmlspecialchars($first_name); ?>
            </button>
            <div class="w-100 position-relative">
              <ul class="dropdown-menu dropdown-menu-center mt-3" style="left: 50%; transform: translateX(-50%);">
                <li><a class="dropdown-item text-dark" href="../../user/order_management/account-details.php">My Account</a></li>
                <li><a class="dropdown-item text-dark" href="../../user/order_management/tracker.php">Orders</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-dark" href="../../user/user_auth/logout.php">Log Out</a></li>
              </ul>
            </div>
          </div>
        <?php else : ?>
          <a href="../../user/user_auth/loginpage.php" class="btn btn-dark">Login</a>
        <?php endif; ?>

        <!-- MOBILE VIEW DROPDOWN -->
        <div class="dropdown dropdown-mobile d-lg-none position-absolute mt-1  " style="right: 55px;">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person fs-4"></i>
          </button>
          <div class="w-100 position-relative">
            <ul class="dropdown-menu dropdown-menu-center mt-2" style="left: 50%; transform: translateX(-50%);">
              <li><a class="dropdown-item text-dark" href="../../user/order_management/account-details.php">My
                  Account</a></li>
              <li><a class="dropdown-item text-dark" href="../../user/order_management/tracker.php">Orders</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-dark" href="../../user/user_auth/logout.php">Log Out</a></li>
            </ul>
          </div>
        </div>

        <!-- END DROPDOWN -->

        <a href="../../user/order_management/add-to-cart.php" class="text-decoration-none me-3 ms-2 pt-0">
          <i class="bi bi-cart2 fs-5 text-dark"></i>
        </a>
        <a href="#" class="text-decoration-none mt-0" style="margin-top: 5px;" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
          <i class="bi bi-search fs-5 text-dark"></i>
        </a>
      </div>
    </div>

    <!-- Full-width Collapsible Search Bar -->
    <div class="collapse bg-body-light w-100 mt-1" id="searchCollapse">
      <div class="container-fluid p-2">
        <div class="input-group">
          <input type="text" class="form-control border-secondary border-start-0 border-top-0 border-end-0 rounded-0 shadow-none" placeholder="Search here" aria-label="Search">
          <button class="btn btn-close btn-sm shadow-none ms-2 mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-controls="searchCollapse" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Off-canvas Menu on the Left -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="sideNav" aria-labelledby="sideNavLabel">
    <div class="offcanvas-header d-flex justify-content-center align-items-center">
      <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
      <h4 class="offcanvas-title text-center flex-grow-1 dm-serif-display letter-spacing-1" id="sideNavLabel">
        Interllux
      </h4>
      <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body position-relative">
      <ul class="list-unstyled">
        <li><a href="../../user/user_auth/index.php" class="text-dark text-decoration-none letter-spacing-1">Home</a>
        </li>
        <li><a href="../../user/product_catalog/product_catalog.php" class="text-dark text-decoration-none letter-spacing-1">Products</a></li>
        <li><a href="../../user/order_management/review.php" class="text-dark text-decoration-none letter-spacing-1">Customer Reviews</a></li>
        <li><a href="../../user/order_management/order.php" class="text-dark text-decoration-none letter-spacing-1">My
            Orders</a></li>
        <li><a href="../../user/user_auth/contact-us.php" class="text-dark text-decoration-none letter-spacing-1">Contact Us</a></li>
        <li><a href="../../user/user_auth/about-us.php" class="text-dark text-decoration-none letter-spacing-1">About
            Us</a></li>
      </ul>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const logoutLinks = document.querySelectorAll('a[href*="logout.php"]');

      logoutLinks.forEach(link => {
        link.addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default action

          // Destroy the session via a fetch request
          fetch(this.href)
            .then(() => {
              // Update UI after session destruction
              const dropdownToggle = document.querySelector('.btn.dropdown-toggle');
              if (dropdownToggle) {
                dropdownToggle.textContent = 'Login';
                dropdownToggle.classList.remove('dropdown-toggle');
                dropdownToggle.setAttribute('href', '../../user/user_auth/login.php');
              }

              // Hide the dropdown (optional)
              const dropdownMenu = document.querySelector('.dropdown-menu');
              if (dropdownMenu) dropdownMenu.style.display = 'none';
            })
            .catch(err => console.error('Logout error:', err));
        });
      });
    });
  </script>

  <!-- BOOTSTRAP JS -->
  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>
  <script src="../../assets/js/navbar.js"></script>
</body>

</html>