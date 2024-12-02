<?php
include '../../database/dbconnect.php';  // Ensure correct path to DB connection

if (isset($_GET['search'])) {
    $searchQuery = trim($_GET['search']); // Get the search query from the user

    // Query to search for products by name or brand
    $sql = "SELECT p.product_id, p.name, p.brand, p.price, i.img
            FROM products p
            LEFT JOIN img i ON p.product_id = i.img_id
            WHERE p.name ILIKE :search OR p.brand ILIKE :search"; // Use prepared statements with PDO

    try {
        $stmt = $PDO->prepare($sql);
        $stmt->bindValue(':search', '%' . $searchQuery . '%', PDO::PARAM_STR); // Prevent SQL injection
        $stmt->execute();

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }

} else {
    header("Location: /user/user_auth/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/product_catalog.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <title>Interllux</title>
    <style>
        .product-card {
            transition: opacity 3s ease, max-height 3s ease;
            overflow: hidden;
            opacity: 1;
            max-height: 500px;
        }

        .product-card.hidden {
            opacity: 0;
            max-height: 0;
            pointer-events: none;
        }

        .product-card:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="navbar">
        <script src="../../assets/js/navbar.js"></script>
    </div>
    <div class="container-fluid">
        <!-- Sorting -->
        <div class="row position-fixed bg-light p-0 pt-3 z-3 w-100">
            <div class="col-12 d-flex justify-content-center gap-2">
                <select id="sortOptions" class="form-select w-auto rounded-0 shadow-none border-black" aria-label="Sort By">
                    <option value="default" selected>Sort By</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                </select>
            </div>
            <h5>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h5>
        </div>

        <?php if (!empty($products)): ?>
        <div class="row g-3 mt-5 pt-5" id="productGrid">
            <?php foreach ($products as $product): ?>
                <div class="col-6 col-md-3 product-card" data-product-id="<?= htmlspecialchars($product['product_id']) ?>">
                    <a href="product_details.php?id=<?= htmlspecialchars($product['product_id']) ?>" class="card-link nav-link">
                        <div class="card mb-3 rounded-0">
                            <img src="/Interllux/<?= htmlspecialchars($product['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 14px;"><?= htmlspecialchars($product['name']) ?></h5>
                                <p class="fw-semibold m-1">₱<?= number_format($product['price'], 2) ?></p>
                                <button class="btn btn-dark btn-add mt-3">Add to Cart</button>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>

    <div id="footer">
        <script src="../../assets/js/footer.js"></script>
    </div>

    <script src="../../assets/Bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productCards = Array.from(document.querySelectorAll(".product-card"));
            const sortOptions = document.getElementById("sortOptions");

            // Sorting Functionality
            sortOptions.addEventListener("change", function () {
                let sortedCards;

                switch (sortOptions.value) {
                    case "price-asc":
                        sortedCards = productCards.sort((a, b) => getPrice(a) - getPrice(b));
                        break;
                    case "price-desc":
                        sortedCards = productCards.sort((a, b) => getPrice(b) - getPrice(a));
                        break;
                    default:
                        sortedCards = productCards;
                }

                const productGrid = document.getElementById("productGrid");
                productGrid.innerHTML = "";
                sortedCards.forEach(card => productGrid.appendChild(card));
            });

            // Helper function to get price from a card
            function getPrice(card) {
                const priceText = card.querySelector(".fw-semibold").innerText.replace(/[₱,]/g, "");
                return parseFloat(priceText);
            }
        });
    </script>
</body>

</html>
