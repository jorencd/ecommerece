<?php include '../partials/admin-header.php'; ?>
<?php include '../database/dbconnect.php'; ?>

<?php
try {
  // Fetch delivered orders data
  $query = "SELECT o.orders_id,
                    CONCAT(u.user_firstname, ' ', u.user_lastname) AS customer_name,
                    STRING_AGG(p.name, ', ') AS order_items,
                    o.total_amount,
                    o.delivered_date,
                    o.tracking_number,
                    o.completed_date
              FROM 
                  orders o
              JOIN 
                  users u ON o.users_id = u.id
              JOIN 
                  orders_item oi ON o.orders_id = oi.orders_id
              JOIN 
                  product p ON oi.product_id = p.product_id
              WHERE 
                  o.delivered_date IS NOT NULL
                  AND o.order_status = 'completed'
              GROUP BY 
                  o.orders_id, u.user_firstname, u.user_lastname, o.total_amount, o.delivered_date, o.tracking_number, o.completed_date
              ORDER BY 
                  o.delivered_date DESC";

  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $orders = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use `$orders` for clarity
} catch (PDOException $e) {
  echo "Failed to fetch data: " . $e->getMessage();
  exit;
}
?>



<main class="p-2 px-4">
  <section id="order-delivered">
    <div class="content p-4">
      <div class="row align-items-center">
        <div class="col-12 col-md-6">
          <h1 class="fw-bold mb-0">Delivered Order List</h1>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Select Date</button>

            <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Week</a></li>
              <li><a class="dropdown-item" href="#">Last Week</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">Last Month</a></li>
              <li><a class="dropdown-item" href="#">This Quarter</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row align-items-center mt-3">
        <div class="search-bar col-auto">
          <form action="" method="get" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Type your search here" value="" style="width: 280px;">
            <button type="submit" class="btn btn-dark"> <i class="fa-solid fa-magnifying-glass"> </i></button>
          </form>
        </div>
      </div>
    </div>

    <div class="content table-responsive p-4 pt-2">
      <table class="table table-hover fs-6">
        <thead>
          <tr>
            <th scope="col">ORDER NO.</th>
            <th scope="col">CUSTOMER</th>
            <th scope="col">ORDER ITEMS</th>
            <th scope="col">TOTAL AMOUNT</th>
            <th scope="col">DELIVERED DATE</th>
            <th scope="col">TRACKING NUMBER</th>
            <th scope="col">COMPLETED DATE</th>
          </tr>
        </thead>
        <tbody class="fw-light">
          <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
              <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#customer-modal">
                <td><?php echo htmlspecialchars($order['orders_id']); ?></td>
                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($order['order_items']); ?></td>
                <td>₱<?php echo number_format($order['total_amount'], 2); ?></td>
                <td><?php echo htmlspecialchars($order['delivered_date']); ?></td>
                <td><?php echo htmlspecialchars($order['tracking_number']); ?></td>
                <td><?php echo htmlspecialchars($order['completed_date']); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center">No orders found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <?php include '../partials/admin-footer.php'; ?>