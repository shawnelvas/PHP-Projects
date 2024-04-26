<?php
// Include the database configuration file
include 'db_config.php';


/* format arrays */
function formatcode($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// Function to fetch all products from the database
function getAllProducts()
{
    global $mysqli; // Use the MySQLi connection object
    $data = array();
    $query = "SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id";
    $result = $mysqli->query($query);

    // Fetch all products as an associative array
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Function to fetch a single product by ID
function getProductById($productId = NULL)
{
    global $mysqli; // Use the MySQLi connection object
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the product as an associative array
    $product = $result->fetch_assoc();
    $stmt->close();
    return $product;
}

// Function to update product details
function updateProduct($productId, $name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id)
{
    global $mysqli; // Use the MySQLi connection object

    // Prepare the SQL query
    $query = "UPDATE products SET name = ?, sku = ?, regular_price = ?, sale_price = ?, stock_qty = ?, featured_image = ?, category_id = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssddissi", $name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id, $productId);
    // Execute the query
    $stmt->execute();
    $affectedRows = $stmt->affected_rows;

    // Close the statement
    $stmt->close();

    // Redirect to the products index page
    header('Location: /ecom/index.php');
    exit();
}

// Function to delete a product by ID
function deleteProduct($productId)
{
    global $mysqli; // Use the MySQLi connection object
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();

    // Check if any rows were affected (i.e., the deletion was successful)
    if ($stmt->affected_rows > 0) {
        // Redirect to the product index page after successful deletion
        header('Location: /ecom/index.php');
    } else {
        // If the deletion was not successful, handle the error (e.g., display a message)
        echo "Failed to delete product. Please try again.";
    }

    // Close the prepared statement
    $stmt->close();

    // End the script
    exit();


}

// Function to insert a new product into the database
function insertProduct($name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id)
{
    global $mysqli; // Use the MySQLi connection object

    $query = "INSERT INTO products (name, sku, regular_price, sale_price, stock_qty, featured_image, category_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    // $stmt->bind_param("ssdiss", $name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id);
    $stmt->bind_param("ssddiss", $name, $sku, $regular_price, $sale_price, $stock_qty, $featured_image, $category_id);

    // Execute the query and check if insertion was successful
    $stmt->execute();
    $stmt->close();
    header('Location: /ecom/index.php');
    exit();
}

// Function to fetch products by category
function getProductsByCategory($categoryId)
{
    global $mysqli; // Use the MySQLi connection object
    $query = "SELECT * FROM products WHERE category_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all products as an associative array
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

// Category CRUD Functions

// Function to fetch all categories from the database
function getAllCategories()
{
    global $mysqli;
    $query = "SELECT * FROM categories";
    $result = $mysqli->query($query);

    // Fetch all categories as an associative array
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}

// Function to fetch a single category by ID
function getCategoryById($categoryId = NULL)
{
    global $mysqli;
    $query = "SELECT * FROM categories WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the category as an associative array
    $category = $result->fetch_assoc();
    $stmt->close();
    return $category;
}

// Function to insert a new category
function insertCategory($name, $slug, $default_image)
{
    global $mysqli;
    $query = "INSERT INTO categories (name, slug, default_image) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $name, $slug, $default_image);

    // Execute the query and check if the insertion was successful
    $stmt->execute();
    // Close the statement
    $stmt->close();

    // Redirect to the categories index page
    header('Location: /ecom/categories/index.php');
    exit();
}

// Function to update a category
function updateCategory($categoryId, $name, $slug, $default_image)
{
    global $mysqli;
    $query = "UPDATE categories SET name = ?, slug = ?, default_image = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssi", $name, $slug, $default_image, $categoryId);

    // Execute the query and check if the update was successful
    $stmt->execute();
    // Close the statement
    $stmt->close();

    // Redirect to the categories index page
    header('Location: /ecom/categories/index.php');
    exit();
}

// Function to delete a category
function deleteCategory($categoryId)
{
    global $mysqli;
    $query = "DELETE FROM categories WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $categoryId);

    // Execute the query
    $stmt->execute();

    // Close the statement
    $stmt->close();

    // Redirect to the categories index page
    header('Location: /ecom/categories/index.php');
    exit();
}

?>