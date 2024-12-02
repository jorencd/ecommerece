<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Order Cancelled</title>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary fixed-top shadow-sm py-0">
    <div class="container-fluid">
      <!-- Left Arrow Icon -->
      <a class="navbar-brand" href="cancelled-order.php">
        <button class="btn btn-sm px-1">
          <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
        </button>
      </a>

      <!-- Navbar Brand Name Centered -->
      <a class="navbar-brand mx-auto dm-serif-display letter-spacing-1 text-dark"
        href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
        Interllux
      </a>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <div class="container-fluid mt-5 pt-4">
    <!-- STATUS -->
    <div class="card mb-3">
      <div class="card-header bg-danger text-light">
        Cancelled
      </div>
      <div class="card-body">
        <p class="text-danger fw-bold">Your order has been cancelled.</p>
      </div>
    </div>

    <!-- SHIPPING DETAILS -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-light">
        Shipping Details
      </div>
      <div class="card-body">
        <div class="card-text mb-2"><strong>Recipient: </strong>John Lester Montejo</div>
        <div class="card-text mb-2"><strong>Contact: </strong>(+63)9123456789</div>
        <div class="card-text mb-2"><strong>Address: </strong>Commonwealth Avenue, Batasan Hills, Quezon City,
          Metro Manila, 1126, Philippines</div>
      </div>
    </div>

    <!-- ORDER INFORMATION -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-light">
        Order Information
      </div>
      <div class="card-body">
        <p><strong>Order Number: </strong>#ORD002</p>
        <p><strong>Order Date: </strong>2024-09-16</p>
        <p><strong>Payment Method: </strong>E-wallet</p>
        <p><strong>Email: </strong>johnlester@example.com</p>
      </div>
    </div>

    <!-- CANCELLED NOTE -->
    <div class="alert alert-warning text-center mt-4">
      <i class="bi bi-exclamation-triangle-fill"></i> If you have any questions, please contact our support team.
    </div>
  </div>

</body>

<script src="../../assets/js/tracker.js"></script>

</html>
