<!DOCTYPE html>
<?php
	include ("header.php");
    include ("connect.php");
    include ("ProductList.php");
    $p = new ProductList($conn);
	$products = $p->get_product();
	$_SESSION["products"] = serialize($products);
?>
<HTML>
<body>
	<form action="calculate_cart.php" method= "post">
		<table border="1" align="center" width="50%">
			<!-- <tr><th colspan="2" style="text-align :center; font-size: 2.0em;"> ORDER </th></tr> -->
			<tr><th colspan="4" style="text-align :center;">List Product</th></tr>
			<tr align="center" ><td>Code</td><td>Name Product</td><td>Price</td><td>Order</td></tr>
				<?php
					for($i=0;$i<count($products);$i++)
						{ echo 
						"<tr>
							<td>".$products[$i]->getCode()."</td>
							<td>".$products[$i]->getName()."</td>
							<td>".$products[$i]->getPrice()."</td>
							<td> <input type = 'number' min='0' name='num[]'></td>
						</tr>";
						}
				?>
		</table>
		</br>
		</br>
		   <div style="text-align: center;">
			<input type="submit"  class="btn btn-sucsesssess" value="submit" name="submit"  />
		    </div>
     </form>
</body>
<footer>
	<?php 
		include ("footer.php");
		show_source("checkout_cart.php");
	?>
</footer>
</html>