<?php
require_once("Config.php");
require_once("Sub.Class.php");

$sub = new Sub();
$sub->UpdateSub($_POST["id"], $_POST["name"], $_POST["pricef"], $_POST["priceh"], $_POST["description"], $_POST["temp"]);
header('Location: ./admin.php');
