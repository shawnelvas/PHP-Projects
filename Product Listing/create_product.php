<?php
// Include the functions file
include 'includes/functions.php';

// Handle form submission for adding a new product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $regular_price = $_POST['regular_price'];
    $sale_price = $_POST['sale_price'];
    $stock_qty = $_POST['stock_qty'];
    $featured_image = $_POST['featured_image'];
    $category_id = $_POST['category_id'];

    // Call the addProduct function to add the new product
    $success = insertProduct($name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id);

    // Check if product was successfully added
    if ($success) {
        // Redirect to product list page after successful creation
        header('Location: /ecom/index.php');
        exit();
    } else {
        echo "Failed to add product.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Include any CSS or JavaScript files if needed -->
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" required><br>

        <label for="regular_price">Regular Price:</label>
        <input type="number" id="regular_price" name="regular_price" step="0.01" required><br>

        <label for="sale_price">Sale Price:</label>
        <input type="number" id="sale_price" name="sale_price" step="0.01"><br>

        <label for="stock_qty">Stock Qty:</label>
        <input type="number" id="stock_qty" name="stock_qty" required><br>

        <label for="featured_image">Featured Image URL:</label>
        <input type="text" id="featured_image" name="featured_image"><br>

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <!-- Populate the select options dynamically from the database -->
            <?php
            $categories = getAllCategories();
            foreach ($categories as $category) {
                echo "<option value=\"{$category['id']}\">{$category['name']}</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
