<?php 
    // start session
    session_start();
    // check if user is logged in
    if(!isset($_SESSION["email"])){
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory</title>
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inventory Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inventory</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" method="POST" action="logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3>Inventory Items</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Vendor</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // connect to database
                            $serverName = "F1-LAPTOP-MPC\SQLEXPRESS";
                            $connectionInfo = array("Database" => "deskStock");
                            $conn = sqlsrv_connect($serverName, $connectionInfo);
                
                            if($conn){
                                // query inventory items
                                $sql = "SELECT * FROM Products";
                                $stmt = sqlsrv_query($conn, $sql);
                                if($stmt){
                                    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                                        echo "<tr>";
                                        echo "<td>" . $row["product_name"] . "</td>";
                                        echo "<td>" . $row["vendor"] . "</td>";
                                        echo "<td>" . $row["quantity"] . "</td>";
                                        echo "<td>" . $row["price"] . "</td>";

                                        echo "</tr>";
                                    }
                                }else{
                                    echo "Error retrieving data from database.";
                                }
                                // close connection
                                sqlsrv_close($conn);
                            }else{
                                echo "Error connecting to database.";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
