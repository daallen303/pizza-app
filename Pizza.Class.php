<?php
require_once("Config.php");

Class Pizza
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$prices = 0.0;
		$pricem = 0.0;
		$pricel = 0.0;
		$pricesl = 0.0;
		$toppings = "";
	}
	/*NEED FUNCTION GET PRICE BY SIZE*/
	function savePizza($id, $name, $prices, $pricem, $pricel, $pricesl, $description, $toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO pizza (`id`, `name`, `prices`, `pricem`, `pricel`, `pricesl`, `description`, `toppings`) VALUES(:id, :name, :prices, :pricem, :pricel, :pricesl, :description, :toppings)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricem'=>$pricem, ':pricel'=>$pricel, ':pricesl'=>$pricesl, ':description'=>$description, ':toppings'=>$toppings));
		return $result;
	}
	function updatePizza($id, $name, $prices, $pricem, $pricel, $pricesl, $description, $toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("UPDATE `pizza` SET `name`=:name, `prices`=:prices, `pricem`=:pricem, `pricel`=:pricel, `pricesl`=:pricesl, `description`=:description, `toppings`=:toppings WHERE `pizza`.`id` =:id");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricem'=>$pricem, ':pricel'=>$pricel, ':pricesl'=>$pricesl, ':description'=>$description, ':toppings'=>$toppings));
		return $result;
	}
	function getToppingsByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT toppings FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		
		return $stmt->fetchColumn();
	}
	function getIdByToppings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT id FROM pizza WHERE toppings=:toppings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		
		return $stmt->fetchColumn();
	}
	function getNameByToppings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM pizza WHERE toppings=:toppings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		return $stmt->fetchColumn();
		
	}
	function getPizzaByToppings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM pizza WHERE toppings=:toppings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		return $stmt->fetchColumn();
		
	}
	function getAllPizzas()
	{
		global $pdo;
		$id = 1;
		$row = 1;
		$allpizzas = array();
		while($row!=null)
		{
		$stmt = $pdo->prepare("SELECT * from pizza WHERE id=:id");
		$result = $stmt->execute(array(':id'=>$id));
		$row = $stmt->fetch();
		
			$allpizzas[$id] = $row;
		
		$id+=1;
	}
		return $allpizzas;
	}
	function getPizzabyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetch();
	}
	function getPriceslbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricesl FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getPricesbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT prices FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	
	function getPricembyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricem FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getPricelbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricel FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getDescriptionbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT description FROM pizza WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getPizzaToppings($pizzatoppings)
	{
		$temp = "";
		$allpizzatoppings = array();
	for($i = 0; $i < strlen($pizzatoppings); $i++)
	{
		if($pizzatoppings[$i] != ",")
		{
		$temp .= $pizzatoppings[$i];
	}
		else 
		{array_push($allpizzatoppings, $temp);
		$temp = "";
	}
	}
	return $allpizzatoppings;	
}

}
