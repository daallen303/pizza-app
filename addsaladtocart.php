<?php
require_once("Config.php");
require_once("Salad.Class.php");
require_once("Cart.Class.php");
$salad = new Salad();
$saladnames = $_POST["saladstoreturn"];
$allsalads = array();
$temp = "";
for($i = 0; $i<strlen($_POST["saladstoreturn"]);$i++)
if($_POST["saladstoreturn"][$i]!= ",") $temp .= $_POST["saladstoreturn"][$i];
else
{
	array_push($allsalads, $temp);
	$temp = "";
}
array_push($allsalads, $temp);
	$temp = "";
$cart = new Cart();
for($i = 0; $i < count($allsalads); $i++)
{
$cart->addPrice($salad->getPriceByName($allsalads[$i])*$_POST["quanity".str_replace(' ', '',$allsalads[$i])]);
$cart->addName($allsalads[$i]);
$cart->addSize("regular");
$cart->addDescription("Salad");
$cart->addQuanity($_POST["quanity".str_replace(' ', '',$allsalads[$i])]);
}
header('Location: ./menu.php');
