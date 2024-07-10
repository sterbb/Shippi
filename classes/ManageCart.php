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


<?php
session_start();



if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST["AddToCart"])){

        if(isset($_SESSION["cart"])){
            $product = array_column($_SESSION['cart'],'productname');
            //ifalready added experiment palang
            if(in_array($_POST["productname"],$product)){
                $index = array_search($_POST["productname"], $_SESSION['cart']);
                $qty = array_column($_SESSION['cart'],'quantity');
                $newquantity = $_POST["quantity"]+$qty[$index];
                $_SESSION["cart"][$index] = array("productname"=>$_POST["productname" ],"price"=>$_POST["price"],"quantity"=>$newquantity);
                echo "<script>
                        alert('Item Updated');
                        window.location.href='../modules/order.php';
                    </script>";

            //add item
            }else{
                $count = count($_SESSION["cart"]);
                $_SESSION['cart'][$count]= array("productname"=>$_POST["productname" ],"price"=>$_POST["price"],"quantity"=>$_POST["quantity"]);
                echo "<script>
                        alert('Item Added');
                        window.location.href='../modules/order.php';
                      </script>";

            }
            

        }
        //add first item
        else{
            $_SESSION["cart"][0]=array("productname"=>$_POST["productname" ],"price"=>$_POST["price"],"quantity"=>$_POST["quantity"]);
            echo "<script>
                    alert('Item Added');
                    window.location.href='../modules/order.php';
                  </script>";
        } 

    }

    if(isset($_POST['removeProduct'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['productname']==$_POST['productname']){
                //removeitem
                unset($_SESSION['cart'][$key]);
                //adjustindex
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Item Removed');
                window.location.href='../modules/cart.php';
                </script>";
            }
        }
    }


}









?>