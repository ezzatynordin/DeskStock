<?php
include "config.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $vendor = $_POST['vendor'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE Products SET product_name = ?, vendor = ?, price = ?, quantity = ? WHERE product_id = ?";
    $params = array($product_name, $vendor, $price, $quantity, $id);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("location: dashboard.php");
        exit();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM Products WHERE product_id = ?";
    $params = array($id);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        $row = sqlsrv_fetch_array($stmt);
        $product_name = $row['product_name'];
        $vendor = $row['vendor'];
        $price = $row['price'];
        $quantity = $row['quantity'];
    }
} else {
    header("location: login.php");
    exit();
}

?>

?>

<script>
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Product</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-less dark" style="background-color: #ececec">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DeskStock</a>
            <form class="d-flex" method="POST" action="logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container d-flex justify-content-center">
            <form action=" " method="post" style="width:50vw; min-width: 300px;">
            <div class="row">
    <div class="container mt-5">
        <h2 class="mb-4">Edit Product</h2>
        <form method="POST" action="">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="product_name">Product Name</label>

                <div class="mb-3">
                <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product_name; ?>">
            </div>
                
                <div class="mb-3">
                    <label for="vendor">Vendor</label>
                    <input type="text" class="form-control" name="vendor" id="vendor" value="<?php echo $vendor; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $price; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
                </div>
                
                <button type="update" name="update" class="btn btn-primary">Update</button>
                <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>