<?php
class EAutoCompleteActionCost extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
		require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'ongkir/REST_Ongkir.php';
	    $rest = new REST_Ongkir(array(
	        'server' => 'http://api.ongkir.info/'
	    ));
	    
	    $result = $rest->post('cost/find', array(
	        'from' 	=> $_POST['from'], 
	        'to' 		=> $_POST['kota'],
	        'weight'	=> $_POST['berat'], 
	        'courier'	=> 'jne',
	        'API-Key' 	=> '73c66e6a78277faa7bd5b33f1182e9e3'
	    ));
	    try
	    {
	        $status = $result['status'];
	        // Handling the data
	        if ($status->code == 0)
	        {
	            $prices = $result['price'];
	            $city	= $result['city'];
	            foreach ($prices->item as $item)
	            {
	            	$item = (array)$item;
	                $this->results[]=$item;
	            }	
	        }
	        else
	        {

	        }
	        
	    }
	    catch (Exception $e)
	    {
	    	echo $e;
	    }
		echo CJSON::encode($this->results);

    }
}