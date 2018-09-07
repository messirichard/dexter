<?php

/**
 *fileeditor.php
 *
 * @author Ovidiu Pop <matricks@webspider.ro>
 * @copyright 2011 Binary Technology
 * @license released under dual license BSD License and LGP License
 * @package fileeditor
 * @version 1.0
 * @date 10.10.2011
 * 
 */

class fileeditor extends CWidget{
	public $editableFolders=array();

	public $options = array(
		'name'=>'feditor',
		'class'=>'feditor',
		'cols'=>84,
		'rows'=>20,
		'editorwidth'=> '720',//px 
		'value'=> '', 
		'language'=>'en',
		'syntax'=> 'css',
		'is_editable'=>true,
		'toolbar'=>'new, load, save, |, search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help',
		'allow_toggle'=>true,
		'start_highlight'=>true,
		'EA_load_callback'=>'setEditorId',
		'EA_file_close_callback'=>'closeFileEditor',
		'load_callback'=> 'loadFileEditor',
		'save_callback'=> 'saveFileEditor'
	);

	/**
	 * @var array translations used for alerts and dialogs
	 */
	protected $translations=array();

	/**
	 * @var url for processing post requests, default fileeditor - going to FileeditorController
	 */
	protected $reqPost;

	/**
	 * @var array associative array to feed data for fileselector listBox
	 */
	protected $arrDirs;
	protected $pars;
	protected $feId;
	protected $uniq;
	protected $encode=true;
	protected $labels = array();

	public function init()
	{
		//url to FileeditorController
		$this->reqPost = Yii::app()->createUrl('fileeditor');

		if (is_array($this->options) && count($this->options))
			foreach($this->options as $k=>$v)
				$this->pars[$k]=$v;

		if(isset($this->value))
			$this->pars['value'] = $this->value;

		$this->pars['class'] .= ' feditor_textarea';
		$this->uniq = uniqid();
		$this->feId = $this->pars['name'].'_'.$this->uniq;

		self::setTranslations();
		self::setLabels();
		self::setDirsSelector();
		self::registerFiles();
		parent::init();
	}

	public function run(){
		self::renderFileEditor();
	}

	/**
	 * Populate folders arrays 
	 * @return nothing
	 */
	private function setLabels(){
		foreach($this->editableFolders as $folder)
			$this->labels[$folder['label']] = $folder['label'];
	}

	private function setDirsSelector(){
		foreach($this->editableFolders as $editable)
			$this->arrDirs[$editable['label']] = self::assocFilesFromDir($editable['path'].DIRECTORY_SEPARATOR, $editable['label']);
	}

	/**
	 * Create an associative array from files of browseable folders
	 * @return array
	 */
	public function assocFilesFromDir($dir, $label, $ext="*"){
		$arr = array();
		$files = glob($dir . '*.'.$ext) ? glob($dir . '*.'.$ext) : array();
		foreach($files as $file)
			$arr[str_replace($dir, $label.'/', $file)] = str_replace("$dir", "", $file);
		return $arr;
	}


	private function setTranslations(){
		$this->translations=array(
			Yii::t('fileeditor', 'Succes!'),
			Yii::t('fileeditor', 'Failure!'),
			Yii::t('fileeditor', 'Filename is empty!'),
			Yii::t('fileeditor', 'Select a directory for the new file!'),
			Yii::t('fileeditor', 'Give an extension to filename!'),
			Yii::t('fileeditor', 'Yes'),
			Yii::t('fileeditor', 'No'),
			Yii::t('fileeditor', 'Cancel'),
			Yii::t('fileeditor', 'Save file?'),
			Yii::t('fileeditor', 'Create new file'),
			Yii::t('fileeditor', 'Filename:'),
			Yii::t('fileeditor', 'Folder'),
			Yii::t('fileeditor', 'Save'),
		);
	}

	/**
	 * Create a string to be send to js from array
	 * @return string
	 */
	private function phptojs($array)
	{
		$jsArr = "[";
		$l = count($array);
		foreach($array as $k => $t)
			$jsArr .= $k<$l-1 ? "'$t',":"'$t'";
		$jsArr .= "]";
		return $jsArr;
	}

	/**
	 * Register assets file and initialise EditArea plugin
	 * @return nothing
	 */
	private function registerFiles(){
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);

		if(is_dir($assets)){
			Yii::app()->clientScript->registerCssFile($baseUrl . '/fileeditor.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/edit_area_full.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($baseUrl.'/fileeditor.js', CClientScript::POS_END);
		}else
			throw new Exception(Yii::t('fileeditor', 'fileeditor - Error: Couldn\'t find assets folder to publish.'));

		$arr = self::phptojs($this->translations);

		$editorwidth = $this->pars['editorwidth'];
		$js = "\teditAreaLoader.init({ \n\t\tid : \"$this->feId\"";
		foreach($this->pars as $k=>$v)
			$js .=",\n\t\t$k: '$v'";
		$js.="\n\t});";
		$js.= "\n\tfileeditor('$this->reqPost', '$editorwidth', $arr);";
		
		Yii::app()->clientScript->registerScript($this->feId, $js, CClientScript::POS_READY);
	}

	/**
	 * Render fileeditor extension
	 *
	 * @return nothing
	 */
	public function renderFileEditor()
	{
		echo $this->render('feditor',array());
	}

}










