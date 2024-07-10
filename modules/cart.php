<?php
include('header.php');
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
<script type="text/javascript" src="../js/script.js"></script>
<link rel="stylesheet" href="../assets/css/cart.css">

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shippi</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded my-5 cartTitle" ><h1 class="text-center">SHOPPING CART</h1></div>

            <div class="col-lg-8">
                <table class="table">
                    <thead class=text-center>
                        <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class=text-center>
                        <?php
                        $totalprice=0;
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $key =>$value){
                                    $totalprice = $totalprice+($value['price']*$value['quantity']);
                                    echo"<tr class=\"text-center productRow\">
                                            <td>".$value['productname']."</td>
                                            <td>".$value['price']."</td>
                                            <td>".$value['quantity']."</td>
                                            <td>".$value['price']*$value['quantity']."</td>
                                            <td>
                                                <form action='../classes/ManageCart.php' method='POST'>
                                                  <button name='removeProduct' class='btn btn-outline-danger'>REMOVE</button>
                                                  <input type='hidden' name='productname' value='".$value['productname']."'>
                                                </form>
                                            </td>
                                        </tr>";
                                }
                            }
                            
                        ?>
                        
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 ">
                <div class="border rounded paySection">
                    <h3>Total Amount:</h3>
                    <h5 class="text-right" id="totalAmount" value=<?php echo $totalprice?> ><?php echo $totalprice?></h5>
                    
                    <br>
                    
                    <h4>Purcahse by:</h4>
                        <button class="btn btn-block purchasebtn" id='btncod' name="cod">Cash On Delivery</button>
                        <button class="btn btn-block purchasebtn" id='btngcash' name="gcash">Gcash</button>
                        <button class="btn btn-block purchasebtn" id='btncard' name="card">Debit Card</button>
                        <button class="btn btn-block purchasebtn" id='btnwallet' name="wallet">Shippi Wallet</button>
                </div>
                
            </div>
            
            <div class="col-lg-6"></div>

            <div class="col-lg-6" style="margin-top:2%;">
                <div class='border rounded orderSection' style="visibility:hidden;" id="showPayment">
                    <h3 class="text-right" id="paymenttxt" style="font-size:2em;">Cash on Delivery</h3><br>
                    
                    <form action="../classes/Payment.php" method="POST" class="text-center payForm" id="payForm">
                        <label for="account" class="account" style="visibility:hidden; font-size:1.5em;">Account Number</label><br>

                        <p id="shippiamount" style="display:none; font-size:1.4em; ">Php <?php $amount = (new Order)->getAmount();  
 
                        foreach ($amount as $key => $value){
                                    }
                                    echo $value;?></p>
                        <input type="hidden" name="walletamount" id="walletamount" style="display:none;" value= <?php $amount = (new Order)->getAmount();  

                        foreach ($amount as $key => $value){
                                    }
                                    echo $value;?>>
                        <input type="text" name="account" class="account" id="accountval" style="visibility:hidden; font-size:1.5em;" ><br>
                        <label for="password" class="password" style="visibility:hidden; font-size:1.5em;  margin-top:5px;" >Password</label><br>
                        <input type="text" name="password" class="password" style="visibility:hidden; font-size:1.5em;" id="password"><br>
                        <label for="pin" class="pin"style="visibility:hidden; font-size:1.5em; margin-top:5px;">Pin</label><br>
                        <input type="text" name="pin" class="pin" style="visibility:hidden; font-size:1.5em;" id="pin"><br>
                        <button name="purchase" type="submit" id="pay" style ="margin-top:20px;">Pay</button>
                        <input type="hidden" name="method" id="method" >
                        <input type="hidden" name="totalprice" style="display:none;" id="totalprice" value=<?php echo $totalprice?>>
                    </form>

                </div>                  
            </div>

        </div>

    </div>
    
</body>
</html>


<script type="text/javascript" src="../js/script.js"></script>