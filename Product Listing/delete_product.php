<?php
// Include the functions file
include('includes/functions.php');

// Check if an ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the product ID from the URL
    $productId = $_GET['id'];

    // Call the deleteProduct function to delete the product
    $deleteSuccess = deleteProduct($productId);

    // Check if the deletion was successful
    if ($deleteSuccess) {
        // Redirect to the product list page after successful deletion
        header('Location: /ecom/index.php');
    } else {
        // Handle the case where deletion failed (e.g., product not found)
        echo "Failed to delete the product. The product may not exist.";
    }
} else {
    // If no ID is provided, redirect or handle the case appropriately
    header('Location: /ecom/index.php');
}

// Ensure the script exits after redirection or displaying a message
exit();
?>
