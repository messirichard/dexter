<?php
class EAutoCompleteActionOngkir extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
		require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'ongkir/REST_Ongkir.php';
		$ongkir = new Curl_Ongkir;
		$rest = new REST_Ongkir(array(
	        'server' => 'http://api.ongkir.info/'
	    ));
	    
	    $result = $rest->post('city/list', array(
	        'query' 	=> $_GET['term'], 
	        'type' 	=> 'origin',
	        'courier' 	=> 'jne',
	        'API-Key' 	=> '73c66e6a78277faa7bd5b33f1182e9e3'
	    ));
	    
	    try
	    {
	        $status = $result['status'];
	        
	        // Handling the data
	        if ($status->code == 0)
	        {
	            $cities = $result['cities'];
	            foreach ($cities->item as $key => $item)
	            {
	            	$dataku = (array)$item[0];
	                $this->results[]=$dataku[0];
	            }
	        }
	        else
	        {
	            // echo 'Tidak ditemukan kota yang diawali "band"';	
	        }
	        
	    }
	    catch (Exception $e)
	    {
	        // echo 'Processing error.';
	    }        
	    echo CJSON::encode($this->results);
    }
}