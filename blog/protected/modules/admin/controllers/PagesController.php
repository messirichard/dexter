<?php

class PagesController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter', 
				'params'=>array(
					// 'actionAllowOnLogin'=>array('upload'),
				)
			),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TbPages;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value){
			$modelDesc[$value->code] = new PagesDescription;
		}

		if(isset($_POST['PagesDescription']))
		{
			$model->attributes=$_POST['TbPages'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			foreach ($_POST['PagesDescription'] as $j => $mod) {
	            if (isset($_POST['PagesDescription'][$j])) {
	                $modelDesc[$j]=new PagesDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{

					$model->group = 'static';

					$model->save();

					PagesDescription::model()->deleteAll('page_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->page_id=$model->id;
						$value->save();
					}

					Log::createLog("TbPages Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					// echo $ce;
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = TbPages::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PagesDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}

		if(isset($_POST['PagesDescription']))
		{
			$model->attributes=$_POST['TbPages'];//setting semua nilai

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['PagesDescription'] as $j => $mod) {
	            if (isset($_POST['PagesDescription'][$j])) {
	                $modelDesc[$j]=new PagesDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();

					PagesDescription::model()->deleteAll('page_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->page_id=$model->id;
						$value->save();
					}

					Log::createLog("TbPagesController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(isset($_POST['sort']))
		{
			PgTypeLetak::model()->deleteAll();
			foreach ($_POST['sort']['header_id'] as $key => $value) {
				$model = new PgTypeLetak;
				$model->letak = 'header';
				$model->page_id = $value;
				$model->tampil = $_POST['sort']['header'][$value];
				$model->sort = $key + 1;
				$model->save();
			}
			foreach ($_POST['sort']['footer_id'] as $key => $value) {
				$model = new PgTypeLetak;
				$model->letak = 'footer';
				$model->page_id = $value;
				$model->tampil = $_POST['sort']['footer'][$value];
				$model->sort = $key + 1;
				$model->save();
			}

			Log::createLog("Mengubah urutan menu");
			Yii::app()->user->setFlash('success','Data has been update');
			$this->redirect(array('index'));
		}

		$this->render('index',array(
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TbPages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='TbPages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
