<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
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
    
    <title>Dashboard</title>
</head>
<body>
<form method="POST" action="addProcess.php">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #ececec">
        DeskStock
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add Item</h3>
            <p class="text-muted">Complete the form below to add a new item</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action=" " method="post" style="width:50vw; min-width: 300px;">
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Stabilo Crayon">
                </div>

                <div class="mb-3">
                    <label class="form-label">Vendor:</label>
                    <input type="vendor" class="form-control" name="vendor" placeholder="Stabilo.Sdn.Bhd">
                </div>

            <div class="mb-3">
                <label class="form-label">Total Price:</label>
                <input type="price" class="form-control" name="price" placeholder="0.00">       
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity:</label>
                <input type="quantity" class="form-control" name="quantity" placeholder="0">       
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <button type="cancel" class="btn btn-danger" name="cancel">Cancel</button>
                <!--<a href=index.php" class ="btn btn-danger">Cancel</a>-->

            </div>

        </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>