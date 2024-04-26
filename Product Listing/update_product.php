<?php
// Include functions file
include './includes/functions.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $productId = $_POST['id'];
    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $regular_price = $_POST['regular_price'];
    $sale_price = $_POST['sale_price'];
    $stock_qty = $_POST['stock_qty'];
    $category_id = $_POST['category_id'];
    
    // Check if a new image has been uploaded
    if (!empty($_FILES['featured_image']['name'])) {
        $featured_image = $_FILES['featured_image']['name'];
        move_uploaded_file($_FILES['featured_image']['tmp_name'], 'images/' . $featured_image);
    } else {
        // If no new image is uploaded, use the existing image
        $product = getProductById($productId);
        $featured_image = $product['featured_image'];
    }

    // Call the updateProduct function from functions.php to update the product
    if (updateProduct($productId, $name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id)) {
        echo "Product updated successfully!";
        
    } else {
        echo "Failed to update product.";
    }

    header( 'Location :  /ecom/index.php ');
}

// Get the product ID from the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Fetch the product details using the getProductById function
    $product = getProductById($productId);

    if ($product) {
        // Display the form for updating the product
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Update Product</title>
        </head>
        <body>
            <h1>Update Product</h1>

            <!-- Form to update the product -->
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($product['NAME']); ?>" required><br>

                <label for="sku">SKU:</label>
                <input type="text" name="sku" id="sku" value="<?php echo htmlspecialchars($product['sku']); ?>" required><br>

                <label for="regular_price">Regular Price:</label>
                <input type="number" step="0.01" name="regular_price" id="regular_price" value="<?php echo htmlspecialchars($product['regular_price']); ?>" required><br>

                <label for="sale_price">Sale Price:</label>
                <input type="number" step="0.01" name="sale_price" id="sale_price" value="<?php echo htmlspecialchars($product['sale_price']); ?>"><br>

                <label for="stock_qty">Stock Quantity:</label>
                <input type="number" name="stock_qty" id="stock_qty" value="<?php echo htmlspecialchars($product['stock_qty']); ?>" required><br>

                <label for="featured_image">Featured Image:</label>
                <input type="file" name="featured_image" id="featured_image"><br>
                <p>Current Image: <?php echo htmlspecialchars($product['featured_image']); ?></p>

                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" required>
                    <?php
                    // Fetch categories from the database and populate the dropdown
                    $categories = getAllCategories();
                    foreach ($categories as $category) {
                        $selected = $category['id'] === $product['category_id'] ? 'selected' : '';
                        echo "<option value='{$category['id']}' {$selected}>{$category['name']}</option>";
                    }
                    ?>
                </select><br>

                <button type="submit">Update Product</button>
            </form>
        </body>
        </html>
        
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product ID provided.";
}
?>
