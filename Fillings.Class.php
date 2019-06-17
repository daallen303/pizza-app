<?php

require_once("Config.php");

Class Filling
{
	
	function __cunstruct()
	{
		$id = null;
		$name = "some name";
	}
	
	function SaveFilling($id, $name)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO fillings (`id`, `name`) VALUES ( :id, :name)");
		$result = $stmt->execute(array(':id'=>$id, ':name'=>$name));
		return $result;
	}
	function getFillingsByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM fillings WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getAllFillings()
	{
		$allfillings = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT name FROM fillings WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allfillings[$id]= $row;
			$id++;
	}
	return $allfillings;
}
}
