<?php

require_once("Config.php");
require_once("Toppings.Class.php");

if(!empty($_POST))
{
	$topping = new Topping();
	$topping->SaveTopping(null, $_POST["name"]);
	$topping->getToppingByName($_POST["name"]);
}
header('Location: ./admin.php');
