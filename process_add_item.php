<?php
// Include database configuration file
include_once 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $item_name = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute SQL query
    $sql = "INSERT INTO items (item_name, category, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $item_name, $category, $quantity);
    $stmt->execute();

    // Check if query was successful and redirect to dashboard
    if ($stmt->affected_rows > 0) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Error adding item to database.';
    }
}

// Close database connection
$conn->close();
?>
