<?php

class ProductController extends Controller
{

	public function actionIndex()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('description');

		// Mengatur Order
		if ($_GET['order'] == 'new-old') {
			$criteria->order = 'date DESC';
		} elseif($_GET['order'] == 'old-new') {
			$criteria->order = 'date ASC';
		} elseif($_GET['order'] == 'hight-low') {
			$criteria->order = 'harga DESC';
		} elseif($_GET['order'] == 'low-hight') {
			$criteria->order = 'harga ASC';
		} else {
			$criteria->order = 'harga ASC';
		}
		

		$criteria->addCondition('status = "1"');
		
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
	
		if ($_GET['category'] != '') {
			$subMenuCategory = PrdCategory::model()->findAll('parent_id = :parent_id', array(':parent_id'=>$_GET['category']));
			if (count($subMenuCategory) > 0) { // cek apakah mempunyai submenu
				$idCategory = array();
				foreach ($subMenuCategory as $key => $value) {
					$idCategory[] = $value->id;
				}
				$criteria->addInCondition('t.category_id', $idCategory);
				$strCategory = ViewCategory::model()->find('id = :id AND language_id = :language_id', array(':id'=>$_GET['category'], ':language_id'=>$this->languageID))->name;
			}else{
				$criteria->addCondition('t.category_id = :category');
				$criteria->params[':category'] = $_GET['category'];
				$cekSubOrNot = PrdCategory::model()->find('parent_id != 0 AND id = :id', array(':id'=>$_GET['category']));
				if ($cekSubOrNot != null) {
					$strCategory = ViewCategory::model()->find('id = :id AND language_id = :language_id', array(':id'=>$cekSubOrNot->parent_id, ':language_id'=>$this->languageID))->name;
				}
			}
		}

		if ($_GET['pagesize'] != '') {
			$pageSize = $_GET['pagesize'];
		} else {
			$pageSize = 15;
		}

		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));
		
		$this->render('index', array(
			'product'=>$product,
			'strCategory'=>$strCategory,
		)); 
	}	
	
	public function actionDetail($id)
	{

		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$data = PrdProduct::model()->find($criteria);
		if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->pageTitle = $data->description->name.' | '.$this->pageTitle;

		// $categoryName = Product::model()->getCategoryName();

		// $_GET['order'] = 'rand';
		// $rand = Product::model()->getAllData(4, false, $this->languageID);

		// if ( ! is_array($data->setting)) {
		// $data->setting = unserialize($data->setting);
		// }else{
		// $data->setting = ($data->setting);
		// }
		// $nutrition = ProductNutrition::model()->getNutrition($id);

		$this->render('detail', array(	
			'data' => $data,
			// 'rand' => $rand,
			// 'menu' => $menu,
			// 'nutrition' => $nutrition,
			// 'categoryName' => $categoryName,
		));
	}
	
	public function actionAddcart()
	{
		if ($_POST['id'] != '') {
			if ( ! $_POST['id'])
				throw new CHttpException(404,'The requested page does not exist.');

			$id = $_POST['id'];
			$qty = $_POST['qty'];
			$optional = $_POST['optional'];
			$option = $_POST['option'];

			$model = new Cart;

			$data = PrdProduct::model()->findByPk($id);

			if (is_null($data))
				throw new CHttpException(404,'The requested page does not exist.');

			$model->addCart($id, $qty, $data->harga, $option, $optional);
			
			Yii::app()->user->setFlash('addcart',$qty);
			$this->redirect(array('/product/addcart', 'id'=>$data->id));
		}else{
			$criteria=new CDbCriteria;
			$criteria->with = array('description');
			$criteria->addCondition('status = "1"');
			$criteria->addCondition('description.language_id = :language_id');
			$criteria->params[':language_id'] = $this->languageID;
			$criteria->addCondition('t.id = :id');
			$criteria->params[':id'] = $_GET['id'];
			$data = PrdProduct::model()->find($criteria);
			if($data===null)
				throw new CHttpException(404,'The requested page does not exist.');
			
			$model = new Cart;
			$cart = $model->viewCart($this->languageID);

			$this->render('addcart', array(	
				'data' => $data,
				'cart' => $cart[$_GET['id']],
			));
		}
	}

	public function actionAddcart2()
	{
		if ( ! $_GET['id'])
			throw new CHttpException(404,'The requested page does not exist.');

		$id = $_GET['id'];
		$qty = 1;
		$optional = $_POST['optional'];
		$option = $_POST['option'];

		$model = new Cart;

		$data = PrdProduct::model()->findByPk($id);

		if (is_null($data))
			throw new CHttpException(404,'The requested page does not exist.');

		$model->addCart($id, $qty, $data->harga, $option, $optional);
		
		Yii::app()->user->setFlash('addcart',$qty);
		$this->redirect(array('/product/addcart', 'id'=>$data->id));
	}

	public function actionEdit()
	{
		if ( ! $_POST['id'])
			throw new CHttpException(404,'The requested page does not exist.');

		$id = $_POST['id'];
		$qty = $_POST['qty'];
		$color = $_POST['colour'];
		$option = $_POST['option'];

		$model = new Cart;

		$data = PrdProduct::model()->findByPk($id);

		if (is_null($data))
			throw new CHttpException(404,'The requested page does not exist.');

		$model->addCart($id, $qty, $data->harga, $color, $option);

		// $this->redirect(CHtml::normalizeUrl(array('/cart/shop')));
	}
	
	public function actionDestroy()
	{
		$model = new Cart;
		$model->destroyCart();
	}
	public function actionAddcompare($id)
	{
		$model = new Cart;
		$model->addCompare($id);
	}
	public function actionDeletecompare()
	{
		$model = new Cart;
		$model->deleteCompare($id);
		$this->redirect(CHtml::normalizeUrl(array('/product/index')));
	}
	public function actionViewcompare()
	{
		$model = new Cart;
		$data = $model->viewCompare($id);

		$this->layout='//layoutsAdmin/mainKosong';

		$categoryName = Product::model()->getCategoryName();

		$this->render('viewcompare', array(
			'data'=>$data,
			'categoryName'=>$categoryName,
		));
	}


}