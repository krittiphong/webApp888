<?php
include ("Product.php");
class ProductList
{
    private $product = array();
    public function __construct($conn)
    {
        $sql = "select * from products";
        $res = $conn -> query($sql);
        $i =0;
        while($row = $res ->fetch_assoc())
        {
            $this->product[$i] = new Product($row['product_code'],$row['product_name'],$row['price']);
            $i++;
        }
        //print_r($product);
    }
    public function get_product(){
        return $this->product;
    }
}

?>
