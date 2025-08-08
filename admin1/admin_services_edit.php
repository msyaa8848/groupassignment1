<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Get service item ID from the URL
$item_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch service item data
$sql = "SELECT * FROM service_items WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $item_id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();

if (!$item) {
    echo "Service item not found.";
    exit;
}

// Fetch categories for the dropdown
$categories_sql = "SELECT id, category_name FROM service_categories ORDER BY category_name ASC";
$categories_result = $conn->query($categories_sql);
$categories = $categories_result->fetch_all(MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'] ?? null;
    $item_title = $_POST['item_title'] ?? '';
    $item_description = $_POST['item_description'] ?? '';
    $points_list = $_POST['points_list'] ?? '';
    $link_text = $_POST['link_text'] ?? '';
    $link_url = $_POST['link_url'] ?? '';

    // Image upload handling
    $target_dir = "../uploads/";
    $image_url = $item['image_url']; // Keep existing image if no new image is uploaded
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
        // Update existing record
        $sql = "UPDATE service_items SET 
            category_id=?, 
            item_title=?, 
            item_description=?, 
            points_list=?, 
            link_text=?, 
            link_url=?,
            image_url=?
            WHERE id= ?";

        $stmt = $conn->prepare($sql);
        // 'i' for category_id, 's' for strings, 'i' for item_id
        $stmt->bind_param("issssssi",
            $category_id,
            $item_title,
            $item_description,
            $points_list,
            $link_text,
            $link_url,
            $image_url,
            $item_id
        );

        if ($stmt->execute()) {
            $success_message = "Service item updated successfully!";

            // Refresh data after update to show the latest changes on the form
            $sql = "SELECT * FROM service_items WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $item_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $item = $result->fetch_assoc();
        } else {
            $error_message = "Error updating service item: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit Service Item</title>
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
                        <h1>Edit Service Item</h1>
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
                                        <h4>Edit Service Item Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select class="form-control" id="category_id" name="category_id" required>
                                                    <option value="">-- Select Category --</option>
                                                    <?php foreach ($categories as $cat): ?>
                                                        <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo ($item['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
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
                                                <input type="text" class="form-control" id="item_title" name="item_title" placeholder="e.g., Tuition Payment Method" required value="<?php echo htmlspecialchars($item['item_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="item_description">Short Description</label>
                                                <textarea class="form-control" id="item_description" name="item_description" rows="3" placeholder="e.g., Manage your tuition fee payments easily..."><?php echo htmlspecialchars($item['item_description'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="points_list">Bullet Points (e.g., comma-separated or one per line)</label>
                                                <textarea class="form-control" id="points_list" name="points_list" rows="5" placeholder="e.g., Point 1, Point 2, Point 3"><?php echo htmlspecialchars($item['points_list'] ?? ''); ?></textarea>
                                                <small class="form-text text-muted">Enter each point on a new line or separate by commas.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="link_text">Link Button Text</label>
                                                <input type="text" class="form-control" id="link_text" name="link_text" placeholder="e.g., Pay, Apply, View PDF" value="<?php echo htmlspecialchars($item['link_text'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="link_url">Link URL</label>
                                                <input type="url" class="form-control" id="link_url" name="link_url" placeholder="e.g., https://example.com/payment" value="<?php echo htmlspecialchars($item['link_url'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Current Image</label>
                                                <?php if ($item && $item['image_url']): ?>
                                                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Service Item Image" width="100">
                                                <?php else: ?>
                                                    <p>No image uploaded.</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image_url">New Image (Optional)</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Service Item</button>
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
