<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    // Image upload handling
    $target_dir = "../uploads/";
    $profile_img = "";
    if ($_FILES["profile_img"]["name"]) {
        $target_file = $target_dir . basename(time() . "_" . $_FILES["profile_img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_img"]["tmp_name"]);
        if($check === false) {
            $error_message = "File is not an image.";
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        
        if (empty($error_message) && move_uploaded_file($_FILES["profile_img"]["tmp_name"], $target_file)) {
            $profile_img = './uploads/' . basename($target_file);
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }

    if (empty($error_message)) {
        //Insert new team member
        $sql = "INSERT INTO team_profile (name, position, profile_img, phoneNo, email, description) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $position, $profile_img, $phoneNo, $email, $description);

        if ($stmt->execute()) {
            $success_message = "Team member added successfully!";
        } else {
            $error_message = "Error adding team member: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New Team Member</title>
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
                        <h1>Add New Team Member</h1>
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
                                        <h4>New Team Member Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" id="position" name="position" placeholder="Enter position">
                                            </div>
                                            <div class="form-group">
                                                <label for="profile_img">Profile Image</label>
                                                <input type="file" class="form-control" id="profile_img" name="profile_img">
                                            </div>
                                            <div class="form-group">
                                                <label for="phoneNo">Phone Number</label>
                                                <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Enter phone number">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a href="admin_team.php" class="btn btn-secondary">Cancel</a>
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
