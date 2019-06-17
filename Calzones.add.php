<?php

require_once("Calzones.Class.php");
require_once("Config.php");
if(!empty($_POST))
{
$calzone = new Calzone();
$calzone->saveCalzone(null, $_POST["name"],$_POST["description"], $_POST["prices"], $_POST["pricel"], $_POST["fillings"]);
}

$calzone->getCalzonebyName($_POST["name"]);
echo('<html><br></html>');
$calzone->getPricesbyName($_POST["name"]);
header('Location: ./admin.php');
