<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Get FAQ ID from the URL
$faq_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch FAQ data
$sql = "SELECT * FROM faq_section WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $faq_id);
$stmt->execute();
$result = $stmt->get_result();
$faq = $result->fetch_assoc();

if (!$faq) {
    echo "FAQ entry not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'] ?? '';
    $answer = $_POST['answer'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    if (empty($question) || empty($answer)) {
        $error_message = "Question and Answer cannot be empty.";
    } else {
        // Update existing record
        $sql = "UPDATE faq_section SET 
            question=?, 
            answer=?, 
            sort_order=?, 
            is_active=?
            WHERE id= ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiii",
            $question,
            $answer,
            $sort_order,
            $is_active,
            $faq_id
        );

        if ($stmt->execute()) {
            $success_message = "FAQ updated successfully!";

            // Refresh data after update to show the latest changes on the form
            $sql = "SELECT * FROM faq_section WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $faq_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $faq = $result->fetch_assoc();
        } else {
            $error_message = "Error updating FAQ: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit FAQ</title>
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
                        <h1>Edit FAQ</h1>
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
                                        <h4>Edit FAQ Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <input type="text" class="form-control" id="question" name="question" placeholder="Enter FAQ question" required value="<?php echo htmlspecialchars($faq['question'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="answer">Answer</label>
                                                <textarea class="form-control" id="answer" name="answer" rows="5" placeholder="Enter FAQ answer" required><?php echo htmlspecialchars($faq['answer'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="sort_order">Sort Order</label>
                                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?php echo htmlspecialchars($faq['sort_order'] ?? 0); ?>" min="0">
                                                <small class="form-text text-muted">Lower numbers appear first.</small>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">Is Active</div>
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="is_active" class="custom-switch-input" <?php echo ($faq['is_active'] ?? 0) ? 'checked' : ''; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Display this FAQ on the frontend</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update FAQ</button>
                                            <a href="admin_faq.php" class="btn btn-secondary">Cancel</a>
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
