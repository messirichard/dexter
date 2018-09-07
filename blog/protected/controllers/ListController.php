
<?php

class ListController extends Controller
{

	public function actionIndex()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';
		if ($_GET['category'] != '') {
			$criteria->addCondition('t.topik_id = :category');
			$criteria->params[':category'] = $_GET['category'];
		}

		$dataBlog = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10000,
		    ),
		));

		$this->pageTitle = 'Tickets | Decibels Festivals Surabaya - Biggest Music Event in Surabaya.';
		$this->layout='//layouts/column1';
		$this->render('index', array(
			'dataBlog'=>$dataBlog,
		));
	}

	// public function actionIndex()
	// {
	// 	$this->layout='//layouts/content';
	// 	$data = Page::model()->getPage('our-services', $this->languageID);
	// 	$menu = Layanan::model()->getSub($this->languageID);
	// 	$layanan = Layanan::model()->getLayanan($this->languageID);

	// 	$this->render('index', array(
	// 		'data'=>$data,
	// 		'menu'=>$menu,
	// 		'layanan'=>$layanan,
	// 	));
	// }

	public function actionView($id)
	{
		$this->layout='//layouts/column1';

		// $data = Page::model()->getPage('our-services', $this->languageID);
		$data['title'] = 'Services & Facilities';
		$category = Service::Model()->getCategory($this->languageID);

		$id = abs((int) $_GET['id']);
		$detail = Service::Model()->getData($id,$this->languageID);
		$layananAll = Service::Model()->getServiceAll(3, $id, $this->languageID);

		$this->render('view', array(
			'data'=>$data,
			'menu'=>$category,
			'detail'=>$detail,
			'listAll'=>$layananAll,
		));
	}
}