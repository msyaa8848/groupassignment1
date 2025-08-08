<?php
require_once '../config/database.php';

// Fetch all service items, joining with service_categories to get the category name
$sql = "SELECT si.*, sc.category_name 
        FROM service_items si
        LEFT JOIN service_categories sc ON si.category_id = sc.id
        ORDER BY si.id DESC"; // Order by ID, newest first (or adjust as needed)
$result = $conn->query($sql);
$service_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Service Items Management</title>
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
                        <h1>Service Items Management</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Service Items</h4>
                                        <div class="card-header-action">
                                            <a href="admin_services_create.php" class="btn btn-primary">Add New Service Item</a>
                                            <a href="admin_service_categories.php" class="btn btn-info">Manage Categories</a>
                                            <a href="admin_service_forms.php" class="btn btn-warning">Manage Forms</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Link Text</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($service_items)): ?>
                                                        <?php foreach ($service_items as $item): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($item['id']); ?></td>
                                                                <td><?php echo htmlspecialchars($item['item_title']); ?></td>
                                                                <td><?php echo htmlspecialchars($item['category_name'] ?? 'N/A'); ?></td>
                                                                <td><?php echo htmlspecialchars($item['link_text'] ?? 'N/A'); ?></td>
                                                                <td>
                                                                    <a href="admin_services_edit.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Edit</a>
                                                                    <!-- Add delete button if needed -->
                                                                    <!-- <a href="admin_services_delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service item?');">Delete</a> -->
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center">No service items found.</td>
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
