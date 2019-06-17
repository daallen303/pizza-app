<?php
require_once("Config.php");

Class Calzone
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$prices = 0.0;
		$pricel = 0.0;
		$fillings = "";
	}
	/*NEED FUNCTION GET PRICE BY SIZE*/
	function saveCalzone($id, $name, $prices, $pricel, $description, $toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO calzones (`id`, `name`, `prices`, `pricesl`, `description`, `toppings`) VALUES(:id, :name, :prices, :pricesl, :description, :toppings)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricem'=>$pricem, ':pricel'=>$pricel, ':pricesl'=>$pricesl, ':description'=>$description, ':toppings' =>$toppings));
		return $result;
	}
	function updateCalzone($id, $name, $prices, $pricel, $description, $toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("UPDATE `calzones` SET `name`=:name, `prices`=:prices, `pricel`=:pricel, `description`=:description, `toppings`=:toppings WHERE `calzones`.`id` =:id");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':prices'=>$prices, ':pricel'=>$pricel, ':description'=>$description, ':toppings'=>$toppings));
		return $result;
	}
	function getToppingsByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT toppings FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getNameByFillings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM calzones WHERE toppings=:toppings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		return $stmt->fetchColumn();
		
	}
	function getIdByFillings($toppings)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT id FROM calzones WHERE toppings=:toppings");
		$result = $stmt->execute(array(':toppings'=>$toppings));
		return $stmt->fetchColumn();
		
	}
	function getAllCalzones()
	{
		global $pdo;
		$id = 1;
		$row = 1;
		$allcalzones = array();
		while($row!=null)
		{
		$stmt = $pdo->prepare("SELECT * from calzones WHERE id=:id");
		$result = $stmt->execute(array(':id'=>$id));
		$row = $stmt->fetch();
		
			$allcalzones[$id] = $row;
		
		$id+=1;
	}
		return $allcalzones;
	}
	function getCalzonebyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetch();
	}
	function getPricesbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT prices FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getPricelbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricel FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getCalzoneToppings($toppings)
	{
		$temp = "";
		$alltoppings = array();
	for($i = 0; $i < strlen($toppings); $i++)
	{
		if($toppings[$i] != ",")
		{
		$temp .= $toppings[$i];
	}
		else 
		{array_push($alltoppings, $temp);
		$temp = "";
	}
	}
	return $alltoppings;	
}


function getDescriptionbyName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT description FROM calzones WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
}
