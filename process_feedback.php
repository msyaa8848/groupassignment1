<?php
// process_feedback.php

// 1. Database connection (update credentials accordingly)
$host = 'localhost:3306';
$dbname = 'webprojectgroup';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 2. Form data handling
$feedbackType = $_POST['feedbackType'] ?? '';
$feedback = $_POST['feedback'] ?? '';
$rating = $_POST['rating'] ?? '';
$isAnonymous = isset($_POST['anonymous']) ? 1 : 0;

// 3. Basic validation
$errors = [];

if (empty($feedbackType)) $errors[] = "Feedback type is required.";
if (empty($feedback)) $errors[] = "Feedback message is required.";
if (!is_numeric($rating) || $rating < 1 || $rating > 5) $errors[] = "Rating must be between 1 and 5.";

if ($errors) {
    echo "<h2>Error:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><a href='feedback.php'>Go back</a>";
    exit;
}

// 4. Insert into DB
$sql = "INSERT INTO feedback (feedback_type, feedback, rating, is_anonymous) 
        VALUES (:feedback_type, :feedback, :rating, :is_anonymous)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':feedback_type' => $feedbackType,
    ':feedback' => $feedback,
    ':rating' => $rating,
    ':is_anonymous' => $isAnonymous
]);

// 5. Success message
echo "<h2>Thank you for your feedback!</h2>";
echo "<p><a href='feedback.php'>Back to Feedback Page</a></p>";
?>
