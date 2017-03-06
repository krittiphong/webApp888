<?php
    include_once ("helper_func.inc.php");
class Cart
{
    private $pro = array();
    private $num;
    private $sum =array();

    public function __construct($products,$prod)
    {
        $this->pro = $products;
        $this->num = $prod;
    }
    public function cal_p($products, $prod){
        return $this->sum =  cal_price($products,$prod);
    }
}