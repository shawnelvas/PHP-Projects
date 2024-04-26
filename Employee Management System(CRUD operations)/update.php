<?php
    include('includes/functions.php');
  
    if (isset($_POST['btnUpdate'])) :
        update($_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['id']);
    endif;

    
$user = (isset($_GET['id'])) ? selectsingle($_GET['id']) : false;
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Update</title>
    <?php include('theme/header-scripts.php'); ?>
</head>
<body>
    <?php include('theme/header.php'); ?>
    <div class="container-fluid">
     
            <h1><em class="fa fa-pen-square"></em> Update</h1>
            <form action="" method="post" class="form">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['fname']; ?>">
                        <br>
                    </div>
                    <div class="col-md-6">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['lname']; ?>">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control phone" value="<?php echo $user['phone']; ?>">
                        <br>
                    </div>
                </div>
                <button name="btnUpdate" class="btn btn-primary">Update Record</button>
            </form>   
    
    </div>
    <?php include('theme/footer-scripts.php'); ?>
</body>
</html>