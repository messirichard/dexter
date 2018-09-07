<?php
class RemoteCityLocal extends CAction
{
    public $model;
    public $attribute;
    private $results = array();
 
    public function run()
    {
		$kota = JneKota::model()->findAll('kota LIKE :kota', array(':kota'=>$_GET['term'].'%'));
		foreach ($kota as $key => $value) {
			$this->results[]=$value->kota;
		}
	    echo CJSON::encode($this->results);
    }
}