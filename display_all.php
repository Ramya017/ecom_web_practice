<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopup</title>

    <!-- stylsheet link -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-4 ">
        <div class="container-fluid">

            <img src="./images/logo-white.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    
                    
                    <?php
                    if(isset($_SESSION['username'])){
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                    }else{
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_registration.php'>Resgister</a>
                        </li>";
                    }
                    ?>


                    <li class="nav-item">
                        <a class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();  ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Total price:  <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value = "search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>
    <!-- navbar ends -->


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
            echo"<a href='./users_area/logout.php' class='btn btn-primary ms-3'>Logout</a>";
        }
        ?>
    </ul>    
</nav>
<!-- second navbar end-->



<!-- Products and side bar-->
<div class="row me-2 ms-2">
    <!-- products container -->
    <div class="col-md-10">
        <div class="row">

        <!-- fetching products -->
        <?php
        //calling function
        get_all_products();
         get_unique_categories();
         get_unique_brands();
        ?>
        
        </div>
        <!-- col end -->
    </div>
    
     

    <!-- side nav-bar container -->
    <div class="col-md-2 bg-dark p-0">
        <!-- brands -->
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-primary">
            <a href="#" class="nav-link text-light"><h5>Integrated brands</h5></a>
        </li>

    <?php
     getbrands();
    ?>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link text-light">Harry Winston</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Nayka</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">DigiShop</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Mesho</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Petio</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Max</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Nike</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Safari</a>
        </li> -->
       </ul>


       <!-- categories -->
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-primary">
            <a href="#" class="nav-link text-light"><h5>Categories</h5></a>
        </li>

        <?php
           getcategories();
        ?>

        <!-- <li class="nav-item">
            <a href="#" class="nav-link text-light">Clothing</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Kids wear</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Makeup</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Sports and travel</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Electronics</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-light">Pet items</a>
        </li> -->
       </ul>
    </div>
</div>
<!-- Products and side bar -->

<!-- divider -->
<div></div>

<!-- footer link -->
<?php 
include('./includes/footer.php');
?> 


    <!-- Bootstrap js link -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</body>

</html>