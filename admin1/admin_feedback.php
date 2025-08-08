<?php
require_once '../config/database.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $feedback_id = $_GET['id'];
    $delete_sql = "DELETE FROM feedback_section WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $feedback_id);
    if ($stmt->execute()) {
        $success_message = "Feedback deleted successfully!";
    } else {
        $error_message = "Error deleting feedback: " . $conn->error;
    }
    // Redirect to prevent re-deletion on refresh
    header("Location: admin_feedback.php?success=" . urlencode($success_message) . "&error=" . urlencode($error_message));
    exit();
}

// Fetch all feedback entries
$sql = "SELECT * FROM feedback_section ORDER BY submission_date DESC"; // Newest feedback first
$result = $conn->query($sql);
$feedback_entries = $result->fetch_all(MYSQLI_ASSOC);

// Check for messages from redirects
$success_message = $_GET['success'] ?? '';
$error_message = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Feedback Management</title>
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
                        <h1>Feedback Management</h1>
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
                                        <h4>All Feedback</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Type</th>
                                                        <th>Rating</th>
                                                        <th>Anonymous</th>
                                                        <th>Submission Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($feedback_entries)): ?>
                                                        <?php foreach ($feedback_entries as $feedback): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($feedback['id']); ?></td>
                                                                <td><?php echo htmlspecialchars($feedback['feedback_type'] ?? 'N/A'); ?></td>
                                                                <td>
                                                                    <?php 
                                                                    $rating = $feedback['rating'] ?? 0;
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        echo '<i class="fas fa-star ' . ($i <= $rating ? 'text-warning' : 'text-gray-300') . '"></i>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($feedback['submit_anonymously']): ?>
                                                                        <span class="badge badge-info">Yes</span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-secondary">No</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo htmlspecialchars(date('Y-m-d H:i', strtotime($feedback['submission_date']))); ?></td>
                                                                <td>
                                                                    <a href="admin_feedback_view.php?id=<?php echo $feedback['id']; ?>" class="btn btn-info">View</a>
                                                                    <a href="admin_feedback.php?action=delete&id=<?php echo $feedback['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No feedback entries found.</td>
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
