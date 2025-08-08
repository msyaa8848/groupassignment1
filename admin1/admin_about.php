<?php
require_once '../config/database.php';

// Fetch all about sections
// No change needed here, as we want to see all sections in the admin panel
$sql = "SELECT * FROM about_section";
$result = $conn->query($sql);
$abouts = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - About Section Management</title>
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
                        <h1>About Section Management</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>About Sections</h4>
                                        <div class="card-header-action">
                                            <a href="admin_about_create.php" class="btn btn-primary">Add New About Section</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Page Name</th>
                                                        <th>Title</th>
                                                        <th>Visible</th> <!-- Added Visible column -->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($abouts as $about): ?>
                                                        <tr>
                                                            <td><?php echo $about['id']; ?></td>
                                                            <td><?php echo htmlspecialchars($about['page_name']); ?></td>
                                                            <td><?php echo htmlspecialchars($about['title']); ?></td>
                                                            <td>
                                                                <?php if ($about['is_visible']): ?>
                                                                    <span class="badge badge-success">Yes</span>
                                                                <?php else: ?>
                                                                    <span class="badge badge-danger">No</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a href="admin_about_edit.php?id=<?php echo $about['id']; ?>" class="btn btn-primary">Edit</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
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
