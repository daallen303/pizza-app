<?php

require_once("Pizza.Class.php");
require_once("Config.php");
if(!empty($_POST))
{
$pizza = new Pizza();
$pizza->savePizza(null, $_POST["name"], $_POST["prices"], $_POST["pricem"], $_POST["pricel"], $_POST["pricesl"], $_POST["description"]);
}

$pizza->getPizzabyName($_POST["name"]);
echo('<html><br></html>');
$pizza->getPricesbyName($_POST["name"]);
header('Location: ./admin.php');
