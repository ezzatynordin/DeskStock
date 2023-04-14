<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="add_item.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <title>DeskStock</title>
</head>
<body>
        <div class= "wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-15 center">
                        <div class="input-box">
                            <header>Add Item </header>
                            <form action="process_add_item.php" method="POST">
                                <div class="input field"> 
                                    <input type="text" class="form-control" id="item_name" name="item_name" required>
                                    <label for="item_name" class="form-label">Item Name</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

