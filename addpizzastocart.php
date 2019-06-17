<?php
require_once("Config.php");
require_once("Pizza.Class.php");
require_once("Cart.Class.php");
$pizza = new Pizza();
$name = $pizza->getNameByToppings($_POST["pizzaselect"]);
$price = 0.0;
$addprice = 0.0;
$quanity = $_POST["quanity"];
if($_POST["size"]=="slice")
{
	$price = $pizza->getPriceslByName($name);
	$addprice = .25;
}
else if($_POST["size"]=="small")
{
	$price = $pizza->getPricesByName($name);
	$addprice = .5;
}
else if($_POST["size"]=="medium")
{
	$price = $pizza->getPricembyName($name);
	$addprice = 1;
}
else
{
	$price = $pizza->getPricelByName($name);
	$addprice = 1.50;
}
$price = $price*$quanity;
$ec = false;
$alltoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["alltoppings"]);$i++)
if($_POST["alltoppings"][$i]!= ",") $temp .= $_POST["alltoppings"][$i];
else
{
	array_push($alltoppings, $temp);
	if($temp == "Extra Cheese") $ec = true;
	$temp = "";
}
array_push($alltoppings, $temp);
if($temp == "Extra Cheese") $ec = true;
	$temp = "";
 if($ec == true) $price += $addprice;
if(count($alltoppings)>= 4) $price += $addprice *4;
else { if(ec == true) $price += count($alltoppings)-1 * $addprice;
	else $price += count($alltoppings) * $addprice;
}
$cart = new Cart();
$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription('Pizza w/'.$_POST["alltoppings"]);
$cart->addQuanity($quanity);
header('Location: ./menu.php');
