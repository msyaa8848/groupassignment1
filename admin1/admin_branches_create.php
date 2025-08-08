<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branch_name = $_POST['branch_name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $hotline1 = $_POST['hotline1'];
    $hotline1_desc = $_POST['hotline1_desc'];
    $hotline2 = $_POST['hotline2'];
    $hotline2_desc = $_POST['hotline2_desc'];
    $map_embed_url = $_POST['map_embed_url'];

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
            $image_url = '../uploads/' . basename($target_file);
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    if (empty($error_message)) {
        //Insert new branch
        $sql = "INSERT INTO branches (branch_name, department, address, hotline1, hotline1_desc, hotline2, hotline2_desc, image_url, map_embed_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $branch_name, $department, $address, $hotline1, $hotline1_desc, $hotline2, $hotline2_desc, $image_url, $map_embed_url);

        if ($stmt->execute()) {
            $success_message = "Branch added successfully!";
        } else {
            $error_message = "Error adding branch: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New Branch</title>
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
                        <h1>Add New Branch</h1>
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
                                        <h4>New Branch Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="branch_name">Branch Name</label>
                                                <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter branch name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input type="text" class="form-control" id="department" name="department" placeholder="Enter department">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hotline1">Hotline 1</label>
                                                <input type="text" class="form-control" id="hotline1" name="hotline1" placeholder="Enter hotline 1">
                                            </div>
                                            <div class="form-group">
                                                <label for="hotline1_desc">Hotline 1 Description</label>
                                                <input type="text" class="form-control" id="hotline1_desc" name="hotline1_desc" placeholder="Enter hotline 1 description">
                                            </div>
                                            <div class="form-group">
                                                <label for="hotline2">Hotline 2</label>
                                                <input type="text" class="form-control" id="hotline2" name="hotline2" placeholder="Enter hotline 2">
                                            </div>
                                            <div class="form-group">
                                                <label for="hotline2_desc">Hotline 2 Description</label>
                                                <input type="text" class="form-control" id="hotline2_desc" name="hotline2_desc" placeholder="Enter hotline 2 description">
                                            </div>
                                            <div class="form-group">
                                                <label for="image_url">Image</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url">
                                            </div>
                                            <div class="form-group">
                                                <label for="map_embed_url">Map Embed URL</label>
                                                <textarea class="form-control" id="map_embed_url" name="map_embed_url" rows="3" placeholder="Enter map embed URL"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a href="admin_branches.php" class="btn btn-secondary">Cancel</a>
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
