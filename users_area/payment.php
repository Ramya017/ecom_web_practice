<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- stylsheet link -->
    <link rel="stylesheet" href="./style.css">

    <!-- Bootstrap css link -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    .icon{
        width: 80%;
        margin:auto;
        display:block;
    }
    body{
        overflow-X:hidden;
    }
</style>
<body>

<!-- php code to access user id -->
  <?php
  $user_ip =  getIPAddress();
  $get_user = "Select * from `user_table` where user_ip= '$user_ip'";
  $result = mysqli_query($con, $get_user);
  $run_query = mysqli_fetch_array($result);
  $user_id = $run_query['user_id'];
  ?>



   
</nav>
<div class="container text-center">
     <h2 class="text-black mt-5 mb-2"> Payment options </h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-4">
        <a href="https://www.paypal.com" target="_blank"><img src="../images/icons/icon.jpg" class="icon" alt=""></a>
        </div>
        <div class="col-md-4">
        <a href="order.php?user_id=<?php echo $user_id ?> ">
        <h2>Pay Offline</h2></a>
        </div>
    </div>
</div>
    <!-- Bootstrap js link -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</body>

</html>