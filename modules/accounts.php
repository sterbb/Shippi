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
            <button class="btn  dropdown-toggle account" type="button" data-toggle="dropdown" id=""><i class="fas fa-user-lock"></i><?php echo $_SESSION['admin'];?>
            <span class="caret"></span></button>
            <ul class="dropdown-menu accountmenu">
                <form action="" method="POST">
                 <a href="../classes/Logout.php"name="logout" class="logout text-center" type="submit"><i class="fas fa-power-off"></i> Log Out</a>
                </form>
                
            </ul>
        </div>


       
    
    </div>    

    <div class="main_content">
        <div class="header"><h2><i class="fas fa-user-shield"></i>Manage Accounts </h2></div>  
        <div class="para sa search kag print kag add">

            <div class="modal-header modheader">
                    <input type="text" class="form-control" id="search_key" name="search_key" placeholder="&#xf002; Search" autocomplete="nope" onkeyup="peekSearchAccount()" style="max-width:300px" >
                    <!-- <span class="modal-title">Search</span> -->
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->


                    <!-- Trigger modal-->
                    <button type="button" id="addAccount" class="btn btn-primary headerbtn btnadd" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add</button>
                    <button class="btn btn-success headerbtn btnprint" id="printAccount"><i class="fas fa-print" ></i>&nbsp;&nbsp;Print</button>

            </div>

             <!-- Modal for Edit and ADD -->

        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Account</h5>
                <button type="button" class="close" id="xAccount" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../classes/Elements.php" method="POST" id="verifyAccount">
                    <input type="hidden" name="accountID" id="formIDAccount">
                    <label for="accname">Name</label>
                    <input type="text" name="accname" id="accname" style="width:29em; margin-top:-10px; height:2em;" required><br>
                    <label for="username" style="padding-top:10px;">Username</label>
                    <label for="remarks" style="padding-top:10px; padding-left:43.5%;">Remarks</label><br>
                    <input type="text" name="username" id="username" style="width:13em; margin-top:-20px; height:2em;" required>
                    <select name="remarks" id="remarks" style="width:11.5em; margin-top:-20px; margin-left:14.5%; height:2em;">
                        <option hidden disabled selected value></option>
                        <option value="Admin">Admin</option>
                        <option value="Employee">Employee</option>
                    </select><br>
                    <label for="accpassword" style="padding-top:10px;">Password</label><br>
                    <input type="text" name="accpassword" id="accpassword" style="width:13em; margin-top:-10px; height:2em;"required><br>
                    <label for="vaccpassword" style="padding-top:10px;">Verify Password</label><br>
                    <input type="text" name="vaccpassword" id="vaccpassword" style="width:13em; margin-top:-10px; height:2em;" required><br><br>
                   
                    <div class="modal-footer">
                        <button type="button" id="closeAccount" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <table class="table table-hover search-table" tabindex='0' id="accountList">
                <thead class=text-center>
                    <tr>
                        <th scope="col">Account ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody class=text-center>
                    <!-- php nadi dayon -->
                    <!-- test -->
                    <?php
                        $accounts = (new Accounts)->displayData();
                        foreach ($accounts as $key => $value){
                            echo "<tr id=\"accountID\" accountID=".$value["accountID"].">
                                    <th scope=\"row\">".$value["accountID"]."</th>
                                    <td>".$value["name"]."</td>
                                    <td>".$value["username"]."</td>
                                    <td>".$value["remarks"]."</td>
                                    <!-- Trigger modal-->
                                    <td><button id=\"edit\" class=\"btn btn-outline-info edit\" data-toggle=\"modal\" data-target=\"#Modal\"><i class=\"fas fa-print\"></i>Edit</button> 
                                    <a href=\"../classes/Elements.php?accountID=".$value["accountID"]."\"> <button class=\"btn btn-outline-danger\">Remove</button></a></td>
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
