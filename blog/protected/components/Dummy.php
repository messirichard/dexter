<?php

class Dummy
{
	public function getDummy($param='')
	{
		return file_get_contents('http://loripsum.net/api'.$param);
	}
	public function getDummyImage()
	{
		return file_get_contents('http://loripsum.net/api'.$param);
	}
	public function createDummyProduct()
	{

		$time_input = time()-(60*60*24*30)+rand(0,60*60*24*30);
		$harga = rand(50,1000).'000';

		$imageData = array();

		if ($handle = opendir(Yii::getPathOfAlias('webroot').'/images/dummy/')) {
		    /* This is the correct way to loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
		    	$imageData[] = $entry;
		    }
		    unset($imageData[0]);
		    unset($imageData[1]);
		    unset($imageData[2]);

		    closedir($handle);
		}

		$text = Dummy::getDummy('/1/short');

		$titleArray = explode(' ', strip_tags($text));
		$title = '';
		for ($i=0; $i < rand(2,6) ; $i++) { 
			$title .= $titleArray[rand(0,count($titleArray))].' ';
		}
		$title = preg_replace('/[^a-zA-Z0-9 ]/','',ucwords(trim($title)));

		$titleArray = explode(' ', strip_tags($text));
		$title2 = '';
		for ($i=0; $i < rand(20,30) ; $i++) { 
			$title2 .= $titleArray[rand(0,count($titleArray))].' ';
		}
		$title2 = preg_replace('/[^a-zA-Z0-9 ]/','',ucwords(trim($title2)));

		$dataImage = $imageData[rand(3,count($imageData))];
		$dataImage2 = substr(md5(time()),0,5).'-'.$dataImage;
		copy(Yii::getPathOfAlias('webroot').'/images/dummy/'.$dataImage, Yii::getPathOfAlias('webroot').'/images/product/'.$dataImage2);
		
		$category = array(
			'6',
			'7',
			'10',
		);

		$data = array(
			'category_id' => $category[rand(0,count($category)-1)],
			'image' => $dataImage2,
			'kode'=>'PRD-'.rand(1000,9999),
			'harga' => $harga,
			'harga_coret' => (int)((rand(0,6)*5).'000')+$harga,
			'stock'=>rand(0,10),
			'berat'=>rand(0,4)*500,
			'terbaru'=>rand(0,1),
			'terlaris'=>rand(0,1),
			'out_stock'=>rand(0,1),
			'status' => rand(0,1),
			'date'=>date("Y-m-d H:i:s",$time_input),
			'date_input' => date("Y-m-d H:i:s",$time_input),
			'date_update' => date("Y-m-d H:i:s",$time_input+rand(0,60*60*24)),
			'data'=>'',
		);
		// print_r($data);
		// exit;

		// input data;
		$model = new PrdProduct;
		$model->attributes = $data;
		$model->save();
		echo CHtml::errorSummary($model);

		$dataDesc = array(
			'product_id' => $model->id,
			'language_id' => '2',
			'name' => $title,
			'desc' => $text,
			'meta_title' => '',
			'meta_desc' => '',
			'meta_key' => '',
		);

		$modelDesc = new PrdProductDescription;
		$modelDesc->attributes = $dataDesc;
		$modelDesc->save(false);

		/*
		for ($i=0; $i < rand(0,5); $i++) { 
			$modelImage = new PrdProductImage;

			$dataImage = $imageData[rand(3,count($imageData))];
			$dataImage2 = substr(md5(time()),0,5).'-'.$dataImage;
			copy(Yii::getPathOfAlias('webroot').'/images/dummy/'.$dataImage, Yii::getPathOfAlias('webroot').'/images/product/'.$dataImage2);

			$dataDesc = array(
				'product_id' => $model->id,
				'image' => $dataImage2,
			);

			$modelImage->attributes = $dataDesc;
			$modelImage->save(false);
		}
		*/ 


		echo CHtml::errorSummary($modelDesc);
	}

	public function createDummyBlog()
	{

		$time_input = time()-(60*60*24*90)+rand(0,60*60*24*90);
		$harga = rand(50,1000).'000';

		$imageData = array();

		if ($handle = opendir(Yii::getPathOfAlias('webroot').'/images/dummy/')) {
		    /* This is the correct way to loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
		    	$imageData[] = $entry;
		    }
		    unset($imageData[0]);
		    unset($imageData[1]);
		    unset($imageData[2]);

		    closedir($handle);
		}

		$categoryModel = Category::model()->findAll('parent_id != "0"');
		$category = array();
		foreach ($categoryModel as $key => $value) {
			$category[] = $value->id;
		}

		$text = $this->getDummy('/5/');
		$titleArray = explode(' ', strip_tags($text));
		$title = '';
		for ($i=0; $i < rand(2,6) ; $i++) { 
			$title .= $titleArray[rand(0,count($titleArray))].' ';
		}
		$title = preg_replace('/[^a-zA-Z0-9 ]/','',ucwords(trim($title)));

		$dataImage = $imageData[rand(3,count($imageData))];
		copy(Yii::getPathOfAlias('webroot').'/images/dummy/'.$dataImage, Yii::getPathOfAlias('webroot').'/images/blog/'.$dataImage);



		$data = array(

			'image' => $dataImage,
			'active' => rand(0,1),
			'date_input' => date("Y-m-d H:i:s",$time_input),
			'date_update' => date("Y-m-d H:i:s",$time_input+rand(0,60*60*24)),
			'insert_by' => 'deoryzpandu@gmail.com',
			'last_update_by' => 'deoryzpandu@gmail.com',
			'writer' => '',
		);

		// input data;
		$model = new Blog;
		$model->attributes = $data;
		$model->date_input = date("Y-m-d H:i:s",$time_input);
		$model->date_update = date("Y-m-d H:i:s",$time_input+rand(0,60*60*24));
		$model->save();
		echo CHtml::errorSummary($model);

		$dataDesc = array(
			'blog_id' => $model->id,
			'language_id' => '2',
			'title' => $title,
			'content' => $text,
		);

		$modelDesc = new BlogDescription;
		$modelDesc->attributes = $dataDesc;
		$modelDesc->blog_id = $model->id;
		$modelDesc->save();
		echo CHtml::errorSummary($modelDesc);
	}
	public function updateDummyProduct()
	{
		$data = Product::model()->findAll();
		foreach ($data as $key => $value) {
			// $value->setting = array(
			// 	'berat'=>rand(1,10).'00',
			// 	'protein'=>rand(1,3).'0',
			// 	'bcaas'=>rand(10,30),
			// 	'glutamine'=>rand(10,30),
			// 	'enzyme'=>rand(10,30),
			// 	'serving'=>rand(1,3).'0',
			// 	'ingridient'=>'Nama Bahan Utama',
			// 	'youtube'=>'',
			// 	'pelanggan'=>array(
			// 		'1'=>rand(1,239),
			// 		'2'=>rand(1,239),
			// 		'3'=>rand(1,239),
			// 		'4'=>rand(1,239),
			// 	),
			// 	'product'=>array(
			// 		'1'=>rand(1,239),
			// 		'2'=>rand(1,239),
			// 		'3'=>rand(1,239),
			// 		'4'=>rand(1,239),
			// 	),
			// );
			// $value->setting = serialize($value->setting);
			if (rand(0,0)==0) {
				// $value->lainlain_id = 0;
			}
			$value->save();
		}
	}
	public function inputProductCSV()
	{
		$data = Csv::model()->findAll();
		foreach ($data as $key => $value) {
			$product = new Product;
			$product->category_id = $value->value1;
			$product->image = '';
			$product->active = 0;
			$product->date_input = date("Y-m-d H:i:s");
			$product->date_update = date("Y-m-d H:i:s");
			$product->insert_by = 'deoryzpandu@gmail.com';
			$product->last_update_by = 'deoryzpandu@gmail.com';
			$product->writer = '';
			if ($value->value14 == '') {
			$product->harga = $value->value13;
			$product->harga_mask = 0;
			}else{
			$product->harga = $value->value14;
			$product->harga_mask = $value->value13;
			}
			$product->favorite = '';
			$product->setting = serialize(array(
				'calories' => $value->value15,
				'berat' => $value->value12,
				'protein' => $value->value16,
				'bcaas' => $value->value17,
				'glutamine' => $value->value18,
				'enzyme' => $value->value19,
				'serving' => $value->value20,
				'ingridient' => $value->value21,
				'youtube' => $value->value22,
				'pelanggan' => array(
					'1'=>'',
					'2'=>'',
					'3'=>'',
					'4'=>'',
				),
				'product' => array(
					'1'=>'',
					'2'=>'',
					'3'=>'',
					'4'=>'',
				),
			));
			$product->type = $value->value23;
			$product->goal_id = $value->value3;
			$product->bahan_utama = '';
			$product->youtube = '';
			$product->lainlain_id = $value->value4;
			$product->merk_id = $value->value2;
			// $product->save(false);


			$productDesc = new ProductDescription;
			$productDesc->product_id = $product->id;
			$productDesc->language_id = 2;
			$productDesc->title = $value->value5;
			$productDesc->content = $value->value7;
			$productDesc->intro_desc = $value->value6;
			$productDesc->shipping_info = '';
			$productDesc->manfaat = $value->value8;
			$productDesc->keunggulan = $value->value9;
			$productDesc->cara_pemakaian = $value->value10;
			// $productDesc->save(false);
		}
	}
}
