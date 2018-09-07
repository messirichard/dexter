<?php
/**
 * @author imasia (paul)
 * @param string $action: the action where the data are retrieved
 * @param string $chained: the id of the source of the selection
 * JS lib by Mike Nichols
 */
class jqchain extends CWidget {

    private $jBaseUrl;

    public $items = array();

    public function init()
    {
        $this->jBaseUrl=Yii::app()->getAssetManager()->publish(dirname(__FILE__));
        $this->registerClientScript();
        parent::init();
    }

    protected function registerClientScript()
    {
        $cs=Yii::app()->clientScript;

        $cs->registerCoreScript('jquery');
		/*
        $cs->registerScript('commonTemplate', 
        	'function commonTemplate(i) {return "<option value=\'" + i.Value + "\'>" + i.Text + "</option>";};');
        */
        //$cs->registerCssFile($this->jBaseUrl.'/'.'cascade.css');
    }

    public function run(){}
    
    
    public function makeActiveDropDown($model, $id, $data, $htmlOptions = array(), $action, $chained)
    {
    	//$controller=$this->controller;
		
    	$thisId = CHtml::activeId($model, $id);
        $chainedId = CHtml::activeId($model, $chained);
    	Yii::app()->clientScript->registerScript('jqchain'.$id,
    		"jQuery('#".$thisId."').cascade('#".$chainedId."',{	
				ajax: {url: 'index.php?r=".$action."' },	
				template: commonTemplate});",
            CClientScript::POS_READY);
        
      	return CHtml::activeDropDownList($model,$id, $data, $htmlOptions);
    }
    
	public function mainDropDown($id, $selected = '', $data, $htmlOptions = array(), $action, $chain='')
    {
    	//echo $controller=$this->controller;//CHtml::getIdByName($id);
    	//echo CWidget::getController()->id;
    	if ($chain!='') {
			
    	Yii::app()->clientScript->registerScript('jqchain'.$id,
    		"
    		$('#".CHtml::getIdByName($id)."').live('change',function(){
    			$('#".CHtml::getIdByName($chain)."').html('<option value=\"\">Wait . . .</option>');
	    		$.ajax({
					type: 'post',
					url: '". Yii::app()->baseUrl . $action . "',
					data: 'id='+$(this).val(),
					dataType: 'html',
					success: function(msg){
						//alert( 'Data Saved: ' + msg );
						$('#".CHtml::getIdByName($chain)."').html(msg);
					},
	    		})
    		})
    		",
            CClientScript::POS_READY);
		}
        
      	return CHtml::dropDownList($id, $selected, $data, $htmlOptions);
    }
    
}
