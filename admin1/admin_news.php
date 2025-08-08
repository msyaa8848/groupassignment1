<?php
require_once '../config/database.php';

// Fetch all news sections, joining with news_categories to get the category name
$sql = "SELECT ns.*, nc.category_name 
        FROM news_section ns
        LEFT JOIN news_categories nc ON ns.category_id = nc.id
        ORDER BY ns.publish_date DESC"; // Order by date, newest first
$result = $conn->query($sql);
$news_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - News Management</title>
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
                        <h1>News Management</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>News Items</h4>
                                        <div class="card-header-action">
                                            <a href="admin_news_create.php" class="btn btn-primary">Add New News</a>
                                            <a href="admin_news_categories.php" class="btn btn-info">Manage Categories</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Publish Date</th>
                                                        <th>Category</th>
                                                        <th>Urgent</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($news_items)): ?>
                                                        <?php foreach ($news_items as $news): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($news['id']); ?></td>
                                                                <td><?php echo htmlspecialchars($news['title']); ?></td>
                                                                <td><?php echo htmlspecialchars($news['publish_date']); ?></td>
                                                                <td><?php echo htmlspecialchars($news['category_name'] ?? 'N/A'); ?></td>
                                                                <td>
                                                                    <?php if ($news['is_urgent']): ?>
                                                                        <span class="badge badge-danger">Yes</span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-success">No</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="admin_news_edit.php?id=<?php echo $news['id']; ?>" class="btn btn-primary">Edit</a>
                                                                    <!-- Add a delete button if needed, with confirmation via JS -->
                                                                    <!-- <a href="admin_news_delete.php?id=<?php echo $news['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news item?');">Delete</a> -->
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No news items found.</td>
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
