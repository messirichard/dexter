<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerAdmin extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layoutsAdmin/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	// pasang meta description dan keyword
	public $metaDesc;
	public $metaKey;

	// simpan language ID
	public $languageID;

	public $setting=array();
	public $idController;

	/**
	 * @icon class untuk icon, sementara dari form awesome
	 * @title
	 * @subtitle
	 */
	public $pageHeader = array(); 

	public function beforeAction($action)
	{
		if ($_GET['lang']) {
			$langDeff = Setting::model()->find('name = :name', array(':name'=>'lang_deff'))->value;
			Yii::app()->language = $langDeff;
		}
		$this->languageID = Language::model()->find('code = :code', array(':code'=>Yii::app()->language))->id;
		// $this->idController = $this->id;
		$this->setting=Yii::app()->cache->get('setting_'.Yii::app()->language);
		if($this->setting===false)
		{
		    // regenerate $value because it is not found in cache
		    // and save it in cache for later use:
			$this->setting = Setting::model()->getSetting(Yii::app()->language);
		    Yii::app()->cache->set('setting_'.Yii::app()->language,$this->setting);
		}
		// $this->idController = $this->id;

		$this->pageTitle = $this->setting['title'];
		$this->metaDesc = $this->setting['description'];
		$this->metaKey = $this->setting['keywords'];

		return true;
	}
}