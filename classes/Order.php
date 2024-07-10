<?php
require_once 'Connection.php';




class Order{

    public function getProduct(){
        $stmt = (new Connect)->connect()->prepare("SELECT * FROM product");
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }

    public function displayProduct(){
        $product = $this->getProduct();
        foreach($product as $key =>$value){

            echo "<div class=\"col-md-4 carddiv\" >
                    <div class=\"productCard card\ style=\" width:100%; height:60%;\">
                        <img src=\"../assets/images/".$value['image']."\" alt=\"".$value['productname']."\" style=\" width:100%;
                            height:60%;
                        
                        /*Scale down will take the necessary specified space that is 100px x 100px without stretching the image*/
                            object-fit:scale-down;\">


                            <div class =\"card-body cardtxt\">
                                <h4 class=\"card-title\" style=\"font-size:1.7em;\">".$value['productname']."</h4>
                                <h5 >".$value['price']."</h5><br>
                                <p class=\"card-text\">Variation: </p>
                                <p class=\"card-text\" style=\"font-size:18px;\">".$value['variation']."</p><br>
                                <form action=\"..\classes\ManageCart.php\" method=\"POST\">
                                    <label for=\"quantity\">Quantity</label>
                                    <input type=\"number\" name=\"quantity\" min=\"1\" max=\"10\"\" value=\"1\">
                                    <button type=\"submit\" class=\"btn btn-success\" style=\"margin-left:20%;\"  name=\"AddToCart\">Add to cart</button>
                                    <input type=\"hidden\" name=\"productname\" value=\"".$value['productname']."\">
                                    <input type=\"hidden\" name=\"price\"  value=\"".$value['price']."\" > 
                                </form>
                            </div>
                    </div>
                </div>";
            
        }
    }


    public $id;

    //shippiwallet
    public function getAmount(){
        $this->id = $_SESSION['customerID'];
		$stmt = (new Connect)->connect()->prepare("SELECT wallet FROM customer WHERE customerID= :customerID");
		$stmt -> bindParam(":customerID", $this->id, PDO::PARAM_INT);
        $stmt->execute();
		return $stmt->fetch();
		//$stmt->close();
		//$stmt = null;
	}

}


?>

