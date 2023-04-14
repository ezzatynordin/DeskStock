<?php
    session_start();
    require_once('config.php');

    // Redirect to login page if user is not logged in
    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }

    // Retrieve all stationary items from the database
    $query = "SELECT * FROM stationary";
    $result = sqlsrv_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Stationary CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h2>Stationary List</h2>
        <a href="add_item.php" class="btn btn-primary mb-3">Add Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = sqlsrv_fetch_array($result)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="edit_item.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm me-2">Edit</a>
                            <a href="delete_item.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
