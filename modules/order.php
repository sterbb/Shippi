<?php 
require_once "../classes/Connection.php";
require_once "../classes/Order.php";

?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/3a42438233.js" crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="../assets/css/order.css">


<title>Shippi</title>
<div class="container-fluid w-100">
    <?php include("header.php")?>

  
    <div class="container">
        <div style="background-color:#3498DB; margin-bottom:2%; margin-top:4%;">
            <h1 class="text-center titletxt">ELECTRONICS SALE</h1>
        </div>
        

        <div class="row w-10 rowProduct">
                <?php
                    $product = (new Order)->displayProduct();
                    //display products
                ?>
        </div>
    </div>
    
</div>



