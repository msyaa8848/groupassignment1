<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Get category ID from the URL
$category_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch category data
$sql = "SELECT * FROM service_categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
$category = $result->fetch_assoc();

if (!$category) {
    echo "Category not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $icon_class = $_POST['icon_class'] ?? '';

    if (empty($category_name)) {
        $error_message = "Category name cannot be empty.";
    } else {
        // Check if category name already exists for another ID
        $check_sql = "SELECT id FROM service_categories WHERE category_name = ? AND id != ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("si", $category_name, $category_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error_message = "Category name already exists for another category.";
        } else {
            // Update existing record
            $sql = "UPDATE service_categories SET category_name = ?, description = ?, icon_class = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $category_name, $description, $icon_class, $category_id);

            if ($stmt->execute()) {
                $success_message = "Category updated successfully!";
                // Refresh data after update
                $sql = "SELECT * FROM service_categories WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $category_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $category = $result->fetch_assoc();
            } else {
                $error_message = "Error updating category: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit Service Category</title>
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
                        <h1>Edit Service Category</h1>
                    </div>
                    <div class="section-body">
                        <?php if (isset($success_message) && !empty($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $success_message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error_message) && !empty($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error_message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Category Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="e.g., Student Services" required value="<?php echo htmlspecialchars($category['category_name'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description (Optional)</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="e.g., Comprehensive financial services..."><?php echo htmlspecialchars($category['description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="icon_class">Icon Class (Font Awesome)</label>
                                                <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="e.g., fas fa-user-graduate" value="<?php echo htmlspecialchars($category['icon_class'] ?? ''); ?>">
                                                <small class="form-text text-muted">e.g., `fas fa-user-graduate`, `fas fa-users`, `fas fa-handshake`</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                            <a href="admin_service_categories.php" class="btn btn-secondary">Cancel</a>
                                        </form>
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
