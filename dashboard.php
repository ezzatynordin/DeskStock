<?php
include "config.php";
$sql = "SELECT * FROM Products";
$result = sqlsrv_query($conn,$sql,array(),array("Scrollable" => SQLSRV_CURSOR_KEYSET));
?>

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
<!--<form method="POST" action="dashboardProcess.php">-->
    <nav class="navbar navbar-expand-lg navbar-light bg-less dark" style="background-color: #ececec">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DeskStock</a>
            <form class="d-flex" method="POST" action="logout.php">
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container mt-5">
    <div class="container">
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
        <table class="table table-hover text-center">      
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Vendor</th>
      <th scope="col">Total Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(sqlsrv_num_rows($result)>0){
  
      $i = 1;
      while($row = sqlsrv_fetch_array($result)){
        
    ?>
    <tr>
        <th><?php echo $i; ?></th>
        <th scope="row"><?php echo $row['product_id']; ?></th>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['vendor']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['product_id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
            <a href="delete.php?id=<?php echo $row['product_id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
</tr>
<?php $i++; }
    }
    else{
      if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
    }
    ?>

  </tbody>
</table>

    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--</form>-->
</body>
</html>