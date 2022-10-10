<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile page</title>

    <!-- stylsheet link -->
    <link rel="stylesheet" href="../style.css">

    <!-- Bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            body{
                overflow-X:hidden;

            }
            .profile_img{
               width: 90%;
               margin:auto;
               display:block;
               height:100%;
               object-fit:contain;
            }
            .edit_img{
                width:100px;
                height:100px;
                object-fit:contain;
            }
            
        </style>
</head>

<body>

    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-4 ">
        <div class="container-fluid">

            <img src="../images/logo-white.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"> My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();  ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Total price:  <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value = "search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar ends -->

<!-- calling cart function -->
<?php
cart();
?>

<!-- second navbar start-->
<nav class="navbar navbar-expand-lg mb-2 shadow rounded" style="background-color: #e3f2fd;">
<ul class="navbar-nav me-auto">
    <!-- <a href="user_registration.php" class="btn btn-primary ">Resgister</a> -->
        <?php
        if(!isset($_SESSION['username'])){
           echo"<li class='nav-item ms-3 bg-success'><a href='#' class='nav-link text-white'>
           Hello, there</a></li>";
        }else{
          echo"<li class='nav-item ms-3 bg-success'><a href='#' class='nav-link text-white'>
          Hello ".$_SESSION['username']."</a></li>";
        } 


        if(!isset($_SESSION['username'])){
            echo"<a href='./users_area/user_login.php' class='btn btn-primary ms-3'>Login</a>";
        }else{
            echo"<a href='logout.php' class='btn btn-primary ms-3'>Logout</a>";
        }
        ?>
    </ul>    
</nav>
<!-- second navbar end-->


<!-- forth-child -->
<div class="row mx-2">
    <div class="col-md-2 mt-3">
        <ul class="navbar-nav bg-secondary text-center">
        <li class="nav-item bg-primary">
            <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
        </li>
 
        <?php
        $username = $_SESSION['username'];
        $user_image = "Select * from `user_table` where username='$username'";
        $result_image= mysqli_query($con, $user_image);
        $row_image = mysqli_fetch_array($result_image);
        $user_image= $row_image['user_image'];
        echo "<li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4'>
        </li>";

        ?>

    
        <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
            include('delete_account.php');
        }
        ?>
    </div>
</div>


<!-- footer link -->
<?php 
include('../includes/footer.php');
?> 


    <!-- Bootstrap js link -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</body>

</html>