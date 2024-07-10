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
        <div class="header"><h2><i class="far fa-chart-bar"></i>&nbsp;&nbsp;Sales </h2></div>  
        <div class="para sa search kag print">

            <div class="modal-header modheader">
                    <input type="text" class="form-control" id="search_key" name="search_key" placeholder="&#xf002; Search" autocomplete="nope" onkeyup="peekSearchSales()" style="max-width:300px" >
                    <!-- <span class="modal-title">Search</span> -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                    <!-- AKO NMN HIMU AH B HEHHEEHE-->
                    <button id="printSales" class="btn btn-success headerbtn btnprint"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>
            </div>

        </div>

        <div class="table-responsive table-bordered">
        <table class="table table-hover search-table" tabindex='0' id="salesList">
                <thead class=text-center>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody class=text-center>
                    <!-- php nadi dayon -->
                    <!-- test -->
                    <?php
                        $totalsales=0;
                        $sales = (new Sales)->displayData();
                        foreach ($sales as $key => $value){
                            echo "<tr orderID=".$value["OrderID"].">
                                    <th scope=\"row\">".$value["OrderID"]."</th>
                                    <td>".$value["productname"]."</td>
                                    <td>".$value["productprice"]."</td>
                                    <td>".$value["quantity"]."</td>
                                    <td>".$value["productprice"]*$value["quantity"]."</td>
                                    <td>".$value["payment_method"]."</td>
                                    <td>".$value["customer"]."</td>
                                    <td><a href=\"../classes/Elements.php?OrderID=".$value["OrderID"]."\"> <button class=\"btn btn-outline-danger\">Remove</button></a></td>
                                </tr>";

                                $totalsales+=($value["productprice"]*$value["quantity"]);
                        }
                    ?>
                    


                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total Sales:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row" colspan="4" class="text-left">Total:</th>
                        <td>Php <?php echo $totalsales?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                    
                    
                </tbody>
            </table>
        </div>
        
    </div>

    


    




</div>






<link rel="stylesheet" href="../assets/css/sidebar.css">
<script type="text/javascript" src="../js/script.js"></script>
