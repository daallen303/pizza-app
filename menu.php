<?php
  require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");
	require_once("Cart.Class.php");
	require_once("Config.php");
	require_once("Other.Class.php");
	require_once("Calzones.Class.php");
  function dm($amount)
  {
    $string = "" . $amount;
    $dec = strlen($string) - strpos($string,".");

    if (strpos($string,".") === false) return $string . ".00";

    if ($dec == 1)                  return $string . "00";
    if ($dec == 2)                  return $string . "0";
    if ($dec > 3)                   return substr($string,0,strlen($string)-$dec+3);
    return $string;
  }
?>


<script>
  function dm(amount)
  {
    string = "" + amount;
    dec = string.length - string.indexOf('.');

    if (string.indexOf('.') == -1) return string + '.00';

    if (dec == 1)                  return string + '00';
    if (dec == 2)                  return string + '0';
    if (dec > 3)                   return string.substring(0,string.length-dec+3);
    return string;
  }
</script>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Pizza App</title>
  <link rel="stylesheet" type="text/css" href="./DioriosDan.css" >
  <script src="jquery-3.2.1.min.js"></script>
</head>

<style>
</style>


<body>

<div id="mainbody">
    <span id="Header">Pizza App</span>

  <br /><br />

  <hr>
  <div class="forms">

    <div id="menu" style="text-align: center;">
      <button type="button" id="showpizza" class ="menubutton" onclick="ShowPizza()">Pizza</button>
      <button type="button" id="showstromboli" class ="menubutton" onclick="ShowStromboli()">Stromboli</button>
      <button type="button" id="showrolls" class ="menubutton"  onclick="ShowRolls()">Rolls</button>
      <button type="button" id="showcalzone" class ="menubutton"  onclick="ShowCalzone()">Calzones</button>
      <button type="button" id="showsalad" class ="menubutton"  onclick="ShowSalad()">Salad</button>
      <button type="button" id="showsubs"class ="menubutton"  onclick="ShowSubs()">Subs</button>
    </div>

    <p align="center">
    <button type="button" id="backtomenu" onclick="ShowMenu()">Back To Menu</button>
    </p>

    <div id="Pizza">
      <h1>Select Pizza</h1>
      <!--onsubmit="return addPizzaToCart(document.getElementById('quanity').value,
                    document.getElementById('size').value,
                    document.getElementById('pizzaselect'));"-->

      <form id ="PizzasForm" action="addpizzastocart.php" method="POST">
            <img src="pizza.jpeg" id="pizzapicture">

            <input type="hidden" id="alltoppings" name="alltoppings"></input>




	    </br>

	    <?php
	    $pizza = new Pizza();
	    $allpizzas = array();
	    $allpizzas = $pizza->getAllPizzas();
	    $idp=1;
	    echo('<span class="title">Type</span><span class="pizzanamesspan">
                  <select class="pizzanames" name="pizzaselect"
                     onchange="initialCheck(this,');
	    echo("'Pizza'");
	    echo(')">');


	    while(!empty($allpizzas[$idp]))
            {
		 echo('<option class="pizzanameoption"
                       name="'.$allpizzas[$idp]["Name"].'"
                       value="'.$allpizzas[$idp]["Toppings"].'">');
		  echo($allpizzas[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }

	    echo('</select></span><br />

            <span class="title">Quantity</span><span class="pizzaquanity">
            <input type="number"   name="quanity"
                   id="quanity" min="0" max="5" value="0"></span>
            <br />


           <span class="title">Size</span><span class="pizzasize"> <select name="size">
              <option name="slice" value="slice"  >Slice </option>
	      <option name="small" value="small"  >Small </option>
	      <option name="medium" value="medium">Medium</option>
	      <option name="Large" value="Large"  >Large </option>
	    </select></span>');
	    echo('</br></br></br>');
            $topping = new Topping();
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

		$id++;
            }
            echo('</div>');
            ?>

            <br />
            <br />
            <div>
            <input type="submit" class="submit" value="Add Pizza To Cart">
            </div>
      </form>
      <br/>
    </div>


    <div id="Rolls">
      <h1>Select Rolls</h1>
      <form id="rollsorder" method="POST" action="addrollstocart.php">
        <img id="sausagerollspic" src="rolls.jpg" alt="sausagerolls">
        <br />

        <?php
          $other = new Other();
          $allother = array();
          $allrolls = array();
          $allother = $other->getAllOther();
          $idrolls = 1;

          while(!empty($allother[$idrolls]))
          {
	    if($allother[$idrolls]["Type"] == "Roll")
              array_push($allrolls, $allother[$idrolls]);
	    $idrolls++;
          }
          $idrolls = 0;
          while(!empty($allrolls[$idrolls]))
          {
            echo('<br />');
            echo('<span class="rollsname">
                  <input type="checkbox" name="name'.$idrolls.'"
                         value="'.$allrolls[$idrolls]["Name"].'">
                         '.$allrolls[$idrolls]["Name"].'</span>');
	    echo('<span class="rollsprice">
                  <input type="hidden" name="price'.$idrolls.'"
                         value="'.$allrolls[$idrolls]["PriceS"].'">
                         $'.$allrolls[$idrolls]["PriceS"].'</span>');
	    echo('<span class="rollquanity">
                  <input type="number"  class="quanity" name="quanity'.str_replace(' ', '', $allrolls[$idrolls]["Name"]).'" id="quanity'.$allrolls[$idrolls]["Name"].'"
                         min="1" max="5" value="1">
                  </input>
                  </span></br>');

	    $idrolls++;
          }
        ?>

        <input type="hidden" name="rollstoreturn" id="allrollnames" value="">
        <br /><br /><br />
        <input type="submit" class="submit" value="Add Rolls To Cart">
      </form>
    </div>

    <br />

    <div id="Calzone">
      <h1>Select Calzones</h1>
      <form id="CalzoneOrder" method="POST" action="addcalzonetocart.php">
        <img id="calzonepic" src="calzone.jpg" alt="calzones">

        <input type = "hidden" id="allcalzonetoppings" name="allcalzonetoppings">
        <br />

        <?php
          $allcalzones = array();
          $calzone = new Calzone();
          $allcalzones = $calzone->getAllCalzones();
          $idcalzones = 1;

          echo('<br />');
          echo('<span  class="title">Type</span><span class=calzonenamespan"><select class="calzonenames" name="calzoneselect"
               onchange="initialCheckCalzone(this,');
          echo("'Calzone'");
	  echo(')"><option value=""></option>');

          while(!empty($allcalzones[$idcalzones]))
          {
	    echo('<option class="calzonenameoption" name="'.$allcalzones[$idcalzones]
                 ["Name"].'" value="'.$allcalzones[$idcalzones]["Toppings"].'">');
            echo($allcalzones[$idcalzones]["Name"]);
            echo('</option>');
            $idcalzones++;
	  }

          echo('</select></span><br />

          <span class="title">Quantity</span><span class="calzonequanity"><input type="number" name="quanity"
                 id="quanity" min="0" max="5" value="0"></span>
          <br />

	  <span class="title">Size</span><span class="calzonesize"><select name="size">
              <option value="Medium">Medium</option>
              <option value="Large">Large</option>
          </select></span>');

	  echo('</br></br></br>');
	  $topping = new Topping();
          $alltoppings = array();
          $alltoppings = $topping->getAllToppings();
          $idfilling=1;
          echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');

          while(!empty($alltoppings[$idfilling]))
          {
	    echo('<span class="pizzatoppingspan">
                 <input type="checkbox"  class="calzonetoppings"
                 id="'.$alltoppings[$idfilling]["name"].'2"
                 value="'.$alltoppings[$idfilling]["name"].'">');

            echo $alltoppings[$idfilling]["name"];
            echo('</span>');

            $idfilling++;
          }
          echo('</div>');
        ?>

        <input type="submit" class="submit" value="Add Calzones To Cart">

      </form>
    </div>


    <div id="Salad">
      <h1>Select Salads</h1>
      <form id="saladpicker" action="addsaladtocart.php" method="POST">
        <img id="saladpic" src="salad.jpg" alt="salads">
        <?php
          $salad = new Salad();
          $allsalads = array();
          $allsalads = $salad->getAllSalads();
          $ids=1;

          while(!empty($allsalads[$ids]))
          {
            echo('<br />');
            echo('<span class="saladname">'.$allsalads[$ids]["Name"].'</span>');


// ****************************** start of changed block ********************** -->

            echo('<span class="saladprice">
                  <input type="hidden" name="price'.$ids.'"
                         value="'.$allsalads[$ids]["Price"].'">');

            echo('$');
            echo (dm($allsalads[$ids]["Price"]));
            echo('</span>');

            echo('<input type="checkbox" class="salad"
                 name= "'.$allsalads[$ids]["Name"].'"
                 value="'.$allsalads[$ids]["Name"].'">');


	    echo('<span class="saladquantity">');
            echo('<input class="quanity" type=number
                 id ="quanity'.$allsalads[$ids]["Name"].'"
                 name= "quanity'.str_replace(" ","",$allsalads[$ids]["Name"]).'"
                 min="0" max="5" value="1">');
            echo('</span>');
            echo('<br />');
// ****************************** end of changed block ********************** -->

	    $ids++;
          }
        ?>

        <br />
        <input type ="hidden" id="saladstoreturn" name="saladstoreturn">
        <br />
        <input type="submit" class="submit" value="Add Salads To Cart">
      </form>
    </div>

<!-- ****************************** start of changed block ********************** -->
    <div id="Strombolli">
      <h1>Select Strombolis</h1>
      <form id="strombolliorder" method="POST" action="addstrombollitocart.php">
        <img id="strombolipic" src="stromboli.png" alt="stromboli">

        <?php
          $other = new Other();
          $allother = array();
          $allstrombolli = array();
          $allother = $other->getAllOther();
          $idstromb = 1;

          while(!empty($allother[$idstromb]))
          {
	    if($allother[$idstromb]["Type"] == "Strombolli")
              array_push($allstrombolli, $allother[$idstromb]);
	    $idstromb++;
          }

          $idstromb = 0;
          while(!empty($allstrombolli[$idstromb]))
          {
            echo('<span class="strombname"><input type="hidden"
                   name="strombname'.$idstromb.'"
                   value="'.$allstrombolli[$idstromb]["Name"].'">
                   '.$allstrombolli[$idstromb]["Name"].'</span>');


	    echo('<span class="strombprice">
                  <input type="hidden" name="strombprice'.$idstromb.'"
                  value="'.$allstrombolli[$idstromb]["PriceS"].'">');
            echo(' $');
            echo(dm($allstrombolli[$idstromb]["PriceS"]));
            echo('</span>');

	    echo('<input type="checkbox" class="strombolli"
                 name="'.$allstrombolli[$idstromb]["Name"].'"
                 value="'.$allstrombolli[$idstromb]["Name"].'">');

	    echo('<span class="strombquanity">
                 <input type=number class="quanity"
                        id="quanity'.$allstrombolli[$idstromb]["Name"].'"
                        name="quanity'.$allstrombolli[$idstromb]["Name"].'"
                        min="0" max="5" value="1">
                 </input>
	         </span></br></br>');

	    $idstromb++;
          }

        ?>

        <span class="strombname"><input type="hidden" id="strombollistoreturn"
              name="strombollistoreturn" value=""></span>
        <input type="hidden" name="numberofrolltypes" value="<?php echo $idstromb;?>">
        <br />
        <input type="submit" class="submit" value="Add Strombolis To Cart">
      </form>
    </div>

    <div id="Subs">
        <h1>Select Subs</h1>

        <img id="subpic" src="sub.jpg">

        <br />

	<button id="ShowHotButton" onclick="ShowHot()">Hot Subs</button>
	<button id="ShowColdButton" onclick="ShowCold()">Cold Subs</button>
	<button id="ShowAllSubsButton" onclick="ShowAllSubs()">All Subs</button>

	<?php
	  $sub = new Sub();
	  $allsubs = array();
	  $allsubs = $sub->getAllSubs();
	  $idsub=1;
	  $coldsubs = array();

	  echo("<div id='HotSubs'><h1>Hot Subs</h1>");
          echo ("<h3 style='display:inline;'>");
          echo ('<span class="full">Full</span>');
          echo ('<span class="half">Half</span>');
          echo ("Choose");
          echo ('</h3><br />');

          while(!empty($allsubs[$idsub]))
          {
            if($allsubs[$idsub]["Temp"] == "Hot")
	    {
              echo('<span class="subname">
                   '.$allsubs[$idsub]["Name"].'</span>');

              echo('<span class="subdescription">
                    '.$allsubs[$idsub]["Description"].'</span>');

	      echo ('<span class="subpricehalf">');
              echo ('$');
              echo (dm($allsubs[$idsub]["PriceH"]));
              echo ('</span>');

              echo('<span class="subpricefull">');
              echo ('$');
              echo (dm($allsubs[$idsub]["PriceF"]));
              echo('</span>');

	      echo('<input type="checkbox"  id="'.$allsubs[$idsub]["Name"].'" ');
              echo('onclick="ChooseSub(');
	      echo("'");
	      echo($allsubs[$idsub]["Name"]);
	      echo("'");
	      echo(')">');


              //echo('<button id="'.$allsubs[$idsub]["Name"].'" onclick="ChooseSub(');
              //echo("'");
              //echo($allsubs[$idsub]["Name"]);
              //echo("'");
              //echo(')">');
              //echo('Choose');
              //echo('</button>');

              echo ('<br />');
	    }
            else
	    {
              array_push($coldsubs,$allsubs[$idsub]);
	    }

	    $idsub++;
          }

	  echo('</div>');


	  $idsub = 1;
	  echo("<div id='ColdSubs'><h1>Cold Subs</h1>");
          echo ("<h3 style='display:inline;'>");
          echo ('<span class="full">Full</span>');
          echo ('<span class="half">Half</span>');
          echo ("Choose");
          echo ('</h3><br />');

	  while($idsub < count($coldsubs)+1)
	  {

	    echo('<span class="subname">
                 '.$allsubs[$idsub]["Name"].'</span>');

	    echo('<span class="subdescription">
                 '.$allsubs[$idsub]["Description"].'</span>');


	    echo('<span class="subpricehalf">');
            echo('$');
            echo (dm($allsubs[$idsub]["PriceH"]));
            echo ('</span>');

	    echo('<span class="subpricefull">');
            echo('$');
            echo (dm($allsubs[$idsub]["PriceF"]));
            echo ('</span>');


	    echo('<input type="checkbox" id="'.$allsubs[$idsub]["Name"].'" ');
            echo('onclick="ChooseSub(');
	    echo("'");
	    echo($allsubs[$idsub]["Name"]);
	    echo("'");
	    echo(')">');


            //echo('<button id="'.$allsubs[$idsub]["Name"].'" onclick="ChooseSub(');
            //echo("'");
            //echo($allsubs[$idsub]["Name"]);
            //echo("'");
            //echo(')">');
            //echo('Choose');
            //echo('</button>');

            echo('<br />');

            $idsub++;
	  }

	  echo('</div>');

          echo('<div id="SubUpdate">
                <form id="SubOrder" method="POST" action="addsubtocart.php">
          <h1>Tailor Your Sub</h1>
	  Sub Name<input type="text" id="SubChoosen" name="name">
          <span class="subsize">
          Size
          </span>
          <select name="size">
          <option>Half</option>
          <option value="Full">Full</option>
          </select>
          <span class="subqty">
	  Qty
          </span>
          <input type=number name="quanity" min="0" max="5" value="1">
          <br /><br />


          <span class="subtop">
	  <input type="checkbox" name="mayo"  value="mayo"    checked="checked">Mayo
          </span>
          <span class="subtop">
	  <input type="checkbox" name="mustard" value="mustard" checked="checked">Mustard
          </span>
          <span class="subtop">
	  <input type="checkbox" name="vinagrette" value= "vinagrette" checked="checked">Vinaigrette
          </span>
          <span class="subtop">
	  <input type="checkbox" name="lettuce"  value="lettuce"  checked="checked">Lettuce
          </span>
          <span class="subtop">
	  <input type="checkbox" name="olives"  value="olives"   checked="checked">Olives
          </span>
          <span class="subtop">
	  <input type="checkbox" name="onions"  value= "onions"  checked="checked">Onions
          </span>
          <span class="subtop">
	  <input type="checkbox" name="sweetpeppers"      value= "sweetpeppers"         >Sweet Peppers
          </span>
          <span class="subtop">
	  <input type="checkbox" name="hotpeppers"      value= "hotpeppers"           >Hot Peppers
          </span>
          <span class="subtop">
          <input type="checkbox" name="extracheese"      value= "extracheese"           >Extra Cheese
          </span>

          </br></br>

          <input type="hidden" name="allsubtoppings" id="allsubtoppings">
          <input type="submit" class="submit" value="Add Sub To Cart">
          </form>
          </div>');

	?>

    </div>

    <br />


    <div id= "cart">

      <?php
      if(!empty($_SESSION["cart"]["prices"]))
      {
        for($i =0; $i < count($_SESSION["cart"]["prices"]); $i++)
          {
          echo("<span class='CartName'>
               ".$_SESSION["cart"]["quanity"][$i].' '.$_SESSION["cart"]["names"][$i].' '.$_SESSION["cart"]["descriptions"][$i]."</span>");


          

          echo("<span>
               <span class='Price'>Price : </span>");
          echo("<span class='CartPriceTotal'>$".$_SESSION["cart"]["prices"][$i]."</span>");
          echo("</span>");
          }
      }
      ?>

      <span class="spacekeeper"></span>
      <span id="itemtotalheader"><b>Sub Total:</b></span> <span id="itemtotal">$
          <?php
          if(!empty($_SESSION["cart"]["prices"]))
            echo dm(array_sum($_SESSION["cart"]["prices"]));
          ?>
      </span>
      <span class="spacekeeper"></span>
      <span id="totalplustaxheader"><b>Total:</b></span> <span id="totalplustax">$
          <?php
          if(!empty($_SESSION["cart"]["prices"]))
          {
            echo  dm(      array_sum($_SESSION["cart"]["prices"])
                +(.0765)*(array_sum($_SESSION["cart"]["prices"])));
            echo ("<script>");
            echo ("document.formsubmit.price.value = 'Total Price:  $' + dm(0.0); ");
            echo ("</script>");
          }
          ?>
      </span>

    </div>


    <form method="post" name="formsubmit"
        action="mailto:gamblekirby@aol.com?subject=Diorios Online Order"
        onsubmit="return validateNameAndPrice()"
        enctype="text/plain">

      <div class="formsubmit" id="formsubmit">
        <!-- readonly means user can't type into box -->
        <textarea cols="45" rows="5" style="font-size: 12pt" name="cart"
                  readonly="readonly" onclick="AutoGrowTextArea(this)" >
          <?php
            if(!empty($_SESSION["cart"]["prices"]))
            {
              for($i =0; $i < count($_SESSION["cart"]["prices"]); $i++)
                {
                echo(" \n ");
                echo(" Qty:");
                echo($_SESSION["cart"]["quanity"][$i]);

                echo(" ");
                echo($_SESSION["cart"]["names"][$i]);

                echo(" (");
                echo($_SESSION["cart"]["descriptions"][$i]);
                echo(") ");

                echo(" $");
                echo(dm($_SESSION["cart"]["prices"][$i]));
                }
            }
          ?>
        </textarea>

        <br />

        <textarea cols="45" rows="1" style="font-size:12pt" name="totalprice"
                  readonly="readonly" >
          <?php
            if(!empty($_SESSION["cart"]["prices"]))
              {
              echo("$");
              echo(dm(1.0765 * array_sum($_SESSION["cart"]["prices"])));
              }
          ?>
        </textarea>

        <br />

        Name           <input name="name" />
        Phone or Email <input name="phoneoremail" />
        <br /><br />

        <!-- submit button sends the form-data to wherever the form's action= specifies-->
        <input type="submit" value="PLACE YOUR ORDER" />
        <br />

      </div>
    </form>

  </div>


</div>

<script>
  function validateNameAndPrice()
  {
    if (document.formsubmit.name.value == "")
    {
      alert("Please enter your name.");
      return (false);
    }

    if (document.formsubmit.price.value == "")
    {
      alert("No Items Selected");
      return (false);
    }

    if (document.formsubmit.phoneoremail.value == "")
    {
      alert("Please enter a phone number or email");
      return (false);
    }
    return (true);
  }

// Auto-Grow-TextArea script.
// Script copyright (C) 2011 www.cryer.co.uk.
// Script is free to use provided this copyright header is included.
function AutoGrowTextArea(textField)
{
  if (textField.clientHeight < textField.scrollHeight)
  {
    textField.style.height = textField.scrollHeight + "px";
    if (textField.clientHeight < textField.scrollHeight)
    {
      textField.style.height =
        (textField.scrollHeight * 2 - textField.clientHeight) + "px";
    }
  }
}

<!-- ****************************** end of changed block ********************** -->


	  var saladquanity = document.getElementsByClassName("quanity");
for(i = 0; i < saladquanity.length; i++) saladquanity[i].style.display = "none";
	document.getElementById('SubOrder').style.display = "none";
	document.getElementById('backtomenu').style.display = "none";
  document.getElementById('Pizza').style.display = "none";
  document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('ShowHotButton').style.display = "none";
  document.getElementById('ShowColdButton').style.display = "none";
  document.getElementById('ShowAllSubsButton').style.display = "none";
  document.getElementById('Strombolli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('Rolls').style.display = "none";
  //document.getElementById('PizzaNum').style.display = "none";
 // document.getElementById('CalzoneNum').style.display = "none";
   document.getElementById('backtomenu').style.display = "none";
   document.getElementById('SubUpdate').style.display = "none";



function ChooseSub(name)
{
	  var checkboxes = [];
  checkboxes = document.getElementsByTagName('input');

  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox' && checkboxes[i].name != "mayo" && checkboxes[i].name != "mustard" && checkboxes[i].name != "lettuce" && checkboxes[i].name != "vinagrette"
    && checkboxes[i].name != "onions" && checkboxes[i].name != "olives")   {
      if(checkboxes[i].id != name)checkboxes[i].checked = false;
    }
  }
	document.getElementById('SubUpdate').style.display = "block";
	document.getElementById('SubChoosen').value = name;

}
  function ShowPizza() {
      var x = document.getElementById('Pizza');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
      document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";


  }
function ShowStrombolli() {
      var x = document.getElementById('Strombolli');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
      document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";


  }
   function ShowMenu() {
      document.getElementById("menu").style.display = "block"
      document.getElementById("backtomenu").style.display = "none";
      document.getElementById('Pizza').style.display = "none";
  document.getElementById('Strombolli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('SubOrder').style.display = "none";
  document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('Rolls').style.display = "none";
   }
  function ShowStromboli() {
      var x = document.getElementById('Strombolli');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowCalzone() {
      var x = document.getElementById('Calzone');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowRolls() {
      var x = document.getElementById('Rolls');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowSalad() {
      var x = document.getElementById('Salad');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowSubs() {
      var x = document.getElementById('Subs');
      if (x.style.display == 'none') {
          x.style.display = 'block';
             document.getElementById('ShowHotButton').style.display = "block";
  document.getElementById('ShowColdButton').style.display = "block";
  document.getElementById('ShowAllSubsButton').style.display = "block";
      } else {
          x.style.display = 'none';
             document.getElementById('ShowHotButton').style.display = "none";
  document.getElementById('ShowColdButton').style.display = "none";
  document.getElementById('ShowAllSubsButton').style.display = "none";
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowPizzaNum() {
      var x = document.getElementById('PizzaNum');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
  }
  document.addEventListener("selectionchange", function() {
   document.get
});
function ShowHot()
{
	document.getElementById('HotSubs').style.display = "block";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('SubOrder').style.display = "block";
}
function ShowCold()
{
	document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "block";
  document.getElementById('SubOrder').style.display = "block";
}
function ShowAllSubs()
{
	   document.getElementById('HotSubs').style.display = "block";
  document.getElementById('ColdSubs').style.display = "block";
  document.getElementById('SubOrder').style.display = "block";

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
function initialCheckCalzone(item, name)
{
	//makes array of toppings that initially come on calzone this is important because
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
  document.getElementById(inputname).value = alltoppings;
  return alltoppings;
}
function getallchecked(formname, inputname)
{
	var checkboxes = [];
	 var all = [];
  checkboxes = document.getElementById(formname).getElementsByTagName('input');

  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      if(checkboxes[i].checked == true)
      {
      all.push(checkboxes[i].value);
      document.getElementById("quanity"+checkboxes[i].value).style.display = "block";
  }else document.getElementById("quanity"+checkboxes[i].value).style.display = "none";
    }
  }
  document.getElementById(inputname).value = all;
  return all;
}
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'alltoppings');
});
$(".rollsname").change(function() {

    getallchecked('Rolls', 'allrollnames');
});
$(".calzonetoppings").change(function() {
    getalltoppings('Calzone', 'allcalzonetoppings');
});// When input is checked changes value of alltoppings input box to equal the toppings checked

$(".salad").change(function() {
    getallchecked('Salad','saladstoreturn');
});
$(".strombolli").change(function() {
    getallchecked('Strombolli','strombollistoreturn');

});
$(".pizzanames").change(function() {
	getalltoppings('Pizza', 'alltoppings');
});
$(".calzonenames").change(function() {
    getalltoppings('Calzone', 'allcalzonetoppings');
});
$(".subtop").change(function() {
    getalltoppings('SubUpdate', 'allsubtoppings');
});
  </script>
</body>
</html>

<!--function addPizzaToCart(quanity, size, name)
{
	var alltoppings = [];
	alltoppings = getalltoppings('Pizza');
	var initialtoppings = [];
	var toppings = name.value;
	var name = name.options[name.selectedIndex].text;
	var temp = "";
	var count = 0;
	for(var i=0; i < toppings.length-1; i++)
	{
		if(toppings[i]!= " ")
		{
			temp+= toppings[i];

		}else
		{
			initialtoppings.push(temp);
			temp = "";
		}
}
for(var j = 0; j < alltoppings.length; j++)
for(var k = 0; k < initialtoppings.length; k++)
if(alltoppings[j] == initialtoppings[k])count++;

	//from here need to post the name of pizza, size, alltoppings on the pizza, number of extra toppings
// then pull in the price of the pizza and turn it store info in an array
}
function test()
{
	alert("here");
}
/*alert("here");
	var count = counttoppings('pizza');
	var toppingtotal = 0;
	if(size == "slice") toppingtotal = count * .30;
	if(size == "small") toppingtotal = count * .50;
	if(size =="medium") toppingtotal = count * .80;
	if(size == "Large") toppingtotal = count * 1;
	var subtotal = (quanity * price) + toppingtotal;
	var total = subtotal + (subtotal * .08);
	-->
