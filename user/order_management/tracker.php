<?php
include '../../database/dbconnect.php';

// Initialize counts
$toPayCount = 0;
$toShipCount = 0;
$shippedCount = 0;
$toRateCount = 0;

try {
  // Query for "To Pay" orders (pending status)
  $sql = "
        SELECT COUNT(*) AS count 
        FROM orders o
        WHERE o.order_status = 'pending' AND o.users_id = 11";
  $stmt = $pdo->query($sql);
  $toPayCount = $stmt->fetchColumn();

  // Query for "To Ship" orders (completed status)
  $sql = "
        SELECT COUNT(*) AS count 
        FROM orders o
        WHERE o.order_status = 'completed' AND o.users_id = 11";
  $stmt = $pdo->query($sql);
  $toShipCount = $stmt->fetchColumn();

  // Query for "Shipped" orders
  $sql = "
        SELECT COUNT(*) AS count 
        FROM orders o
        WHERE o.order_status = 'shipped' AND o.users_id = 12";
  $stmt = $pdo->query($sql);
  $shippedCount = $stmt->fetchColumn();

  // Query for "To Rate" orders (delivered status)
  $sql = "
        SELECT COUNT(*) AS count 
        FROM orders o
        WHERE o.order_status = 'delivered' AND o.users_id = 11";
  $stmt = $pdo->query($sql);
  $toRateCount = $stmt->fetchColumn();
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">

  <link rel="stylesheet" href="../../assets/css/cart/style.css">

  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- FONT AWESOME CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title>Track Your Orders</title>

  <style>
    .nav-item.active::after {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: -2px;
      height: 2px;
      background-color: black;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    .product-name {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    @media (max-width: 768px) {
      .product-name {
        display: inline-block;
        max-width: calc(1ch * 13);
        overflow: hidden;
        text-overflow: ellipsis;
      }
    }
  </style>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar bg-body-tertiary fixed-top shadow-sm py-0">
    <div class="container-fluid">
      <!-- Left Arrow Icon -->
      <a class="navbar-brand" href="order.php">
        <button class="btn btn-sm px-1">
          <i class="bi bi-arrow-left-short text-dark fs-1 fw-bold" style="font-size: 1.5rem;"></i>
        </button>
      </a>

      <!-- Navbar Brand Name Centered -->
      <a class="navbar-brand  mx-auto dm-serif-display letter-spacing-1 text-dark" href="../../user/user_auth/index.php">
        <img src="../../assets/image/logo.png" alt="Interllux Logo" width="30" height="24">
        Interllux
      </a>
      <p class="navbar-brand">
        <i class="bi bi-arrow-left-short text-light" style="font-size: 1.5rem;"></i>
      </p>
    </div>
  </nav>
  <!-- END NAVBAR -->
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

  <!-- Off-canvas Cart on the Right -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="cartPanel" aria-labelledby="cartPanelLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="cartPanelLabel">Cart</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
      <!-- Cart Item Example -->
      <div class="cart-item">
        <img src="../../assets/image/Balenciaga City Bag.png" alt="Product Image" width="70">
        <div class="item-details">
          <p class="item-name">Birkin 30 Graphite Matte Alligator in Gold Hardware Stamp X</p>
          <p class="item-price">₱2,900,000.00</p>
          <div class="item-quantity">
            <button class="qty-btn">-</button>
            <span>1</span>
            <button class="qty-btn">+</button>
          </div>
          <a href="#" class="remove-item text-black">Remove</a>
        </div>
      </div>
      <button id="checkout-button"><a href="../../user/checkout_payment/payment.php" class="checkout">Checkout • <p class="text-center fw-normal m-0" id="total">₱2,900,000.00</p></a></button>
    </div>
  </div>
  <!-- END NAVBAR -->

  <div class="container mt-md-5 mt-4 pt-5">
    <div class="row border pt-3">
      <div class="col">
        <button type="button" class="nav-item btn position-relative p-1 border-0" data-target="to-pay">
          To Pay
          <?php if ($toPayCount > 0) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
              <?php echo $toPayCount; ?>
              <span class="visually-hidden">unread messages</span>
            </span>
          <?php endif; ?>
        </button>
      </div>

      <div class="col">
        <button type="button" class="nav-item btn position-relative p-1 border-0" data-target="to-ship">
          To Ship
          <?php if ($toShipCount > 0) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
              <?php echo $toShipCount; ?>
              <span class="visually-hidden">unread messages</span>
            </span>
          <?php endif; ?>
        </button>
      </div>
      <div class="col">
        <button type="button" class="nav-item btn position-relative p-1 border-0" data-target="shipped">
          Shipped
          <?php if ($shippedCount > 0) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
              <?php echo $shippedCount; ?>
              <span class="visually-hidden">unread messages</span>
            </span>
          <?php endif; ?>
        </button>
      </div>

      <div class="col">
        <button type="button" class="nav-item btn position-relative p-1 border-0" data-target="to-rate">
          To Review
          <?php if ($toRateCount > 0) : ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
              <?php echo $toRateCount; ?>
              <span class="visually-hidden">unread messages</span>
            </span>
          <?php endif; ?>
        </button>
      </div>
    </div>
  </div>


  <!-- TO PAY CONTAINER -->
  <?php
  include '../../database/dbconnect.php';

  try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        SELECT 
            p.name AS product_name,
            p.color,
            oi.quantity,
            oi.unit_price,
            o.order_status
        FROM orders o
        JOIN orders_item oi ON o.orders_id = oi.orders_id
        JOIN product p ON oi.product_id = p.product_id
        WHERE o.order_status = 'pending' AND o.users_id = 11"; // Removed LIMIT 1 to fetch all pending orders

    $stmt = $pdo->query($sql);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Render all orders under 'To Pay' without checking for emptiness
    foreach ($orders as $order) {
      echo '<div id="to-pay" class="tab-content container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card d-flex flex-row p-2">
                                <img src="../../assets/image/' . $order['product_name'] . '.png" class="img-fluid" alt="' . $order['product_name'] . '"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="card-body text-start p-0 ps-2 mt-2">
                                    <p class="product-name fw-bold mb-0">' . $order['product_name'] . '.</p>
                                    <p class="mb-3">Color: ' . $order['color'] . '</p>
                                    <a href="details-to-pay.php" onclick="saveToPayDetails()">
                                        <button type="button" class="view-order-btn btn btn-sm p-1"><u class="fw-bold">View Order</u></button>
                                    </a>
                                </div>
                                <div class="card-body p-0 pe-2 text-end price-info">
                                    <p class="m-0 fw-bold">' . $order['order_status'] . '</p>
                                    <p class="m-0 mt-4">Quantity: ×' . $order['quantity'] . '</p>
                                    <p class="m-0 mt-1 fw-bold">Php.' . number_format($order['unit_price'], 2) . '</p>
                                    <a href="../../user/user_auth/contact-us.php#cancel-policy">
                                        <button type="button" class="btn btn-sm btn-dark mt-2">Contact Us</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>

  <!-- to ship -->
  <?php
  include '../../database/dbconnect.php';

  try {
    // Modify query to fetch orders that are "completed"
    $sql = "
        SELECT 
            p.name AS product_name,
            p.color,
            oi.quantity,
            oi.unit_price,
            o.order_status
        FROM orders o
        JOIN orders_item oi ON o.orders_id = oi.orders_id
        JOIN product p ON oi.product_id = p.product_id
        WHERE o.order_status = 'completed' AND o.users_id = 11"; // Removed LIMIT 1 to fetch all relevant completed orders

    $stmt = $pdo->query($sql);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any completed orders
    if (empty($orders)) {
      echo '<div class="container mt-3">Empty</div>';
    } else {
      foreach ($orders as $order) {
        echo '<div id="to-ship" class="tab-content container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card d-flex flex-row p-2">
                                <img src="../../assets/image/' . $order['product_name'] . '.png" class="img-fluid" alt="' . $order['product_name'] . '"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="card-body text-start p-0 ps-2 mt-2">
                                    <p class="product-name fw-bold mb-0">' . $order['product_name'] . '</p>
                                    <p class="mb-3">Color: ' . $order['color'] . '</p>
                                    <a href="details-to-ship.php" onclick="saveToShipDetails()">
                                        <button type="button" class="view-order-btn btn btn-sm p-1"><u class="fw-bold">View Order</u></button>
                                    </a>
                                </div>
                                <div class="card-body p-0 pe-2 text-end price-info">
                                    <p class="m-0 fw-bold">' . $order['order_status'] . '</p>
                                    <p class="m-0 mt-5 fw-bold">Php.' . number_format($order['unit_price'], 2) . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
      }
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>

  <!-- to Receive -->

  <?php
  include '../../database/dbconnect.php';

  try {
    // Modify query to fetch orders that are "Shipped"
    $sql = "
        SELECT 
            p.name AS product_name,
            p.color,
            oi.quantity,
            oi.unit_price,
            o.order_status
        FROM orders o
        JOIN orders_item oi ON o.orders_id = oi.orders_id
        JOIN product p ON oi.product_id = p.product_id
        WHERE o.order_status = 'shipped' AND o.users_id = 12"; // Removed LIMIT 1 to fetch all relevant shipped orders

    $stmt = $pdo->query($sql);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any shipped orders
    if (empty($orders)) {
    } else {
      foreach ($orders as $order) {
        echo '<div id="shipped" class="tab-content container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card d-flex flex-row p-2">
                                <img src="../../assets/image/' . $order['product_name'] . '.png" class="img-fluid" alt="' . $order['product_name'] . '"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="card-body text-start p-0 ps-2 mt-2">
                                    <p class="product-name fw-bold mb-0">' . $order['product_name'] . '</p>
                                    <p class="mb-3">Color: ' . $order['color'] . '</p>
                                    <a href="details-shipped.php" onclick="saveShippedDetails()">
                                        <button type="button" class="view-order-btn btn btn-sm p-1" data-id="' . $order['product_name'] . '" data-category="Shipped"><u class="fw-bold">View Order</u></button>
                                    </a>
                                </div>
                                <div class="card-body p-0 pe-2 text-end price-info">
                                    <p class="m-0 fw-bold">In transit</p>
                                    <p class="m-0 mt-5 fw-bold">Php.' . number_format($order['unit_price'], 2) . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
      }
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>

  <!-- to rate -->
  <?php
  include '../../database/dbconnect.php';
  try {
    // Modify query to fetch orders that are "delivered"
    $sql = "
        SELECT 
            p.name AS product_name,
            p.color,
            oi.quantity,
            oi.unit_price,
            o.order_status
        FROM orders o
        JOIN orders_item oi ON o.orders_id = oi.orders_id
        JOIN product p ON oi.product_id = p.product_id
        WHERE o.order_status = 'delivered' AND o.users_id = 11"; // Removed LIMIT 1 to fetch all relevant delivered orders

    $stmt = $pdo->query($sql);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any delivered orders to rate
    if (empty($orders)) {
    } else {
      foreach ($orders as $order) {
        echo '<div id="to-rate" class="container tab-content mt-3">
                    <div class="col-12">
                        <div class="card d-flex flex-row p-2">
                            <img src="../../assets/image/' . $order['product_name'] . '.png" class="img-fluid" alt="' . $order['product_name'] . '" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="card-body text-start p-0 ps-2 mt-2">
                                <p class="fw-bold product-name mb-0">' . $order['product_name'] . '</p>
                                <p class="m-0">Color: ' . $order['color'] . '</p>
                                <a href="details-to-rate.php" onclick="saveReviewDetails()">
                                    <button type="button" class="view-order-btn btn btn-sm mt-1"><u class="fw-bold">View Order</u></button>
                                </a>
                            </div>
                            <div class="card-body p-0 pe-2 text-end mt-2">
                                <p class="fw-bold m-0 me-2">Price: Php.' . number_format($order['unit_price'], 2) . '</p>
                                <button type="button" class="btn btn-dark mt-4 write-review-btn" style="font-size: 12px;" data-product=\'{"name": "' . $order['product_name'] . '", "color": "' . $order['color'] . '", "price": "' . $order['unit_price'] . '", "image": "../../assets/image/' . $order['product_name'] . '.png"}\'>
                                    Write a Review
                                </button>
                            </div>
                        </div>
                    </div>
                </div>';
      }
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>



  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>

  <script src="../../assets/js/tracker.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Get URL parameters
      const urlParams = new URLSearchParams(window.location.search);
      const tab = urlParams.get("tab"); // Read the "tab" parameter

      // Function to activate tab based on its ID
      function activateTab(tabId) {
        // Remove active class from all buttons and tab contents
        document.querySelectorAll(".nav-item").forEach(button => button.classList.remove("active"));
        document.querySelectorAll(".tab-content").forEach(content => content.classList.remove("active"));

        // Add active class to the selected button and tab content
        const selectedButton = document.querySelector(`.nav-item[data-target="${tabId}"]`);
        const selectedTabContent = document.getElementById(tabId);

        if (selectedButton) selectedButton.classList.add("active");
        if (selectedTabContent) selectedTabContent.classList.add("active");
      }

      // Display the selected tab based on the query parameter, if any
      if (tab) {
        activateTab(tab);
      }

      // Add click event listener to all nav items
      document.querySelectorAll(".nav-item").forEach(button => {
        button.addEventListener("click", function() {
          const targetTab = this.getAttribute("data-target");
          activateTab(targetTab);
        });
      });

      // Inject the PHP variables into JavaScript
      const toPayCount = <?php echo $toPayCount; ?>;
      const toShipCount = <?php echo $toShipCount; ?>;
      const shippedCount = <?php echo $shippedCount; ?>;
      const toRateCount = <?php echo $toRateCount; ?>;

      // Update the text content of the relevant elements
      document.querySelector('#to-pay-count').textContent = toPayCount;
      document.querySelector('#to-ship-count').textContent = toShipCount;
      document.querySelector('#shipped-count').textContent = shippedCount;
      document.querySelector('#to-rate-count').textContent = toRateCount;
    });
  </script>


</body>

</html>