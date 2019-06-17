<?php
require_once("Config.php");
require_once("Other.Class.php");

$other = new Other();
$other->UpdateOther($_POST["id"], $_POST["name"],$_POST["type"], $_POST["prices"],$_POST["pricel"], $_POST["description"]);
header('Location: ./admin.php');
