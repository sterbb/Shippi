<?php
require_once "../classes/Elements.php";

$dashboard = new Dashboard();

if(isset($_SESSION['admin'])){
    if($_SESSION['remarks'] != "Admin"){
        echo"<style>#manageAccount{display:none;}</style>";
        echo"<style>#dbAccount{display:none;}</style>";
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
        <div class="header text-center headertitle"><h2 class="headertitle headtitle">DASHBOARD</h2></div>  
        <div class="container-fluid ">

            <div class="contiainer-fluid ">
                <div class="row  my-auto elementdiv">


                    
                    <div class="col-sm-6 text-center dbelements ">
                        <a href="customers.php">
                            <div class="btn btn-primary dashboardbtn" id="dbcustomer">
                                <?php $dashboard->countCustomers(); ?>
                                <i class="fas fa-user dbicon"></i>
                                <p class="btnTitle">Customers</p> 
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-sm-6 text-center dbelements">
                        <a href="sales.php">
                            <div class="btn btn-primary dashboardbtn" id="dbsale">
                                <?php $dashboard->countSales(); ?>
                                <i class="far fa-chart-bar dbicon"></i></i>
                                <p class="btnTitle" id="txtTitle">Sales</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 text-center dbelements">
                        <a href="products.php">
                            <div class="btn btn-primary dashboardbtn" id="dbproduct">
                                <?php $dashboard->countProducts(); ?>
                                <i class="fas fa-tag dbicon"></i> </i>
                                <p class="btnTitle">Products</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 text-center dbelements" id="dbaccount">
                        <a href="accounts.php">
                            <div class="btn btn-primary dashboardbtn" id="dbacccount">
                            <?php $dashboard->countAccounts(); ?>
                            <i class="fas fa-user-shield dbicon"></i>
                            <p class="btnTitle">Accounts</p>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>

        </div>

       
       
        
    </div>

    


    




</div>



 


<link rel="stylesheet" href="../assets/css/dashboard.css">
<script type="text/javascript" src="../js/script.js"></script>
