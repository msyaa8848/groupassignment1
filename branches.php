<?php
require_once 'config/database.php';

$sql = "SELECT * FROM branches";
$result = $conn->query($sql);
$branches = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Branches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Our Branches</h1>
        <div class="row">
            <?php foreach ($branches as $branch): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($branch['image_url']); ?>" class="card-img-top" alt="Branch Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($branch['branch_name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($branch['department']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($branch['address']); ?></p>
                            <p class="card-text">
                                <?php if ($branch['hotline1']): ?>
                                    Hotline 1: <?php echo htmlspecialchars($branch['hotline1']); ?> (<?php echo htmlspecialchars($branch['hotline1_desc']); ?>)
                                <?php endif; ?>
                            </p>
                            <p class="card-text">
                                <?php if ($branch['hotline2']): ?>
                                    Hotline 2: <?php echo htmlspecialchars($branch['hotline2']); ?> (<?php echo htmlspecialchars($branch['hotline2_desc']); ?>)
                                <?php endif; ?>
                            </p>
                            <?php if ($branch['map_embed_url']): ?>
                                <div>
                                    <?php echo $branch['map_embed_url']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
