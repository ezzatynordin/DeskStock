<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - Stationary Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-4JG7x6HLgU6JrCj21Zd6mLOU1ufFLRcwGiJhPnDj6E7fkPnlfJX9ohEG1ukE5A5j+JhMrn1mGk/5voa+5o/8YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="add_item.css">
</head>
<body>
    <div class="wrapper">
        <div class="container main">
        <div class="row">
            <div class="col-md
            <div class="text">
                <p>Add New Item</p>
</div>
                <hr>
                <form action="process_add_item.php" method="POST">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="Office Supplies">Office Supplies</option>
                            <option value="Writing Instruments">Writing Instruments</option>
                            <option value="Paper Products">Paper Products</option>
                            <option value="Filing and Storage">Filing and Storage</option>
                            <option value="Desk Accessories">Desk Accessories</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Item</button>
                    <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
