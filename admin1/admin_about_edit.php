<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Get about section ID from the URL
$about_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch about section data
$sql = "SELECT * FROM about_section WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $about_id);
$stmt->execute();
$result = $stmt->get_result();
$about = $result->fetch_assoc();

if (!$about) {
    echo "About section not found.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page_name = $_POST['page_name'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $our_department_title = $_POST['our_department_title'] ?? '';
    $our_department_description_part1 = $_POST['our_department_description_part1'] ?? '';
    $our_department_description_part2 = $_POST['our_department_description_part2'] ?? '';
    // Removed financial_integrity_icon, financial_integrity_text, transparency_icon, transparency_text from POST handling
    $our_mission_title = $_POST['our_mission_title'] ?? '';
    $our_mission_description = $_POST['our_mission_description'] ?? '';
    $our_vision_title = $_POST['our_vision_title'] ?? '';
    $our_vision_description = $_POST['our_vision_description'] ?? '';
    $is_visible = isset($_POST['is_visible']) ? 1 : 0;

    // Image upload handling
    $target_dir = "../uploads/";
    $image_url = $about['image_url']; // Keep existing image if no new image is uploaded
    if ($_FILES["image_url"]["name"]) {
        $target_file = $target_dir . basename(time() . "_" . $_FILES["image_url"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
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
        // If this section is being set to visible, set all others to invisible
        if ($is_visible == 1) {
            $update_other_visibility_sql = "UPDATE about_section SET is_visible = 0 WHERE id != ?";
            $stmt_update_others = $conn->prepare($update_other_visibility_sql);
            $stmt_update_others->bind_param("i", $about_id);
            $stmt_update_others->execute();
        }

        // Update existing record
        // Removed financial_integrity_icon, financial_integrity_text, transparency_icon, transparency_text from the UPDATE query
        $sql = "UPDATE about_section SET 
            page_name = ?,
            title=?, 
            description=?, 
            our_department_title=?, 
            our_department_description_part1=?, 
            our_department_description_part2=?, 
            our_mission_title=?, 
            our_mission_description=?, 
            our_vision_title=?, 
            our_vision_description=?,
            image_url=?,
            is_visible=?
            WHERE id= ?";

        $stmt = $conn->prepare($sql);
        // Correct the number of type characters in the bind_param string
        $stmt->bind_param("ssssssssssssssi",
            $page_name,
            $title,
            $description,
            $our_department_title,
            $our_department_description_part1,
            $our_department_description_part2,
            $our_mission_title,
            $our_mission_description,
            $our_vision_title,
            $our_vision_description,
            $image_url,
            $is_visible,
            $about_id
        );

        if ($stmt->execute()) {
            $success_message = "About section updated successfully!";

            // Refresh data after update to show the latest changes on the form
            $sql = "SELECT * FROM about_section WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $about_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $about = $result->fetch_assoc();
        } else {
            $error_message = "Error updating about section: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Edit About Section</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
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
                        <h1>Edit About Section</h1>
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
                                        <h4>Edit About Section Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="page_name">Page Name</label>
                                                <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Enter page name"  value="<?php echo htmlspecialchars($about['page_name'] ?? ''); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php echo htmlspecialchars($about['title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"><?php echo htmlspecialchars($about['description'] ?? ''); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="our_department_title">Our Department Title</label>
                                                <input type="text" class="form-control" id="our_department_title" name="our_department_title" placeholder="Enter Our Department Title" value="<?php echo htmlspecialchars($about['our_department_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_department_description_part1">Our Department Description Part 1</label>
                                                <textarea class="form-control" id="our_department_description_part1" name="our_department_description_part1" rows="3" placeholder="Enter Our Department Description Part 1"><?php echo htmlspecialchars($about['our_department_description_part1'] ?? ''); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="our_department_description_part2">Our Department Description Part 2</label>
                                                <textarea class="form-control" id="our_department_description_part2" name="our_department_description_part2" rows="3" placeholder="Enter Our Department Description Part 2"><?php echo htmlspecialchars($about['our_department_description_part2'] ?? ''); ?></textarea>
                                            </div>

                                            <!-- Removed input fields for financial_integrity_icon, financial_integrity_text, transparency_icon, transparency_text -->
                                            <!-- These fields are removed to ensure the frontend uses default icons -->

                                            <div class="form-group">
                                                <label for="our_mission_title">Our Mission Title</label>
                                                <input type="text" class="form-control" id="our_mission_title" name="our_mission_title" placeholder="Enter Our Mission Title" value="<?php echo htmlspecialchars($about['our_mission_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_mission_description">Our Mission Description</label>
                                                <textarea class="form-control" id="our_mission_description" name="our_mission_description" rows="3" placeholder="Enter Our Mission Description"><?php echo htmlspecialchars($about['our_mission_description'] ?? ''); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="our_vision_title">Our Vision Title</label>
                                                <input type="text" class="form-control" id="our_vision_title" name="our_vision_title" placeholder="Enter Our Vision Title" value="<?php echo htmlspecialchars($about['our_vision_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_vision_description">Our Vision Description</label>
                                                <textarea class="form-control" id="our_vision_description" name="our_vision_description" rows="3" placeholder="Enter Our Vision Description"><?php echo htmlspecialchars($about['our_vision_description'] ?? ''); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Current Image</label>
                                                <?php if ($about && $about['image_url']): ?>
                                                    <img src="<?php echo htmlspecialchars($about['image_url']); ?>" alt="About Image" width="100">
                                                <?php else: ?>
                                                    <p>No image uploaded.</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="image_url">New Image</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>

                                            <div class="form-group">
                                                <div class="control-label">Visible on About Page</div>
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="is_visible" class="custom-switch-input" <?php echo ($about['is_visible'] ?? 0) ? 'checked' : ''; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Make this section visible</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="admin_about.php" class="btn btn-secondary">Cancel</a>
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
