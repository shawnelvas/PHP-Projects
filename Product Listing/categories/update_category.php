<?php
// Include the functions file for database operations and utility functions
include('../includes/functions.php');

// Check if the update button has been clicked
if (isset($_POST['btnUpdate'])) {
    // Get the form data
    $categoryId = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $default_image = $_POST['default_image'];

    // Update the category using the function from the functions file
    $updateSuccess = updateCategory($categoryId, $name, $slug, $default_image);

    // Redirect to the categories index page if the update was successful
    if ($updateSuccess) {
        header('Location: /ecom/categories/index.php');
        exit();
    }
}

// Fetch the category details to populate the form fields
$category = (isset($_GET['id'])) ? getCategoryById($_GET['id']) : false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <!-- <?php include('../theme/header-scripts.php'); ?> -->
</head>

<!-- <body>
    <?php include('../theme/header.php'); ?> -->
    <div class="container">
        <h1>Update Category</h1>

        <!-- Form for updating a category -->
        <form action="" method="post" class="form">
            <!-- Hidden input field for the category ID -->
            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">

            <!-- Category Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $category['name']; ?>" required>
            </div>

            <!-- Category Slug -->
            <div class="mb-3">
                <label for="slug" class="form-label">Category Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="<?php echo $category['slug']; ?>">
            </div>

            <!-- Default Image -->
            <div class="mb-3">
                <label for="default_image" class="form-label">Default Image URL</label>
                <input type="text" name="default_image" id="default_image" class="form-control" value="<?php echo $category['default_image']; ?>" >
            </div>

            <!-- Update Button -->
            <button type="submit" name="btnUpdate" class="btn btn-primary">Update Category</button>
        </form>
    </div>
    <!-- <?php include('../theme/footer-scripts.php'); ?> -->
</body>

</html>
