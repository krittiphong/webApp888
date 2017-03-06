<!DOCTYPE html>
<?php
	include ("header.php");
	/*include ("helper_func.inc.php");
	include ("Cart.php");
	include_once ("Product.php");*/
	//session_start();
	spl_autoload_register(function ($class_name){
	    include $class_name . ".php";
    });
	//print_r($_SESSION["products"]);
	$products = unserialize($_SESSION["products"]);
	$num = $_POST['num'];
    $sum1 = array();
	for($i=0;$i<count($products);$i++)
	{
		$prod [$i]= array("code"=>$products[$i]->getCode(),"count"=>$num[$i]);
	}
	$s_vat = new Cart($products,$prod);
	//caculatewithhelper
    $s_v = $s_vat->cal_p($products,$prod);
	$header = array("Code","Name","Price","Order","Total");
	c_table($header,$products,$prod,$s_v);
?>
<footer>
	<?php 
		include ("footer.php");
		show_source("calculate_cart.php");
	?>
</footer>