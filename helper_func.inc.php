
<!DOCTYPE html>
<?php
    include_once ("Product.php");
	function c_table($header,$products,$prod,$s_v)
	{
		echo "<table border = '1' align = 'center' width = '60%'><tr>";	
		for($i = 0 ; $i < count($header); $i++)
		{
				echo "<th>".$header[$i]."</th>";
		}			
		echo "</tr>";
		for($j = 0 ; $j < count($products) ; $j++)
		{
			if($prod[$j]['count'] > 0)
			{
				echo "<tr>
						<td>".$products[$j]->getCode()."</td>
						<td>".$products[$j]->getName()."</td>
						<td>".$products[$j]->getPrice()."</td>
						<td>".$prod[$j]['count']."</td>	
						<td>".$products[$j]->getPrice()*$prod[$j]['count']."</td>
					  </tr>";
			}
		}
		echo "<tr>
				<td colspan = '4' >"."Total"."</td>
				<td>".$s_v['0']."</td>	
			  </tr>";
		echo "<tr>
				<td colspan = '4' >"."VAT 7%"."</td>
				<td>".$s_v['1']."</td>	
			  </tr>";
	    echo "<tr>
				<td colspan = '4' >"."Amount"."</td>
				<td>".$s_v['2']."</td>	
			  </tr>";
		echo "</table>";
	}
	function cal_price($products,$prod)
	{
		$sum = array(0,0,0);
		$sum_list = 0;
		for($i=0;$i<count($products);$i++)
		{
			$sum_list = $products[$i]->getPrice()*$prod[$i]['count'];
			$sum[0] += $sum_list;
		}	
		$sum[1] = $sum[0]*0.07;
        $sum[2] = $sum[0]*1.07;
        return $sum;
	}
?>