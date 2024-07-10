<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/3a42438233.js" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="../assets/css/header.css">
<script type="text/javascript" src="../js/script.js"></script>


<?php
session_start();


?>

    

    <nav class="navbar navbar-expand-sm navbar-light header nav-fill  w-100" style="max-width:100%;">
        <!-- Links -->


       
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link shippi" id="shippi" href="order.php"><h2><i class="fas fa-store"></i>   Shippi</h2></a>
            </li>
        </ul>

        <div class="cartbtn">
            <?php
                $count=0;
                if(isset($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                }

                if(isset($_SESSION['name'])){
                    $name = $_SESSION['name'];
                }else{
                    header("Location:../modules/login.php");
                }
            ?>
            <button class="nav-link btn "  id="cart" value="<?php echo $count?>"><i class="fas fa-shopping-cart"><?php echo $count;?></i></button>
    
        </div>

        <div class="dropdown">
            <button onclick="dropDown()" class="dropbtn"><i class="fas fa-user"></i>&nbsp;&nbsp;<?php echo $name?> <i class="fas fa-caret-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="../classes/Logout.php"><i class="fas fa-power-off"></i>&nbsp;&nbsp;Log Out</a>
                </div>
        </div>

        

    </nav>

 
    

    <script type="text/javascript" src="../js/script.js"></script>