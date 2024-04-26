<?php
include ('includes/functions.php');
$allEmployees = selectAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include ('./theme/header-scripts.php'); ?>
    <!-- Include Bootstrap and DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <?php include ('./theme/header.php'); ?>
    <div class="container-fluid">
        <h1><em class="fa fa-check-circle"></em> Welcome to Admin Page</h1>
        <div class="mb-3">
        <a href="/crud1/create.php" class="btn btn-primary" ></i>Create New User</a>
        </div>
        <table class="table datatable" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($allEmployees as $employee): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['id']); ?></td>
                        <td><?php echo htmlspecialchars($employee['fname']); ?></td>
                        <td><?php echo htmlspecialchars($employee['lname']); ?></td>
                        <td><?php echo htmlspecialchars($employee['phone']); ?></td>
                        <!-- <td>
                            <a class="btn-primary" href="update.php?id=<?php echo $employee['id']; ?>" >Update</a>
                            |
                            <a href="delete.php?id=<?php echo $employee['id']; ?> ">Delete</a>
                        </td> -->

                        <td>
    <a class="btn btn-primary" href="update.php?id=<?= htmlspecialchars($employee['id']) ?>">Update</a>
    <a class="btn btn-danger" href="delete.php?id=<?= htmlspecialchars($employee['id']) ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include ('theme/footer-scripts.php'); ?>
      <!-- Include JavaScript libraries -->
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->

    <!-- Initialize DataTables -->
    <!-- <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
        </script> -->
</body>

</html>