<?php
session_start();
include('db_connection.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "You must be logged in to save a flipbook.";
        exit;
    }

    $userId = $_SESSION['user_id'];
    $flipbookName = $_POST['flipbookName'] ?? 'Unnamed Flipbook';
    $flipbookData = $_POST['flipbookData'] ?? '';

    if (empty($flipbookData)) {
        echo "No flipbook data provided.";
        exit;
    }

    // Save flipbook data as a JSON file
    $uploadDir = 'uploads/flipbooks/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . uniqid() . '.json';
    file_put_contents($filePath, $flipbookData);

    // Save flipbook info to the database
    $stmt = $conn->prepare("INSERT INTO flipbooks (user_id, flipbook_name, flipbook_path) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $flipbookName, $filePath);

    if ($stmt->execute()) {
        echo "Flipbook saved successfully!";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error saving flipbook: " . $stmt->error;
    }
}
?>
