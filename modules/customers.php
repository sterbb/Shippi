<?php
require_once "../classes/Elements.php";

if(isset($_SESSION['admin'])){
    if($_SESSION['remarks'] != "Admin"){
        echo"<style>#manageAccount{display:none;}</style>";
    }

}else{
    header("Location:../modules/login.php");
}
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

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script type="text/javascript" src="../js/script.js"></script>



<div class="wrapper">
    <div class="sidebar">
        <h2>Shippi</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-chart-pie"></i>Dashboard</a></li>
            <li><a href="customers.php"><i class="fas fa-user"></i>Customers</a></li>
            <li><a href="sales.php"><i class="far fa-chart-bar"></i>  Sales</a></li>
            <li><a href="products.php"><i class="fas fa-tag"></i> Products</a></li>
            <li id="manageAccount"><a href="accounts.php"><i class="fas fa-user-shield"></i>Manage Accounts</a></li>
        </ul> 


        <div class="dropup accountdrop">
            <button class="btn  dropdown-toggle account" type="button" data-toggle="dropdown" id=""><i class="fas fa-user-lock"></i>&nbsp;<?php echo $_SESSION['admin'];?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu accountmenu">
                <form action="" method="POST">
                <a href="../classes/Logout.php"name="logout" class="logout text-center" type="submit"><i class="fas fa-power-off"></i> Log Out</a>
                </form>
                
            </ul>
        </div>


       
    
    </div>    

    <div class="main_content">
        <div class="header"><h2><i class="fas fa-user"></i>&nbsp;&nbsp;Customers </h2></div>  
        <div class="para sa search kag print kag add">

            <div class="modal-header modheader" >
                    <input type="text" class="form-control" id="search_key" name="search_key" placeholder="&#xf002; Search" autocomplete="nope" onkeyup="peekSearchCustomer()" style="max-width:300px" >
                    <!-- <span class="modal-title">Search</span> -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->


                    <!-- Trigger modal-->
                    <button type="button" id="addCustomer" class="btn btn-primary headerbtn btnadd" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add</button>
                    <button class="btn btn-success headerbtn btnprint" id="printCustomers"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
                   
                    
                    
            </div>

             <!-- Modal for Edit and ADD -->

        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Customer</h5>
                <button type="button" class="close" id="xCustomer" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../classes/Elements.php" method="POST" id="verifyCustomer">
                    <input type="hidden" name="customerID" id="formIDCustomer">
                    <label for="name">Name</label><br>
                    <input type="text" name="name" id="name" style="width:29em; margin-top:-10px; height:2em;"required><br>
                    <label for="address" style="padding-top:10px;">Address</label><br>
                    <input type="text" name="address" id="address" style="width:29em; margin-top:-10px; height:2em;" required><br>
                    <label for="gcash" style="padding-top:10px;" >GCash</label>   
                    <label for="card"  style="padding-top:10px; padding-left:43.5%;">Card Number</label><br>
                    <input type="text" name="gcash" id="gcash" style="width:13em; margin-top:-10px; height:2em;"  required>
                    <input type="text" name="card" id="card" style="width:13em; margin-top:-10px; margin-left:9%; height:2em;" required><br>
                    <label for="wallet" style="padding-top:10px;" >Shippi Wallet</label>
                    <label for="usernameC" style="padding-top:10px; padding-left:33.5%;">Username</label><br>
                    <input type="text" name="wallet" id="wallet" style="padding-top:10px; width:13em; margin-top:-10px; height:2em;"  required>
                    <input type="text" name="usernameC" id="usernameC" style="padding-top:10px; width:13em; margin-top:-10px; height:2em; margin-left:9%;" required><br>
                    <label for="pin" style="padding-top:10px" >Shippi Pin</label>
                    <label for="password" style="padding-top:10px; padding-left:38.5%;">Account Password</label><br>
                    <input type="text" name="pin" id="pin" style=" width:13em; margin-top:-10px; height:2em;"  required>
                    <input type="text" name="password" id="password" style="padding-top:10px; width:13em; margin-top:-10px; height:2em; margin-left:9%;" required><br>
                    <label for="vpin" style="padding-top:10px;">Verify Pin</label>
                    <label for="vpassword" style=" padding-left:38.5%; padding-top:10px">Verify Password</label><br>
                    <input type="text" name="vpin" id="vpin" style=" width:13em; margin-top:-10px; height:2em;" required>
                    <input type="text" name="vpassword" id="vpassword" style=" width:13em; margin-top:-10px; height:2em; margin-left:9%;" required><br><br><br>
                   
                    
                  
                   
                    <div class="modal-footer">
                        <button type="button" id="closeCustomer" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="save" name="save" >Save changes</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>


        <!-- Modal for Edit and ADD -->
        

            
        </div>

        <div class="table-responsive table-bordered">
            <table class="table table-hover search-table" tabindex='0' id="customerList">
                <thead class=text-center>
                    <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">GCash Account</th>
                        <th scope="col">Card Number</th>
                        <th scope="col">Shippi Balance</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody class=text-center>
                    <!-- php nadi dayon -->
                    <!-- test -->
                    <?php
                        $customers = (new Customers)->displayData();
                        foreach ($customers as $key => $value){
                            echo "<tr id=\"customerID\" customerID=".$value["customerID"].">
                                    <th scope=\"row\">".$value["customerID"]."</th>
                                    <td>".$value["name"]."</td>
                                    <td>".$value["address"]."</td>
                                    <td>".$value["gcash"]."</td>
                                    <td>".$value["cardnumber"]."</td>
                                    <td>Php ".$value["wallet"]."</td>
                                    <!-- Trigger modal-->
                                    <td><button id=\"edit\" class=\"btn btn-outline-info edit\" data-toggle=\"modal\" data-target=\"#Modal\"><i class=\"fas fa-print\"></i>Edit</button> 
                                    <a href=\"../classes/Elements.php?customerID=".$value["customerID"]."\"> <button class=\"btn btn-outline-danger\">Remove</button></a></td>
                                </tr>";
                        }
                    ?>
                 
                    
                </tbody>
            </table>
        </div>
        
    </div>

    


    




</div>






<link rel="stylesheet" href="../assets/css/sidebar.css">
<script type="text/javascript" src="../js/script.js"></script>
