<?php

require_once("Config.php");

Class Topping
{
	
	function __cunstruct()
	{
		$id = null;
		$name = "some name";
	}
	
	function SaveTopping($id, $name)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO toppings (`id`, `name`) VALUES ( :id, :name)");
		$result = $stmt->execute(array(':id'=>$id, ':name'=>$name));
		return $result;
	}
	function getToppingByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM toppings WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getAllToppings()
	{
		$alltoppings = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT name FROM toppings WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$alltoppings[$id]= $row;
			$id++;
	}
	return $alltoppings;
}
}
