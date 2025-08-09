<!DOCTYPE html>
<html>
<head>
    <title>Add Branch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
        }
        form {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 6px 0 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .message {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            font-weight: bold;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 16px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="button"] {
            background-color: #6c757d; /* Grey for back button */
        }


        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>

<?php include 'database/db_connect.php'; ?>

<?php 
// Initialize form variables
$branch_name = $department = $address = $hotline1 = $hotline1_desc = $hotline2 = $hotline2_desc = $map_embed_url = $image_url = '';
$message = '';

// Handle form submission
if (isset($_POST['submit'])) {
    $branch_name = $_POST['branch_name'];
    $department = $_POST['department'];
    $address = $_POST['address'];
    $hotline1 = $_POST['hotline1'];
    $hotline1_desc = $_POST['hotline1_desc'];
    $hotline2 = $_POST['hotline2'];
    $hotline2_desc = $_POST['hotline2_desc'];
    $map_embed_url = $_POST['map_embed_url'];

    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $img_name = basename($_FILES['image_url']['name']);
        $target_dir = "./uploads/";
        $target_file = $target_dir . time() . '_' . $img_name;

        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
            $image_url = $target_file;
        } else {
            $message = "<div class='message error'>Failed to upload image.</div>";
        }
    }

    // Insert into DB
    $sql = "INSERT INTO branches (branch_name, department, address, hotline1, hotline1_desc, hotline2, hotline2_desc, image_url, map_embed_url)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $branch_name, $department, $address, $hotline1, $hotline1_desc, $hotline2, $hotline2_desc, $image_url, $map_embed_url);

    if ($stmt->execute()) {
        $message = "<div class='message success'>Branch successfully added!</div>";
    } else {
        $message = "<div class='message error'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<h2 style="text-align:center;">Add New Branch</h2>
<?= $message ?>

<form action="" method="post" enctype="multipart/form-data">
    <label>Branch Name</label>
    <input type="text" name="branch_name" required>

    <label>Department</label>
    <input type="text" name="department">

    <label>Address</label>
    <textarea name="address" rows="4" required></textarea>

    <label>Hotline 1</label>
    <input type="text" name="hotline1">

    <label>Hotline 1 Description</label>
    <input type="text" name="hotline1_desc">

    <label>Hotline 2</label>
    <input type="text" name="hotline2">

    <label>Hotline 2 Description</label>
    <input type="text" name="hotline2_desc">

    <label>Branch Image</label>
    <input type="file" name="image_url" accept="image/*">

    <label>Google Map Embed URL</label>
    <textarea name="map_embed_url" rows="3"></textarea>
    
    <button type="button" onclick="window.location.href='admin-branch.php'">Back to Admin Home</button>
    <button type="submit" name="submit">Add Branch</button>

    
</form>

</body>
</html>