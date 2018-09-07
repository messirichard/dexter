<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';
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
	public $setting=array();
	public $idController;

	// pasang meta description dan keyword
	public $metaDesc;
	public $metaKey;
	public $metaImage;

	// simpan language ID
	public $languageID;

	public function beforeAction($action)
	{
		if ($_GET['lang']) {
			Yii::app()->language = $_GET['lang'];
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

		$this->pageTitle = $this->setting['default_meta_title'];
		$this->metaDesc = $this->setting['default_meta_description'];
		$this->metaKey = $this->setting['default_meta_keywords'];

		Yii::app()->theme = 'default';

		return true;
	}
}