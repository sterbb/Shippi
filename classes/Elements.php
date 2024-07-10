<?php

require_once "Connection.php";

session_start();

abstract class CRUDElements{

	abstract function displayData();
	abstract function setData();
	abstract function addData();
	abstract function deleteData();
	abstract function editData();

	
}

class Sales {



    public function displayData(){
		$stmt = (new Connect)->connect()->prepare("SELECT * FROM sales ");
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}

	public function deleteData(){

		$OrderID = $_GET['OrderID'];
		$stmt = (new Connect)->connect()->prepare("DELETE FROM sales WHERE	OrderID = :OrderID");
		$stmt->bindParam(":OrderID", $_GET["OrderID"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt = null;	
	
			
		
	}

	

}


class Customers extends CRUDElements{

	public $name;
	public $address;
	public $gcash;
	public $pinwallet;
	public $wallet;
	public $password;
	public $cardnumber;

    public function displayData(){
		$stmt = (new Connect)->connect()->prepare("SELECT * FROM customer");
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}


	public function setData(){
		$this->name = $_POST['name'];
		$this->address = $_POST['address'];
		$this->gcash = $_POST['gcash'];
		$this->wallet = $_POST['wallet'];
		$this->pinwallet = $_POST['pin'];
		$this->cardnumber = $_POST['card'];
		$this->password = $_POST['password'];
		$this->username= $_POST['usernameC'];
	}

	public function addData(){
			$this->setData();
			// $this->password = $this->password;
			$stmt = (new Connect)->connect()->prepare("INSERT INTO customer(name, address, gcash,pinwallet,wallet,username,password,cardnumber) VALUES (:name, :address, :gcash, :pinwallet, :wallet,:username, :password, :cardnumber)");
	
			$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
			$stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
			$stmt->bindParam(":gcash", $this->gcash, PDO::PARAM_INT);
			$stmt->bindParam(":pinwallet", $this->pinwallet, PDO::PARAM_INT);
			$stmt->bindParam(":wallet", $this->wallet, PDO::PARAM_INT);
			$stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
			$stmt->bindParam(":cardnumber", $this->cardnumber, PDO::PARAM_INT);


			if($stmt->execute()){
				// echo "stmt is executed successfuly";
				echo "<script>
						clearForm();
						alert('Authenticator has been added Successfully');
					</script>";
				return "ok";
			}else{
				echo "stmt is not executed";
				return "error";
			}
			$stmt->close();
			$stmt=null;
		
	}

	public function editData(){
		$this->setData();
		$stmt = (new Connect)->connect()->prepare("UPDATE customer SET name = :name, address = :address, gcash = :gcash, pinwallet = :pinwallet, wallet=:wallet,username=:username, password=:password, cardnumber = :cardnumber WHERE customerID = :customerID");
			
			$stmt->bindParam(":customerID", $_POST['customerID'], PDO::PARAM_INT);
			$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
			$stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
			$stmt->bindParam(":gcash", $this->gcash, PDO::PARAM_INT);
			$stmt->bindParam(":pinwallet", $this->pinwallet, PDO::PARAM_INT);
			$stmt->bindParam(":wallet", $this->wallet, PDO::PARAM_INT);
			$stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
			$stmt->bindParam(":cardnumber", $this->cardnumber, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	

	}

	public function deleteData(){

		$customerID = $_GET['customerID'];
		$stmt = (new Connect)->connect()->prepare("DELETE FROM customer WHERE	customerID = :customerID");
		$stmt->bindParam(":customerID", $_GET["customerID"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt = null;	
	
			
	}

	

}


class Products extends CRUDElements{

	public $productname;
	public $price;
	public $variation;
	public $image;
	

    public function displayData(){
		$stmt = (new Connect)->connect()->prepare("SELECT * FROM product");
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}


	public function setData(){
		$this->productname = $_POST['productname'];
		$this->price = $_POST['price'];
		$this->variation = $_POST['variation'];
		$this->image = $_POST['image'];
		
	}

	public function addData(){
			$this->setData();
			// $this->password = $this->password;
			$stmt = (new Connect)->connect()->prepare("INSERT INTO product(productname, price, variation, image) VALUES (:productname, :price, :variation, :image)");
	
			$stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
			$stmt->bindParam(":price", $this->price, PDO::PARAM_INT);
			$stmt->bindParam(":variation", $this->variation, PDO::PARAM_STR);
			$stmt->bindParam(":image", $this->image, PDO::PARAM_STR);
			


			if($stmt->execute()){
				// echo "stmt is executed successfuly";
				return "ok";
			}else{
				echo "stmt is not executed";
				return "error";
			}
			$stmt->close();
			$stmt=null;
		
	}

	public function editData(){
		$this->setData();
		$stmt = (new Connect)->connect()->prepare("UPDATE product SET productname = :productname, price = :price, variation = :variation, image = :image WHERE productid = :productid");
			
			$stmt->bindParam(":productid", $_POST['productid'], PDO::PARAM_INT);
			$stmt->bindParam(":productname", $this->productname, PDO::PARAM_STR);
			$stmt->bindParam(":price", $this->price, PDO::PARAM_STR);
			$stmt->bindParam(":variation", $this->variation, PDO::PARAM_STR);
			$stmt->bindParam(":image", $this->image, PDO::PARAM_STR);
			

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	

	}

	public function deleteData(){

		$productid = $_GET['productid'];
		$stmt = (new Connect)->connect()->prepare("DELETE FROM product WHERE productid = :productid");
		$stmt->bindParam(":productid", $_GET["productid"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt = null;	
	
			
	}

	

}


class Accounts extends CRUDElements{

	public $name;
	public $username;
	public $password;
	public $remarks;

    public function displayData(){
		$stmt = (new Connect)->connect()->prepare("SELECT * FROM account");
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}


	public function setData(){
		$this->name = $_POST['accname'];
		$this->username = $_POST['username'];
		$this->password = $_POST['accpassword'];
		$this->remarks = $_POST['remarks'];
	}

	public function addData(){
			$this->setData();
			// $this->password = $this->password;
			$stmt = (new Connect)->connect()->prepare("INSERT INTO account(name, username, password,remarks) VALUES (:name, :username, :password, :remarks)");
	
			$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
			$stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $this->remarks, PDO::PARAM_STR);
			


			if($stmt->execute()){
				return "ok";
			}else{
				echo "stmt is not executed";
				return "error";
			}
			$stmt->close();
			$stmt=null;
		
	}

	public function editData(){
		$this->setData();
		$stmt = (new Connect)->connect()->prepare("UPDATE account SET name = :name, username = :username, password = :password, remarks = :remarks WHERE accountID = :accountID");
			
			$stmt->bindParam(":accountID", $_POST['accountID'], PDO::PARAM_INT);
			$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
			$stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
			$stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $this->remarks, PDO::PARAM_STR);
			

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	

	}

	public function deleteData(){

		$accountID = $_GET['accountID'];
		$stmt = (new Connect)->connect()->prepare("DELETE FROM account WHERE accountID = :accountID");
		$stmt->bindParam(":accountID", $_GET["accountID"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt = null;	
	
			
	}

	

}

class Dashboard{
	public $customer;
	public $sales;
	public $products;
	public $accounts;




	public function countCustomers(){
		$stmt = (new Connect)->connect()->prepare("SELECT COUNT(*) FROM customer");
		$stmt->execute();
		$count = $stmt->fetchColumn();
		echo "<p class=\"countData\" >".$count."</p>";
		
	}
	
	public function countSales(){
		$stmt = (new Connect)->connect()->prepare("SELECT COUNT(*) FROM sales");
		$stmt->execute();
		$count = $stmt->fetchColumn();
		echo "<p class=\"countData\" >".$count."</p>";
	}
	
	public function countProducts(){
		$stmt = (new Connect)->connect()->prepare("SELECT COUNT(*) FROM product");
		$stmt->execute();
		$count = $stmt->fetchColumn();
		echo "<p class=\"countData\" >".$count."</p>";
	}

	public function countAccounts(){
		$stmt = (new Connect)->connect()->prepare("SELECT COUNT(*) FROM account");
		$stmt->execute();
		$count = $stmt->fetchColumn();
		echo "<p class=\"countData\" >".$count."</p>";
	}
}


//Calling function

//Sales
//Delete Data
if(isset($_GET['OrderID'])){
	$deletesales = (new Sales)->deleteData();
	echo '<script>window.location="../modules/sales.php"</script>';	
}

//Customer
//Delete Data
if(isset($_GET['customerID'])){
	$deletecustomer = (new Customers)->deleteData();
	echo '<script>window.location="../modules/customers.php"</script>';	
}
//Add Data
if(isset($_POST['addCustomer'])){
	$addcustomer = (new Customers)->addData();
	echo '<script>window.location="../modules/customers.php"</script>';	

}
//Edit Data
if(isset($_POST['editCustomer'])){
	$editcustomer =(new Customers)->editData();
	echo '<script>window.location="../modules/customers.php"</script>';	
}


//Product
//Delete Data
if(isset($_GET['productid'])){
	$deleteproduct = (new Products)->deleteData();
	echo '<script>window.location="../modules/products.php"</script>';	
}
//Add Data
if(isset($_POST['addProduct'])){
	$addproduct = (new Products)->addData();
	echo '<script>window.location="../modules/products.php"</script>';	

}
//Edit Data
if(isset($_POST['editProduct'])){
	$editproduct =(new Products)->editData();
	echo '<script>window.location="../modules/products.php"</script>';	
}

//Account
//Delete Data
if(isset($_GET['accountID'])){
	$deleteaccount = (new Accounts)->deleteData();
	echo '<script>window.location="../modules/accounts.php"</script>';	
}
//Add Data
if(isset($_POST['addAccount'])){
	$addaccount = (new Accounts)->addData();
	echo '<script>window.location="../modules/accounts.php"</script>';	

}
//Edit Data
if(isset($_POST['editAccount'])){
	$editaccounts =(new Accounts)->editData();
	echo '<script>window.location="../modules/accounts.php"</script>';	
}

?>