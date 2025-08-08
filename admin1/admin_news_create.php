<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Fetch categories for the dropdown
$categories_sql = "SELECT id, category_name FROM news_categories ORDER BY category_name ASC";
$categories_result = $conn->query($categories_sql);
$categories = $categories_result->fetch_all(MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $publish_date = $_POST['publish_date'] ?? '';
    $category_id = $_POST['category_id'] ?? null; // Can be null if no category selected
    $is_urgent = isset($_POST['is_urgent']) ? 1 : 0;
    $link_url = $_POST['link_url'] ?? '';

    // Image upload handling (similar to your about_section)
    $target_dir = "../uploads/";
    $image_url = "";
    if (isset($_FILES["image_url"]) && $_FILES["image_url"]["name"]) {
        $target_file = $target_dir . basename(time() . "_" . $_FILES["image_url"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Basic validation
        $check = getimagesize($_FILES["image_url"]["tmp_name"]);
        if($check === false) {
            $error_message = "File is not an image.";
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        if (empty($error_message) && move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
            $image_url = './uploads/' . basename($target_file);
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    if (empty($error_message)) {
        // Insert new record
        $sql = "INSERT INTO news_section (
            title, 
            description, 
            publish_date, 
            category_id, 
            image_url, 
            is_urgent, 
            link_url
        ) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        // 's' for string, 's' for description, 's' for date, 'i' for category_id, 's' for image_url, 'i' for is_urgent, 's' for link_url
        $stmt->bind_param("sssisss",
            $title,
            $description,
            $publish_date,
            $category_id,
            $image_url,
            $is_urgent,
            $link_url
        );

        if ($stmt->execute()) {
            $success_message = "News item added successfully!";
            // Clear form fields after successful submission (optional)
            $_POST = array(); 
        } else {
            $error_message = "Error adding news item: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New News Item</title>
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
                        <h1>Add New News Item</h1>
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
                                        <h4>New News Item Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title" required value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter full news description"><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="publish_date">Publish Date</label>
                                                <input type="date" class="form-control" id="publish_date" name="publish_date" required value="<?php echo htmlspecialchars($_POST['publish_date'] ?? date('Y-m-d')); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select class="form-control" id="category_id" name="category_id">
                                                    <option value="">-- Select Category --</option>
                                                    <?php foreach ($categories as $cat): ?>
                                                        <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($cat['category_name']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php if (empty($categories)): ?>
                                                    <small class="form-text text-muted">No categories available. Please <a href="admin_news_categories.php">manage categories</a> first.</small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image_url">Image</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>
                                            <div class="form-group">
                                                <label for="link_url">Link URL (for "Read More")</label>
                                                <input type="url" class="form-control" id="link_url" name="link_url" placeholder="e.g., https://example.com/news-detail" value="<?php echo htmlspecialchars($_POST['link_url'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">Mark as Urgent</div>
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="is_urgent" class="custom-switch-input" <?php echo (isset($_POST['is_urgent']) && $_POST['is_urgent']) ? 'checked' : ''; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Display this news as urgent</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save News</button>
                                            <a href="admin_news.php" class="btn btn-secondary">Cancel</a>
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
