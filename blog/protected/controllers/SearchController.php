<?php

class SearchController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';

		$dataSub = Artikel::model()->getAllData(5);

		$this->pageTitle = $this->pageTitle;
		$this->render('index', array(
			'dataSub' => $dataSub,
		));
	}

	public function actionError()
	{
		$this->layout = '//layoutsAdmin/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->layout='//layouts/column1';
				$dataSub = Artikel::model()->getAllData(5);

				$this->pageTitle = 'Error '.$error['code'].': '. $error['message'] .' - '.$this->pageTitle;
				$this->render('error', array(
					'dataSub' => $dataSub,
					'error'=>$error,
				));
			}
		}

	}

}