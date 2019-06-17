<<?php

require_once("Config.php");
require_once("Other.Class.php");

if(!empty($_POST))
{
	$other = new Other();
	$other->SaveOther(null, $_POST["name"],$_POST["type"], $_POST["prices"], $_POST["pricel"], $_POST["description"]);
	$other->GetOtherbyName($_POST["name"]);
}
header('Location: ./admin.php');
