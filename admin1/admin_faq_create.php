<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'] ?? '';
    $answer = $_POST['answer'] ?? '';
    $sort_order = $_POST['sort_order'] ?? 0;
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    if (empty($question) || empty($answer)) {
        $error_message = "Question and Answer cannot be empty.";
    } else {
        // Insert new record
        $sql = "INSERT INTO faq_section (question, answer, sort_order, is_active) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $question, $answer, $sort_order, $is_active);

        if ($stmt->execute()) {
            $success_message = "FAQ added successfully!";
            // Clear form fields after successful submission (optional)
            $_POST = array(); 
        } else {
            $error_message = "Error adding FAQ: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New FAQ</title>
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
                        <h1>Add New FAQ</h1>
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
                                        <h4>New FAQ Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <input type="text" class="form-control" id="question" name="question" placeholder="Enter FAQ question" required value="<?php echo htmlspecialchars($_POST['question'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="answer">Answer</label>
                                                <textarea class="form-control" id="answer" name="answer" rows="5" placeholder="Enter FAQ answer" required><?php echo htmlspecialchars($_POST['answer'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="sort_order">Sort Order</label>
                                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?php echo htmlspecialchars($_POST['sort_order'] ?? 0); ?>" min="0">
                                                <small class="form-text text-muted">Lower numbers appear first.</small>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">Is Active</div>
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="is_active" class="custom-switch-input" <?php echo (isset($_POST['is_active']) && $_POST['is_active']) ? 'checked' : 'checked'; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Display this FAQ on the frontend</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save FAQ</button>
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
