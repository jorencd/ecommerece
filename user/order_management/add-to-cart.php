<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cart Page</title>

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CUSTOM CSS-->
  <link rel="stylesheet" href="../../assets/css/add-to-cart.css">

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary fixed-top shadow-sm py-0">
    <div class="container-fluid">
      <!-- BACK ICON -->
      <a class="navbar-brand" href="../../user/user_auth/index.php">
        <button class="btn btn-sm px-1">
          <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
        </button>
      </a>
      <!-- LOGO/NAME -->
      <a class="navbar-brand  mx-auto dm-serif-display letter-spacing-1 text-dark" href="#">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
        Interllux
      </a>
      <p class="navbar-brand">
        <i class="bi bi-arrow-left-short text-light" style="font-size: 1.5rem;"></i>
      </p>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <div class="container mt-5 pb-5">
    <h2 class="mb-4 mt-5 pt-5">Shopping Cart</h2>
    <div class="row g-2">
      <!-- CART ITEMS -->
      <div class="col-md-8">
        <!-- ITEM 1 -->
        <div class="cart-item border rounded px-2 container d-flex align-items-center">
          <input class="form-check-input me-2 mb-3 mb-sm-0 p-1 shadow-none border-secondary" type="checkbox">
          <img src="../../assets/image/Alma BB.png" alt="Product Image" class="m-0 rounded" width="70">
          <div class="flex-grow-1 text-center text-sm-start">
            <p class="mb-1 fw-bold">Alma BB</p>
            <p class="mb-0 fs-6 text-muted">Description of the product</p>
          </div>

          <div class=" d-flex flex-column align-items-start justify-content-end">
            <div class="input-group input-group-sm me-0 me-sm-3 mb-3 mb-sm-0" style="width: 90px;">
              <button class="btn btn-outline-dark btn-sm decrease-btn">-</button>
              <input type="" class="form-control ps-3 quantity-input" value="1" min="1">
              <button class="btn btn-outline-dark btn-sm increase-btn">+</button>
            </div>
            <div class="mt-md-2 mt-sm-0">
              <span class="product-price ms-3" data-price="999"></span>
            </div>
          </div>
        </div>
        <!-- END ITEM 1 -->
      </div>

      <!-- Cart Summary -->
      <div class="col-md-4 border p-3 rounded">
        <div class="cart-total">
          <h5>Order Summary</h5>
          <div class="d-flex justify-content-between">
            <span>Subtotal</span>
            <span id="subtotal">$50.00</span>
          </div>
          <div class="d-flex justify-content-between">
            <span>Shipping Fee</span>
            <span>₱5.00</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
            <strong>Total</strong>
            <strong id="total">$55.00</strong>
          </div>
          <a href="../../user/order_management/payment.php">
            <button class="btn btn-dark w-100 mt-3">Proceed to Checkout</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="footer">
    <script src="../../assets/js/footer.js"></script>
  </div>

  <script src="../../assets/Bootstrap/css/bootstrap.bundle.js"></script>

  <script src="../../assets/js/add-to-cart.js"></script>
</body>

</html>