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
    <title>Admin Dashboard</title>
     <!-- stylsheet link -->
     <link rel="stylesheet" href="../style.css">

     <style>
        body{
            overflow-x:hidden;
        }
        .product_img{
            width:100px;
            object-fit:contain;
        }
     </style>

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
    <div class="container-fluid p-0">
    <!-- Admin navbar start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-4 ">
        <div class="container-fluid">
            <img src="../images/logo-white.png" alt="logo" class="logo ms-2">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
    <?php
        if(!isset($_SESSION['admin_name'])){
           echo"<li class='nav-item bg-warning'><a href='#' class='nav-link text-black'>
           Hello, there</a></li>";
        }else{
          echo"<li class='nav-item bg-warning'><a href='#' class='nav-link text-black'>
          Hello ".$_SESSION['admin_name']."</a></li>";
        } 


        if(!isset($_SESSION['admin_name'])){
            echo"<a href='admin_login.php' class='btn btn-warning me-5 ms-3'>Login</a>";
        }else{
            echo"<a href='admin_logout.php' class='btn btn-warning me-5 ms-3'>Logout</a>";
        }
    ?> 
                </ul>
            </nav>
        </div>
    </nav>


    <!-- second container start -->
    <div class="bg-light">
        <h3 class="text-center p-3 ">Manage Details</h3>
    </div>

     <!-- third container start -->
     <div class="row">
        <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/admin4.png" class="adminlogo ms-5"></a>
                <p class="text-light text-center my-3 ms-5">Admin Name</p>
            </div>
            <div class="button text-center p-3">
                <a class="btn btn-warning ms-2" href = "insert_product.php" role = "button">Insert Products</a> 

                <a class="btn btn-warning ms-2" href = "index.php?view_products" role = "button">View Products</a>

                <a class="btn btn-warning ms-2" href = "index.php?insert_category" role = "button">Insert Categories</a>

                <a class="btn btn-warning ms-2" href = "index.php?view_categories" role = "button">View Categories</a>

                <a class="btn btn-warning ms-2" href = "index.php?insert_brand" role = "button">Insert Brands</a>

                <a class="btn btn-warning ms-2" href = "index.php?view_brands" role = "button">View Brands</a>

                <a class="btn btn-warning ms-2" href = "index.php?list_orders" role = "button">All Orders</a>

                <a class="btn btn-warning ms-2 "  href = "index.php?list_payments" role = "button">All Payments</a> <br>

                <a class="btn btn-warning ms-2 mt-2" href = "index.php?list_users" role = "button">List Users</a>
                
            </div>
        </div>
     </div>

     <!-- Forth container -->
   <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include("insert_categories.php");
        }
        if(isset($_GET['insert_brand'])){
            include("insert_brands.php");
        }
        if(isset($_GET['view_products'])){
            include("view_products.php");
        }
        if(isset($_GET['edit_products'])){
            include("edit_products.php");
        }
        if(isset($_GET['delete_product'])){
            include("delete_product.php");
        }
        if(isset($_GET['view_categories'])){
            include("view_categories.php");
        }
        if(isset($_GET['view_brands'])){
            include("view_brands.php");
        }
        if(isset($_GET['edit_category'])){
            include("edit_category.php");
        }
        if(isset($_GET['edit_brands'])){
            include("edit_brands.php");
        }
        if(isset($_GET['delete_category'])){
            include("delete_category.php");
        }
        if(isset($_GET['delete_brands'])){
            include("delete_brands.php");
        }
        if(isset($_GET['list_orders'])){
            include("list_orders.php");
        }
        if(isset($_GET['delete_order'])){
            include("delete_order.php");
        }
        if(isset($_GET['list_payments'])){
            include("list_payments.php");
        }
        if(isset($_GET['delete_paymentrecord'])){
            include("delete_paymentrecord.php");
        }
        if(isset($_GET['list_users'])){
            include("list_users.php");
        }
        if(isset($_GET['delete_user'])){
            include("delete_user.php");
        }

        ?>
   </div>

</div>



<!-- Bootstrap js link --> <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
crossorigin="anonymous"></script>

</body>
</html>