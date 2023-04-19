<?php
// Include database configuration here
include 'config.php';

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $productName = $_POST['product_name'];
    $vendor = $_POST['vendor'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Insert data into database
    $sql = "INSERT INTO Products (product_name, vendor, price, quantity) VALUES (?, ?, ?, ?)";
    $params = array($productName, $vendor, $price, $quantity);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Redirect to index page after adding item
    header('Location: dashboard.php');
    exit();
} else if (isset($_POST['cancel'])) {
    // Redirect to index page if cancel button is clicked
    header('Location: dashboard.php');
    exit();
}

// Close the database connection
sqlsrv_close($conn);
?>
