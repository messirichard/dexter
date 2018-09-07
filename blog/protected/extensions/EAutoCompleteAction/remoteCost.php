<?php
class RemoteCost extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
    	// echo file_get_contents('http://192.81.249.27/ongkirCost.php?from=SURABAYA&to='.$_POST['kota']);
    	echo file_get_contents('http://deory.my.phpcloud.com/ongkir/cek.php?kota='.$_POST['kota']);
    	// echo file_get_contents('http://deory.my.phpcloud.com/ongkir/cek.php?kota=MALANG');

    }
}