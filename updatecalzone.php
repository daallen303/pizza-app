<?php
require_once("Config.php");
require_once("Calzones.Class.php");

$calzone = new Calzone();
$calzone->updateCalzone($_POST["id"], $_POST["name"], $_POST["prices"], $_POST["pricel"], $_POST["description"], $_POST["calzonetoppings"]);
header('Location: ./admin.php');
