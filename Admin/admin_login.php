<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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
            overflow:hidden;
            margin:0;
            box-sizing:border-box;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
      <h2 class="mt-5 text-center">
        Admin Login
      </h2>
      <div class="row d-flex justify-content-center align-items-center">
         <div class="col-lg-6 col-xl-5">
             <img src="../images/admin_login.jpg" alt="Admin Login" class="img-fluid me-5 mb-5">
         </div>
         <div class="col-lg-6 col-xl-4">
             <form action="" method="post">
                <div class="form-outline mb-4"> <!--Admin username-->
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your name" required="required"class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4"><!--Admin password-->
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required="required"class="form-control" autocomplete="off">
                </div>
                <div>  <!--Login button-->
                    <input type="submit" class="btn text-white mb-2" style="background-color: #0044ff;" name="admin_login" value="Login">
                    <p class="fw-bold">Don't have an account? <a href="admin_registration.php" class="link-danger fw-bold">Register</a></p>
                </div>
             </form>
         </div>
      </div>
    </div>
</body>
</html>

<?php 

if(isset($_POST['admin_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $select_query = "Select * from `admin_table` 
    where admin_name ='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($row_count);

    if($row_count>0){
        $_SESSION['admin_name']=$username;
       if(password_verify($password, $row_data['admin_password'])){
              echo "<script>alert('Login successfull')</script>";
              echo "<script>window.open('index.php','_self')</script>"; 
           }else{
           echo "<script>alert('Invalid Credentials')</script>";
        }
    
    }
}else{
    echo "<script>alert('Invalid Credentials')</script>";
}

?>