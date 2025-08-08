<?php
include 'database/db_connect.php';

$success = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    // Handle image upload
    if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === 0) {
        $targetDir = "./team/";
        $fileName = basename($_FILES["profile_img"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allow only certain file types
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $targetFilePath)) {
                $fileToSave = basename($targetFilePath);

                // Insert into database
                $stmt = $conn->prepare("INSERT INTO team_profile (name, position, profile_img, phoneNo, email, description) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $position, $fileToSave, $phoneNo, $email, $description);

                if ($stmt->execute()) {
                    $success = "New team member added successfully!";
                } else {
                    $error = "Database error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $error = "Failed to upload image.";
            }
        } else {
            $error = "Only JPG, PNG, and GIF files are allowed.";
        }
    } else {
        $error = "Please select a profile image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Team Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">

<div class="max-w-xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-blue-800 text-center">Add Leadership Team Member</h2>

    <?php if ($success): ?>
        <p class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4"><?php echo $success; ?></p>
    <?php elseif ($error): ?>
        <p class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block font-semibold mb-1">Full Name</label>
            <input type="text" name="name" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Position</label>
            <input type="text" name="position" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Phone Number</label>
            <input type="text" name="phoneNo" class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Email Address</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="4" required class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Profile Image</label>
            <input type="file" name="profile_img" accept="image/*" required class="w-full" />
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900">Add Member</button>
        </div>
    </form>
</div>

</body>
</html>
