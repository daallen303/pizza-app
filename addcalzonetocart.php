<?php
require_once("Config.php");
require_once("Cart.Class.php");
require_once("Calzones.Class.php");
$calzone = new Calzone();
$name = $calzone->getNameByFillings($_POST["calzoneselect"]);
if($_POST["size"]=="Large") $price = $calzone->getPricelByName($name);
else $price = $calzone->getPricesByName($name);
$size = $_POST["size"];
$toppings = $_POST["calzoneselect"];
$quanity = $_POST["quanity"];
$cart = new Cart();
$cart->addPrice($price);
$cart->addName($name);
$cart->addDescription("Calzone w/".$toppings);
$cart->addQuanity($quanity);
header('Location: ./menu.php');
