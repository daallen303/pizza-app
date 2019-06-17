<?php
require_once("Config.php");

class Cart
{
	function __construct()
	{
		if (!array_key_exists("cart",$_SESSION)) {
			$_SESSION["cart"]["prices"]= array();
			$_SESSION["cart"]["names"]= array();
			$_SESSION["cart"]["sizes"]= array();
			$_SESSION["cart"]["descriptions"]=array();
			$_SESSION["cart"]["quanity"]=array();
		}
    }
    
    function addQuanity($quanity) {
		array_push($_SESSION["cart"]["quanity"],$quanity);
	}
	function addPrice($price) {
		array_push($_SESSION["cart"]["prices"],$price);
	}
	function addName($name) {
		array_push($_SESSION["cart"]["names"],$name);
	}
	function addSize($size) {
		array_push($_SESSION["cart"]["sizes"],$size);
	}
	function addDescription($description) {
		array_push($_SESSION["cart"]["descriptions"],$description);
	}
	
	
}
