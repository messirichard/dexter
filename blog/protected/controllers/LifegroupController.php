<?php

class LifegroupController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column1';

		$konten = Life::model()->getAllDataByDate($_GET['writer'], $month,$year, false, false, $this->languageID);

		$this->pageTitle = 'Life Group - ' . $this->pageTitle;

		$this->render('index', array(
			// 'menu'=>$listMenu,
			// 'writer'=>$writer,
			'data'=> $konten,
			// 'subMenu'=>$subMenu,
		));
	}
	public function actionDetail($id)
	{
		$this->layout='//layouts/column1';

		$detail = Life::model()->getData($id, $this->languageID);
		
		$konten = Life::model()->getAllDataByDate($_GET['writer'], $month,$year, false, false, $this->languageID);

		// $dataSub = Blog::model()->getAllData(5, false, $this->languageID);

		// $dataFooter = Blog::model()->getAllData(3, $id, $this->languageID);

		$this->pageTitle = $detail->title . ' - Life Group - ' . $this->pageTitle;
		$this->render('detail', array(
			'detail' => $detail,
			'data'=>$konten,
			// 'dataSub' => $dataSub,
			// 'dataFooter' => $dataFooter,
		));
	}

	public function actionDetailinstagram($id)
	{
		$this->layout='//layouts/column1';

		$detail = Life::model()->getData($id, $this->languageID);
		
		$konten = Life::model()->getAllDataByDate($_GET['writer'], $month,$year, false, false, $this->languageID);

		// $dataSub = Blog::model()->getAllData(5, false, $this->languageID);

		// $dataFooter = Blog::model()->getAllData(3, $id, $this->languageID);

		$this->pageTitle = $detail->title . ' INSTAGRAM - Life Group - ' . $this->pageTitle;
		$this->render('instagram', array(
			'detail' => $detail,
			'data' => $konten,
			// 'dataSub' => $dataSub,
			// 'dataFooter' => $dataFooter,
		));
	}
}