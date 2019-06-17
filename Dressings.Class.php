<?php

require_once("Config.php");

Class Dressing
{
	
	function __cunstruct()
	{
		$id = null;
		$name = "some name";
	}
	
	function SaveDressing($id, $name)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO dressings (`id`, `name`) VALUES ( :id, :name)");
		$result = $stmt->execute(array(':id'=>$id, ':name'=>$name));
		return $result;
	}
	function getDressingsByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM dressings WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		var_dump($stmt->fetch());
		return $result;
	}
	function getAllDressings()
	{
		$alldressing = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT name FROM dressings WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$alldressings[$id]= $row;
			$id++;
	}
	return $alldressings;
}
}
