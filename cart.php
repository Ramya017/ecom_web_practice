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
    <title>Cart details</title>

    <!-- stylsheet link -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
       width: 100px;
      height: 100px;
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
                </ul>
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
            echo"<a href='./users_area/logout.php' class='btn btn-primary ms-3'>Logout</a>";
        }
        ?>
    </ul>    
</nav>
<!-- second navbar end-->

<!-- cart table start -->
<div class="container mt-5">
    <div class="row">
        <form action="" method="post" class="ms-4">
        <table class="tabel table-bordered text-center">
            
                <!-- php code to display dynamic data -->
                <?php
                $get_ip_add = getIPAddress();
                $total_price = 0;
                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);

                if($result_count > 0){
                  echo " <thead>
                  <tr>
                      <th class='p-2'>Product Title</th>
                      <th class='p-2'>Product Image</th>
                      <th class='p-2'>Quantity</th>
                      <th class='p-2'>Total Price</th>
                      <th class='p-2'>Remove</th>
                      <th colspan='2' class='p-2'>Operations</th>
                  </tr>
              </thead>
              <tbody>";

                while($row = mysqli_fetch_array($result)){
                   $product_id = $row['product_id'];
                   $select_products = "Select * from `products` where product_id='$product_id'";
                   $result_products = mysqli_query($con, $select_products);
                   while($row_product_price = mysqli_fetch_array($result_products)){
                       $product_price = array($row_product_price['product_price']); //[200]
                       $price_table = $row_product_price['product_price'];
                       $product_title = $row_product_price['product_title'];
                       $product_image1 = $row_product_price['product_image1'];
                       
                       $product_values = array_sum($product_price);
                       $total_price+=$product_values;
                //   you can also pass echo"" and change the "" to ''
                ?>

                <tr>
                    <td class="p-2"><?php echo $product_title ?></td>
                    <td><img src="./Admin/product_images/<?php echo $product_image1 ?>" class="cart_img" alt="product_image"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50 text-center"></td>
                <?php
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities = $_POST['qty'];
                        $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                        $result_products_quantity = mysqli_query($con, $update_cart);
                        $total_price = $total_price * $quantities;
                    }

                ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                    <!-- <a href="index.php" class="btn btn-success px-3 m-2">Update</a> -->
                    <input type="submit" value="Update Cart" class="btn btn-success px-3 m-2" name="update_cart">
                    <!-- <a href="index.php" class="btn btn-primary px-3 m-2">Remove</a> -->
                    <input type="submit" value="Remove Cart" class="btn btn-primary px-3 m-2" name="remove_cart">
                    
                    </td>
                </tr>
                <?php
                }}}
                else{
                    echo "<h2 class='text-center text-danger'>Cart is empty </h2>";
                };
                ?>

            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex px-2 mt-3 mb-5">
            <?php 
                $get_ip_add = getIPAddress();
                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                $result = mysqli_query($con, $cart_query);
                $result_count = mysqli_num_rows($result);

                if($result_count > 0){
                      echo "
                      <h4 class='px-3'>Subtotal: <strong class='text-primary'>$total_price/-</strong></h4>
                      <a href='index.php' class='btn btn-success px-3 mx-3'>Continue Shopping</a>
                      <a href='./users_area/checkout.php' class='btn btn-primary px-3'>Checkout</a> ";
                }else{
                    echo" 
                    <div class='container text-center'>
                  <a href='index.php' class='btn btn-success px-3 mx-3'>Continue Shopping</a>
                    </div>";
                }
            ?>
          
        </div>
    </div>
</div>
<!-- cart table end -->
</form>

<!-- function to remove items -->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo "$remove_id";
            $delete_query = "Delete from `cart_details` where product_id = $remove_id";
            $run_delete = mysqli_query($con, $delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

echo $remove_item = remove_cart_item();
?>



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