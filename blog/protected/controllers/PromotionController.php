<?php

class PromotionController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';

		$data = Promotion::model()->getAllData(false, false, $this->languageID);

		$this->pageTitle = 'Promotion - ' . $this->pageTitle;
		$this->render('index', array(
			'data'=> $data,
		));
	}
	public function actionDetail($id)
	{
		$this->layout='//layouts/column1';

		$data = Promotion::model()->getAllData(false, false, $this->languageID);

		$detail = Promotion::model()->getData($id, $this->languageID);

		$this->pageTitle = 'Promotion '.$detail->title.' - ' . $this->pageTitle;
		$this->render('detail', array(
			'data'=> $data,
			'detail'=> $detail,
		));
	}
}