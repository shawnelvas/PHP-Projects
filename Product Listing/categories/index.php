<?php
// Include functions and header
include ('../includes/functions.php');
// include('../themes/header.php');

// Fetch all categories
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <!-- Add any CSS or JS files here -->
    <!-- Include Bootstrap and DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="container-fluid">
    <h1>Category Management</h1>

    <!-- Button to add a new category -->
    <div class="mb-3">
    <a href="create_category.php"  class="btn btn-primary">Add New Category</a>
    </div>
    <!-- Table to list all categories -->
    <table id="categoryTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Default Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['id']); ?></td>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td><?php echo htmlspecialchars($category['slug']); ?></td>
                    <td><?php echo htmlspecialchars($category['default_image']); ?></td>
                    <td>
                        <a href="update_category.php?id=<?php echo htmlspecialchars($category['id']); ?>">Edit</a>
                        <a href="delete_category.php?id=<?php echo htmlspecialchars($category['id']); ?>"
                            onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
      $(document).ready(function() {
            $('#categoryTable').DataTable();

            // Add event listener to category filter dropdown
            $('#categoryFilter').on('change', function() {
                var categoryId = $(this).val();
                // Reload the DataTable with the new filter
                $('#productTable').DataTable().ajax.reload();
            });
        });
    </script>

    <!-- Include footer -->
    <!-- <?php include ('../themes/footer.php'); ?> -->
</body>

</html>