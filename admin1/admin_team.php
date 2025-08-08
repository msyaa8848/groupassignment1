<?php
require_once '../config/database.php';

// Fetch team members for display
$sql = "SELECT * FROM team_profile";
$result = $conn->query($sql);
$team_members = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - Team Management</title>
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
                        <h1>Team Management</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Team Members</h4>
                                        <div class="card-header-action">
                                            <a href="admin_team_create.php" class="btn btn-primary">Add New Member</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-md">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Image</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($team_members as $member): ?>
                                                        <tr>
                                                            <td><?php echo $member['id']; ?></td>
                                                            <td><?php echo $member['name']; ?></td>
                                                            <td><?php echo $member['position']; ?></td>
                                                            <td><img src="<?= $member['profile_img']; ?>" alt="Profile Image" width="50"></td>
                                                            <td><?php echo $member['phoneNo']; ?></td>
                                                            <td><?php echo $member['email']; ?></td>
                                                            <td><?php echo $member['description']; ?></td>
                                                            <td>
                                                                <a href="admin_team_edit.php?id=<?php echo $member['id']; ?>" class="btn btn-primary">Edit</a>
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
