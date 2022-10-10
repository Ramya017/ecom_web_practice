<?php
 if(isset($_GET['delete_paymentrecord'])){
    $delete_id = $_GET['delete_paymentrecord'];
    // echo $delete_id;
    //delete query

    $delete_query = "Delete from `user_payments` where order_id = $delete_id";
    $result_product = mysqli_query($con, $delete_query);

    if($result_product){
        echo "<script>alert('Payment record has been deleted successfully..!!!')</script>";
        echo "<script>window.open('./index.php?list_payments', '_self')</script>";
    }
 };

?>