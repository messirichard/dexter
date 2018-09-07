<?php

class OrderController extends ControllerAdmin
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
			array('admin.filter.AuthFilter', 'params'=>array(
				'actionAllowOnLogin'=>array('edit'),
			)),
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
				'actions'=>array('admin','delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			): array(),
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
		$model=new TicketOrder;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TicketOrder']))
		{
			// $image = $model->image;//mengamankan nama file
			$model->attributes=$_POST['TicketOrder'];
			// $model->image = $image;//mengembalikan nama file

			// $image = CUploadedFile::getInstance($model,'image');
			// if ($image->name != '') {
			// 	$model->image = substr(md5(time()),0,5).'-'.$image->name;
			// }

			if($model->validate()){
					// $model->pass = sha1($model->pass);

					// if ($image->name != '') {
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
					// }
				$data = Ticket::model()->findByPk($model->ticket_id);
				$model->ticket_id = $data->id;
				$model->ticket_name = $data->name;
				$model->ticket_desc = $data->desc;
				$model->ticket_price = $data->harga;
				$model->no_invoice = 'DBS-'.date('Ymd').'-'.rand(1000,9999);
				$model->confirm_code = substr(md5(rand(10000, 1000000000)), 0, 40);
				$model->kode_unik = rand(100,999);
				$model->method = 'Gerai';
				$model->total = $data->harga * $model->qty;
				$model->save();
				Log::createLog("GroupController Create $model->id");
				Yii::app()->user->setFlash('success','Data has been inserted');
			    // $transaction->commit();
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['User'];
			$model->pass = $pass;

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			if ($model->validate()) {
				if ($_POST['User']['pass']!='') {
					$model->pass = sha1($_POST['User']['pass']);
				}

				if ($image->name != '') {
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/user/'.$model->image);
				}

				$model->save();
				Yii::app()->user->setFlash('success',Tt::t('admin', 'Data Edited'));
				Log::createLog("User Update $model->id $model->email");
				$this->redirect(array('index'));
			}
		}
		$model->pass = '';
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEdit()
	{
		$model=User::model()->find('email = :email', array(':email'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'updatepass';
		if(isset($_POST['User']))
		{
			$pass = $model->pass;
			$model->attributes=$_POST['User'];
			// $model->pass = $pass;
			if ($model->validate()) {
				//cek password lama
				if (sha1($_POST['User']['passold'])==$pass AND $_POST['User']['pass']==$_POST['User']['passconf']) {
					$model->pass = sha1($_POST['User']['pass']);
					$model->save();
					Log::createLog("User Update Pass $model->id $model->email");
					$this->redirect(array('edit'));
				} else {
					$model->addError('pass','Incorrect password.');
				}
			}
		}
		$model->pass = '';
		$this->render('edit',array(
			'model'=>$model,
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
			$data = $this->loadModel($id);
			Log::createLog("User Delete $data->email $data->id");
			$data->delete();
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
		$model=new TicketOrder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TicketOrder']))
			$model->attributes=$_GET['TicketOrder'];


		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionComplete($id)
	{
		$model = TicketOrder::model()->findByPk($id);
		$model->status = 1;
		//$model = Ticket::model()->findByPk($id);
		$model->save();

		$modelTicket = Ticket::model()->findByPk($model->ticket_id);
		$modelTicket->quota = $modelTicket->quota - $model->qty;
		$modelTicket->save();

		$modelHistory = new TicketOrderHistory;
		$modelHistory->ticket_order_id = $id;
		$modelHistory->change_by = Yii::app()->user->name;
		$modelHistory->change_to = 1;
		$modelHistory->save(false);
				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] ticket order from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
				$config = array(
					'to'=>array($this->setting['email']),
					'subject'=>'['.Yii::app()->name.'] ticket order from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
		Yii::app()->user->setFlash('success',Tt::t('admin', 'Ganti Status Ke Complete Berhasil'));
		$this->redirect(array('index'));
	}
	public function actionResend($id)
	{
		$model = TicketOrder::model()->findByPk($id);
				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] ticket order from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
		Yii::app()->user->setFlash('success',Tt::t('admin', 'Resend Email Berhasil'));
		$this->redirect(array('index'));
	}
	public function actionClaimed($id)
	{
		$model = TicketOrder::model()->findByPk($id);
		$model->status = 5;
		$model->save();

		$modelHistory = new TicketOrderHistory;
		$modelHistory->ticket_order_id = $id;
		$modelHistory->change_by = Yii::app()->user->name;
		$modelHistory->change_to = 5;
		$modelHistory->save(false);

				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] ticket claimed from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
				$config = array(
					'to'=>array($this->setting['email']),
					'subject'=>'['.Yii::app()->name.'] ticket claimed from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
		Yii::app()->user->setFlash('success',Tt::t('admin', 'Ticket sudah berhasil di klaim'));
		$this->redirect(array('index'));
	}
	public function actionCancel($id)
	{
		$model = TicketOrder::model()->findByPk($id);
		$model->status = 3;
		$model->save();

		$modelHistory = new TicketOrderHistory;
		$modelHistory->ticket_order_id = $id;
		$modelHistory->change_by = Yii::app()->user->name;
		$modelHistory->change_to = 3;
		$modelHistory->save(false);

				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email),
					'subject'=>'['.Yii::app()->name.'] ticket order cancel from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
				$config = array(
					'to'=>array($this->setting['email']),
					'subject'=>'['.Yii::app()->name.'] ticket order cancel from '.$model->email,
					'message'=>$messaged,
				);
				Common::mail($config);
		$this->redirect(array('index'));
	}

	public function actionDetail($id)
	{
		$model = TicketOrder::model()->findByPk($id);
		$data = TicketOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$model->id));

		if(isset($_POST['TicketOrder']))
		{
			$order_id = $model->order_status_id;
			$model->attributes=$_POST['TicketOrder'];
			// $model->pass = $pass;
			if ($model->validate()) {
				if ($order_id == $model->order_status_id) {
					$model->addError('order_status_id','Status order sama dengan sebelumnya');
				}else{
					$model->save(false);
					// save history
					$modelHistory = new TicketOrderHistory;
					$modelHistory->member_id = $model->customer_id;
					$modelHistory->order_id = $model->id;
					$modelHistory->order_status_id = $model->order_status_id;
					$modelHistory->notify = '';
					$modelHistory->comment = $model->comment;
					$modelHistory->date_add = date("Y-m-d H:i:s");
					$modelHistory->save(false);
					$this->refresh();
				}
			}
		}

		$this->render('detail',array(
			'model'=>$model,
			'data'=>$data,
		));
	}
	public function actionExport()
	{
		$data = TicketOrder::model()->findAll('1 ORDER BY date_create DESC');
		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename=Ticket-Order".date('Ymd').".xls");
		?>
		<table border="1">
			<tr>
				<th>NO</th>
				<th>Nomor Invoice</th>
				<th>Nama</th>
				<th>KTP</th>
				<th>Telp</th>
				<th>Email</th>
				<th>Event Name</th>
				<th>Type Ticket</th>
				<th>Harga Ticket</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
				<th>Status Ticket</th>
				<th>Gerai</th>
				<th>Tanggal Beli</th>
			</tr>
			<?php foreach ($data as $key => $value): ?>
<?php
$ticket = Ticket::model()->findByPk($value->ticket_id);
$blog = Blog::model()->findByPk($ticket->blog_id);
?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value->no_invoice ?></td>
				<td><?php echo $value->first_name.' '.$value->last_name ?></td>
				<td><?php echo $value->ktp ?></td>
				<td><?php echo $value->phone ?></td>
				<td><?php echo $value->email ?></td>
				<td><?php echo $blog->description->title ?></td>
				<td><?php echo $value->ticket_name ?></td>
				<td><?php echo $value->ticket_price ?></td>
				<td><?php echo $value->qty ?></td>
				<td><?php echo $value->total ?></td>
				<td><?php echo $value->status ?></td>
				<td><?php echo $value->gerai ?></td>
				<td><?php echo date('Y-m-d',strtotime($value->date_create)) ?></td>
			</tr>
			<?php endforeach ?>
		</table>
		<?php

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	protected function combonamapaket(){
		$namapaket = CHtml::listData(ticket::model()->findAll(),'id','name');
		return $namapaket;
	}
}
