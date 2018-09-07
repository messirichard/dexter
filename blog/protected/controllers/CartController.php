<?php
class CartController extends Controller
{
	public function actions()
	{
	    return array(
	      'aclist'=>array(
	        'class'=>'application.extensions.EAutoCompleteAction.remoteCityLocal',
	      ),
	      'accost'=>array(
	        'class'=>'application.extensions.EAutoCompleteAction.EAutoCompleteActionCost',
	      ),
	    );
	}

	public function actionShop()
	{
		$model = new Cart;

		$data = $model->viewCart($this->languageID);

		$this->pageTitle = 'My Cart - '.$this->pageTitle;
		$this->render('shop', array(
			'data' => $data,
		));
	}

	public function actionShipping()
	{
		$session=new CHttpSession;
		$session->open();

		$modelProduct = new Cart;

		$data = $modelProduct->viewCart($this->languageID);

		$model = new OrOrder;

		
		// setting scenario
		if (isset($session['login_member'])) {
			$model->scenario = 'input_order_data';
		} else {
			$this->redirect(array('/member/index'));
		}
		

		if(isset($_POST['OrOrder']))
		{

			$model->attributes=$_POST['OrOrder'];

			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->date_add = date("Y-m-d H:i:s");
					$model->order_status_id = 1;

					// $deliveryPrice = Delivery::model()->find('`from` = :from AND `to` = :to', array(':from'=>$model->delivery_from, ':to'=>$model->delivery_to));
					// $model->delivery_price = $deliveryPrice->price;

					$session['order'] = $model->attributes;

					// $model->save();
					// $orderDetail = array();
					// foreach ($data as $key => $value) {
					// 	$product = Product::model()->findByPk($key);
					// 	$modelOrderDetail = new OrderDetail;
					// 	$modelOrderDetail->order_id = 0;
					// 	$modelOrderDetail->product_id = $key;
					// 	$modelOrderDetail->name = $product->name;
					// 	$modelOrderDetail->image = $product->image;
					// 	$modelOrderDetail->price = $value['price'];
					// 	$modelOrderDetail->qty = $value['qty'];
					// 	$modelOrderDetail->option = $value['option'];
					// 	// $modelOrderDetail->save();
					// 	$orderDetail[] = $modelOrderDetail->attributes;
					// }

					// $session['order_detail'] = $orderDetail;

					// unset($session['cart']);
					// $session['order_id'] = $model->id;

					Yii::app()->user->setFlash('success','Data has been inserted');

				    $transaction->commit();

					$this->redirect(array('payment','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}
		$user = MeMember::model()->findByPk($session['login_member']['id']);
		if ( ! isset($_POST['OrOrder'])) {
			$model->payment_first_name = $user->first_name;
			$model->payment_last_name = $user->last_name;
			// $model->payment_company = $user->company;
			$model->payment_address_1 = $user->address;
			// $model->payment_address_2 = $user->address_2;
			$model->payment_city = $user->city;
			$model->payment_postcode = $user->postcode;
			$model->payment_zone = $user->province;
			// $model->payment_country = $user->country;

			$model->shipping_first_name = $user->first_name;
			$model->shipping_last_name = $user->last_name;
			// $model->shipping_company = $user->company;
			$model->shipping_address_1 = $user->address;
			// $model->shipping_address_2 = $user->address_2;
			$model->shipping_city = $user->city;
			$model->shipping_postcode = $user->postcode;
			$model->shipping_zone = $user->province;
			// $model->shipping_country = $user->country;

			$model->phone = $user->hp;
		}
		$this->pageTitle = 'Shipping - '.$this->pageTitle;
		$this->render('shipping', array(
			'data' => $data,
			'model' => $model,
			'user' => $user,
		));
	}

	public function actionPayment()
	{
		$session=new CHttpSession;
		$session->open();

		$order = $session['order'];

		$modelProduct = new Cart;

		$data = $modelProduct->viewCart($this->languageID);
		
		if (count($data) == 0)
			throw new CHttpException(404,'The requested page does not exist.');

		$model = new OrOrder;

		if(isset($_POST['OrOrder']))
		{
			$transaction=$model->dbConnection->beginTransaction();
			try
			{
				$user = MeMember::model()->findByPk($session['login_member']['id']);

				$model->attributes = $order;

				$model->customer_id = $user->id;
				$model->customer_group_id = 0;
				$model->first_name = $user->first_name;
				$model->last_name = $user->last_name;
				$model->email  = $user->email;

				$model->invoice_no = rand(1000, 9999);
				$model->invoice_prefix = 'DV-'.date("Ymd");
				$model->payment_method_id = $_POST['OrOrder']['payment_method'];

				$model->save();

				$orderDetail = array();
				$total = 0;
				foreach ($data as $key => $value) {
					if ($value['option'] != '') {
						$option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
						$value['price'] = $option->price;
					}
					$total = $total + $value['price']*$value['qty'];
					$berat = $berat + ($value['optional']['berat']*$value['qty']);

					$product = PrdProduct::model()->with('description')->find('t.id = :id AND description.language_id = :language_id', array(':id'=>$key, ':language_id'=>$this->languageID));
					$modelOrderDetail = new OrOrderProduct;
					$modelOrderDetail->order_id = $model->id;
					$modelOrderDetail->product_id = $product->id;
					$modelOrderDetail->image = $product->image;
					$modelOrderDetail->name = $product->description->name;
					$modelOrderDetail->kode = $product->kode;
					$modelOrderDetail->qty = $value['qty'];
					$modelOrderDetail->price = $value['price'];
					$modelOrderDetail->total = $value['qty']*$value['price'];
					$modelOrderDetail->attributes_id = $option->id_str;
					$modelOrderDetail->attributes_name = $option->attribute;
					$modelOrderDetail->attributes_price = $option->price;
					$modelOrderDetail->berat = $product->berat;
					$modelOrderDetail->save(false);
				}
				$model->total = $total;
				$model->delivery_weight = $berat;
				$model->save();
				
				// save history
				$modelHistory = new OrOrderHistory;
				$modelHistory->member_id = $user->id;
				$modelHistory->order_id = $model->id;
				$modelHistory->order_status_id = 1;
				$modelHistory->notify = '';
				$modelHistory->comment =  'Your order '.$model->invoice_prefix.'-'.$model->invoice_no.' successfully places with status "Pending"';
				$modelHistory->date_add = date("Y-m-d H:i:s");
				$modelHistory->save(false);

				unset($session['cart']);
				unset($session['order']);

				$session['order_id'] = $model->id;

				Yii::app()->user->setFlash('success','Data has been inserted');

			    $transaction->commit();

			    $order = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

			    $bank = Bank::model()->findAll();

				$mail = $this->renderPartial('//mail/cart', array(
					'model'=>$model,
					'order'=>$order,
					'bank'=>$bank,
				), true);
				// echo $mail;
				// exit;

				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					// 'to'=>array($model->email),
					'subject'=>'Dv Computers Order',
					'message'=>$mail,
				);
				// kirim email
				Common::mail($config);
				// if ($model->payment_method == 'kartu kredit') {
				// 	CreditCard::sendData(array(
				// 		'model'=>$model,
				// 		'order'=>$order,
				// 		'bank'=>$bank,
				// 	));
				// 	exit;
				// }

				$this->redirect(array('confirmation','id'=>$model->id));
			}
			catch(Exception $ce)
			{
				echo $ce;
				exit;
			    $transaction->rollback();
			}
		}


		$this->pageTitle = 'Payment - '.$this->pageTitle;
		$this->render('payment', array(
			'data' => $data,
			'model' => $model,
			'orderDetail' => $orderDetail,
		));
	}

	public function actionConfirmation()
	{
		$session=new CHttpSession;
		$session->open();

		$modelOrder = OrOrder::model()->findByPk($session['order_id']);

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'Confirmation - '.$this->pageTitle;
		$this->render('confirmation', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
		));

	
	}

	public function actionDestroy()
	{
		$session=new CHttpSession;
		$session->open();

		unset($session['order']);
	
	}

	public function actionGetTo()
	{
		$to = Delivery::model()->findAll('`from` = :from', array(':from'=>$_POST['from']));
		$str = '';
		foreach ($to as $value) {
			$str .= '<option ="'.$value->to.'">'.$value->to.'</option>';
		}
		echo($str);

	
	}

	public function actionPricedelivery()
	{
		$deliveryPrice = Delivery::model()->find('`from` = :from AND `to` = :to', array(':from'=>$_POST['from'], ':to'=>$_POST['to']));
		echo $deliveryPrice->price;

	
	}

	/**
	 * Kartu kredit
	 */
	public function actionCreditcard()
	{
		//Contoh untuk menangani HTTP (POST) notifikasi yang dikirim Veritrans
		$json_result = file_get_contents('php://input');
		$result = (object)json_decode($json_result, true);
		error_log("Menerima notifikasi dari Veritrans: ");
		error_log($result->order_id);

		if($result->notification_key == "2507d2f0-a0c4-4e80-b23f-a0ab0f590323" ) {
			error_log("Read Daatabase");
			$model = Order::model()->find('nota = :nota', array(':nota'=>$result->order_id));
			error_log($model->nota);
			if($result->status_code == "200")
			{
				//OK, trancaction is success
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'success';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else if($result->status_code == "201")
			{
				//Pending, transaction is success but the processing has not been completed.
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'challenge';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else if($result->status_code == "202")
			{
				//Denied, request is success but transaction is denied by bank or Veritrans fraud detection system.
				error_log("Status transaksi untuk order id ".$result->order_id.": ".$result->status_code);
				$model->payment = 'denied';

				//TODO: Update merchant's database (Ex: update status order).
			}
			else
			{
				//error. You can see all the possibilities of the status_code and the explanation on the Veritrans Payment API Documentation
				error_log("Terjadi kesalahan. Status code: ".$result->status_code);
				$model->payment = 'gagal';
			}
			$model->save(false);

			$mail = $this->renderPartial('//mail/confirCC', array(
				'model'=>$model,
			), true);

			$config = array(
				'to'=>array($model->email, $this->setting['email']),
				// 'to'=>array($model->email),
				'subject'=>'Pembayaran Invoice Nomor '.$model->nota.' '.ucwords($model->payment),
				'message'=>$mail,
			);
			// kirim email
			Common::mail($config);
		}else{
			error_log("Terjadi kesalahan");
		}
	}
	public function actionRepeatcreditcard($nota)
	{

		$model = Order::model()->find('nota = :nota', array(':nota'=>$nota));

	    $order = OrderDetail::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

	    $bank = Bank::model()->findAll();
		if ($model->payment_method == 'kartu kredit') {
			CreditCard::sendData(array(
				'model'=>$model,
				'order'=>$order,
				'bank'=>$bank,
			));
		}
	}
	public function actionCcgagal()
	{ 
		$error = array(
			'code'=>'Transaksi '.$_GET['order_id'].' Batal',
			'message'=>'Transaksi untuk nomor transaksi '.$_GET['order_id'].' batal di lakukan',
		);

		$this->render('error',array(
			'error'=>$error,
		));		
		
	}
	public function actionCcerror()
	{

		$error = array(
			'code'=>'Transaksi '.$_GET['order_id'].' Gagal',
			'message'=>'Transaksi untuk nomor transaksi '.$_GET['order_id'].' gagal di lakukan',
		);

		$this->render('error',array(
			'error'=>$error,
		));		
		
	}
}