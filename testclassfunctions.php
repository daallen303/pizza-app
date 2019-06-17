<?php 
	require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");
	require_once("Config.php");
	require_once("Fillings.Class.php");
	require_once("Dressings.Class.php");
	require_once("Other.Class.php");
	require_once("Calzones.Class.php");
	
	
	$allcalzones = array();
          $calzone = new Calzone();
          $allcalzones = $calzone->getAllCalzones();
          var_dump($allcalzones);
          echo $allcalzones[1]["Toppings"];
	/*$pizza = new Pizza();
	$allpizzas = array();
	$allpizzas = $pizza->getAllPizzas();
	//echo $allpizzas[2]["Name"];
	/*$allpizzatoppings = array();
	$temp = "";
	$pizzatoppings = $allpizzas[2]["Toppings"];
	for($i = 0; $i < strlen($pizzatoppings); $i++)
	{
		if($pizzatoppings[$i] != " ")
		{
		$temp .= $pizzatoppings[$i];
	}
		else 
		{array_push($allpizzatoppings, $temp);
		$temp = "";
	}
	}
	echo("toppings");
	$pizzatoppings = array();
	   echo $allpizzas[2]["Toppings"];
	   var_dump($pizza->getPizzaToppings($allpizzas[2]["Toppings"]));
	   var_dump($pizzatoppings);
	
	$topping = new Topping();
	$alltoppings = array();
	$alltoppings = $topping->getAllToppings();
	$id = 1;
	while(!empty($alltoppings[$id]))
	{
	//echo("<html><h1>".$alltoppings[$id]["name"]."</h1></html>");
	$id++;
	
}
	
	$sub = new Sub();
	$allsubs = array();
	$allsubs = $sub->getAllSubs();
	//var_dump($allsubs);
	//echo $allsubs[1]["Name"];
	//echo("<html></br></html>");

	
	$salad = new Salad();
	$allsalads = array();
	$allsalads = $salad->getAllSalads();
	//echo $allsalads[1]["Name"];
	*/
	 
	?>
