<?php
require_once '../config/database.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $faq_id = $_GET['id'];
    $delete_sql = "DELETE FROM faq_section WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $faq_id);
    if ($stmt->execute()) {
        $success_message = "FAQ deleted successfully!";
    } else {
        $error_message = "Error deleting FAQ: " . $conn->error;
    }
    // Redirect to prevent re-deletion on refresh
    header("Location: admin_faq.php?success=" . urlencode($success_message) . "&error=" . urlencode($error_message));
    exit();
}

// Fetch all FAQ entries
$sql = "SELECT * FROM faq_section ORDER BY sort_order ASC, created_at DESC"; // Order by custom sort_order, then by creation date
$result = $conn->query($sql);
$faqs = $result->fetch_all(MYSQLI_ASSOC);

// Check for messages from redirects
$success_message = $_GET['success'] ?? '';
$error_message = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - FAQ Management</title>
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
                        <h1>FAQ Management</h1>
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
                                        <h4>FAQ List</h4>
                                        <div class="card-header-action">
                                            <a href="admin_faq_create.php" class="btn btn-primary">Add New FAQ</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Question</th>
                                                        <th>Order</th>
                                                        <th>Active</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($faqs)): ?>
                                                        <?php foreach ($faqs as $faq): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($faq['id']); ?></td>
                                                                <td><?php echo htmlspecialchars(substr($faq['question'], 0, 100)) . (strlen($faq['question']) > 100 ? '...' : ''); ?></td>
                                                                <td><?php echo htmlspecialchars($faq['sort_order']); ?></td>
                                                                <td>
                                                                    <?php if ($faq['is_active']): ?>
                                                                        <span class="badge badge-success">Yes</span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-danger">No</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="admin_faq_edit.php?id=<?php echo $faq['id']; ?>" class="btn btn-primary">Edit</a>
                                                                    <a href="admin_faq.php?action=delete&id=<?php echo $faq['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this FAQ?');">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center">No FAQs found.</td>
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
