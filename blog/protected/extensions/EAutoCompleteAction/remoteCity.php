<?php
class RemoteCity extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
    	echo file_get_contents('http://192.81.249.27/ongkirCity.php?term='.$_GET['term']);

    }
}