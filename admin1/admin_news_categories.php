<?php
require_once '../config/database.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $category_id = $_GET['id'];
    // Before deleting a category, consider if any news items are linked to it.
    // If you used ON DELETE SET NULL, linked news items will just have their category_id set to NULL.
    // If you used ON DELETE RESTRICT, you'd need to handle errors or unlink first.
    $delete_sql = "DELETE FROM news_categories WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $category_id);
    if ($stmt->execute()) {
        $success_message = "Category deleted successfully!";
    } else {
        $error_message = "Error deleting category: " . $conn->error;
    }
    // Redirect to prevent re-deletion on refresh
    header("Location: admin_news_categories.php?success=" . urlencode($success_message) . "&error=" . urlencode($error_message));
    exit();
}

// Fetch all news categories
$sql = "SELECT * FROM news_categories ORDER BY category_name ASC";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

// Check for messages from redirects
$success_message = $_GET['success'] ?? '';
$error_message = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - News Categories Management</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include 'sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>News Categories Management</h1>
                    </div>
                    <div class="section-body">
                        <?php if (isset($success_message) && !empty($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($success_message); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error_message) && !empty($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($error_message); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Categories</h4>
                                        <div class="card-header-action">
                                            <a href="admin_news_categories_create.php" class="btn btn-primary">Add New Category</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Category Name</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($categories)): ?>
                                                        <?php foreach ($categories as $category): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($category['id']); ?></td>
                                                                <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                                                                <td><?php echo htmlspecialchars($category['description'] ?? 'N/A'); ?></td>
                                                                <td>
                                                                    <a href="admin_news_categories_edit.php?id=<?php echo $category['id']; ?>" class="btn btn-primary">Edit</a>
                                                                    <a href="admin_news_categories.php?action=delete&id=<?php echo $category['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category? This will set the category to NULL for any linked news items.');">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center">No categories found.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
