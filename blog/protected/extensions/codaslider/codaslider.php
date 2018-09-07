<?php
/**
 * @author imasia (paul)
 * @param string $action: the action where the data are retrieved
 * @param string $chained: the id of the source of the selection
 * JS lib by Mike Nichols
 */
class codaslider extends CWidget {

    private $jBaseUrl;
	public $id;
	public $htmlOptions=array();
	public $fancy=true;
	public $cssFile;
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
		Yii::app()->clientScript->registerScriptFile($this->jBaseUrl . '/assets/js/jquery-ui-1.8.20.custom.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($this->jBaseUrl . '/assets/js/jquery.coda-slider-3.0.min.js', CClientScript::POS_HEAD);
		if (isset($this->cssFile)) {
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		} else if($this->fancy) {
			Yii::app()->clientScript->registerCssFile($this->jBaseUrl.'/assets/css/coda-slider.css');
		}
    }

    public function run(){
		echo CHtml::openTag('div', $this->htmlOptions)."\n";
		if(count($this->content)) {
			$this->renderContent($this->content);
		}
		echo CHtml::closeTag('div')."\n";
		
		if (!count($this->config)) {
			$config=array(
				'firstPanelToLoad'=>'1',
				'hashLinking'=>FALSE,
				'panelTitleSelector'=>'h2.title',
				'slideEaseDuration'=>2000,
				'slideEaseFunction'=>'easeInOutExpo',
			);
		} else {
			$config=$this->config;
		}
		
		$config=CJavaScript::encode($config);
		Yii::app()->getClientScript()->registerScript(__CLASS__, "
			$('#".$this->htmlOptions['id']."').codaSlider($config);
		");
    }
	public function renderContent($content)
	{
		foreach($content as $item) {
			echo CHtml::openTag('div', $item['htmlOptions'])."\n";
			echo $item['content'];
			echo CHtml::closeTag('div')."\n";
		}
	}
    
}
