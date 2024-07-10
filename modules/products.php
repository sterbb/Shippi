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
        <div class="header"><h2><i class="fas fa-tag"></i> Products </h2></div>  
        <div class="para sa search kag print kag add">

            <div class="modal-header modheader">
                    <input type="text" class="form-control" id="search_key" name="search_key" placeholder="&#xf002; Search" autocomplete="nope" onkeyup="peekSearchProduct()" style="max-width:300px" >
                    <!-- <span class="modal-title">Search</span> -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->


                    <!-- Trigger modal-->
                    <button type="button" id="addProduct" class="btn btn-primary headerbtn btnadd" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add</button>
                    <button class="btn btn-success headerbtn btnprint" id="printProducts"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>

            </div>

             <!-- Modal for Edit and ADD -->

        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Product</h5>
                <button type="button" class="close" id="xProduct" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../classes/Elements.php" method="POST">
                    <input type="hidden" name="productid" id="formIDProduct">
                    <label for="productname">Product Name</label>
                    <label for="price" style="padding-top:10px; padding-left:12em;">Price(Php)</label><br>
                    <input type="text" name="productname" id="productname"  style="width:15em; margin-top:-10px; height:2em;" required>
                    <input type="text" name="price" id="price" style="width:10em; margin-left:3.7em;  margin-top:-10px; height:2em;" required><br> <br> 
                    <label for="variation" style="padding-top:10px;">Variation</label>
                    <label for="image" style="padding-top:10px; padding-left:10.9em;">Image</label><br>
                    <select name="variation" id="variation" style="width:10em; margin-top:-10px; height:2em;">
                        <option hidden disabled selected value></option>
                        <option value="128GB/6GB RAM">128GB/6GB RAM</option>
                        <option value="128GB/8GB RAM">128GB/8GB RAM</option>
                        <option value="256GB/8GB RAM">256GB/8GB RAM</option>
                        <option value="256GB/12GB RAM">256GB/12GB RAM</option>
                    </select>
                    <input type="file" id="image" name="image" accept="image/*" style="padding-top:0px; padding-left:5em; width:18em;"><br><br>
                    <div class="modal-footer">
                        <button type="button" id="closeProduct" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <table class="table table-hover search-table" tabindex='0' id="productList">
                <thead class="text-center text-justify  ">
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price<br>(Php)</th>
                        <th scope="col">Variation</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody class=text-center>
                    <!-- php nadi dayon -->
                    <!-- test -->
                    <?php
                        $products = (new Products)->displayData();
                        foreach ($products as $key => $value){
                            echo "<tr id=\"productid\" productid=".$value["productid"].">
                                    <th scope=\"row\">".$value["productid"]."</th>
                                    <td>".$value["productname"]."</td>
                                    <td>".$value["price"]."</td>
                                    <td>".$value["variation"]."</td>

                                    <!-- Trigger modal-->
                                    <td><button id=\"edit\" class=\"btn btn-outline-info edit\" data-toggle=\"modal\" data-target=\"#Modal\"><i class=\"fas fa-print\"></i>Edit</button> 
                                    <a href=\"../classes/Elements.php?productid=".$value["productid"]."\"> <button class=\"btn btn-outline-danger\">Remove</button></a></td>
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
