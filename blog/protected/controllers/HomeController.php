<?php

class HomeController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

// 	public function actionDummy()
// 	{
// // 		Dummy::createDummyProduct();
// // 		echo '<META http-equiv="refresh" content="0;URL=http://localhost/dv-computers/home/dummy">
// // ';
// 		$aaa = 'DBS-20180924-11231231';
// 		Common::barcode( Yii::getPathOfAlias('webroot').'/images/barcode/'.$aaa.'.png', $aaa, 100);
// 	}

	public function actionIndex()
	{
		
		$criteria=new CDbCriteria;

		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';
		if ($_GET['category'] != '') {
			$criteria->addCondition('t.topik_id = :category');
			$criteria->params[':category'] = $_GET['category'];
		}

		$dataBlog = new CActiveDataProvider('Blog', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10000,
		    ),
		));

		$criteria=new CDbCriteria;

		$criteria->with = array('description');
		$criteria->addCondition('active = "2"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';
		if ($_GET['category'] != '') {
			$criteria->addCondition('t.topik_id = :category');
			$criteria->params[':category'] = $_GET['category'];
		}
		// $criteria->limit = 4;

		$dataBlog2 = Blog::model()->findAll($criteria);

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('t.type = :type');
		$criteria->params[':type'] = 'category';
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		// $criteria->limit = 3;
		$criteria->order = 'sort ASC';
		$dataCategory = PrdCategory::model()->findAll($criteria);


		$this->pageTitle = 'Blog ';
		$this->layout='//layouts/column1';
		$this->render('index', array(
			'dataBlog'=>$dataBlog,
			'dataBlog2'=>$dataBlog2,
			'dataCategory'=>$dataCategory,
		));
	}


	public function actionDetail($id)
	{
		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 'date_input DESC';
		$detail = Blog::model()->find($criteria);
		if($detail===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->pageTitle = $detail->description->title . ' - News & Articles - '.$this->pageTitle;

		$this->layout='//layouts/column1';
		$this->render('detail', array(
			'detail' => $detail,
		));
	}

	public function actionDetailTiket($id)
	{
		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1" OR active = "2"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 'date_update ASC';

		$data = Blog::model()->find($criteria);
		if($data===null)
			throw new CHttpException(404,'The requested page does not exist.');
		// $criteria = new CDbCriteria;
		// $criteria->with = array('description');
		// $criteria->addCondition('status = "1"');
		// $criteria->addCondition('description.language_id = :language_id');
		// $criteria->params[':language_id'] = $this->languageID;
		// $_GET['category'] = 0;
		// if ($_GET['category'] != '') {
		// 	$criteria->addCondition('t.category_id = :category');
		// 	$criteria->params[':category'] = $_GET['category'];
		// }
		// $product = new CActiveDataProvider('PrdProduct', array(
		// 	'criteria'=>$criteria,
		//     'pagination'=>array(
		//         'pageSize'=>8,
		//     ),
		// ));
		$criteria=new CDbCriteria;
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('t.blog_id = :blog_id');
		$criteria->params[':blog_id'] = $data->id;
		$ticketData = Ticket::model()->findAll($criteria);
		$this->pageTitle = 'Events | Decibels Festivals Surabaya - Biggest Music Event in Surabaya.';
		
		$this->layout='//layouts/column1';

		$this->render('category_detail', array(
			'ticketData'=>$ticketData,
			'data'=>$data,
		));
	}

	// public function actionDetail($id)
	// {

	// 	$criteria=new CDbCriteria;
	// 	$criteria->addCondition('status = "1"');
	// 	$criteria->addCondition('t.id = :id');
	// 	$criteria->params[':id'] = $id;
	// 	$data = Ticket::model()->find($criteria);
	// 	if($data===null)
	// 		throw new CHttpException(404,'The requested page does not exist.');

	// 	$this->pageTitle = $data->name.' | Decibels Festivals Surabaya - Biggest Music Event in Surabaya.';

	// 	$model = new TicketOrder;
	// 	$model->scenario = 'insert';

	// 	if(isset($_POST['TicketOrder']))
	// 	{
	// 		$model->attributes=$_POST['TicketOrder'];

	//         $secret_key = "6LcUBWUUAAAAAHOLnrqOIqldyusQKrnN3kiQRJ0p";
	//         $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	//         $response = json_decode($response);
	//         if($response->success==false)
	//         {
	//           $model->addError('verifyCode', 'Please verify the available captcha.');
	//         }

	// 		if(!$model->hasErrors() AND $model->validate())
	// 		{
	// 			$model->ticket_id = $data->id;
	// 			$model->ticket_name = $data->name;
	// 			$model->ticket_desc = $data->desc;
	// 			$model->ticket_price = $data->harga;
	// 			$model->no_invoice = 'DBS-'.date('Ymd').'-'.rand(1000,9999);
	// 			$model->confirm_code = substr(md5(rand(10000, 1000000000)), 0, 40);
	// 			$model->kode_unik = rand(100,999);
	// 			$model->method = $_POST['submit'];
	// 			$model->total = $data->harga * $model->qty;
	// 			$model->save();
	// 			// config email
	// 			$messaged = $this->renderPartial('//mail/contact2',array(
	// 				'model'=>$model,
	// 			),TRUE);
	// 			$config = array(
	// 				'to'=>array($model->email),
	// 				'subject'=>'['.Yii::app()->name.'] ticket order from '.$model->email,
	// 				'message'=>$messaged,
	// 			);
	// 			Common::mail($config);
	// 			$config = array(
	// 				'to'=>array($this->setting['email']),
	// 				'subject'=>'['.Yii::app()->name.'] ticket order from '.$model->email,
	// 				'message'=>$messaged,
	// 			);
	// 			Common::mail($config);
	// 			if ($_POST['submit']!='bank') {
	// 				$this->dokupay($model);
	// 			}

	// 			// Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
	// 			$this->redirect(array('confirm', 'nota'=>$model->no_invoice));
	// 		}

	// 	}

	// 	if ($model->qty == '') {
	// 		$model->qty = 1;
	// 	}

	// 	$this->layout='//layouts/column1';
	// 	$this->render('detail', array(	
	// 		'data' => $data,
	// 		'model' => $model,
	// 	));
	// }

	public function dokupay($model)
	{
		// POST redirectData to redirectURL
		echo '<form method="POST" action="https://staging.doku.com/Suite/Receive" id="dataPOST">';
			$itemDetails = array();
			$itemDetails[] = $model->ticket_name.','.round($model->ticket_price).'.00,'.round($model->qty).','.round($model->total).'.00';
$sharedkey = 'W2K2d9M6v9k6';
$mallid = '10275677';
$sessionid = md5(rand(1000000000,999999999999999));
$model->insertId = $sessionid;
$model->save(false);
$words = sha1(round($model->total).'.00'.$mallid.$sharedkey.$model->no_invoice)
		?>

			<input type="hidden" name="BASKET" value="<?php echo implode(';', $itemDetails) ?>">
			<input type="hidden" name="MALLID" value="<?php echo $mallid ?>">
			<input type="hidden" name="CHAINMERCHANT" value="NA">
			<input type="hidden" name="CURRENCY" value="360">
			<input type="hidden" name="PURCHASECURRENCY" value="360">
			<input type="hidden" name="AMOUNT" value="<?php echo round($model->total).'.00' ?>">
			<input type="hidden" name="PURCHASEAMOUNT" value="<?php echo round($model->total).'.00' ?>">
			<input type="hidden" name="TRANSIDMERCHANT" value="<?php echo $model->no_invoice ?>">
			<input type="hidden" name="SHAREDKEY" value="<?php echo $sharedkey ?>">
			<input type="hidden" name="WORDS" value="<?php echo $words ?>">
			<input type="hidden" name="REQUESTDATETIME" value="<?php echo date('YmdHis') ?>">
			<input type="hidden" name="SESSIONID" value="<?php echo $sessionid ?>">
			<input type="hidden" name="PAYMENTCHANNEL" value="">
			<input type="hidden" name="EMAIL" value="<?php echo $model->email ?>">
			<input type="hidden" name="NAME" value="<?php echo $model->first_name.' '.$model->last_name ?>">
			<input type="hidden" name="ADDRESS" value="<?php echo $model->address ?>">
			<input type="hidden" name="COUNTRY" value="360">
			<input type="hidden" name="STATE" value="">
			<input type="hidden" name="CITY" value="<?php echo $model->city ?>">
			<input type="hidden" name="PROVINCE" value="<?php echo $model->state ?>">
			<input type="hidden" name="ZIPCODE" value="<?php echo $model->post_code ?>">
			<input type="hidden" name="HOMEPHONE" value="">
			<input type="hidden" name="MOBILEPHONE" value="<?php echo $model->phone ?>">
			<input type="hidden" name="WORKPHONE" value="">
			<input type="hidden" name="BIRTHDATE" value="">
		<?php
		// foreach ($response['redirectData'] as $key => $value) {
		// 	echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
		// }
		echo '</form>';
		echo '  <script type="text/javascript">
			  document.getElementById("dataPOST").submit();
			</script>';

		Yii::app()->end();
	}

	public function actionNotifydoku()
	{
	    if($_POST['TRANSIDMERCHANT']) {
	        $order_number = $_POST['TRANSIDMERCHANT'];
		} 
		else 
		{ echo 'Stop1';Yii::app()->end(); }
		error_log('Mulai Di Sini');

	    $totalamount = $_POST['AMOUNT'];
	    $words    = $_POST['WORDS'];
	    $statustype = $_POST['STATUSTYPE'];
	    $response_code = $_POST['RESPONSECODE'];
	    $approvalcode   = $_POST['APPROVALCODE'];
	    $status         = $_POST['RESULTMSG'];
	    $paymentchannel = $_POST['PAYMENTCHANNEL'];
	    $paymentcode = $_POST['PAYMENTCODE'];
	    $session_id = $_POST['SESSIONID'];
	    $bank_issuer = $_POST['BANK'];
	    $cardnumber = $_POST['MCN'];
	    $payment_date_time = $_POST['PAYMENTDATETIME'];
	    $verifyid = $_POST['VERIFYID'];
	    $verifyscore = $_POST['VERIFYSCORE'];
	    $verifystatus = $_POST['VERIFYSTATUS'];
	    error_log(json_encode($_POST));

	    $transaction_data = TicketOrder::model()->find('no_invoice = :no_invoice AND insertId = :insertId', array(':no_invoice'=>$order_number, ':insertId'=>$session_id));
	    if ($transaction_data == null) {
	    	echo 'Stop1';
	    	error_log('Stop1');
	    	Yii::app()->end();
	    }
	    if ($status=="SUCCESS") {
	    	error_log($transaction_data->status);
	    	$transaction_data->status = 2;
	    	$transaction_data->save(false);
	    	echo 'Continue';

			$messaged = $this->renderPartial('//mail/contact2',array(
				'model'=>$transaction_data,
			),TRUE);
			$config = array(
				'to'=>array($transaction_data->email),
				'subject'=>'['.Yii::app()->name.'] ticket order from '.$transaction_data->email,
				'message'=>$messaged,
			);
			Common::mail($config);
			$config = array(
				'to'=>array($this->setting['email']),
				'subject'=>'['.Yii::app()->name.'] ticket order from '.$transaction_data->email,
				'message'=>$messaged,
			);
			Common::mail($config);

	    	error_log($transaction_data->status);
	    	error_log('Continue');
	    	echo 'Stop1';Yii::app()->end();
	    }else{
	    	// $transaction_data->insertStatus = $status;
	    	// $transaction_data->insertMessage = $approvalcode;
	    	$transaction_data->save(false);
	    	echo 'Stop1';
	    	error_log('Stop1');
	    	Yii::app()->end();
	    }

	}

	public function actionConfirm()
	{
		if ($_GET['nota']) {
			$id = $_GET['nota'];
			$session=new CHttpSession;
			$session->open();

			if ($_GET['code'] != '') {
				$modelOrder = TicketOrder::model()->find('no_invoice = :no_invoice AND confirm_code = :code', array(':no_invoice'=>$id, ':code'=>$_GET['code']));
				if ($_GET['status'] == 1) {
					$modelOrder->status = 10;
					$modelOrder->save(false);
					$this->redirect(array('confirm', 'nota'=>$_GET['nota'], 'code'=>$_GET['code']));
				}
			}else{
				$modelOrder = TicketOrder::model()->find('no_invoice = :no_invoice', array(':no_invoice'=>$id));
			}
			$this->pageTitle = 'Confirmation - '.$this->pageTitle;
			$this->layout='//layouts/column1';
			$this->render('confirm', array(
				'modelOrder'=>$modelOrder
			));
		}elseif($_POST['TRANSIDMERCHANT']){
			$order_number = $_POST['TRANSIDMERCHANT'];
			$this->redirect(array('/home/confirm', 'nota'=>$order_number));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	
	}

	public function actionError()
	{
		$this->layout = '//layoutsAdmin/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->layout='//layouts/column1';

				$this->pageTitle = 'Error '.$error['code'].': '. $error['message'] .' - '.$this->pageTitle;
				$this->render('error', array(
					'error'=>$error,
				));
			}
		}

	}

	public function actionEticket($email, $ticket)
	{
		$this->pageTitle = 'E-Ticket - '.$this->pageTitle;
		$this->layout='//layouts/_blank';

		$modelOrder = TicketOrder::model()->find('email = :email AND no_invoice = :nota', array(':email'=>urldecode($email), ':nota'=>$ticket));
		if($modelOrder===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$this->render('eticket', array(
			'modelOrder'=>$modelOrder,
		));
	}

	public function actionRecyclingit()
	{
		$this->pageTitle = 'Recycling It - '.$this->pageTitle;

		$this->render('recyclingit', array(	
		));
	}

	public function actionService()
	{
		$this->pageTitle = 'Services - '.$this->pageTitle;

		$this->render('service', array(
		));
	}

	public function actionHowto()
	{
		$this->pageTitle = 'How To Order - '.$this->pageTitle;

		$this->render('howto', array(	
		));
	}

	public function actionDesigndetailproduct()
	{
		$this->render('designdetailproduct', array(	
		));
	}

	public function actionDesignaddcart()
	{
		$this->render('addcartproduct', array(	
		));
	}

	public function actionCart()
	{
		$this->render('cartproduct', array(	
		));
	}

	public function actionShippinginfo()
	{
		$this->render('shipinfo', array(	
		));
	}

	public function actionCartsuccess()
	{
		$this->render('cartsucess', array(	
		));
	}

	public function actionDesignlistproduct()
	{
		$this->render('designlistproduct', array(	
		));
	}
	public function actionDesignblog()
	{
		$this->render('designblog', array(	
		));
	}
	public function actionDesignblogdetail()
	{
		$this->render('designblogdetail', array(	
		));
	}

	public function actionContact()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
					'subject'=>'Hi, DV Computers Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact', array(
			'model'=>$model,
		));
	}

	public function actionContact2()
	{
		$this->layout='//layouts/columnIframe';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
					'subject'=>'Hi, DV Computers Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact2', array(
			'model'=>$model,
		));
	}

}

