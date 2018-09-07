<?php

class LayananController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';
		
		$data['title'] = 'Services & Facilities';
		$category = Service::model()->getCategory($this->languageID);
		// $menu = Layanan::model()->getSub($this->languageID);
		$layanan = Service::model()->getServiceAll(false, false, $this->languageID);

		$this->render('index', array(
			'data'=>$data,
			'menu'=>$category,
			'layanan'=>$layanan,
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