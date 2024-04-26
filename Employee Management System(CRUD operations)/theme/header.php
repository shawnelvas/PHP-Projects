<?php  
//     if(!isset($_SESSION['user'])):
//         header('Location: /login');
//         exit();
//     endif;
// ?>
<?php
    // $loggedInUser = selectSingleUser($_SESSION['user']['id']);
    // $welcome = 'Welcome, '.$loggedInUser['fname']. ' '.$loggedInUser['lname'].' (<a href="/logout">Logout</a>)';
  include("header-scripts.php");
  include("footer-scripts.php");

?>
   
<div class="card">
<div class="card-body">
<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                [logo]
            </div>
            <div class="col-md-6 text-right">
                <nav>
                   <a href="/crud1/index.php"><i class="fa-solid fa-house-user"></i>Dashboard</a></li>
                        
                        <!-- <li><a href="/crud1/create.php"><i class="fa-solid fa-pen " style="color: #63e6be;"></i>Create New User</a></li> -->
                        <!-- <li><a href="/users">Users</a></li>                  -->
                      

                 
                </nav>
            </div>
        </div>
    </div>
</header>