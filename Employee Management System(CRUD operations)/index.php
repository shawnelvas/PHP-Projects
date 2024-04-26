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
</head>

<body>
    <?php include ('./theme/header.php'); ?>
    <div class="container-fluid">
        <h1><em class="fa fa-check-circle"></em> Welcome to Admin Page</h1>
        <table class="table datatable">
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
                        <td class="text-right">
                            <a href="update.php?id=<?php echo $employee['id']; ?>"><i class="fa-solid fa-square-pen" style="color: #74C0FC;"></i>Update</a>
                            <a href="delete.php?id=<?php echo $employee['id']; ?>"><i class="fa-solid fa-trash" style="color: #e30000;"></i>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include ('theme/footer-scripts.php'); ?>
</body>

</html>