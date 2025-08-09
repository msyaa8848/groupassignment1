<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Branch</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- SCRIPT JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</head>

<body class="container">

    <header class="text-center my-4">
        <h1>Branch Section</h1>
    </header>

    <main>
        <?php include("database/db_connect.php");

        // Add this before the table
        $sql = "SELECT * FROM branches";
        $result = $conn->query($sql);
        ?>
        <section class="content">

            <form class="d-flex mb-6" method="get" action="">
            </form>

            <!-- TABLE CARD -->
            <table class="table table-striped">
                <thead>
                    <a href="insert_branch.php">
                        <input type="button" class="btn btn-primary" style="float: right;" value="Create New Branch">
                    </a>
                    <tr>
                        <th class="col-1">Branch Name</th>
                        <th class="">Department</th>
                        <th>Address</th>
                        <th>Hotline 1</th>
                        <th>Hotline 1 (Desc)</th>
                        <th>Hotline 2</th>
                        <th>Hotline 2 (Desc)</th>
                        <th>Branch Img</th>
                        <th>Branch Map</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqltambahan = "";
                    $per_halaman = 10; // Number of records per page
                    // $sqlcari = [];
                    $sql1   = "select * from branches $sqltambahan";
                    $page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $mulai  = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
                    $q1     = mysqli_query($conn, $sql1); // <-- changed
                    $total  = mysqli_num_rows($q1);
                    $pages  = ceil($total / $per_halaman);
                    $nomor  = $mulai + 1;
                    $sql1   = $sql1 . " order by branch_id asc limit $mulai,$per_halaman";

                    $q1     = mysqli_query($conn, $sql1); // <-- changed
                    $image_url = '';
                    

                    while ($r1 = mysqli_fetch_array($q1)) {
                    ?>
                        <tr>
                            <td><?php echo $r1['branch_name']; ?></td>
                            <td><?php echo $r1['department']; ?></td>
                            <td><?php echo $r1['address']; ?></td>
                            <td><?php echo $r1['hotline1']; ?></td>
                            <td><?php echo $r1['hotline1_desc']; ?></td>
                            <td><?php echo $r1['hotline2']; ?></td>
                            <td><?php echo $r1['hotline2_desc']; ?></td>
                            <td><?php echo '<img src="' . ($r1['image_url']) . '" class="rounded-lg w-50 h-50 object-cover md:col-span-1">'; ?></td>
                            <td><?php echo $r1['map_embed_url']; ?></td>
                            <td>
                                <a href="#view_branch.php?branch_id=<?php echo $r1['branch_id']; ?>" class="badge bg-primary">View</a>
                                <a href="#edit_branch.php?branch_id=<?php echo $r1['branch_id']; ?>" class="badge bg-warning text-dark">Edit</a>
                                <a href="#delete_branch?branch_id=<?php echo $r1['branch_id']; ?>" class="badge bg-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php }
                    if ($total == 0) { ?>
                        <tr>
                            <td colspan="14" class="text-center">No records found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- PAGINATION -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    $cari = isset($_GET['cari']) ? $_GET['cari'] : "";
                    for ($i = 1; $i <= $pages; $i++) { ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="admin_home.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>


        </section>
    </main>
</body>
</html>