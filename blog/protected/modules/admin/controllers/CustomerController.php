<?php

class CustomerController extends ControllerAdmin
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
			array('admin.filter.AuthFilter'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CsCustomer;

		$modelAddress = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CsCustomer']))
		{
			$model->attributes=$_POST['CsCustomer'];

			unset($modelAddress);
			$modelAddress = array();
			if (count($_POST['CsCustomerAddress']['first_name']) > 0) {
				foreach ($_POST['CsCustomerAddress']['first_name'] as $key => $value) {
					if ($value != '') {
						$modelAddress[$key] = new CsCustomerAddress;
						$modelAddress[$key]->first_name = $_POST['CsCustomerAddress']['first_name'][$key];
						$modelAddress[$key]->last_name = $_POST['CsCustomerAddress']['last_name'][$key];
						$modelAddress[$key]->address = $_POST['CsCustomerAddress']['address'][$key];
						$modelAddress[$key]->city = $_POST['CsCustomerAddress']['city'][$key];
						$modelAddress[$key]->postal_code = $_POST['CsCustomerAddress']['postal_code'][$key];
						$modelAddress[$key]->phone = $_POST['CsCustomerAddress']['phone'][$key];
						$modelAddress[$key]->country_code = $_POST['CsCustomerAddress']['country_code'][$key];
					}
				}
			}

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->confirmpass = sha1($model->pass);
					$model->pass = sha1($model->pass);

					$model->save();

					CsCustomerAddress::model()->deleteAll('customer_id = :id', array(':id'=>$model->id));
					if (count($_POST['CsCustomerAddress']['first_name']) > 0) {
						foreach ($_POST['CsCustomerAddress']['first_name'] as $key => $value) {
							$modelAddress[$key] = new CsCustomerAddress;
							if ($value != '') {
								$modelAddress[$key] = new CsCustomerAddress;
								$modelAddress[$key]->customer_id = $model->id;
								$modelAddress[$key]->first_name = $_POST['CsCustomerAddress']['first_name'][$key];
								$modelAddress[$key]->last_name = $_POST['CsCustomerAddress']['last_name'][$key];
								$modelAddress[$key]->address = $_POST['CsCustomerAddress']['address'][$key];
								$modelAddress[$key]->city = $_POST['CsCustomerAddress']['city'][$key];
								$modelAddress[$key]->postal_code = $_POST['CsCustomerAddress']['postal_code'][$key];
								$modelAddress[$key]->phone = $_POST['CsCustomerAddress']['phone'][$key];
								$modelAddress[$key]->country_code = $_POST['CsCustomerAddress']['country_code'][$key];
								$modelAddress[$key]->save(false);
							}
							
						}
					}

					Log::createLog("CustomerController Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelAddress'=>$modelAddress,
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

		$modelAddress = array();
		$modelAddress = CsCustomerAddress::model()->findAll('customer_id = :id ORDER BY id', array(':id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CsCustomer']))
		{
			$model->attributes=$_POST['CsCustomer'];

			unset($modelAddress);
			$modelAddress = array();
			if (count($_POST['CsCustomerAddress']['first_name']) > 0) {
				foreach ($_POST['CsCustomerAddress']['first_name'] as $key => $value) {
					if ($value != '') {
						$modelAddress[$key] = new CsCustomerAddress;
						$modelAddress[$key]->first_name = $_POST['CsCustomerAddress']['first_name'][$key];
						$modelAddress[$key]->last_name = $_POST['CsCustomerAddress']['last_name'][$key];
						$modelAddress[$key]->address = $_POST['CsCustomerAddress']['address'][$key];
						$modelAddress[$key]->city = $_POST['CsCustomerAddress']['city'][$key];
						$modelAddress[$key]->postal_code = $_POST['CsCustomerAddress']['postal_code'][$key];
						$modelAddress[$key]->phone = $_POST['CsCustomerAddress']['phone'][$key];
						$modelAddress[$key]->country_code = $_POST['CsCustomerAddress']['country_code'][$key];
					}
				}
			}

			if ($model->pass != '') {
				$model->scenario = 'updatepass';
			}
			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($model->pass != '') {
						$model->confirmpass = sha1($model->pass);
						$model->pass = sha1($model->pass);
					}

					$model->save();

					CsCustomerAddress::model()->deleteAll('customer_id = :id', array(':id'=>$model->id));
					if (count($_POST['CsCustomerAddress']['first_name']) > 0) {
						foreach ($_POST['CsCustomerAddress']['first_name'] as $key => $value) {
							$modelAddress[$key] = new CsCustomerAddress;
							if ($value != '') {
								$modelAddress[$key] = new CsCustomerAddress;
								$modelAddress[$key]->customer_id = $model->id;
								$modelAddress[$key]->first_name = $_POST['CsCustomerAddress']['first_name'][$key];
								$modelAddress[$key]->last_name = $_POST['CsCustomerAddress']['last_name'][$key];
								$modelAddress[$key]->address = $_POST['CsCustomerAddress']['address'][$key];
								$modelAddress[$key]->city = $_POST['CsCustomerAddress']['city'][$key];
								$modelAddress[$key]->postal_code = $_POST['CsCustomerAddress']['postal_code'][$key];
								$modelAddress[$key]->phone = $_POST['CsCustomerAddress']['phone'][$key];
								$modelAddress[$key]->country_code = $_POST['CsCustomerAddress']['country_code'][$key];
								$modelAddress[$key]->save(false);
							}
							
						}
					}

					Log::createLog("CustomerController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$model->pass = '';

		$this->render('update',array(
			'model'=>$model,
			'modelAddress'=>$modelAddress,
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
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new CsCustomer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CsCustomer']))
			$model->attributes=$_GET['CsCustomer'];

		$dataProvider=new CActiveDataProvider('CsCustomer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CsCustomer::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cs-customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
