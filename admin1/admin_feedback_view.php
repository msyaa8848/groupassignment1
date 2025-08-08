<?php
require_once '../config/database.php';

// Get feedback ID from the URL
$feedback_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch feedback data
$sql = "SELECT * FROM feedback_section WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $feedback_id);
$stmt->execute();
$result = $stmt->get_result();
$feedback = $result->fetch_assoc();

if (!$feedback) {
    echo "Feedback entry not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - View Feedback</title>
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
                        <h1>View Feedback</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Feedback Details (ID: <?php echo htmlspecialchars($feedback['id']); ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Feedback Type</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static"><?php echo htmlspecialchars($feedback['feedback_type'] ?? 'N/A'); ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Rating</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static">
                                                    <?php 
                                                    $rating = $feedback['rating'] ?? 0;
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        echo '<i class="fas fa-star ' . ($i <= $rating ? 'text-warning' : 'text-gray-300') . '"></i>';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Feedback Text</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static"><?php echo nl2br(htmlspecialchars($feedback['feedback_text'] ?? 'N/A')); ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Submitted Anonymously</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static">
                                                    <?php echo ($feedback['submit_anonymously'] ? 'Yes' : 'No'); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Submission Date</label>
                                            <div class="col-sm-9">
                                                <p class="form-control-static"><?php echo htmlspecialchars(date('Y-m-d H:i:s', strtotime($feedback['submission_date']))); ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9 offset-sm-3">
                                                <a href="admin_feedback.php" class="btn btn-secondary">Back to Feedback List</a>
                                                <a href="admin_feedback.php?action=delete&id=<?php echo $feedback['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete Feedback</a>
                                            </div>
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
