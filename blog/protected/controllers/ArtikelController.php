<?php

class ArtikelController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';

		$subMenu = array();
		$data = Artikel::model()->getAllData(false, false, $this->languageID);

		$this->pageTitle = 'Artikel - ' . $this->pageTitle;
		$this->render('index', array(
			'data'=> $data,
			'subMenu'=>$subMenu,
		));
	}
	public function actionDetail($id)
	{
		$this->layout='//layouts/column1';

		$detail = Artikel::model()->getData($id, $this->languageID);
		
		$dataSub = Artikel::model()->getAllData(5, false, $this->languageID);

		$dataFooter = Artikel::model()->getAllData(3, $id, $this->languageID);

		$this->pageTitle = $detail->title . ' - ' . $this->pageTitle;
		$this->render('detail', array(
			'detail' => $detail,
			'dataSub' => $dataSub,
			'dataFooter' => $dataFooter,
		));
	}
}