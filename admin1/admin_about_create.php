<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page_name = $_POST['page_name'] ?? ''; // Get page_name from POST
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $our_department_title = $_POST['our_department_title'] ?? '';
    $our_department_description_part1 = $_POST['our_department_description_part1'] ?? '';
    $our_department_description_part2 = $_POST['our_department_description_part2'] ?? '';
    $financial_integrity_icon = $_POST['financial_integrity_icon'] ?? '';
    $financial_integrity_text = $_POST['financial_integrity_text'] ?? '';
    $transparency_icon = $_POST['transparency_icon'] ?? '';
    $transparency_text = $_POST['transparency_text'] ?? '';
    $our_mission_title = $_POST['our_mission_title'] ?? '';
    $our_mission_description = $_POST['our_mission_description'] ?? '';
    $our_vision_title = $_POST['our_vision_title'] ?? '';
    $our_vision_description = $_POST['our_vision_description'] ?? '';
    // Correctly handle the checkbox value: if it's set, it's 1, otherwise 0.
    $is_visible = isset($_POST['is_visible']) ? 1 : 0; 

    // Image upload handling
    $target_dir = "../uploads/";
    $image_url = "";
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
        // Insert new record
        $sql = "INSERT INTO about_section (
            page_name,
            title, 
            description, 
            our_department_title, 
            our_department_description_part1, 
            our_department_description_part2, 
            financial_integrity_icon, 
            financial_integrity_text, 
            transparency_icon, 
            transparency_text, 
            our_mission_title, 
            our_mission_description, 
            our_vision_title, 
            our_vision_description,
            image_url,
            is_visible -- Added is_visible here
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        // Note the 'i' for is_visible, as it's an integer (1 or 0)
        $stmt->bind_param("sssssssssssssssi",
            $page_name,
            $title,
            $description,
            $our_department_title,
            $our_department_description_part1,
            $our_department_description_part2,
            $financial_integrity_icon,
            $financial_integrity_text,
            $transparency_icon,
            $transparency_text,
            $our_mission_title,
            $our_mission_description,
            $our_vision_title,
            $our_vision_description,
            $image_url,
            $is_visible // Bind the new is_visible variable
        );

        if ($stmt->execute()) {
            $success_message = "About section added successfully!";
        } else {
            $error_message = "Error adding about section: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New About Section</title>
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
                        <h1>Add New About Section</h1>
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
                                        <h4>New About Section Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="page_name">Page Name</label>
                                                <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Enter page name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="our_department_title">Our Department Title</label>
                                                <input type="text" class="form-control" id="our_department_title" name="our_department_title" placeholder="Enter Our Department Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_department_description_part1">Our Department Description Part 1</label>
                                                <textarea class="form-control" id="our_department_description_part1" name="our_department_description_part1" rows="3" placeholder="Enter Our Department Description Part 1"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="our_department_description_part2">Our Department Description Part 2</label>
                                                <textarea class="form-control" id="our_department_description_part2" name="our_department_description_part2" rows="3" placeholder="Enter Our Department Description Part 2"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="financial_integrity_icon">Financial Integrity Icon</label>
                                                <input type="text" class="form-control" id="financial_integrity_icon" name="financial_integrity_icon" placeholder="Enter Financial Integrity Icon">
                                            </div>
                                            <div class="form-group">
                                                <label for="financial_integrity_text">Financial Integrity Text</label>
                                                <input type="text" class="form-control" id="financial_integrity_text" name="financial_integrity_text" placeholder="Enter Financial Integrity Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="transparency_icon">Transparency Icon</label>
                                                <input type="text" class="form-control" id="transparency_icon" name="transparency_icon" placeholder="Enter Transparency Icon">
                                            </div>
                                            <div class="form-group">
                                                <label for="transparency_text">Transparency Text</label>
                                                <input type="text" class="form-control" id="transparency_text" name="transparency_text" placeholder="Enter Transparency Text">
                                            </div>

                                            <div class="form-group">
                                                <label for="our_mission_title">Our Mission Title</label>
                                                <input type="text" class="form-control" id="our_mission_title" name="our_mission_title" placeholder="Enter Our Mission Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_mission_description">Our Mission Description</label>
                                                <textarea class="form-control" id="our_mission_description" name="our_mission_description" rows="3" placeholder="Enter Our Mission Description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="our_vision_title">Our Vision Title</label>
                                                <input type="text" class="form-control" id="our_vision_title" name="our_vision_title" placeholder="Enter Our Vision Title">
                                            </div>
                                            <div class="form-group">
                                                <label for="our_vision_description">Our Vision Description</label>
                                                <textarea class="form-control" id="our_vision_description" name="our_vision_description" rows="3" placeholder="Enter Our Vision Description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="image_url">Image</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>

                                            <div class="form-group">
                                                <div class="control-label">Visible on About Page</div>
                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="is_visible" class="custom-switch-input" checked> <!-- Default to checked for new entries -->
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Make this section visible</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save</button>
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