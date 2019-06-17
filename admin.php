	<?php
require_once("Config.php");
require_once("Toppings.Class.php");
require_once("Pizza.Class.php");
require_once("Calzones.Class.php");
require_once("Sub.Class.php");
require_once("Salad.Class.php");
require_once("Other.Class.php");
?>

<html>

	<body>
		<head><link rel="stylesheet" type="text/css" href="./Diorios.css" >
  <script src="jquery-3.2.1.min.js"></script></head>
  <div id="mainbody">
		<div id="testadmin">
			<button name="ShowNewPizza" class = "ShowButtons" onclick="ShowNewPizza();" >New Pizza</button>
			<button name="ShowEditPizza" class = "ShowButtons" onclick="ShowEditPizza()" >Edit Pizza</button>
		</br>
			<button name="ShowNewTopping" class = "ShowButtons" onclick="ShowNewTopping()" >New Topping</button>
			</br>
			<button name="ShowNewSub" class = "ShowButtons" onclick="ShowNewSub()" >New Sub</button>
			<button name="ShowEditSub" class = "ShowButtons" onclick="ShowEditSub()" >Edit Sub</button>
		</br>
			<button name="ShowNewSalad" class = "ShowButtons" onclick="ShowNewSalad()" >New Salad</button>
			<button name="ShowEditSalad" class = "ShowButtons" onclick="ShowEditSalad()" >Edit Salad</button>
		</br>
			<button name="ShowNewOther" class = "ShowButtons" onclick="ShowNewOther()" >New Roll</button>
			<button name="ShowEditOther" class = "ShowButtons" onclick="ShowEditOther()" >Edit Roll</button>
		</br>
			<button name="ShowNewCalzone" class = "ShowButtons" onclick="ShowNewCalzone()" >New Calzone</button>
			<button name="ShowEditCalzone" class = "ShowButtons" onclick="ShowEditCalzone()" >Edit Calzone</button>
		</br>
			<div id ="NewPizza" style="display:none">
			<h1>Add new Pizza</h1>
	<form id="Pizza" method="POST" action="./Pizza.Add.php" onsubmit="return ValidatePizza()">
	Name<input type="text" name="name" class=></input></br>
	Price of small<input type="text" name="prices"></input></br>
	Price of Medium<input type="text"  name="pricem"></input></br>
	Price of Large<input type="text" name="pricel"></input></br>
	Price of Slice<input type="text" name="pricesl"></input></br>
	Description<input type="text" name="description"></input></br>
	Toppings<input type="text" id="pizzatoppings" name="pizzatoppings"></input></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="pizzatoppingspan"><input type="checkbox"
                     class="pizzatoppings" id="'.$alltoppings[$id]["name"].'"
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }
echo('</div>');
?>
</br>
</br>
</br>
<input type="submit">
	</form>
	</br></br>
</div>

<div id="editPizza" style="display:none">
<h1> Edit Pizza </h1>
	<?php
	$pizza = new Pizza();
	    $allpizzas = array();
	    $allpizzas = $pizza->getAllPizzas();
	    $idp=1;
	echo('<span class="pizzanamesspan"><form id="pizzanamesubmit" method="GET" ><select class="editpizzanames" name="pizzaselect"
                     onchange="this.form.submit()">');
	    while(!empty($allpizzas[$idp]))
            {
		 echo('<option class="pizzanameoption"
                       name="'.$allpizzas[$idp]["Name"].'"
                       value="'.$allpizzas[$idp]["Toppings"].'">');
		  echo($allpizzas[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }
	    echo('</select></form></span><br />');
	    ?>
	<form id="EditPizza" method="POST" action="./updatepizza.php" onsubmit=" return ValidatePizzaEdit();">
	Price of small<input type="text" id ="editprices" name="prices" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo $pizza->getPricesByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}

	?>">

	</input></br>
	Price of Medium<input type="text" id ="editpricem" name="pricem" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo $pizza->getPriceMByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}


	?>">
	</input></br>
	Price of Large<input type="text" id ="editpricel" name="pricel" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo ($pizza->getPriceLByName($pizza->getNameByToppings($_GET["pizzaselect"])));
	}
	?>">
	</input></br>
	Price of Slice<input type="text" id ="editpricesl" name="pricesl" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo ($pizza->getPriceslByName($pizza->getNameByToppings($_GET["pizzaselect"])));
	}
	?>">
	</input></br>
	Description<input type="text" id="editdescription" name="description" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo $pizza->getDescriptionByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	?>">
	</input></br>
	Toppings<input type="text" id="editpizzatoppings" name="pizzatoppings" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		$toppings = $pizza->getToppingsByName($pizza->getNameByToppings($_GET["pizzaselect"]));
		echo $pizza->getToppingsByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	?>">

	</input>

	<input type="text" id="editidPizza" name="id"  style="display:none" value="<?php
	if (isset($_GET["pizzaselect"]))
	{
		echo $pizza->getIdByToppings($_GET["pizzaselect"]);
	}

	?>"></input>
	</br><input type="submit" value="edit"></form></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="pizzatoppingspan"><input type="checkbox"
                     class="editpizzatoppings" id="'.$alltoppings[$id]["name"].'edit"
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }

echo('</div>');

?>
</br></br></br></br></br></br>
</div>

<div id="NewTopping" style="display:none">
	<h1>Add new Topping</h1>
	<form id="testtoppings" method="POST" action="./Toppings.Add.php" onsubmit=" return ValidateToppings();">
	Name<input type="text" name="name"></input></br>
	<input type="submit">
	</form>

	</br></br></br></br></br>
</div>

<div id= "NewSub" style="display:none">
	<h1>Add new Sub</h1>
		<form id="testsub" method="POST" action="./Sub.Add.php" onsubmit="return ValidateSub();">

	Name<input type="text" name="name"></input></br>
	Price of Full<input type="text" name="pricef"></input></br>
	Price of Half<input type="text"  name="priceh"></input></br>
	Description<input type="text" name="description"></input></br>
	Temp<input type="text" name="temp"></input></br>
	</br>
	<input type="submit">
	</form>
	</br></br></br></br></br>
</div>

<div id="editSub" style="display:none">
	<h1>Edit Sub</h1>
	<?php
	$sub = new Sub();
			$allsubs = array();
			$allsubs = $sub->getAllSubs();
			$idp=1;
	echo('<span class="subnamesspan"><form id="subnamesubmit" method="GET" ><select class="editsubnames" name="subselect"
										 onchange="this.form.submit()">');
			while(!empty($allsubs[$idp]))
						{
		 echo('<option class="subnameoption"
											 name="'.$allsubs[$idp]["Name"].'">');
			echo($allsubs[$idp]["Name"]);
			echo('</option>');
			$idp++;
			}
			echo('</select></form></span><br />');
			?>
			<form id="EditSub" method="POST" action="./updatesub.php" onsubmit=" return ValidateSubEdit();">

				Name<input type="text" id="editnameSub" name="name" value="<?php
				if (isset($_GET["subselect"]))
				{
					echo $_GET["subselect"];
				}

				?>">
				</input></br>

			Price of Full<input type="text" id="editpricefSub" name="pricef" value="<?php
			if (isset($_GET["subselect"]))
			{
				echo $sub->getSubPriceFull($_GET["subselect"]);
			}

			?>">
			</input></br>

			Price of Half<input type="text" id="editpricesSub" name="priceh" value="<?php
			if (isset($_GET["subselect"]))
			{
				echo $sub->getSubPriceHalf($_GET["subselect"]);
			}

			?>">
			</input></br>

			Description<input type="text" id="editdescriptionSub" name="description" value="<?php
			if (isset($_GET["subselect"]))
			{
				echo $sub->getDescriptionByName($_GET["subselect"]);
			}

			?>">
			</input></br>

			Type<input type="text" id="editTempSub" name="temp" value="<?php
			if (isset($_GET["subselect"]))
			{
				echo $sub->getTempByName($_GET["subselect"]);
			}

			?>">
			</input></br>

			<input type="text" id="editidSub" name="id" value="<?php
			if (isset($_GET["subselect"]))
			{
				echo $sub->getIdByName($_GET["subselect"]);
			}

			?>"></input></br>
			<input type="submit">
			</form>
			</br></br></br></br></br></br>
		</div>

<div id= "NewSalad" style="display:none">
	<h1>Add new Salad</h1>
	<form id="testsalad" method="POST" action="./Salad.Add.php" onsubmit="return  ValidateSalad();">
	Name<input type="text" name="name"></input></br>
	Price<input type="text" name="price"></input></br>
	Description<input type="text" name="description"></input></br>
	</br>
	<input type="submit">
	</form>
	</br></br></br></br></br>
</div>

<div id ="editSalad" style="display:none">
	<h1>Edit Salad</h1>
	<?php
	$salad = new Salad();
	    $allsalads = array();
	    $allsalads = $salad->getAllSalads();
	    $idp=1;
	echo('<span class="saladnamesspan"><form id="saladnamesubmit" method="GET" ><select class="editsaladnames" name="saladselect"
                     onchange="this.form.submit()">');
echo('<option>Salads</option>');
	    while(!empty($allsalads[$idp]))
            {
		 echo('<option class="saladnameoption"
                       name="'.$allsalads[$idp]["Name"].'">');
		  echo($allsalads[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }
	    echo('</select></form></span><br />');
	    ?>

			<form id="EditSalad" method="POST" action="./updatesalad.php" onsubmit="return  ValidateSaladEdit();">

			Name<input type="text" id="editnameSalad" name="name" value="<?php
			if (isset($_GET["saladselect"]))
			{
				echo $_GET["saladselect"];
			}

			?>">
			</input></br>

			Price<input type="text" id ="editpriceSalad" name="price" value="<?php
			if (isset($_GET["saladselect"]))
			{
				echo $salad->getPriceByName($_GET["saladselect"]);
			}

			?>">
			</input></br>

			Description<input type="text" id="editdescriptionSalad" name="description" value="<?php
			if (isset($_GET["saladselect"]))
			{
				echo $salad->getDescriptionByName($_GET["saladselect"]);
			}

			?>">
			</input></br>

			<input type="text" id="editidSalad" name="id" value="<?php
			if (isset($_GET["saladselect"]))
			{
				echo $salad->getIdByName($_GET["saladselect"]);
			}

			?>"></input></br>
	<input type="submit">
	</form>
	</br></br></br></br></br>
	</div>

<div id="NewOther" style="display:none">
		<form id="Other" method="POST" action="./Other.Add.php" onsubmit="return  ValidateOther();">
			<h1>Add new Roll or Stromboli</h1>
	Name<input type="text" name="name"></input></br>
	Price of Full<input type="text" name="pricel"></input></br>
	Price of Half<input type="text"  name="prices"></input></br>
	Description<input type="text" name="description"></input></br>
	Type<input type="text" name="type"></input></br>
	</br>
	<input type="submit">
	</form>
	</br></br>
</div>
<div id = "editOther" style="display:none">
	<h1>Edit Roll or Stromboli</h1>
	<?php
	$other = new Other();
	    $allothers = array();
	    $allothers = $other->getAllOther();
	    $idp=1;
	echo('<span class="othernamesspan"><form id="othernamesubmit" method="GET" ><select class="editothernames" name="otherselect"
                     onchange="this.form.submit()">');
	    while(!empty($allothers[$idp]))
            {
		 echo('<option class="othernameoption"
                       name="'.$allothers[$idp]["Name"].'">');
		  echo($allothers[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }
	    echo('</select></form></span><br />');
	    ?>
			<form id="EditOther" method="POST" action="./updateother.php" onsubmit=" return ValidateOtherEdit();">

			Name<input type="text" id="editnameOther" name="name" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $_GET["otherselect"];
			}

			?>">
			</input></br>

			Price of Full<input type="text" id="editpricelOther" name="pricel" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $other->getPricelByName($_GET["otherselect"]);
			}

			?>">
			</input></br>

			Price of Half<input type="text" id="editpricesOther" name="prices" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $other->getPricesByName($_GET["otherselect"]);
			}

			?>">
			</input></br>

			Description<input type="text" id="editdescriptionOther" name="description" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $other->getDescriptionByName($_GET["otherselect"]);
			}

			?>">
			</input></br>

			Type<input type="text" id="editTypeOther" name="type" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $other->getTypeByName($_GET["otherselect"]);
			}

			?>">
			</input></br>


			<input type="text" id="editidOther" name="id" value="<?php
			if (isset($_GET["otherselect"]))
			{
				echo $other->getIdByName($_GET["otherselect"]);
			}

			?>"></input></br>
			<input type="submit">
			</form>
			</br></br></br></br></br></br>
		</div>
<div id="NewCalzone" style="display:none">
	<form id="Calzone" method="POST" action="./Calzones.add.php" onsubmit=" return ValidateCalzone();">
	<h1>Add new Calzone</h1>
	Name<input type="text" name="name"></input></br>
	Price of Large<input type="text" name="prices"></input></br>
	Price of Small<input type="text"  name="pricel"></input></br>
	Description<input type="text" name="description"></input></br>
	Fillings<input type="text" id="fillings" name="fillings"></input></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="fillingsdiv"><h1>Select Fillings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="fillingsspan"><input type="checkbox"
                     class="fillings" id="'.$alltoppings[$id]["name"].'"
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;    }
echo('</div>');
?>
</br>
	<input type="submit">
	</form>
	</br></br></br></br></br></br>
</div>
<div id="editCalzone" style="display:none">
<h1> Edit Calzone </h1>
	<?php
	$calzone = new Calzone();
	    $allcalzones = array();
	    $allcalzones = $calzone->getAllCalzones();
	    $idc=1;
	echo('<span class="calzonenamesspan"><form id="calzonenamesubmit" method="GET" ><select class="editcalzonenames" name="calzoneselect"
                     onchange="this.form.submit()">');
	    while(!empty($allcalzones[$idc]))
            {
		 echo('<option class="calzonenameoption"
                       name="'.$allcalzones[$idc]["Name"].'"
                       value="'.$allcalzones[$idc]["Toppings"].'">');
		  echo($allcalzones[$idc]["Name"]);
		  echo('</option>');
		  $idc++;
	    }
	    echo('</select></form></span><br />');
	    ?>
	<form id="EditCalzone" method="POST" action="./updatecalzone.php" onsubmit=" return ValidateCalzoneEdit();">
	Price of small<input type="text" id ="editprices" name="prices" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		echo $calzone->getPricesByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}

	?>">

	</input></br>
	Price of Large<input type="text" id ="editpricel" name="pricel" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		echo $calzone->getPricelByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}

	?>">
	</input></br>
	Description<input type="text" id="editdescription" name="description" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		echo $calzone->getDescriptionByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	?>">
	</input></br>
	Toppings<input type="text" id="editcalzonetoppings" name="calzonetoppings" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		$toppings = $calzone->getToppingsByName($calzone->getNameByFillings($_GET["calzoneselect"]));
		echo $calzone->getToppingsByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	?>">

	</input>
	<input type="text" id="editname" name="name" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		echo $calzone->getNameByFillings($_GET["calzoneselect"]);
	}

	?>"></input>
	<input type="text" id="editidCalzone" name="id" value="<?php
	if (isset($_GET["calzoneselect"]))
	{
		echo $calzone->getIdByFillings($_GET["calzoneselect"]);
	}

	?>"></input>
	</br><input type="submit" value="edit"></form></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="calzonetoppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="calzonetoppingspan"><input type="checkbox"
                     class="editcalzonetoppings" id="'.$alltoppings[$id]["name"].'editc"
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }

echo('</div>');

?>
	<input type="submit">
</br>
</br>
</br></br></br></br>
	</div>
	</div>
	</body>


<script>
function getalltoppings(formname, inputname){

//makes array of all toppings checked when submitted
	 var checkboxes = [];
	 var alltoppings = [];
  checkboxes = document.getElementById(formname).getElementsByTagName('input')

  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      if(checkboxes[i].checked == true)
      alltoppings.push(checkboxes[i].value);
    }
  }
  document.getElementById(inputname).value = alltoppings+",";
  return alltoppings;
}
function initialCheck(item, name)
{
	//makes array of toppings that initially come on pizza this is important because
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe\
	uncheckAll(name);
	var temp = "";
	var toppings = item.value;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else
		{
			document.getElementById(temp).checked = true;
			temp = "";
		}
}
}
function EditPizzaToppings(item, name)
{
	//makes array of toppings that initially come on pizza this is important because
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe
	uncheckAll(name);

	var temp = "";
	var toppings = item;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else
		{
			document.getElementById(temp+"edit").checked = true;
			temp = "";
		}
}
}
function EditCalzoneToppings(item, name)
{
	//makes array of toppings that initially come on pizza this is important because
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe
	uncheckAll(name);

	var temp = "";
	var toppings = item;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else
		{
			document.getElementById(temp+"editc").checked = true;
			temp = "";
		}
}
}
function initialCheckCalzone(item, name)
{
	//makes array of toppings that initially come on pizza this is important because
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe\
	uncheckAll(name);
	var temp = "";
	var toppings = item.value;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else
		{
			document.getElementById(temp+"2").checked = true;
			temp = "";
		}
}
}

function ValidatePizza(){
	var name = document.forms["Pizza"]["name"].value;
	var prices = document.forms["Pizza"]["prices"].value;
	var pricem = document.forms["Pizza"]["pricem"].value;
	var pricel = document.forms["Pizza"]["pricel"].value;
	var pricesl = document.forms["Pizza"]["pricesl"].value;
	var description = document.forms["Pizza"]["description"].value;
	if (prices == "" || isNaN(prices) || prices < 0){
		alert("Price of a small is empty or not a valid number");
		return false;
	}
	else if (pricem == "" || isNaN(pricem) || pricem < 0) {
		alert("Price of a medium is empty or not a valid number");
		return false;
	}
	else if (pricel == "" || isNaN(pricel) || pricel < 0) {
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (pricesl == "" || isNaN(pricesl) || pricesl < 0) {
		alert("Price of a slice is empty or not a valid number");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateToppings(){
	var name = document.forms["testtoppings"]["name"].value;
	if (name==""){
		alert("Topping name can not be empty");
		return false;
	}
	else {
		return true;
	}
}

function ValidatePizzaEdit(){
	var name = document.forms["PizzaEdit"]["name"].value;
	var prices = document.forms["PizzaEdit"]["prices"].value;
	var pricem = document.forms["PizzaEdit"]["pricem"].value;
	var pricel = document.forms["PizzaEdit"]["pricel"].value;
	var pricesl = document.forms["PizzaEdit"]["pricesl"].value;
	var description = document.forms["PizzaEdit"]["description"].value;
	if (prices == "" || isNaN(prices) || prices < 0){
		alert("Price of a small is empty or not a valid number");
		return false;
	}
	else if (pricem == "" || isNaN(pricem) || pricem < 0) {
		alert("Price of a medium is empty or not a valid number");
		return false;
	}
	else if (pricel == "" || isNaN(pricel) || pricel < 0) {
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (pricesl == "" || isNaN(pricesl) || pricesl < 0) {
		alert("Price of a slice is empty or not a valid number");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateSubEdit(){
	var name = document.forms["EditSub"]["name"].value;
	var pricef = document.forms["EditSub"]["pricef"].value;
	var priceh = document.forms["EditSub"]["priceh"].value;
	var description = document.forms["EditSub"]["description"].value;
	var temp = document.forms["EditSub"]["temp"].value;
	if (pricef == "" || isNaN(pricef) || pricef < 0){
		alert("Price of a full is empty or not a valid number");
		return false;
	}
	else if (priceh == "" || isNaN(priceh) || priceh < 0) {
		alert("Price of a half is empty or not a valid number");
		return false;
	}
	else if (temp == "" ) {
		alert("Temperature can not be empty");
		return false;
	}
	else if (name == "" ) {
		alert("Name can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateSub(){
	var name = document.forms["testsub"]["name"].value;
	var pricef = document.forms["testsub"]["pricef"].value;
	var priceh = document.forms["testsub"]["priceh"].value;
	var description = document.forms["testsub"]["description"].value;
	var temp = document.forms["testsub"]["temp"].value;
	if (pricef == "" || isNaN(pricef) || pricef < 0){
		alert("Price of a full is empty or not a valid number");
		return false;
	}
	else if (priceh == "" || isNaN(priceh) || priceh < 0) {
		alert("Price of a half is empty or not a valid number");
		return false;
	}
	else if (temp == "" ) {
		alert("Temperature can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateSalad(){
	var price = document.forms["testsalad"]["price"].value;
	var name = document.forms["testsalad"]["name"].value;
	var description = document.forms["testsalad"]["description"].value;

	if (price == "" || isNaN(price) || price < 0){
		alert("Price of a full is empty or not a valid number");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateSaladEdit(){
	var price = document.forms["EditSalad"]["price"].value;
	var name = document.forms["EditSalad"]["name"].value;
	var description = document.forms["EditSalad"]["description"].value;

	if (price == "" || isNaN(price) || price < 0){
		alert("Price of a full is empty or not a valid number");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateOther(){
	var name = document.forms["Other"]["name"].value;
	var pricel = document.forms["Other"]["pricel"].value;
	var prices = document.forms["Other"]["prices"].value;
	var description = document.forms["Other"]["description"].value;
	var type = document.forms["Other"]["type"].value;
	if (pricel == "" || isNaN(pricel) || pricel < 0){
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (prices == "" || isNaN(prices) || prices < 0) {
		alert("Price of a small is empty or not a valid number");
		return false;
	}
	else if (type == "" ) {
		alert("Type can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateOtherEdit(){
	var name = document.forms["EditOther"]["name"].value;
	var pricel = document.forms["EditOther"]["pricel"].value;
	var prices = document.forms["EditOther"]["prices"].value;
	var description = document.forms["EditOther"]["description"].value;
	var type = document.forms["EditOther"]["type"].value;
	if (pricel == "" || isNaN(pricel) || pricel < 0){
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (prices == "" || isNaN(prices) || prices < 0) {
		alert("Price of a small is empty or not a valid number");
		return false;
	}
	else if (type == "" ) {
		alert("Type can not be empty");
		return false;
	}
	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateCalzone(){
	var name = document.forms["Calzone"]["name"].value;
	var pricel = document.forms["Calzone"]["pricel"].value;
	var prices = document.forms["Calzone"]["prices"].value;
	var description = document.forms["Calzone"]["description"].value;
	if (pricel == "" || isNaN(pricel) || pricel < 0){
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (prices == "" || isNaN(prices) || prices < 0) {
		alert("Price of a small is empty or not a valid number");
		return false;
	}

	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ValidateCalzoneEdit(){
	var name = document.forms["CalzoneEdit"]["name"].value;
	var pricel = document.forms["CalzoneEdit"]["pricel"].value;
	var prices = document.forms["CalzoneEdit"]["prices"].value;
	var description = document.forms["CalzoneEdit"]["description"].value;
	if (pricel == "" || isNaN(pricel) || pricel < 0){
		alert("Price of a large is empty or not a valid number");
		return false;
	}
	else if (prices == "" || isNaN(prices) || prices < 0) {
		alert("Price of a small is empty or not a valid number");
		return false;
	}

	else if (description == "") {
		alert("Description can not be empty");
		return false;
	}
	else if (name == "") {
		alert("Name can not be empty");
		return false;
	}
	else {
		alert("Entered");
		return true;
	}
}

function ShowNewPizza(){
	var x = document.getElementById('NewPizza');
	if (x.style.display == "none") {
			x.style.display = "block";
	} else {
			x.style.display = "none";
	}
}

function ShowEditPizza(){
	var x = document.getElementById('editPizza');
	if (x.style.display == "none") {
			x.style.display = "block";
	} else {
			x.style.display = "none";
	}
}

function ShowNewTopping(){
	var x = document.getElementById('NewTopping');
	if (x.style.display == "none") {
			x.style.display = "block";
	} else {
			x.style.display = "none";
	}
}

function ShowNewSub(){
	var x = document.getElementById('NewSub');
	if (x.style.display == "none") {
			x.style.display = "block";
	} else {
			x.style.display = "none";
	}
}

function ShowEditSub(){
	var x = document.getElementById('editSub');
	if (x.style.display == "none") {
			x.style.display = "block";
	} else {
			x.style.display = "none";
	}
}

function ShowNewSalad(){
	var x = document.getElementById('NewSalad');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function ShowEditSalad(){
	var x = document.getElementById('editSalad');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function ShowNewOther(){
	var x = document.getElementById('NewOther');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function ShowEditOther(){
	var x = document.getElementById('editOther');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function ShowNewCalzone(){
	var x = document.getElementById('NewCalzone');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function ShowEditCalzone(){
	var x = document.getElementById('editCalzone');
	if (x.style.display == 'none') {
			x.style.display = 'block';
	} else {
			x.style.display = 'none';
	}
}

function uncheckAll(formname){
//unchecks all the checkboxes
  var checkboxes = [];
  checkboxes = document.getElementsByTagName('input');

  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      checkboxes[i].checked = false;
    }
  }

}
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'pizzatoppings');
});
$(".editpizzatoppings").change(function() {
    getalltoppings('editPizza', 'editpizzatoppings');
});
$(".editcalzonetoppings").change(function() {
    getalltoppings('editCalzone', 'editcalzonetoppings');
});

</script>
</html>
<?php
	if (isset($_GET["pizzaselect"]))
	{
	echo("<script type='text/javascript'>
		EditPizzaToppings('".$_GET["pizzaselect"]."', 'EditPizza');
		 </script>");
	 }

	 	if (isset($_GET["calzoneselect"]))
	{
	echo("<script type='text/javascript'>
		EditCalzoneToppings('".$_GET["calzoneselect"]."', 'EditCalzone');
		 </script>");
	 }?>
