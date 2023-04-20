<?php
include "config.php";

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    
    // Delete product from database
    $sql = "DELETE FROM Products WHERE product_id=?";
    $params = array($id);
    $result = sqlsrv_query($conn, $sql, $params);
    
    if($result){
        // Product deleted successfully, redirect to dashboard
        header("Location: dashboard.php");
    } else {
        // Error deleting product
        echo "Error deleting product.";
    }
} else {
    // Invalid product ID
    echo "Invalid product ID.";
}
?>
