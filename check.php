<?php
session_start();
include ("wfcart.php");
include("dbconfig.php");
error_reporting(0);
function placeorder()
{
include("dbconfig.php");
$cart =& $_SESSION['wfcart'];
if(!is_object($cart)) $cart = new wfCart();
	
echo "<h3 align='center'><br/><br/>Your order has been placed</h3>";
echo "<h3 align='center'><br/><a href='quantity.php'><input type='button' value='Continue Shopping'/></a><br/></h3></center>";
$delquery = "delete from `orders_placed`";
$connect14= mysql_connect($dbhost,$dbuser,$dbpass) or die("Couldn't connect");
mysql_select_db($dbname) or die("Couldn't find db");
mysql_query($delquery,$connect14) or die(mysql_error());

foreach($cart->get_contents() as $item) 
						{
							$cart->del_item($item['id']);
						}
						
						
}
?>
<?php
include("dbconfig.php");
$connect1=mysql_connect($dbhost,$dbuser,$dbpass) or die("Couldn't connect");
mysql_select_db($dbname) or die("Couldn't find db");
$username = mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'username');
				
echo <<<HTML
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="jquery-1.6.2.min.js"></script>
<script src="jquery/ui/jquery.ui.core.js"></script>
<script src="jquery/ui/jquery.ui.widget.js"></script>
<script src="jquery/ui/jquery.ui.button.js"></script>
<link rel="stylesheet" href="jquery/development-bundle/demos/demos.css">
<link rel="stylesheet" href="jquery/development-bundle/themes/base/jquery.ui.all.css">
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	color: #7F5A00;
}


a:visited {
	color: #7F5A00;
}

a:hover {
	color: red;
}

a:active {
color: yellow;
}
#usernam{
color:white;
}
#passwor{
color:white;
}
.heading
{
	font-size:35px;
	}
	h1{
text-align: center;
}
th{
font-size: larger;
height:2em;
}
.tabla{

margin-left: auto;
margin-right: auto;
margin-top: 0px;

}
#table1{
border-collapse: collapse;
}
#buttons1{
margin-left:46%;
}
.heading
{
	font-size:35px;
	}
.text1{
color:black;
}
#table12
{
background:white;
margin-left: auto;
margin-right: auto;
width:300px;
}
#regis{
backgroud:black;
border-collapse:collapse;
border:1px solid green;
width:300px
}
#backg{
background:url(images/neon.gif);
background-repeat:both;
border:clear;
height:1100px;
width:100%; 
left:0;
z-index:-1;
margin:0;
}
td{
text-align:center;
}
#text34{
color:#E80C5A;
width:50%;
text-align:justify;
margin-right:30px;
margin-left:auto;
}
input{
background:#91FF00;
}
#submitbox { 
font-famil	y: verdana, arial, sans-serif; 
font-size: 75%; 
color: #000000; 
font-weight: light; 
border: #797979 1px solid; 
background-color: #ffffff; 
}
body{
background:url(images/greenback.png);
}
 .focusField{  
        border:solid 2px #73A6FF;  
        background:#black;  
        color:#000;  
    }  
    .idleField{  
        background:#EEE;  
        color: #6F6FFF;  
        border: solid 2px #DFDFDF;  
    }  
</style>
<!--
<script type="text/javascript" >
$(document).ready(function() {  
    $('input[type="text"]').addClass("idleField");  
    $('input[type="password"]').addClass("idleField");  
    $('input[type="text"]').focus(function() {  
        $(this).removeClass("idleField").addClass("focusField");  
        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        }  
    });
    $('input[type="password"]').focus(function() {  
        $(this).removeClass("idleField").addClass("focusField");  
        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        }  
    });  
$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});    
    $('input[type="password"]').blur(function() {  
        $(this).removeClass("focusField").addClass("idleField");  
        if ($.trim(this.value == '')){  
            this.value = (this.defaultValue ? this.defaultValue : '');  
        }  
    });  
   
    $('input[type="text"]').blur(function() {  
        $(this).removeClass("focusField").addClass("idleField");  
        if ($.trim(this.value == '')){  
            this.value = (this.defaultValue ? this.defaultValue : '');  
        }  
    });  
});
</script>
-->
</head>

<body >
<div class="body1">
	<table cellspacing="0" cellpadding="0" height="80"  border="0" bordercolor="#FFFFFF" style="border-bottom-color:#FFFF00; border-bottom-style: dashed; border-bottom-	width:2px; width: 99%; float: none;">
		<tbody>
			<tr height="50">
				<td align="center" width="10%" rowspan=2>
					<img width="100" height="100" src="images/bike.jpg" alt=""/>
				</td>
			
				<td align="center" width="75%">
  				<p align="center" style="text-shadow:3.8px 3.8px 3.8px white	; font-style:sans-serif; color:green; font-size:70px; font-weight: bold;"><b id="heading">ECO CYCLE</b></p>
  				</td>
  			
  				
HTML;
  				if($_SESSION{'loggedin'} == TRUE)
				{
				echo "<td><h3 align= 'center' style='color:green;'>Welcome ".$_SESSION{'username'}."<br/><a href='logout.php'>Log out</a></h3></td>";		
  				}
  				if($_SESSION{'loggedin'} == FALSE)
				{

echo <<<HTML
<td>
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
&nbsp;&nbsp;<a href="index.php">Sign In</a>
</td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php">Sign Up</a>
</td>
</tr>
</table>
<form method="get" action="http://www.google.com/search">
<table cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td>
        <img class="search-gif" border="0" src="http://lib.store.yahoo.net/lib/yhst-17013773219467/searchgif.gif" alt=""/>
      </td>
      <td>
        <input class="search-input" type="text" style="width: 114px" size="10" name="query"/>
      </td>
      <td>
        <input class="search-go" type="image" src="http://lib.store.yahoo.net/lib/yhst-17013773219467/go.gif"/>
      </td>
      </tr>
    </tr>
  </tbody>
</table>
</form>
HTML;
}	
echo <<<HTML
  			</tr>
  			<tr>
  			<td>	
				<table border="0" bordercolor="#FFFFFF" width="500" align="center">
					<tbody>
					<tr>
					<td align="center"
>
						<a rel="nofollow" href="final.php" ><b style="color:green;text-shadow:0.5px 0.5px 0.5px ;font-size:24px"></b></a>
					</td>
					<td align="center"
>
						<a rel="nofollow" href="quantity.php"><b  style="color:green;text-shadow:0.5px 0.5px 0.5px #22A6B0 ;font-size:24px" > Products </b></a>
					</td>
					<td align="center"
>
						<a rel="nofollow" href="forum.php?show"><b  style="color:green;text-shadow:0.5px 0.5px 0.5px #22A6B0 ;font-size:24px"></b></a>
					</td>
					<td align="center"
>
						<a rel="nofollow" href="contact-us.php" ><b style="color:green;text-shadow:0.5px 0.5px 0.5px #22A6B0 ;font-size:24px"></b></a></td>
					<td align="center"
>
						<a href="" ><b style="color:green;text-shadow:0.8px 0.8px 0.8px #22A6B0 ;font-size:24px"></b></a>
					</td>
					<td>
					</td>
			
					</tr>
					</tbody>
				</table>	
			</td>
		
<td width="10%" rowspan=4>
HTML;

echo <<<HTML

</td>
</tr>
</tbody>
</table>
<div id="backg">
<center>
HTML;
function checkout()
{
include("dbconfig.php");
$total = @($_POST['ctotal']);
$tax1 = (0.12)*$total;
$ftotal = $total + $tax1;
echo '
						<form action="check.php" method="POST">
							<h3 align="center">
							<input type="hidden" name="ctotal" value="'.$total.'"/>
							<input type="text" name="mcode" value="enter code"/>
							<input type="submit" value="Get Discount" name="discount"/></h3>
						</form>
						<h3 align="center"><br/>Your total amount: $'.number_format($total,2).'</h3>
						<h3 align="center"><br/>Tax @12%: $'.number_format($tax1,2).'</h3>
						<h3 align="center"><br/>Your total is: $'.number_format($ftotal,2).'</h3>';
					
}
function fields()
{						
include("dbconfig.php");
$connect31=mysql_connect($dbhost,$dbuser,$dbpass) or die("Couldn't connect");
mysql_select_db($dbname,$connect31) or die("Couldn't find db");
$street = mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'street');
$city = mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'city');
$state = mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'state');
$zipcode = mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'zipcode');
						
echo "<h3 align='center'><br/><br/><br/><br/>please enter the following fields to ship the order</h3>";
echo '	<form action="check.php" method="POST">
		<div style="margin-left:auto;margin-right:auto;margin-top:5em;" align="center">
				<table style="background-color:white; font-size : 177%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #630;" width = "60%" border = "1">
					<center>
					<tr > <td align="center" width="40%"> Credit Card Number&nbsp;</td><td width="60%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #660;" type ="text" size="40" name="creditcardno" value="'.$creditcardno.'"/></td> 
  					</tr>
  					<tr > <td align="center"> Name on credit card</td><td width="60%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #660;" type ="text" size="40" name="creditname" value="'.$creditname.'"/></td> 
  					</tr>
  					<tr > <td align="center"> Expiry Date&nbsp;</td><td width="60%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #660;" type ="text" size="40" name="expiry" value="'.$expiry.'"/></td> 
  					</tr>
  					<tr > <td align="center"> CVV No&nbsp;</td><td width="60%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #660;" type ="text" size="40" name="cvvno" value="'.$cvvno.'"/></td> 
  					</tr>
					 <tr > <td align="center"> Street&nbsp;</td><td width="60%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #660;" type ="text" size="40" name="street" value="'.$street.'"/></td> 
  					</tr>
					<tr > <td align="center"> City&nbsp;</td><td width="80%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #630;" type ="text" size="40" name="city" value="'.$city.'"/></td> 
					 </tr>
					 <tr > <td align="center"> State&nbsp;</td><td width="80%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #630;" type ="text" size="40" name="state" value="'.$state.'"/></td> 
					 </tr>
					 <tr > <td align="center"> Zipcode&nbsp;</td><td width="80%" ><input style="background-color:white; font-size : 77%;
  font-family : "Myriad Web",Verdana,Helvetica,Arial,sans-serif;
  background : #efe none; color : #630;" type ="text" size="40" name="zipcode" value="'.$zipcode.'"/></td> 
					 </tr>
					</center>
				<table>
				<br/><br/>
				<input type="Submit" value="Place Order" name="placeorder"/>
	</div>
	</form>';
echo "<h3 align='center'><br/><a href='quantity.php'><input type='button' value='Continue Shopping'/></a><br/></h3></center>";
}
?>

<?php
include("dbconfig.php");
if(isset($_POST['checkout']))
{
	checkout();
	fields();
	unset($_POST['checkout']);
}
if(isset($_POST['placeorder']))
{
	$zipcode = @($_POST['zipcode']);
	$city= @($_POST['city']);
	$cardno = @($_POST['creditcardno']);
	$name = @($_POST['creditname']);
	$expiry = @($_POST['expiry']);
	$cvvno = @($_POST['cvvno']);
	
	
	$patt_zip = '/\d{5}/';
	$patt_zip4 = '/\d{5}-\d{4]/';
	$patt_city ='/[a-zA-Z]+/i';
	$patt_no = '/\d{12}/i';
	$patt_name = '/[\w\s]/i';
	$patt_ex = '/\d{2}\/\d{4}/i';
	$patt_cvv = '/\d{3}/';
	
	
	if(preg_match($patt_no, $cardno , $matches))
		{
		}	
	else	
		{
			echo "<h3 style='color:red;'>Card Number Error: Please enter 12 digit card number in the format <br/> For ex: 9505367813241545</h3>";	
			checkout();
			fields();
			exit();
		}	
	if(preg_match($patt_name, $name , $matches))
		{
		}	
	else
		{
			echo "<h3 style='color:red;'>Card Name Error: Please enter your card name in alphabets only<br/> For ex: Mary Jones</h3>";	
			checkout();
			fields();
			exit();
		}
	if(preg_match($patt_ex, $expiry , $matches))
		{
		}	
	else
		{
			echo "<h3 style='color:red;'>Expiry number Error: Please enter expiry date in the format<br/> For ex: 05/2013</h3>";	
			checkout();
			fields();
			exit();
		}
	if(preg_match($patt_cvv, $cvvno , $matches))
		{
		}	
	else
		{
			echo "<h3 style='color:red;'>Cvv number Error: Please enter cvv number in the format<br/> For ex: 013</h3>";	
			checkout();
			fields();
			exit();
		}
	if(preg_match($patt_city, $city , $matches))
		{
		}	
	else
		{
			echo "<h3 style='color:red;'>City Error: Please enter city in alphabets only<br/> For ex: Santa Clara</h3>";	
			checkout();
			fields();
			exit();
		}
	if(preg_match($patt_zip, $zipcode , $matches) || preg_match($patt_zip4, $zipcode , $matches))
		{
		}	
	else
		{
			echo "<h3 style='color:red;'>Pincode Error: Please enter a five or nine digit pin code<br/> For ex: 95053 or 95053-2609</h3>";	
			checkout();
			fields();
			exit();
		}

	if($_POST['street']&&$_POST['city']&&$_POST['state']&&$_POST['zipcode']&&$_POST['creditcardno']&&$_POST['creditname']&&$_POST['expiry']&&$_POST['cvvno'])
	{
	placeorder();
	unset($_POST['placeorder']);
	}
	else
	{ 
	checkout();
	fields();
	}
}
if(isset($_POST['discount']))
{
	getdiscount();
	unset($_POST['discount']);
}



?>
<?php


function getdiscount()
{
include("dbconfig.php");
	$flag = 0;
	$total1 = @($_POST['ctotal']);
//	echo $total1;
	$mcode = @($_POST['mcode']);
	set_time_limit(0);
	
	$connect = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
	mysql_select_db($dbname,$connect) or die(mysql_error());
	$username = $_SESSION{'username'};
	//mysql_result(mysql_query('SELECT * FROM users WHERE `logged_in`=1'),0,'username');
	$query133 = 'select * from `users`where `username` = "'.$username.'"';
	$result133 = mysql_query($query133, $connect) or die(mysql_error());
	if($username)
	{
	
	for($i=0;$i<mysql_num_rows($result133);$i++)
		{
			$code = mysql_result($result133,$i,'member_code');
			if($code == $mcode)
			{
				$flag = 1;
			}
		}	
	if($flag==1)
		{
			$tax = (0.12)*$total1;
			$ftotal = (0.9)*$total1 + $tax;
			echo "<h3 align='center'><br/><br/>Your Code is accepted and you get 10% off </h3>";	
			echo "<h3 align='center'><br/><br/>Your total is $ ".number_format($ftotal,2)."</h3>";
			fields();	
		}
	else
		{
			echo "<h3 align='center' style='color:red;'><br/><br/>Please enter your valid code	</h3>";			
			echo "<h3 align='center'><br/>Please enter your code to get 10% off on your total<br/><br/></h3>";	
			checkout();
			fields();
		}

	}
	else
	{
	//	echo "$username is username";
		echo '<br/><br/><h3>Please Sign in order to enter your member code</h3>';
		echo '<a href="index.php"><input type="button" value="log in"/>';
	
	
	
	}	

}
?>