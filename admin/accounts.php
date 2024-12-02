<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php'; // Include the database connection

try {
    // Fetch users data with a join to auth.users
    $query = "SELECT u.id,
                    u.user_firstname, 
                    u.user_lastname, 
                    a.email, 
                    a.created_at 
            FROM users AS u
            JOIN auth.users AS a 
            ON u.user_id = a.id 
            ORDER BY a.created_at ASC";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Failed to fetch data: " . $e->getMessage();
    exit;
}
?>

<main class="p-2 px-4">
    <section id="accounts">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Accounts</h1>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="search-bar col-auto">
                    <form action="" method="get" class="d-flex">
                        <input type="text" name="search" class="form-control me-2"
                            placeholder="Type your search here" value="" style="width: 280px;">
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="content table-responsive p-4 pt-2">
            <table class="table table-hover fs-6" id="accounts-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date Created</th>
                    </tr>
                </thead>
                <tbody class="fw-light">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#customer-modal">
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['user_firstname']); ?></td>
                                <td><?php echo htmlspecialchars($user['user_lastname']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include '../partials/admin-footer.php'; ?>