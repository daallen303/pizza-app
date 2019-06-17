<?php
require_once("Config.php");
require_once("Sub.Class.php");
require_once("Cart.Class.php");
require_once("session.class.php");
$ec = false;
$sub =  new Sub();
$name = $_POST["name"];
$size = $_POST["size"];
$price = 0.0;
$toppings = $_POST["allsubtoppings"];
$quanity = $_POST["quanity"];
if($size=="Half")
{
	$addprice = .25;
	$price = $sub->getSubPriceHalf($name);
}
if($size=="Full")
{
	$addprice = .50;
	$price = $sub->getSubPriceFull($name);
}
$alltoppings = array();
$temp = "";
for($i = 0; $i<strlen($_POST["allsubtoppings"]);$i++)
if($_POST["allsubtoppings"][$i]!= ",") $temp .= $_POST["allsubtoppings"][$i];
else
{
	array_push($alltoppings, $temp);
	if($temp == "extracheese")
	{
		 $price+= $addprice;
	 }
	if($temp == "hotpeppers")
	{
		 $price+= $addprice;
	 }
	if($temp == "sweetpeppers")
	{
		 $price+= $addprice;
	 }
	$temp = "";
}
if($temp == "extracheese")
	{
		 $price+= $addprice;
	 }
	if($temp == "hotpeppers")
	{
		 $price+= $addprice;
	 }
	if($temp == "sweetpeppers")
	{
		 $price+= $addprice;
	 }
$cart = new Cart();
$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription("Sub w/".$toppings);
$cart->addQuanity($quanity);
header('Location: ./menu.php');
//header('Location: ./menu1.php');
