<?php

class EventController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	
	public function actionIndex()
	{
		$this->pageTitle = 'Event Gallery | '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$criteria = new CDbCriteria;
		$params = array();
		if ($_GET['year'] != '' AND $_GET['month'] != '') {
			$criteria->addCondition('YEAR(date_input) = :year');
			$criteria->addCondition('MONTH(date_input) = :month');
			$params[':year'] = $_GET['year'];
			$params[':month'] = $_GET['month'];
		}
		$criteria->addCondition('status = 1');
		$criteria->addCondition('active = 1');
		$criteria->order = 'date_input DESC';
		$criteria->params = $params;

		$count=Gallery::model()->count($criteria);
	    $pages=new CPagination($count);

	    // results per page
	    $pages->pageSize=3;
	    $pages->applyLimit($criteria);

		$gallery = Gallery::model()->findAll($criteria);

		$menu = Gallery::model()->getMenu();

		$this->render('index', array(	
			'gallery' => $gallery,
			'count' => $count,
			'pages' => $pages,
			'menu' => $menu,
		));
	}

	public function actionDetail($id)
	{
		$this->pageTitle = 'Event Gallery | '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$detail = Gallery::model()->findByPk($id);

		$menu = Gallery::model()->getMenu();

		$this->render('detail', array(	
			'detail' => $detail,
			'menu' => $menu,
		));
	}

}