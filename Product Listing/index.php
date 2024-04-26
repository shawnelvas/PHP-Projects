<?php
// Include database configuration and functions file
include './includes/functions.php';
$products = getAllProducts();
// Include header scripts and DataTables CSS
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <!-- Include Bootstrap and DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Product Management</h1>

        <!-- Add a button to create a new product -->
        <div class="mb-3">
            <a href="create_product.php" class="btn btn-primary">Add New Product</a>
        </div>

        <!-- Table to list products -->
        <table id="productTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Regular Price</th>
                    <th>Sale Price</th>
                    <th>Stock Qty</th>
                    <th>category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['NAME']) ?></td>
                        <td><?= htmlspecialchars($product['sku']) ?></td>
                        <td><?= htmlspecialchars($product['regular_price']) ?></td>
                        <td><?= htmlspecialchars($product['sale_price']) ?></td>
                        <td><?= htmlspecialchars($product['stock_qty']) ?></td>
                        <td><?= htmlspecialchars($product['category_id']) ?></td>
                        <td>
                            <a href="update_product.php?id=<?php echo htmlspecialchars($product['id']); ?>">Edit</a>
                            <a href="delete_product.php?id=<?php echo htmlspecialchars($product['id']); ?>"
                                onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <!-- Include JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function () {
            $('#productTable').DataTable();


        });
    </script>
</body>

</html>