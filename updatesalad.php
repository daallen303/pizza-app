<?php
require_once("Config.php");
require_once("Salad.Class.php");

$salad = new Salad();
$salad->updateSalad($_POST["id"], $_POST["name"], $_POST["price"], $_POST["description"]);
header('Location: ./admin.php');
