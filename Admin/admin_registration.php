<?php
include('../includes/connect.php');
include('../functions/common_function.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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
            /* overflow:hidden; */
            margin:0;
            box-sizing:border-box;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
      <h2 class="mb-5 text-center">
        Admin Registration
      </h2>
      <div class="row d-flex justify-content-center">
         <div class="col-lg-6 col-xl-5">
             <img src="../images/admin_register.jpg" alt="Admin Registration" class="img-fluid me-5 mb-5">
         </div>
         <div class="col-lg-6 col-xl-4">
             <form action="" method="post">
                <div class="form-outline mb-4">  <!--Username-->
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your name" required="required"class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">  <!--Email-->
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required="required"class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">   <!--Password-->
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required="required"class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">  <!--Confirm Password-->
                    <label for="confirm_password" class="form-label">Confirm password</label>
                    <input type="confirm_password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required"class="form-control" autocomplete="off">
                </div>
                <div>   <!--Submit button-->
                    <input type="submit" class="btn text-white mb-2" style="background-color: #0044ff;" name="admin_registration" value="Register">
                    <p class="fw-bold">Have an account? <a href="admin_login.php" class="link-danger fw-bold">Login</a></p>
                </div>
             </form>
         </div>
      </div>
    </div>


        <!-- Bootstrap js link -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    ntegrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>
</html>


<!-- php code -->
<?php
if(isset($_POST['admin_registration'])){
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $hash_password = password_hash($password, PASSWORD_DEFAULT);
   $confirm_password = $_POST['confirm_password'];
   

  //select query
  $select_query = "Select * from `admin_table` where admin_name='$username' or admin_email='$email'";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
  if($rows_count > 0){
    echo "<script>alert('Username or email already exists....!!!!')</script>";
  }else if($password != $confirm_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  else{

   //insert query
   $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values('$username','$email','$hash_password')";

    $sql_execute = mysqli_query($con, $insert_query);
   
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }else{
        die(mysqli_error($con));
    }
    
  }
}

?>