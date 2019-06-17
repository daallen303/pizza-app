<?php
require_once("Config.php");

Class Sub
{
	function __construct()
	{
		$id = null;
		$name = "some name";
		$description = "some description";
		$pricef = 0.0;
		$priceh = 0.0;
		$temp = "none";

	}

function SaveSub($id, $name, $pricef, $priceh, $description, $temp)
	{
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO subs (`id`, `name`, `pricef`, `priceh`, `description`, `temp`) VALUES(:id, :name, :pricef, :priceh, :description, :temp)");
		$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':pricef'=>$pricef, ':priceh'=>$priceh, ':description'=>$description, ':temp'=>$temp));
		return $result;
	}

	function UpdateSub($id, $name, $pricef, $priceh, $description, $temp)
		{
			global $pdo;
			$stmt = $pdo->prepare("UPDATE `subs` SET `name`=:name, `pricef`=:pricef, `priceh`=:priceh, `description`=:description, `temp`=:temp WHERE `subs`.`id` =:id");
			$result = $stmt->execute(array(':id'=>$id,':name'=>$name, ':pricef'=>$pricef, ':priceh'=>$priceh, ':description'=>$description, ':temp'=>$temp));
			return $result;
		}

	function getSubByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $result;
	}

	function getDescriptionByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT description FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}

	function getTempByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT temp FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}

	function getIdByName($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT id FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}

	function getNamebyId($id)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT name FROM subs WHERE id=:id");
		$result = $stmt->execute(array(':id'=>$id));
		return $stmt->fetchColumn();
	}

	function getSubPriceFull($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT pricef FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getSubPriceHalf($name)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT priceh FROM subs WHERE name=:name");
		$result = $stmt->execute(array(':name'=>$name));
		return $stmt->fetchColumn();
	}
	function getAllSubs()
	{
		$allsubs = array();
		$row = 1;
		$id = 1;
		global $pdo;
		while($row != null)
		{
			$stmt = $pdo->prepare("SELECT * FROM subs WHERE id=:id");
			$result = $stmt->execute(array(':id'=>$id));
			$row = $stmt->fetch();
			$allsubs[$id]= $row;
			$id++;
	}
	return $allsubs;
	}


}
