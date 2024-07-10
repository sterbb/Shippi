<?php
require_once "Connection.php";
session_start();


abstract class Payment{
    public $productname;
    public $price;
    public $quantity;
    public $amount;
    public $customer;
    public $payment_method;
    
    abstract function addData($productname,$price,$quantity,$amount,$customer,$payment_method);
    abstract function addSales();





}

Interface Credentials{
    public function setCredentials();
    public function checkCredentials();
}


class COD extends Payment{

    public function addData($productname,$price,$quantity,$amount,$customer,$payment_method){
        $this->productname =$productname; 
        $this->price =$price; 
        $this->quantity =$quantity; 
        $this->amount =$amount; 
        $this->customer =$customer; 
        $this->payment_method =$payment_method; 
    }
    
    public function addSales(){

        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key =>$value){
                
                $this->addData($value['productname'],$value['price'],$value['quantity'],$value['quantity']*$value['price'],$_SESSION["name"],$_POST["method"]);
                $stmt = (new Connect)->connect()->prepare("INSERT INTO sales(productname, productprice, quantity,amount,customer,payment_method) VALUES (:productname, :price, :quantity,:amount,:customer, :payment_method)");

                $stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
                $stmt->bindParam(":price", $this->price, PDO::PARAM_INT);
                $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
                $stmt->bindParam(":amount", $this->amount, PDO::PARAM_INT);
                $stmt->bindParam(":customer", $this->customer, PDO::PARAM_STR);
                $stmt->bindParam(":payment_method", $this->payment_method, PDO::PARAM_STR);

                $stmt->execute();
            
            }
            
            
            
            $stmt=null;

            foreach($_SESSION['cart'] as $key=>$value){
                    unset($_SESSION['cart'][$key]);           
            }
            echo '<script>alert("Order Succesful")</script>';
            echo '<script>window.location="../modules/order.php";</script>';

            
            
        }

    }

}



class GCash extends Payment implements Credentials {
    
    public function addData($productname,$price,$quantity,$amount,$customer,$payment_method){
        $this->productname =$productname; 
        $this->price =$price; 
        $this->quantity =$quantity; 
        $this->amount =$amount; 
        $this->customer =$customer; 
        $this->payment_method =$payment_method; 
    }


    //experiment kay d magsulod ang foreach
    public function addSales(){


        if(isset($_SESSION['cart'])){

            foreach($_SESSION['cart'] as $key =>$value){
                
                $this->addData($value['productname'],$value['price'],$value['quantity'],$value['quantity']*$value['price'],$_SESSION["name"],$_POST["method"]);
                $stmt = (new Connect)->connect()->prepare("INSERT INTO sales(productname, productprice, quantity,amount,customer,payment_method) VALUES (:productname, :price, :quantity,:amount,:customer, :payment_method)");

                $stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
                $stmt->bindParam(":price", $this->price, PDO::PARAM_INT);
                $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
                $stmt->bindParam(":amount", $this->amount, PDO::PARAM_INT);
                $stmt->bindParam(":customer", $this->customer, PDO::PARAM_STR);
                $stmt->bindParam(":payment_method", $this->payment_method, PDO::PARAM_STR);

                $stmt->execute();
            }
            

           
            $stmt=null;

            foreach($_SESSION['cart'] as $key=>$value){
                unset($_SESSION['cart'][$key]);           
            }
            echo '<script>alert("Order Succesful")</script>';
            echo '<script>window.location="../modules/order.php";</script>';


            
        }

    }


    private $account;
    private $password;
    private $id;


    public function setCredentials(){
        $this->account = $_POST["account"];
        $this->password = $_POST["password"];
        $this->id = $_SESSION['customerID'];
    }


    public function checkCredentials(){
        $this->setCredentials();

        $stmt = (new Connect)->connect()->prepare("SELECT customerID, gcash, password FROM customer WHERE customerID = :customerID");
		$stmt -> bindParam(":customerID", $this->id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		if(!$result){
		echo '<script>alert("Order Denied. Credentials not found.")</script>';
        echo '<script>window.location="../modules/cart.php";</script>';
	
		}else{
			foreach($result as $row){
				if($result && ($this->password == $row["password"]) && ($this->account == $row["gcash"])){
                    $this->addSales();
                    echo '<script>alert("Order Succesful")</script>';
                    echo '<script>window.location="../modules/order.php";</script>';
					
				}else{
                    echo '<script>alert("Order Denied. Wrong Account/Password.")</script>';
                    echo '<script>window.location="../modules/cart.php";</script>';
				}
			}
		}	

        $stmt=null;

    }




}


class Card extends Payment implements Credentials{

    public function addData($productname,$price,$quantity,$amount,$customer,$payment_method){
        $this->productname =$productname; 
        $this->price =$price; 
        $this->quantity =$quantity; 
        $this->amount =$amount; 
        $this->customer =$customer; 
        $this->payment_method =$payment_method; 
    }


    //experiment kay d magsulod ang foreach
    public function addSales(){

        if(isset($_SESSION['cart'])){

            foreach($_SESSION['cart'] as $key =>$value){
                
                $this->addData($value['productname'],$value['price'],$value['quantity'],$value['quantity']*$value['price'],$_SESSION["name"],$_POST["method"]);
                $stmt = (new Connect)->connect()->prepare("INSERT INTO sales(productname, productprice, quantity,amount,customer,payment_method) VALUES (:productname, :price, :quantity,:amount,:customer, :payment_method)");

                $stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
                $stmt->bindParam(":price", $this->price, PDO::PARAM_INT);
                $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
                $stmt->bindParam(":amount", $this->amount, PDO::PARAM_INT);
                $stmt->bindParam(":customer", $this->customer, PDO::PARAM_STR);
                $stmt->bindParam(":payment_method", $this->payment_method, PDO::PARAM_STR);

                $stmt->execute();
            }
            

           
            $stmt=null;

            foreach($_SESSION['cart'] as $key=>$value){
                unset($_SESSION['cart'][$key]);           
            }
            echo '<script>alert("Order Succesful")</script>';
            echo '<script>window.location="../modules/order.php";</script>';


            
        }

    }

    private $account;
    private $password;
    private $id;


    public function setCredentials(){
        $this->account = $_POST["account"];
        $this->password = $_POST["password"];
        $this->id = $_SESSION['customerID'];
    }


    public function checkCredentials(){
        $this->setCredentials();

        $stmt = (new Connect)->connect()->prepare("SELECT customerID, cardnumber, password FROM customer WHERE customerID = :customerID");
		$stmt -> bindParam(":customerID", $this->id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		if(!$result){
			        echo '<script>alert("Order Denied. Credentials not found.")</script>';
                    echo '<script>window.location="../modules/cart.php";</script>';
	
		}else{
			foreach($result as $row){
				if($result && ($this->password == $row["password"]) && ($this->account == $row["cardnumber"])){
                    $this->addSales();
					echo '<script>alert("Order Succesful")</script>';
                    echo '<script>window.location="../modules/order.php";</script>';
				}else{
					echo '<script>alert("Order Denied. Wrong Account/Password.")</script>';
                    echo '<script>window.location="../modules/cart.php";</script>';
				}
			}
		}	

        $stmt=null;


    }


    
}


class Wallet extends Payment implements Credentials{

    public function addData($productname,$price,$quantity,$amount,$customer,$payment_method){
        $this->productname =$productname; 
        $this->price =$price; 
        $this->quantity =$quantity; 
        $this->amount =$amount; 
        $this->customer =$customer; 
        $this->payment_method =$payment_method; 
    }




    //experiment kay d magsulod ang foreach
    public function addSales(){

        if(isset($_SESSION['cart'])){

            foreach($_SESSION['cart'] as $key =>$value){
                
                $this->addData($value['productname'],$value['price'],$value['quantity'],$value['quantity']*$value['price'],$_SESSION["name"],$_POST["method"]);
                $stmt = (new Connect)->connect()->prepare("INSERT INTO sales(productname, productprice, quantity,amount,customer,payment_method) VALUES (:productname, :price, :quantity,:amount,:customer, :payment_method)");

                $stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
                $stmt->bindParam(":price", $this->price, PDO::PARAM_INT);
                $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_INT);
                $stmt->bindParam(":amount", $this->amount, PDO::PARAM_INT);
                $stmt->bindParam(":customer", $this->customer, PDO::PARAM_STR);
                $stmt->bindParam(":payment_method", $this->payment_method, PDO::PARAM_STR);

                $stmt->execute();
            }
            

           
            $stmt=null;

            foreach($_SESSION['cart'] as $key=>$value){
                unset($_SESSION['cart'][$key]);           
            }  
            echo '<script>alert("Order Succesful")</script>';
            echo '<script>window.location="../modules/order.php";</script>';


            
        }

    }

    private $account;
    private $password;
    private $pin;
    //kaksa kng ok na tnan kng maka add ka sng session sng login
    private $id;
    public $updateamount;


    public function setCredentials(){
        $this->account = $_POST["account"];
        $this->password = $_POST["password"];
        $this->pin = $_POST["pin"];
        $this->id = $_SESSION['customerID'];
    }


    public function checkCredentials(){
        $this->setCredentials();

        

        $stmt = (new Connect)->connect()->prepare("SELECT customerID, pinwallet, password FROM customer WHERE customerID = :customerID");
		$stmt -> bindParam(":customerID", $this->id, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll();



		
		if(!$result){
            echo '<script>alert("Order Denied. Credentials not found.")</script>';
            echo '<script>window.location="../modules/cart.php";</script>';
	
		}else{
			foreach($result as $row){
				if($result && ($this->password == $row["password"]) && ($this->pin == $row["pinwallet"])){

                    if($_POST['totalprice']>$_POST['walletamount']){
                        echo '<script>alert("Order Unsuccessful. Insufficient Amount.")</script>';
                        echo '<script>window.location="../modules/cart.php";</script>';
                    }else{
                        $this->updateamount = $_POST['walletamount']-$_POST['totalprice'];
                        $this->addSales();
                        $this->updateWallet();
                        echo '<script>alert("Order Succesful")</script>';
                        echo '<script>window.location="../modules/order.php";</script>';

                    }
					
				}else{
                    echo '<script>alert("Order Denied. Wrong Account/Password.")</script>';
                    echo '<script>window.location="../modules/cart.php";</script>';
				}
			}
		}	

        $stmt=null;



        


    }

    //soon
    public function updateWallet(){
        $stmt = (new Connect)->connect()->prepare("UPDATE customer SET wallet = :wallet WHERE customerID = :customerID");
        $stmt->bindParam(":customerID", $this->id, PDO::PARAM_INT);
        $stmt->bindParam(":wallet", $this->updateamount, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

       







    
}

if((isset($_POST["purchase"])) && ($_POST["method"] =="Cash On Delivery")){
    $cod = new COD();
    $cod->addSales();
}elseif((isset($_POST["purchase"])) && ($_POST["method"] =="GCash")){
    $gcash= new GCash();
    $gcash->checkCredentials();
}elseif((isset($_POST["purchase"])) && ($_POST["method"] =="Debit Card")){
    $card= new Card();
    $card->checkCredentials();
}elseif((isset($_POST["purchase"])) && ($_POST["method"] =="Shippi Wallet")){
    $wallet= new Wallet();
    $wallet->checkCredentials();
}






?>