<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Get announcement ID from the URL
$announcement_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch announcement data
$sql = "SELECT * FROM announcements WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $announcement_id);
$stmt->execute();
$result = $stmt->get_result();
$announcement = $result->fetch_assoc();

if (!$announcement) {
    echo "Announcement not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (empty($title) || empty($content)) {
        $error_message = "Title and content are required.";
    }

    if (empty($error_message)) {
        //Update existing announcement
        $sql = "UPDATE announcements SET title=?, content=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $announcement_id);

        if ($stmt->execute()) {
            $success_message = "Announcement updated successfully!";

             // Refresh announcement data
            $sql = "SELECT * FROM announcements WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $announcement_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $announcement = $result->fetch_assoc();

        } else {
            $error_message = "Error updating announcement: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit Announcement</title>
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
                        <h1>Edit Announcement</h1>
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
                                        <h4>Edit Announcement Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php echo htmlspecialchars($announcement['title']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter content" required><?php echo htmlspecialchars($announcement['content']); ?></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="admin_announcement.php" class="btn btn-secondary">Cancel</a>
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
