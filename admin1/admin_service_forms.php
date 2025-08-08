<?php
require_once '../config/database.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $form_id = $_GET['id'];
    // Optional: Delete the actual file from the server if file_url points to a local file
    // $file_url_to_delete = ... fetch from DB ...
    // if (file_exists($file_url_to_delete)) { unlink($file_url_to_delete); }

    $delete_sql = "DELETE FROM service_forms_documents WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $form_id);
    if ($stmt->execute()) {
        $success_message = "Form/Document deleted successfully!";
    } else {
        $error_message = "Error deleting form/document: " . $conn->error;
    }
    // Redirect to prevent re-deletion on refresh
    header("Location: admin_service_forms.php?success=" . urlencode($success_message) . "&error=" . urlencode($error_message));
    exit();
}

// Fetch all forms and documents
$sql = "SELECT * FROM service_forms_documents ORDER BY document_title ASC";
$result = $conn->query($sql);
$forms = $result->fetch_all(MYSQLI_ASSOC);

// Check for messages from redirects
$success_message = $_GET['success'] ?? '';
$error_message = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Forms & Documents Management</title>
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
                        <h1>Forms & Documents Management</h1>
                    </div>
                    <div class="section-body">
                        <?php if (isset($success_message) && !empty($success_message)): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($success_message); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error_message) && !empty($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($error_message); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Forms & Documents</h4>
                                        <div class="card-header-action">
                                            <a href="admin_service_forms_create.php" class="btn btn-primary">Add New Form/Document</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Type</th>
                                                        <th>Category Group</th>
                                                        <th>File URL</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($forms)): ?>
                                                        <?php foreach ($forms as $form): ?>
                                                            <tr>
                                                                <td><?php echo htmlspecialchars($form['id']); ?></td>
                                                                <td><?php echo htmlspecialchars($form['document_title']); ?></td>
                                                                <td><?php echo htmlspecialchars($form['document_type'] ?? 'N/A'); ?></td>
                                                                <td><?php echo htmlspecialchars($form['category_group'] ?? 'N/A'); ?></td>
                                                                <td><a href="<?php echo htmlspecialchars($form['file_url']); ?>" target="_blank" class="text-primary">View File</a></td>
                                                                <td>
                                                                    <a href="admin_service_forms_edit.php?id=<?php echo $form['id']; ?>" class="btn btn-primary">Edit</a>
                                                                    <a href="admin_service_forms.php?action=delete&id=<?php echo $form['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this form/document?');">Delete</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center">No forms or documents found.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
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
