<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Fetch categories for the dropdown
$categories_sql = "SELECT id, category_name FROM service_categories ORDER BY category_name ASC";
$categories_result = $conn->query($categories_sql);
$categories = $categories_result->fetch_all(MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'] ?? null;
    $item_title = $_POST['item_title'] ?? '';
    $item_description = $_POST['item_description'] ?? '';
    $points_list = $_POST['points_list'] ?? ''; // Assuming comma-separated or similar
    $link_text = $_POST['link_text'] ?? '';
    $link_url = $_POST['link_url'] ?? '';

    // Image upload handling (if you decide to have images for service items)
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
        $sql = "INSERT INTO service_items (
            category_id, 
            item_title, 
            item_description, 
            points_list, 
            link_text, 
            link_url,
            image_url
        ) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        // 'i' for category_id, 's' for strings
        $stmt->bind_param("issssss",
            $category_id,
            $item_title,
            $item_description,
            $points_list,
            $link_text,
            $link_url,
            $image_url
        );

        if ($stmt->execute()) {
            $success_message = "Service item added successfully!";
            // Clear form fields after successful submission (optional)
            $_POST = array(); 
        } else {
            $error_message = "Error adding service item: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New Service Item</title>
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
                        <h1>Add New Service Item</h1>
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
                                        <h4>New Service Item Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select class="form-control" id="category_id" name="category_id" required>
                                                    <option value="">-- Select Category --</option>
                                                    <?php foreach ($categories as $cat): ?>
                                                        <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
                                                            <?php echo htmlspecialchars($cat['category_name']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php if (empty($categories)): ?>
                                                    <small class="form-text text-muted">No categories available. Please <a href="admin_service_categories.php">manage categories</a> first.</small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_title">Service Item Title</label>
                                                <input type="text" class="form-control" id="item_title" name="item_title" placeholder="e.g., Tuition Payment Method" required value="<?php echo htmlspecialchars($_POST['item_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="item_description">Short Description</label>
                                                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="e.g., Manage your tuition fee payments easily..."><?php echo htmlspecialchars($_POST['item_description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="points_list">Bullet Points (e.g., comma-separated or one per line)</label>
                                                <textarea class="form-control" id="points_list" name="points_list" rows="5" placeholder="e.g., Point 1, Point 2, Point 3"><?php echo htmlspecialchars($_POST['points_list'] ?? ''); ?></textarea>
                                                <small class="form-text text-muted">Enter each point on a new line or separate by commas.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="link_text">Link Button Text</label>
                                                <input type="text" class="form-control" id="link_text" name="link_text" placeholder="e.g., Pay, Apply, View PDF" value="<?php echo htmlspecialchars($_POST['link_text'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="link_url">Link URL</label>
                                                <input type="url" class="form-control" id="link_url" name="link_url" placeholder="e.g., https://example.com/payment" value="<?php echo htmlspecialchars($_POST['link_url'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="image_url">Image (Optional)</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save Service Item</button>
                                            <a href="admin_services.php" class="btn btn-secondary">Cancel</a>
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
