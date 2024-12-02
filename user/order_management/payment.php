<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Page</title>

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary fixed-top shadow-sm py-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../user/order_management/add-to-cart.php">
        <button class="btn btn-sm px-1">
          <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
        </button>
      </a>
      <a class="navbar-brand mx-auto dm-serif-display letter-spacing-1 text-dark" href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
        Interllux
      </a>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <div class="container mt-5 pt-5">
    <div class="row g-4">
      <!-- Checked-Out Products (Left Column) -->
      <div class="col-md-5">
        <h4 class="ms-2">Check-Out Products</h4>
        <div class="card">
          <div class="card-body">
            <!-- Product Item -->
            <div class="d-flex align-items-center mb-3">
              <img src="../../assets/image/Alma BB.png" alt="Product Image" class="rounded" width="70">
              <div class="ms-3">
                <p class="mb-1 fw-bold">Alma BB</p>
                <p class="mb-0 text-muted">Qty: 1</p>
                <p class="mb-0 text-muted">₱999.00</p>
              </div>
            </div>
            <!-- Product Item End -->

            <!-- Another Product Item -->
            <div class="d-flex align-items-center mb-3">
              <img src="../../assets/image/Classic Flap Bag.png" alt="Product Image" class="rounded" width="70">
              <div class="ms-3">
                <p class="mb-1 fw-bold">Another Product</p>
                <p class="mb-0 text-muted">Qty: 2</p>
                <p class="mb-0 text-muted">₱1,500.00</p>
              </div>
            </div>
            <!-- Product Item End -->

            <hr>
            <!-- Total -->
            <div class="d-flex justify-content-between">
              <strong>Total</strong>
              <strong>₱2,499.00</strong>
            </div>
          </div>
        </div>
      </div>

      <!-- Payment Form (Right Column) -->
      <div class="col-md-7">
        <h4>Payment</h4>
        <form>
          <!-- Delivery Information -->
          <div class="card mb-4">
            <div class="card-header bg-dark text-white">
              <h5 class="mb-0">Delivery Information</h5>
            </div>
            <div class="card-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstName" required>
                </div>
                <div class="col-md-6">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastName" required>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="example@example.com" required>
                </div>
                <div class="col-12">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                </div>
                <div class="col-md-6">
                  <label for="barangay" class="form-label">Barangay</label>
                  <input type="text" class="form-control" id="barangay" required>
                </div>
                <div class="col-md-6">
                  <label for="city" class="form-label">City</label>
                  <select id="city" class="form-select" required>
                    <option selected disabled>Select City...</option>
                    <option>City 1</option>
                    <option>City 2</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="province" class="form-label">Province</label>
                  <select id="province" class="form-select" required>
                    <option selected disabled>Select Province...</option>
                    <option>Province 1</option>
                    <option>Province 2</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="region" class="form-label">Region</label>
                  <select id="region" class="form-select" required>
                    <option selected disabled>Select Region...</option>
                    <option>Region 1</option>
                    <option>Region 2</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="country" class="form-label">Country</label>
                  <select id="country" class="form-select" required>
                    <option selected disabled>Select Country...</option>
                    <option>Philippines</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="zip" class="form-label">Zip Code</label>
                  <input type="text" class="form-control" id="zip" required>
                </div>
              </div>
            </div>
          </div>

          <!-- Payment Options -->
          <div class="card">
            <div class="card-header bg-dark text-white">
              <h5 class="mb-0">Payment</h5>
            </div>
            <div class="card-body">
              <p>All transactions are secure and encrypted.</p>
              <p>An Interllux agent will contact you shortly for payment instructions. For faster transactions, you can
                directly WhatsApp us: <strong>+63 961 619 5710</strong>.</p>

              <!-- Payment Methods -->
              <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="onlineBanking" required>
                <label class="form-check-label" for="onlineBanking">Online Banking</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="eWallet" required>
                <label class="form-check-label" for="eWallet">E-wallet</label>
              </div>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="mt-3">
            <a href="#">
              <button type="submit" class="btn btn-dark w-100">Place Order</button>
            </a>

          </div>
        </form>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>

  <!-- BOOTSTRAP JS -->
  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>