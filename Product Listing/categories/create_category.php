<?php
// Include functions and header
include('../includes/functions.php');
// include('../themes/header.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from form
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $default_image = $_POST['default_image'];

    // Insert the new category
    insertCategory($name, $slug, $default_image) ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <!-- Add any CSS or JS files here -->
</head>

<body>
    <h1>Add Category</h1>

    <!-- Form to add a new category -->
    <form action="create_category.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="slug">Slug:</label>
        <input type="text" id="slug" name="slug" ><br>

        <label for="default_image">Default Image:</label>
        <input type="file" id="default_image" name="default_image" ><br>

        <button name="BtnInsert">Add Category</button>
    </form>

    <!-- Include footer -->
    <!-- <?php include('../themes/footer.php'); ?> -->
</body>

</html>
