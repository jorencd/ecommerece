<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Order Details - Delivered</title>

  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #ffffff;
    }

    .card-header {
      font-weight: bold;
    }

    .price-info p {
      color: #28a745;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-light bg-white fixed-top shadow-sm py-2">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="delivered.php">
        <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold"></i>
      </a>
      <a class="navbar-brand mx-auto text-center" href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
        <span class="fw-bold">Interllux</span>
      </a>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <div class="container-fluid mt-5 pt-4">
    <!-- SHIPPING DETAILS -->
    <div class="card mb-3 mt-3">
      <div class="card-header bg-dark text-light">Shipping Details</div>
      <div class="card-body">
        <p><strong>Recipient: </strong>John Lester Montejo</p>
        <p><strong>Contact: </strong>(+63)9123456789</p>
        <p><strong>Address: </strong>Commonwealth Avenue, Batasan Hills, Quezon City, Metro Manila, 1126, Philippines</p>
      </div>
    </div>

    <!-- PRODUCT DETAILS -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-light">Product Details</div>
      <div class="card-body" id="product-details">
        <p>No product details found.</p>
      </div>
    </div>

    <!-- ORDER SUMMARY -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-light">Order Summary</div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p><strong>Subtotal: </strong></p>
          <p id="subtotal">Php.0.00</p>
        </div>
        <div class="d-flex justify-content-between">
          <p><strong>Shipping Fee: </strong></p>
          <p>Php.55.00</p>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <p><strong>Total: </strong></p>
          <p id="total">Php.0.00</p>
        </div>
      </div>
    </div>

    <!-- ORDER INFORMATION -->
    <div class="card mb-3">
      <div class="card-header bg-dark text-light">Order Information</div>
      <div class="card-body">
        <p><strong>Order Number: </strong>#ORD002</p>
        <p><strong>Order Date: </strong>2024-09-16</p>
        <p><strong>Payment Method: </strong>E-wallet</p>
        <p><strong>Shipment Date: </strong>2024-09-17</p>
        <p><strong>Email: </strong>johnlester@example.com</p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const shipDetails = JSON.parse(localStorage.getItem('shipDetails'));

      if (shipDetails) {
        const shipDetailsContainer = document.getElementById('product-details');
        shipDetailsContainer.innerHTML = `
          <div class="d-flex align-items-center mb-3">
            <img src="${shipDetails.image}" alt="${shipDetails.name}" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
            <div>
              <h5 class="mb-0">${shipDetails.name}</h5>
              <p class="mb-1"><strong>Color:</strong> ${shipDetails.color}</p>
              <p><strong>Quantity:</strong> ${shipDetails.quantity}</p>
            </div>
          </div>
          <div class="text-end">
            <p class="fw-bold text-success">Status: ${shipDetails.status}</p>
            <p class="fw-bold">Php.${shipDetails.price}</p>
          </div>`;

        const price = parseFloat(shipDetails.price.replace('Php.', '').replace(',', ''));
        const subtotal = price * shipDetails.quantity;
        const shippingFee = 55.00;
        const total = subtotal + shippingFee;

        document.getElementById('subtotal').textContent = `Php.${subtotal.toFixed(2)}`;
        document.getElementById('total').textContent = `Php.${total.toFixed(2)}`;
      }
    });
  </script>

</body>

</html>
