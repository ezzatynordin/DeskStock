<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Delete item if the item_id is set in the URL
if(isset($_GET["item_id"])){
    // Prepare a delete statement
    $sql = "DELETE FROM inventory WHERE item_id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_item_id);

        // Set parameters
        $param_item_id = trim($_GET["item_id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Item deleted successfully. Redirect to dashboard
            header("location: dashboard.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Item id not provided. Redirect to dashboard
    header("location: dashboard.php");
    exit();
}
?>
