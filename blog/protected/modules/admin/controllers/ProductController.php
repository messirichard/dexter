<?php

class ProductController extends ControllerAdmin
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
					'actionAllowOnLogin'=>array('upload'),
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

	public function actionCreate2()
	{
		// if(isset($_POST['Url']))
		// {
			set_time_limit(0);
			$link = array(

			);
			foreach ($link as $url) {
				Yii::import('ext.SimpleHTMLDOM.SimpleHTMLDOM');
				// Create DOM from URL or file
				$simpleHTML = new SimpleHTMLDOM;
				$html = $simpleHTML->file_get_html($url);

				$title =  $html->find('h1', 0)->plaintext;
				$kode =  $html->find('.skufloat', 0)->plaintext;
				$description = trim(preg_replace('#<a(.*?)</a>#', '', $html->find('.description .std', 0)->innertext));
				$price = trim(preg_replace('#\£#', '', $html->find('.price', 0)->innertext));
				$gambar = array();
				foreach ($html->find('#thumbs img[alt="Click to view"]') as $key => $value) {
					$gambar[] = preg_replace('#thumbnail/50x50#', 'image/1000x1000', $value->src);;
				}
				$gambar_baru = array();
				foreach ($gambar as $key => $value) {
					$nama_file = Slug::create($title).'-'.rand().'.jpg';
					copy($value, Yii::getPathOfAlias('webroot').'/images/product/'.$nama_file);
					$gambar_baru[] = $nama_file;
				}
				$model= new PrdProduct;
				$model->date_input = date("Y-m-d H:i:s");
				$model->date_update = date("Y-m-d H:i:s");
				$model->date = date("Y-m-d H:i:s");
				$model->data = serialize(array());
				$model->kode = $kode;
				$model->harga = $price * 20000;
				$model->harga_coret = ($price * 20000) + ((rand(0, 4)*5)/100 * $price * 20000);
				$model->berat = 500;
				$model->stock = 10;
				$model->status = 1;
				$model->image = $gambar_baru[0];
				$model->category_id = 6;
				$model->brand_id = 5;
				$model->save(false);

				foreach ($gambar_baru as $key => $value) {
					if ($key > 0) {
						$modelImage = new PrdProductImage;
						$modelImage->image = $value;
						$modelImage->product_id = $model->id;
						$modelImage->save(false);
					}
				}

				$ring[] = 'Size:J';
				$ring[] = 'Size:L';
				$ring[] = 'Size:N';
				$ring[] = 'Size:P';
				foreach ($ring as $key => $value) {
					$modelAttributes = new PrdProductAttributes;
					$modelAttributes->id_str = '';
					$modelAttributes->product_id = $model->id;
					$modelAttributes->stock = 1;
					$modelAttributes->price = $model->harga;
					$modelAttributes->attribute = $value;
					$modelAttributes->save(false);
					$modelAttributes->id_str = $modelAttributes->id;
					$modelAttributes->save(false);
				}
				unset($ring);

				$modelDesc = new PrdProductDescription;
				$modelDesc->product_id=$model->id;
				$modelDesc->language_id=2;
				$modelDesc->name=$title;
				$modelDesc->desc=$description;
				$modelDesc->save(false);
			}

			$this->redirect(array('update','id'=>$model->id));

		// }
		// $this->render('buat',array(
		// ));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model= new PrdProduct;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new PrdProductDescription;
		}

		$modelAttributes = array();

		$modelImage = array();

		$modelColor = array();

		if(isset($_POST['PrdProduct']))
		{
			$model->attributes=$_POST['PrdProduct'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			foreach ($_POST['PrdProductDescription'] as $j => $mod) {
	            if (isset($_POST['PrdProductDescription'][$j])) {
	                $modelDesc[$j]=new PrdProductDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			unset($modelAttributes);
			if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
				foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
					$modelAttributes[$key] = new PrdProductAttributes;
					if ($value != '') {
						$modelAttributes[$key]->product_id = $model->id;
						$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
						if ($_POST['PrdProductAttributes']['price'][$key] == '') {
							$modelAttributes[$key]->price = $model->harga;
						}else{
							$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
						}
						$modelAttributes[$key]->attribute = $value;
					}
					
				}
			}

			$model->date = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image);
					$model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					// $model->insert_by = Yii::app()->user->name;
					// $model->last_update_by = Yii::app()->user->name;
					$model->data = serialize(array());

					$model->save();

					if (count($_FILES['PrdProductImage']['name']) > 0) {
						foreach ($_FILES['PrdProductImage']['name'] as $key => $value) {
							$modelImage = new PrdProductImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$modelImage->image);
								$modelImage->product_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					if (count($_FILES['PrdProductColor']['name']['image']) > 0) {
						foreach ($_FILES['PrdProductColor']['name']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							$image = CUploadedFile::getInstance($modelImage,'[image]'.$key.'');
							$imageColor = CUploadedFile::getInstance($modelImage,'[image_color]'.$key.'');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$modelImage->image_color = substr(md5(time()),0,5).'-'.$imageColor->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image);
								$imageColor->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image_color);
								$modelImage->product_id = $model->id;
								$modelImage->label = $_POST['PrdProductColor']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}

					PrdProductDescription::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->product_id=$model->id;
						$value->save();
					}

					PrdProductAttributes::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
						foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
							$modelAttributes[$key] = new PrdProductAttributes;
							if ($value != '') {
								$modelAttributes[$key]->id_str = $_POST['PrdProductAttributes']['id_str'][$key];
								$modelAttributes[$key]->product_id = $model->id;
								$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
								if ($_POST['PrdProductAttributes']['price'][$key] == '') {
									$modelAttributes[$key]->price = $model->harga;
								}else{
									$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
								}
								$modelAttributes[$key]->attribute = $value;
								$modelAttributes[$key]->save(false);
								$modelAttributes[$key]->id_str = $modelAttributes[$key]->id;
								$modelAttributes[$key]->save(false);
							}
							
						}
					}

					Log::createLog("PrdProduct Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}

		if ($model->date_input == '') {
			$model->date_input = date('Y-m-d H:i:s');
		}
		if (isset($_GET['copy']) && ! isset($_POST['PrdProduct'])) {
			$model=$this->loadModel($_GET['copy']);
			$model->image = '';
			$model->scenario = 'insert';
			$model->date_input = date('Y-m-d H:i:s');

			$modelDesc = array();
			foreach (Language::model()->getLanguage() as $key => $value) {
				$modelDesc[$value->code] = PrdProduct::model()->getDataDesc($model->id, $value->id);
				$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PrdProductDescription : $modelDesc[$value->code];
				// echo CHtml::errorSummary($modelDesc[$value->code]);
			}
			$modelAttributes = array();
			$modelAttributes = PrdProductAttributes::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
			'modelAttributes'=>$modelAttributes,
			'modelImage'=>$modelImage,
			'modelColor'=>$modelColor,
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
		// print_r(unserialize($model->setting));
		// exit;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = PrdProduct::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PrdProductDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}
		$modelAttributes = array();
		$modelAttributes = PrdProductAttributes::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelImage = array();
		$modelImage = PrdProductImage::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelColor = array();
		$modelColor = PrdProductColor::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// print_r($_POST);
		// exit;
		if(isset($_POST['PrdProduct']))
		{
			$image = $model->image;//mengamankan nama file
			// $file = $model->file;//mengamankan nama file
			$model->attributes=$_POST['PrdProduct'];//setting semua nilai
			$model->image = $image;//mengembalikan nama file

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['PrdProductDescription'] as $j => $mod) {
	            if (isset($_POST['PrdProductDescription'][$j])) {
	                $modelDesc[$j]=new PrdProductDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			unset($modelAttributes);
			if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
				foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
					$modelAttributes[$key] = new PrdProductAttributes;
					if ($value != '') {
						$modelAttributes[$key]->product_id = $model->id;
						$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
						if ($_POST['PrdProductAttributes']['price'][$key] == '') {
							$modelAttributes[$key]->price = $model->harga;
						}else{
							$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
						}
						$modelAttributes[$key]->attribute = $value;
					}
					
				}
			}

			// $model->image = $session['upload_foto_edit'][1];

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image);
					}

					$model->date_update = date("Y-m-d H:i:s");
					// $model->last_update_by = Yii::app()->user->name;
					$model->data = serialize($model->data);

					$model->save();

					// Update Image Tambahan
					PrdProductImage::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductImage2']) > 0) {
						foreach ($_POST['PrdProductImage2'] as $key => $value) {
							$modelImage = new PrdProductImage;
							if ($value != '') {
								$modelImage->product_id = $model->id;
								$modelImage->image = $value;
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['PrdProductImage']['name']) > 0) {
						foreach ($_FILES['PrdProductImage']['name'] as $key => $value) {
							$modelImage = new PrdProductImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$modelImage->image);
								$modelImage->product_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					// Update Color
					PrdProductColor::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductColor2']['image']) > 0) {
						foreach ($_POST['PrdProductColor2']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							if ($value != '') {
								$modelImage->product_id = $model->id;
								$modelImage->image = $value;
								$modelImage->image_color = $_POST['PrdProductColor2']['image_color'][$key];
								$modelImage->label = $_POST['PrdProductColor2']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['PrdProductColor']['name']['image']) > 0) {
						foreach ($_FILES['PrdProductColor']['name']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							$image = CUploadedFile::getInstance($modelImage,'[image]'.$key.'');
							$imageColor = CUploadedFile::getInstance($modelImage,'[image_color]'.$key.'');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$modelImage->image_color = substr(md5(time()),0,5).'-'.$imageColor->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image);
								$imageColor->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image_color);
								$modelImage->product_id = $model->id;
								$modelImage->label = $_POST['PrdProductColor']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}

					PrdProductDescription::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->product_id=$model->id;
						$value->save();
					}

					PrdProductAttributes::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
						foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
							$modelAttributes[$key] = new PrdProductAttributes;
							if ($value != '') {
								$modelAttributes[$key]->id_str = $_POST['PrdProductAttributes']['id_str'][$key];
								$modelAttributes[$key]->product_id = $model->id;
								$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
								if ($_POST['PrdProductAttributes']['price'][$key] == '') {
									$modelAttributes[$key]->price = $model->harga;
								}else{
									$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
								}
								$modelAttributes[$key]->attribute = $value;
								$modelAttributes[$key]->save(false);
								if ($modelAttributes[$key]->id_str == 0) {
									$modelAttributes[$key]->id_str = $modelAttributes[$key]->id;
									$modelAttributes[$key]->save(false);
								}
							}
							
						}
					}

					Log::createLog("ProductController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}
		if ( ! is_array($model->data)) {
			$model->data = unserialize($model->data);
		}else{
			$model->data = ($model->data);
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
			'modelAttributes'=>$modelAttributes,
			'modelImage'=>$modelImage,
			'modelColor'=>$modelColor,
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
			if(!isset($_POST['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionSetStatus($id, $type)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			$model->{$type} = ($model->{$type}-1)*-1;
			$model->save();
			echo json_decode($model->{$type});

		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new PrdProduct('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrdProduct']))
			$model->attributes=$_GET['PrdProduct'];

    	$categoryModel = new PrdCategory;
		$categoryModelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value){
			$categoryModelDesc[$value->code] = new PrdCategoryDescription;
		}

		if (isset($_POST['PrdCategoryDescription'])) {
			$categoryModel->attributes=$_POST['PrdCategory'];//setting semua nilai

			unset($categoryModelDesc);
			$valid=true;
			foreach ($_POST['PrdCategoryDescription'] as $j => $mod) {
	            if (isset($_POST['PrdCategoryDescription'][$j])) {
	                $categoryModelDesc[$j]=new PrdCategoryDescription;
	                $categoryModelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$categoryModelDesc[$j]->language_id = $lang->id;
	                $valid=$categoryModelDesc[$j]->validate() && $valid;
	            }
	        }
            if (isset($_POST['ajax']) && $_POST['ajax']==='category-form') {
				echo(json_encode(array(json_decode(CActiveForm::validate($categoryModel)), json_decode(CActiveForm::validateTabular($categoryModelDesc)))));
				Yii::app()->end();
            }
			if($categoryModel->validate() AND $valid){
				$transaction=$categoryModel->dbConnection->beginTransaction();
				try
				{
					$categoryModel->type = 'category';
					$categoryModel->save();

					PrdCategoryDescription::model()->deleteAll('category_id = :id', array(':id'=>$categoryModel->id));
					foreach ($categoryModelDesc as $key => $value) {
						$value->category_id=$categoryModel->id;
						$value->save();
					}

					Log::createLog("Create Category $categoryModel->id");
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

		$dataNestedCategory = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'type = :type',
					'params'=>array(
						':type'=>'category',
					)
				)
			),
		), $this->languageID);

		$nestedCategory = PrdCategory::model()->nested($dataNestedCategory['data']);

		$json_result = file_get_contents('php://input');
		if ($json_result != '') {
			$result = json_decode($json_result, true);
			PrdCategory::model()->saveSortNested($result);
			Yii::app()->end();
		}

		$this->render('index',array(
			'model'=>$model,
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PrdProduct::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}