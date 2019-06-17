<?php

require_once("Config.php");
require_once("Salad.Class.php");

if(!empty($_POST))
{
	$salad = new Salad();
	$salad->SaveSalad(null, $_POST["name"], $_POST["price"], $_POST["description"]);
	$salad->GetSaladbyName($_POST["name"]);
}

