<?php

class HomeController extends ControllerAdmin
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//array('admin.filter.AuthFilter'),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'actions'=>array('index', 'error'),
				'users'=>array('*'),
			),
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('logout', 'error'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$model = new LoginForm;
		$this->layout = '//layoutsAdmin/login';
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				Log::model()->createLog("Login: $model->username");
				if (Yii::app()->user->returnUrl = '/cm/index.php') {
					$this->redirect(CHtml::normalizeUrl(array('/admin/site/index')));
				} else {
					$this->redirect(Yii::app()->user->returnUrl);
				}
		}
		$this->render('index', array(
			'model'=>$model,
		));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(CHtml::normalizeUrl(array('/admin/home/index')));
	}
	public function actionError()
	{
		$this->layout = '//layoutsAdmin/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->render('error', $error);
			}
		}
	}

}