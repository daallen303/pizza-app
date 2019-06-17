<?php

require_once("Config.php");

Class Salad
{
function __cunstruct()
{
	$id = null;
	$name = "some name";
	$price = 0.0;
	$description = "some description";
}
function SaveSalad($id, $name, $price, $description)
{
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO salads(`id`, `name`, `price`, `description`)VALUES(:id, :name, :price, :description)");
	$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':price'=>$price, ':description'=>$description));
    return $result;
}

function UpdateSalad($id, $name, $price, $description)
{
	global $pdo;
	$stmt = $pdo->prepare("UPDATE `salads` SET `name`=:name, `price`=:price,  `description`=:description  WHERE `salads`.`id` =:id");
	$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':price'=>$price, ':description'=>$description));
    return $result;
}

function getSaladByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT * FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	return $result;
}
function getPriceByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT price FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	return $stmt->fetchColumn();

}

function getDescriptionByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT description FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	return $stmt->fetchColumn();

}

function getIdByName($name)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT id FROM salads WHERE name=:name");
	$result = $stmt->execute(array(':name'=>$name));
	return $stmt->fetchColumn();
}

function getNamebyId($id)
{
	global $pdo;
	$stmt = $pdo->prepare("SELECT name FROM salads WHERE id=:id");
	$result = $stmt->execute(array(':id'=>$id));
	return $stmt->fetchColumn();

}

function getAllSalads()
	{
		$allsalads = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT * FROM salads WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allsalads[$id]= $row;
			$id++;
	}
	return $allsalads;
	}
}
