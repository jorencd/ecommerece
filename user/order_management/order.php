<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <!-- BOOTSTRAP ICON LINK -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../../assets/css/order.css">

  <title>Order Tracker</title>

  <style>
  </style>

</head>

<body>

<?php
  include '../../user/component/navbar.php';
  ?>

  <div class="profile-container container-fluid py-5 mt-5 text-dark" style="height: 200px;">
    <h5>Hi! Jorence</h5>
  </div>

  <!-- ORDER TRACKER BUTTONS -->
  <div class="container mt-3 pb-5 ">
    <h5 class="mb-3">Your Orders</h5>
    <div class="row text-center">
      <!-- TO PAY -->
      <div class="col p-0">
        <a class="text-dark" href="tracker.php?tab=to-pay">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-credit-card fs-1"></i><br>To Pay
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- TO SHIP -->
      <div class="col p-0">
        <a class="text-dark" href="tracker.php?tab=to-ship">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-box fs-1"></i><br>To Ship
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- SHIPPED -->
      <div class="col p-0">
        <a class="text-dark" href="tracker.php?tab=shipped">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-truck fs-1"></i><br>Shipped
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- DELIVERED -->
      <div class="col p-0">
        <a class="text-dark" href="delivered.php">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-check2-square fs-1"></i><br>Delivered
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
    </div>
  </div>
  <!-- CANCELED ORDERS AND RETURN REFUND ORDERS -->
  <div class="container mt-3 pb-5 border-2 border-bottom">
    <div class="row text-center">

      <!-- TO RATE -->
      <div class="col p-0">
        <a class="text-dark" href="tracker.php?tab=to-rate">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-star fs-1"></i><br>Review
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- CANCELLED  -->
      <div class="col p-0">
        <a class="text-dark" href="cancelled-order.php">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-bag-x fs-1"></i><br>Cancelled
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- REFEUND -->
      <div class="col p-0">
        <a class="text-dark" href="refunded-order.php">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-box-arrow-in-left fs-1"></i><br>Returned
            <span class="position-absolute top-0 start-100 translate-middle  ps- pe-3 badge rounded-pill bg-dark">
              1
              <span class="visually-hidden">unread messages</span>
          </button>
        </a>
      </div>
      <!-- HISTORY -->
      <div class="col p-0">
        <a class="text-dark text-center" href="history.php">
          <button type="button" class="tracker-btn btn btn-sm position-relative p-0 px-2">
            <i class="bi bi-clock-history fs-1"></i><br>View History
          </button>
        </a>
      </div>
    </div>
  </div> <!-- END CANCELLED -->


  <!-- YOU MAY ALSO LIKE CONTAINER -->


  <!-- PRODUCT CATALOG -->
  <?php
  include '../../user/order_management/recommendation.php';
  ?>

  <!-- FOOTER -->
  <div id="footer">
    <script src="../../assets/js/footer.js"></script>
  </div>

  <!-- BOOTSTRAP JS-->
  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>

  <!-- CUSTOM JS -->
  <script src="../../assets/js/order.js"></script>
</body>

</html>