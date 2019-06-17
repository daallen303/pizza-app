<?php

require_once("Sub.Class.php");
require_once("Config.php");
if(!empty($_POST))
{
$sub = new Sub();
$sub->SaveSub(null, $_POST["name"], $_POST["pricef"],$_POST["priceh"], $_POST["description"], $_POST["temp"]);
}

var_dump($sub->getSubByName($_POST["name"]));
echo('<html><br></html>');

header('Location: ./admin.php');
