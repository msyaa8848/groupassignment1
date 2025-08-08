<?php
require_once '../config/database.php';

$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $document_title = $_POST['document_title'] ?? '';
    $document_type = $_POST['document_type'] ?? '';
    $category_group = $_POST['category_group'] ?? '';

    // File upload handling
    $target_dir = "../uploads/documents/"; // Dedicated folder for documents
    $file_url = "";
    if (isset($_FILES["document_file"]) && $_FILES["document_file"]["name"]) {
        // Create directory if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename(time() . "_" . $_FILES["document_file"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Basic validation for common document types
        $allowed_types = array("pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx");
        if (!in_array($fileType, $allowed_types)) {
            $error_message = "Sorry, only PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX files are allowed.";
        }

        if (empty($error_message) && move_uploaded_file($_FILES["document_file"]["tmp_name"], $target_file)) {
            $file_url = './uploads/documents/' . basename($target_file);
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $error_message = "Please select a file to upload.";
    }

    if (empty($error_message)) {
        // Insert new record
        $sql = "INSERT INTO service_forms_documents (
            document_title, 
            document_type, 
            file_url, 
            category_group
        ) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss",
            $document_title,
            $document_type,
            $file_url,
            $category_group
        );

        if ($stmt->execute()) {
            $success_message = "Form/Document added successfully!";
            // Clear form fields after successful submission (optional)
            $_POST = array(); 
        } else {
            $error_message = "Error adding form/document: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Add New Form/Document</title>
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
                        <h1>Add New Form/Document</h1>
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
                                        <h4>New Form/Document Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="document_title">Document Title</label>
                                                <input type="text" class="form-control" id="document_title" name="document_title" placeholder="e.g., Tuition Fee Payment Form" required value="<?php echo htmlspecialchars($_POST['document_title'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="document_type">Document Type (e.g., PDF, XLS)</label>
                                                <input type="text" class="form-control" id="document_type" name="document_type" placeholder="e.g., PDF" value="<?php echo htmlspecialchars($_POST['document_type'] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_group">Category Group (e.g., Tuition Fee Forms)</label>
                                                <input type="text" class="form-control" id="category_group" name="category_group" placeholder="e.g., Tuition Fee Forms" value="<?php echo htmlspecialchars($_POST['category_group'] ?? ''); ?>">
                                                <small class="form-text text-muted">This groups documents on the frontend (e.g., "Tuition Fee Forms").</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="document_file">Upload Document File</label>
                                                <input type="file" class="form-control" id="document_file" name="document_file" required>
                                                <small class="form-text text-muted">Allowed: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Form/Document</button>
                                            <a href="admin_service_forms.php" class="btn btn-secondary">Cancel</a>
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
