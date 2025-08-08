<?php
require_once '../config/database.php';

// Fetch branches for display
$sql = "SELECT * FROM branches";
$result = $conn->query($sql);
$branches = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Branch Management</title>
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
                        <h1>Branch Management</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Branches</h4>
                                        <div class="card-header-action">
                                            <a href="admin_branches_create.php" class="btn btn-primary">Add New Branch</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Department</th>
                                                        <th>Address</th>
                                                        <th>Hotline 1</th>
                                                        <th>Hotline 1 Desc</th>
                                                        <th>Hotline 2</th>
                                                        <th>Hotline 2 Desc</th>
                                                        <th>Image</th>
                                                        <th>Map</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($branches as $branch): ?>
                                                        <tr>
                                                            <td><?php echo $branch['branch_id']; ?></td>
                                                            <td><?php echo htmlspecialchars($branch['branch_name']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['department']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['address']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['hotline1']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['hotline1_desc']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['hotline2']); ?></td>
                                                            <td><?php echo htmlspecialchars($branch['hotline2_desc']); ?></td>
                                                            <td><img src="<?= $branch['image_url']; ?>" alt="Branch Image" width="50"></td>
                                                            <td><?= $branch['map_embed_url']; ?></td>
                                                            <td>
                                                                <a href="admin_branches_edit.php?id=<?php echo $branch['branch_id']; ?>" class="btn btn-primary">Edit</a>
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
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>
<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include 'sidebar.php'; ?>
        </div>
    </div>

    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>
