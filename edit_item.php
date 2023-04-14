<?php
    require_once "config.php";
    $item_id = $_GET['id'];
    $query = "SELECT * FROM items WHERE id='$item_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item - Stationary Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-4JG7x6HLgU6JrCj21Zd6mLOU1ufFLRcwGiJhPnDj6E7fkPnlfJX9ohEG1ukE5A5j+JhMrn1mGk/5voa+5o/8YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="add_item.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="text">
                <p>Edit Item</p>
            </div>
            <hr>
            <form action="process_edit_item.php?id=<?php echo $row['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="" disabled>Select a category</option>
                        <option value="Office Supplies" <?php if ($row['category'] == 'Office Supplies') echo 'selected'; ?>>Office Supplies</option>
                        <option value="Writing Instruments" <?php if ($row['category'] == 'Writing Instruments') echo 'selected'; ?>>Writing Instruments</option>
                        <option value="Paper Products" <?php if ($row['category'] == 'Paper Products') echo 'selected'; ?>>Paper Products</option>
                        <option value="Filing and Storage" <?php if ($row['category'] == 'Filing and Storage') echo 'selected'; ?>>Filing and Storage</option>
                        <option value="Desk Accessories" <?php if ($row['category'] == 'Desk Accessories') echo 'selected'; ?>>Desk Accessories</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
