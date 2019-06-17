<?php
require_once("Config.php");
require_once("Other.Class.php");
require_once("Cart.Class.php");
require_once("session.class.php");
$other = new Other();
$cart = new Cart();
$allrolls = array();
$temp = "";
for($i = 0; $i<strlen($_POST["rollstoreturn"]); $i++)
if($_POST["rollstoreturn"][$i]!= ",") $temp.= $_POST["rollstoreturn"][$i];
else
{
	array_push($allrolls,$temp);
	$temp = "";
}
array_push($allrolls,$temp);
	$temp = "";
$cart = new Cart();
for($i =0; $i < count($allrolls); $i++)
{
$cart->addPrice($other->getPricesByName($allrolls[$i])*$_POST["quanity".str_replace(' ', '',$allrolls[$i])]);
$cart->addName($allrolls[$i]);
$cart->addSize("regular");
$cart->addDescription("Roll");
$cart->addQuanity($_POST["quanity".str_replace(' ', '',$allrolls[$i])]);
}
header('Location: ./menu.php');
