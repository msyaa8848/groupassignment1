<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $icon_class = $_POST['icon_class'] ?? '';

    if (empty($category_name)) {
        $error_message = "Category name cannot be empty.";
    } else {
        // Check if category name already exists
        $check_sql = "SELECT id FROM service_categories WHERE category_name = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $category_name);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error_message = "Category name already exists.";
        } else {
            // Insert new record
            $sql = "INSERT INTO service_categories (category_name, description, icon_class) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $category_name, $description, $icon_class);

            if ($stmt->execute()) {
                $success_message = "Category added successfully!";
                // Clear form fields after successful submission (optional)
                $_POST = array();
            } else {
                $error_message = "Error adding category: " . $conn->error;
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
    <title>Admin - Add New Service Category</title>
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
                        <h1>Add New Service Category</h1>
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
                                        <h4>New Category Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="category_name">Category Name</label>
                                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="e.g., Student Services" required value="<?php echo htmlspecialchars($_POST['category_name'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description (Optional)</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="e.g., Comprehensive financial services..."><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="icon_class">Icon Class (Font Awesome)</label>
                                                <input type="text" class="form-control" id="icon_class" name="icon_class" placeholder="e.g., fas fa-user-graduate" value="<?php echo htmlspecialchars($_POST['icon_class'] ?? ''); ?>">
                                                <small class="form-text text-muted">e.g., `fas fa-user-graduate`, `fas fa-users`, `fas fa-handshake`</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Category</button>
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
