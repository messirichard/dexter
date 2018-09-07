<?php

class HealingController extends Controller
{
	public $dataHealing = array(
		'0'=>'Healing Moment Radio',
		'1'=>'Healing Moment Service',
		'2'=>'Healing Festival',
	);

	public function actionIndex()
	{
		$this->pageTitle = 'Healing - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('index', array(	
		));
	}
	public function actionDetail($id)
	{
		$this->pageTitle = $this->dataHealing[$id].' - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$data = Healing::model()->getAllDataByDate($id, false, false, $this->languageID);
		$this->render('detail', array(
			'data'=>$data,
		));
	}

	// public function actionIndex()
	// {
	// 	$this->layout='//layouts/column1';

	// 	$subMenu = array();
	// 	$menu = Blog::model()->getMenu($this->languageID);
	// 	$writer = Blog::model()->getWriter($this->languageID);

	// 	// convert to list item menu
	// 	$month = $_GET['month'];
	// 	$year = $_GET['year'];
	// 	$listMenu = array();
	// 	foreach ($menu as $key => $value) {
	// 		foreach ($value as $k => $v) {
	// 			if ($month == '') {
	// 				$month = $k;
	// 			}
	// 			if ($year == '') {
	// 				$year = $key;
	// 			}
	// 			$listMenu[] = array(
	// 				'label'=>Yii::app()->locale->getMonthName($k).' '.$key,
	// 				'month'=>$k,
	// 				'year'=>$key,
	// 			);
				
	// 		}
	// 	}

	// 	$konten = Blog::model()->getAllDataByDate($_GET['writer'], $month,$year, false, false, $this->languageID);

	// 	$this->pageTitle = 'Blog - ' . $this->pageTitle;
	// 	$this->render('index', array(
	// 		'menu'=>$listMenu,
	// 		'writer'=>$writer,
	// 		'data'=> $konten,
	// 		'subMenu'=>$subMenu,
	// 	));
	// }
	// public function actionDetail($id)
	// {
	// 	$this->layout='//layouts/column1';

	// 	$detail = Blog::model()->getData($id, $this->languageID);
		
	// 	$dataSub = Blog::model()->getAllData(5, false, $this->languageID);

	// 	$dataFooter = Blog::model()->getAllData(3, $id, $this->languageID);

	// 	$this->pageTitle = $detail->title . ' | ' . $this->pageTitle;
	// 	$this->render('detail', array(
	// 		'detail' => $detail,
	// 		'dataSub' => $dataSub,
	// 		'dataFooter' => $dataFooter,
	// 	));
	// }
}