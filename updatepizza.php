<?php

require_once("Config.php");
require_once("Pizza.Class.php");

$pizza = new Pizza();
$pizza->updatePizza($_POST["id"], $_POST["name"], $_POST["prices"], $_POST["pricem"], $_POST["pricel"], $_POST["pricesl"], $_POST["description"], $_POST["pizzatoppings"]);
header('Location: ./admin.php');
