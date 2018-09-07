<?php

class SettingController extends ControllerAdmin
{
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter'),
		);
	}

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'imgUpload'=>array(
			    'class' => 'ext.imperavi-redactor-widget.actions.RedactorUploadAction',
			    'directory'=>'images/static',
			    'validator'=>array(
			        'mimeTypes' => array('image/png', 'image/jpg', 'image/gif', 'image/jpeg', 'image/pjpeg'),
			    ),
			),
			'fileUpload'=>array(
			    'class' => 'ext.imperavi-redactor-widget.actions.RedactorUploadAction',
			    'directory'=>'images/static',
			    'validator'=>array(
			        'types' => 'txt, pdf, doc, docx',
			    ),
			),
		);
	}

	public function actionIndex()
	{
		$this->layout='//layoutsAdmin/column2';

		$this->render('index',array(
			// 'model'=>$model,
		));
	}
	
	// public function actionIndex()
	// {
	// 	$model = Setting::model()->getModelSetting('setting');

	// 	if(isset($_POST['Setting']))
	// 	{
	// 		$model2 = new Setting;
	// 		$stsError = 0;

	// 		$setting = $_FILES['Setting'];
	// 		if (count($setting['name'])>0) {
	// 			foreach ($setting['name'] as $key => $value) {
	// 				if (
	// 					!(
	// 						$setting['type'][$key] == 'image/jpg'
	// 						|| $setting['type'][$key] == 'image/jpeg'
	// 						|| $setting['type'][$key] == 'image/pjpeg'
	// 						|| $setting['type'][$key] == ''
	// 					) 
	// 				)
	// 				{
	// 					$stsError = 1;
	// 				}
	// 			}
	// 		}

	// 		if ($stsError == 0) {
	// 			$transaction=$model2->dbConnection->beginTransaction();
	// 			try
	// 			{
	// 				$setting = $_POST['Setting'];
	// 				foreach ($setting as $key => $value) {
	// 					if ( ! is_array($value)) {
	// 						$modelSetting = Setting::model()->getSettingByName($key);
	// 						$modelSetting->value = $value;
	// 						$modelSetting->save();
	// 					}else{
	// 						foreach ($value as $k => $v) {
	// 							$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
	// 							if ($modelSetting==null) {
	// 								$modelSetting = new SettingDescription;
	// 								$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
	// 								$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
	// 								$modelSetting->setting_id = $setting_id;
	// 								$modelSetting->language_id = $language_id;
	// 							}
	// 							$modelSetting->value = $v;
	// 							$modelSetting->save();
	// 						}
	// 					}
	// 				}

	// 				$setting = $_FILES['Setting'];
	// 				if (count($setting)>0) {
	// 				foreach ($setting['name'] as $key => $value) {
	// 					if ($setting['tmp_name'][$key] != '') {
	// 					$dir = Yii::getPathOfAlias('webroot').'/images/static/';

	// 				    // setting file's mysterious name
	// 				    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
	// 				    // copying
	// 				    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

	// 					$modelSetting = Setting::model()->getSettingByName($key);
	// 					$modelSetting->value = $file;
	// 					$modelSetting->save();
	// 					}
	// 				}
	// 				}

	// 				foreach (Language::model()->findAll() as $key => $value) {
	// 					Yii::app()->cache->delete('setting_'.$value->code);
	// 				}

	// 				Log::createLog("Setting Update");
	// 				Yii::app()->user->setFlash('success','Data has been updated');
	// 			    $transaction->commit();
	// 				$this->refresh();
	// 			}
	// 			catch(Exception $ce)
	// 			{
	// 			    $transaction->rollback();
	// 			}
	// 		}
	// 	}

	// 	$this->render('index',array(
	// 		'model'=>$model,
	// 	));
	// }

	public function actionHistory()
	{
		$model = Setting::model()->getModelSetting('history');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('history',array(
			'model'=>$model,
		));
	}

	public function actionAbout()
	{
		$model = Setting::model()->getModelSetting('about');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('about',array(
			'model'=>$model,
		));
	}

	public function actionRetailers()
	{
		$model = Setting::model()->getModelSetting('retailers');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('retailers',array(
			'model'=>$model,
		));
	}

	public function actionContact()
	{
		$model = Setting::model()->getModelSetting('contact');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('contact',array(
			'model'=>$model,
		));
	}

	public function actionCareer()
	{
		$model = Setting::model()->getModelSetting('career');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('career',array(
			'model'=>$model,
		));
	}

	public function actionPrivacy()
	{
		$model = Setting::model()->getModelSetting('privacy');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('privacy',array(
			'model'=>$model,
		));
	}

	public function actionHowto()
	{
		$model = Setting::model()->getModelSetting('howto');

		if(isset($_POST['Setting']))
		{
			$model2 = new Setting;
			$stsError = 0;

			$setting = $_FILES['Setting'];
			if (count($setting['name'])>0) {
				foreach ($setting['name'] as $key => $value) {
					if (
						!(
							$setting['type'][$key] == 'image/jpg'
							|| $setting['type'][$key] == 'image/jpeg'
							|| $setting['type'][$key] == 'image/pjpeg'
							|| $setting['type'][$key] == 'image/png'
							|| $setting['type'][$key] == ''
						) 
					)
					{
						$stsError = 1;
					}
				}
			}

			if ($stsError == 0) {
				$transaction=$model2->dbConnection->beginTransaction();
				try
				{
					$setting = $_POST['Setting'];
					foreach ($setting as $key => $value) {
						if ( ! is_array($value)) {
							$modelSetting = Setting::model()->getSettingByName($key);
							$modelSetting->value = $value;
							$modelSetting->save();
						}else{
							foreach ($value as $k => $v) {
								$modelSetting = SettingDescription::model()->getSettingModel($key,$k);
								if ($modelSetting==null) {
									$modelSetting = new SettingDescription;
									$setting_id = Setting::model()->find('name = :name',array(':name'=>$key))->id;
									$language_id = Language::model()->find('code = :code',array(':code'=>$k))->id;
									$modelSetting->setting_id = $setting_id;
									$modelSetting->language_id = $language_id;
								}
								$modelSetting->value = $v;
								$modelSetting->save();
							}
						}
					}

					$setting = $_FILES['Setting'];
					if (count($setting)>0) {
					foreach ($setting['name'] as $key => $value) {
						if ($setting['tmp_name'][$key] != '') {
						$dir = Yii::getPathOfAlias('webroot').'/images/static/';

					    // setting file's mysterious name
					    $file = substr(md5(date('YmdHis').rand(0,10000000000000)), 0, 10).$setting['name'][$key];
					   
					    // copying
					    move_uploaded_file($setting['tmp_name'][$key], $dir.$file);

						$modelSetting = Setting::model()->getSettingByName($key);
						$modelSetting->value = $file;
						$modelSetting->save();
						}
					}
					}

					foreach (Language::model()->findAll() as $key => $value) {
						Yii::app()->cache->delete('setting_'.$value->code);
					}

					Log::createLog("Setting Update");
					Yii::app()->user->setFlash('success','Data has been updated');
				    $transaction->commit();
					$this->refresh();
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('howto',array(
			'model'=>$model,
		));
	}

	// public function actionPastor()
	// {
	// 	$login = Yii::app()->session['login'];
	// 	$model=Pastor::model()->find('user_id = :user_id', array(':user_id'=>$login['id']));
	// 	if($model===null){
	// 		$model = new Pastor;
	// 		$model->user_id = $login['id'];
	// 		$model->image = '';
	// 		$model->active = '0';
	// 		$model->date_input = date('Y-m-d H:i:s');
	// 		$model->date_update = date('Y-m-d H:i:s');
	// 		$model->insert_by = $login['email'];
	// 		$model->last_update_by = $login['email'];
	// 		$model->writer = $login['initial'];
	// 		$model->save();
	// 	}
			
	// 	$modelDesc = array();
	// 	foreach (Language::model()->getLanguage() as $key => $value) {
	// 		$modelDesc[$value->code] = Pastor::model()->getDataDesc($model->id, $value->id);
	// 		$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PastorDescription : $modelDesc[$value->code];
	// 		// echo CHtml::errorSummary($modelDesc[$value->code]);
	// 	}

	// 	// Uncomment the following line if AJAX validation is needed
	// 	// $this->performAjaxValidation($model);

	// 	if(isset($_POST['Pastor']))
	// 	{
	// 		$image = $model->image;//mengamankan nama file
	// 		// $file = $model->file;//mengamankan nama file
	// 		$model->attributes=$_POST['Pastor'];//setting semua nilai
	// 		$model->image = $image;//mengembalikan nama file

	// 		unset($modelDesc);
	// 		$valid=true;
	// 		foreach ($_POST['PastorDescription'] as $j => $mod) {
	//             if (isset($_POST['PastorDescription'][$j])) {
	//                 $modelDesc[$j]=new PastorDescription; // if you had static model only
	//                 $modelDesc[$j]->attributes=$mod;
	//                 $lang = Language::model()->getName($j);
	// 				$modelDesc[$j]->language_id = $lang->id;
	//                 $valid=$modelDesc[$j]->validate() && $valid;
	//             }
	//         }

	// 		$image = CUploadedFile::getInstance($model,'image');
	// 		if ($image->name != '') {
	// 			$model->image = substr(md5(time()),0,5).'-'.$image->name;
	// 		}

	// 		// $model->image = $session['upload_foto_edit'][1];

	// 		// $model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

	// 		if($model->validate() AND $valid){
	// 			$transaction=$model->dbConnection->beginTransaction();
	// 			try
	// 			{
	// 				if ($image->name != '') {
	// 					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/pastor/'.$model->image);
	// 				}

	// 				$model->date_update = date("Y-m-d H:i:s");
	// 				$model->last_update_by = Yii::app()->user->name;

	// 				$model->save();

	// 				PastorDescription::model()->deleteAll('pastor_id = :id', array(':id'=>$model->id));
	// 				foreach ($modelDesc as $key => $value) {
	// 					$value->pastor_id=$model->id;
	// 					$value->save();
	// 				}

	// 				Log::createLog("PastorController Update $model->id");
	// 				Yii::app()->user->setFlash('success','Data Edited');
	// 			    $transaction->commit();
	// 				$this->redirect(array('pastor'));
	// 			}
	// 			catch(Exception $ce)
	// 			{
	// 			    $transaction->rollback();
	// 			}
	// 		}
	// 	}

	// 	$this->render('pastor',array(
	// 		'model'=>$model,
	// 		'modelDesc'=>$modelDesc,
	// 	));
	// }


	public function actionLog()
	{
		$model=new Log('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Log'])){
			$model->attributes=$_GET['Log'];
		}

		$dataProvider=new CActiveDataProvider('Log');
		$this->render('log',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	public function actionFeaturesnbest()
	{
		$this->setting = Setting::model()->getSetting(Yii::app()->language);
		if ($_POST['ajax'] == 'group') {
			Setting::model()->saveSettingData($_POST['name'], $_POST['value']);
			$_GET['category_id'] = $_POST['value'];
			$produk = Product::model()->getAllData(10000000000,false,$this->languageID);
			foreach ($produk['data'] as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->title.'</value>';
			}
			exit;
		}
// produk creatine 6
// Whey Protein 4
// Mass Gainer 4
// Fat Burner / Diet 2
// Protein + Creatine 2
// Suplemen & Nutrisi Pelengkap 2
// Other 2
        $featuredData = array(
            array(
                'title'=>'Produk Creatine',
                'jml'=>6,
                'varBaru'=>'best',
                'varLama'=>'terlaris',
            ),
            array(
                'title'=>'Whey Protein',
                'jml'=>4,
                'varBaru'=>'protein',
                'varLama'=>'proteinterlaris',
            ),
            array(
                'title'=>'Mass Gainer',
                'jml'=>4,
                'varBaru'=>'gainer',
                'varLama'=>'gainerterlaris',
            ),
            array(
                'title'=>'Fat Burner / Diet',
                'jml'=>2,
                'varBaru'=>'diet',
                'varLama'=>'dietterlaris',
            ),
            array(
                'title'=>'Protein + Creatine',
                'jml'=>2,
                'varBaru'=>'creatine',
                'varLama'=>'creatineterlaris',
            ),
            array(
                'title'=>'Suplemen & Nutrisi Pelengkap',
                'jml'=>2,
                'varBaru'=>'suplemen',
                'varLama'=>'suplementerlaris',
            ),
            array(
                'title'=>'Other',
                'jml'=>2,
                'varBaru'=>'other',
                'varLama'=>'otherterlaris',
            ),
        );
		foreach ($featuredData as $key => $value) {
			if ( ! isset($this->setting['group-'.$value['varBaru']])) {
				$model = new Setting;
				$model->name = 'group-'.$value['varBaru'];
				$model->value = '';
				$model->type = 'data';
				$model->hide = '0';
				$model->group = 'data';
				$model->dual_language = 'n';
				$model->save();
				foreach (Language::model()->findAll() as $v) {
					Yii::app()->cache->delete('setting_'.$v->code);
				}
			}
			if ($this->setting[$value['varBaru']] == '') {
				Setting::model()->createSettingData($value['varBaru'], $value['jml']);
			}
			if ($this->setting[$value['varLama']] == '') {
				Setting::model()->createSettingData($value['varLama'], $value['jml']);
			}
		}
		if ($this->setting['featured'] == '') {
			Setting::model()->createSettingData('featured', 9);
		}
		if ($this->setting['unggulan'] == '') {
			Setting::model()->createSettingData('unggulan', 9);
		}

		if ($_POST['featured']) {
			$data = json_decode($this->setting['featured']);
			$data[$_POST['featured']['id']-1] = $_POST['featured']['product'];

			Setting::model()->saveSettingData('featured', $data);

			$this->redirect(array('featuresnbest'));
		}
		if ($_POST['unggulan']) {
			$data = json_decode($this->setting['unggulan']);
			$data[$_POST['unggulan']['id']-1] = $_POST['unggulan']['product'];

			Setting::model()->saveSettingData('unggulan', $data);

			$this->redirect(array('featuresnbest'));
		}
		foreach ($featuredData as $key => $value) {
			if ($_POST[$value['varBaru']]) {
				$data = json_decode($this->setting[$value['varBaru']]);
				$data[$_POST[$value['varBaru']]['id']-1] = $_POST[$value['varBaru']]['product'];

				Setting::model()->saveSettingData($value['varBaru'], $data);

				$this->redirect(array('featuresnbest'));
			}
			if ($_POST[$value['varLama']]) {
				$data = json_decode($this->setting[$value['varLama']]);
				$data[$_POST[$value['varLama']]['id']-1] = $_POST[$value['varLama']]['product'];

				Setting::model()->saveSettingData($value['varLama'], $data);

				$this->redirect(array('featuresnbest'));
			}
		}

		$this->render('featuresnbest',array(
			'featuredData'=>$featuredData,
		));
	}
}
