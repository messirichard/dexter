<?php
/**
 * @author imasia (paul)
 * @param string $action: the action where the data are retrieved
 * @param string $chained: the id of the source of the selection
 * JS lib by Mike Nichols
 */
class scrollto extends CWidget {

    private $jBaseUrl;
	public $id;
	public $htmlOptions=array();
	public $fancy=true;
	public $config=array();
	public $content=array();

    //public $items = array();

    public function init()
    {
        $this->jBaseUrl=Yii::app()->getAssetManager()->publish(dirname(__FILE__));
		if (isset($this->id)) {
			$this->htmlOptions['id']=$this->id;
		} else {
			$this->htmlOptions['id']=$this->getId();
		}
        $this->registerClientScript();
        //parent::init();
    }

    protected function registerClientScript()
    {
        $cs=Yii::app()->clientScript;

        $cs->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile($this->jBaseUrl . '/assets/jquery.scrollTo-1.4.3.1-min.js', CClientScript::POS_HEAD);
    }

    public function run(){}
	public function renderJs($id)
	{
		return '$.scrollTo("#'.$id.'",1000); return false;';
	}
    
}
