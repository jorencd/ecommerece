<?php
include ('../../database/dbconnect.php');

try {
    // Count total reviews
    $sql_total_reviews = "SELECT COUNT(*) AS total_reviews FROM reviews";
    $stmt_total_reviews = $pdo->query($sql_total_reviews);
    $total_reviews = $stmt_total_reviews->fetchColumn(); // Fetch the total count directly

    // Fetch the latest 5 reviews with associated data
    $query = "SELECT r.date_created,
                r.comment,
                u.user_firstname AS customer_name,
                p.name AS product_name,
                img.img_path AS product_image
        FROM reviews r
        INNER JOIN users u ON r.users_id = u.id
        INNER JOIN orders o ON r.orders_id = o.orders_id
        INNER JOIN orders_item oi ON o.orders_id = oi.orders_id
        INNER JOIN product p ON oi.product_id = p.product_id
        INNER JOIN LATERAL (
            SELECT img_path 
            FROM img
            WHERE product_id = p.product_id 
            ORDER BY img_id ASC 
            LIMIT 1 OFFSET 1 -- Get the 2nd image
        ) img ON TRUE
        ORDER BY r.date_created DESC
        LIMIT 5";

$stmt = $pdo->query($query);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/landingpage.css">

  <title>Interllux</title>
</head>

<body>
  <div id="navbar">
    <script src="../../assets/js/navbar.js"></script>
  </div>

  <!-- ######### LANDING PAGE SECTION ########-->
  <div class="container-fluid background-image">
    <div class="overlay"></div>
    <a href="../../user/product_catalog/product_catalog.php" class="z-2">
      <button type="button" class="shopnow btn btn-light btn-lg rounded-0 px-5 text-light">Shop Now</button>
    </a>

    <!-- Down Arrow Button with Link to Reviews Section -->
    <a href="#reviews-section" class="floating-arrow z-5">
      <button type="button" class="btn btn-light rounded-circle shadow">
        <i class="fa fa-angle-down"></i>
      </button>
    </a>

  </div>

  <!-- ######### REVIEWS SECTION ########-->
  <div class="container-fluid pt-5" id="reviews-section">
    <h3 class="text-center pt-1 fw-bold">Our Customers, Our Voice</h3>
    <p class="text-center">from <?php echo htmlspecialchars($total_reviews); ?> reviews</p>

    <!-- Horizontal Scrollable Cards -->
    <div class="scroll-container">
    <?php foreach ($reviews as $review): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($review['product_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($review['product_name']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title mt-2"><?= htmlspecialchars($review['customer_name']) ?></h5>
                            <p class="fw-bold"><?= htmlspecialchars($review['product_name']) ?></p>
                            <p class="card-text"><?= htmlspecialchars($review['comment']) ?></p>
                            <p class="card-text"><strong>Date: </strong> <?= htmlspecialchars($review['date_created']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
</div>

    <!-- READ MORE REVIEWS BUTTON -->
    <div class="text-center mt-3">
      <a href="../../user/order_management/review.php">
        <button class="btn btn-dark">Read More Reviews</button>
      </a>
    </div>
  </div>

  <!-- YOU MAY ALSO LIKE CONTAINER -->


  <div id="catalog">
    <script src="../../assets/js/recommendation.js"></script>
  </div>

  <div id="footer">
    <script src="../../assets/js/footer.js"></script>
  </div>

  <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>