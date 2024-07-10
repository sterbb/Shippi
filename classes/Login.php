<?php
require_once "Connection.php";

session_start();

abstract class Login{
	public abstract function auth();
}

class customerAuthentication extends Login{
    private $username;
    private $password;

	public function auth(){
		$this->username = $_POST["username"];
		$this->password = $_POST["password"];

		
		// $stmt = (new Connect)->connect()->prepare("SELECT username, password,customerID,name	 FROM customer WHERE username = :username");
		// $stmt -> bindParam(":username", $this->username, PDO::PARAM_STR);
		// $stmt->execute();
		// $result = $stmt->fetchAll();
		
		// if(!$result){
		// 	echo"<style>.error{visibility:visible;}</style>";
	
		// }else{
		// 	foreach($result as $row){
		// 		if($result && ($this->password == $row["password"])){
		// 			$_SESSION["customerID"] = $row["customerID"];
		// 			$_SESSION["name"] = $row["name"];
					
		// 			header("Location:../modules/order.php");
					
		// 		}else{
		// 			echo"<style>.error{visibility:visible;}</style>";
		// 		}
		// 	}
		// }	
		$_SESSION["customerID"] = 3;
		$_SESSION["name"] = "goku";
		header("Location:../modules/order.php");

	}

}

class adminAuthentication extends Login{
    private $username;
    private $password;

	public function auth(){

		$this->username = $_POST["username"];
		$this->password = $_POST["password"];
		// $stmt = (new Connect)->connect()->prepare("SELECT username, password,name,remarks FROM account WHERE username = :username");
		// $stmt -> bindParam(":username", $this->username, PDO::PARAM_STR);
		// $stmt->execute();
		// $result = $stmt->fetchAll();
		
		// if(!$result){
		// 	echo"<style>.error{visibility:visible;}</style>";
	
		// }else{
		// 	foreach($result as $row){
		// 		if($result && ($this->password == $row["password"])){
		// 			$_SESSION["admin"] = $row["name"];
		// 			$_SESSION["remarks"]=$row['remarks'];
		// 			header("Location:../modules/dashboard.php");
					
		// 		}else{
		// 			echo"<style>.error{visibility:visible;}</style>";
		// 		}
		// 	}
		// }	
		$_SESSION["admin"] = "Jan Ryan Divinagracia";
		$_SESSION["remarks"]= "Admin";
		header("Location:../modules/dashboard.php");
	}

   



}

?>