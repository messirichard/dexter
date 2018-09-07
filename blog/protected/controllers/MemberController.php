<?php

class MemberController extends Controller
{

	public function actionIndex()
	{
		$session = new CHttpSession;
		$session->open();
		if (isset($session['login_member'])) {
			$model = MeMember::model()->findByPk($session['login_member']['id']);
			if(isset($_POST['MeMember'])) {
				$pass = $model->pass;
				$model->attributes = $_POST['MeMember'];
				if ($_POST['MeMember']['passold'] != '') {
					$model->scenario = 'updatePass';
					$model->pass = sha1($model->pass);
					$model->pass2 = sha1($model->pass2);
				}else{
					$model->scenario = 'update';
					$model->pass = $pass;
				}
				if ($model->validate()) {
					if ($_POST['MeMember']['passold'] != '') {
						if (sha1($model->passold) != $pass) {
							$model->addError('passold','Password lama tidak valid');
						}
					}
					if(!$model->hasErrors())
					{
						$model->save();
						$this->redirect(array());
					}
				}
			}

			$model->pass = '';
			$model->pass2 = '';
			$model->passold = '';

			$order = OrOrderHistory::model()->findAll('member_id = :member_id ORDER BY date_add DESC', array(':member_id'=>$session['login_member']['id']));

			$this->render('index2', array(
				'model'=>$model,
				'order'=>$order,
			));	
		}else{
			$model = new MeMember;
			$model->scenario = 'createMember';
			
			$modelLogin = new LoginForm2;

			if(isset($_POST['MeMember']))
			{
				$model->attributes = $_POST['MeMember'];

				if ($model->validate()) {
					$transaction=$model->dbConnection->beginTransaction();
					try
					{
						$model->aktif = 1;
						$pass = $model->pass;
						$model->pass = sha1($model->pass);
						$model->pass2 = sha1($model->pass2);
						$model->save();

						$transaction->commit();

						Yii::app()->user->setFlash('success','Registration success');
						$session['login_member'] = $model->attributes;
					    if ($_GET['ret']) {
							$this->redirect(urldecode($_GET['ret']));
					    }else{
							$this->redirect(array('index'));
					    }
					}
					catch(Exception $ce)
					{
					    $transaction->rollback();
					}
				}
			}
			if(isset($_POST['LoginForm2']))
			{
				$modelLogin->attributes=$_POST['LoginForm2'];
				// validate user input and redirect to the previous page if valid
				if($modelLogin->validate()){
					$data = MeMember::model()->find('email = :email', array(':email'=>$modelLogin->username));
					$session['login_member'] = $data->attributes;
				    if ($_GET['ret']) {
						$this->redirect(urldecode($_GET['ret']));
				    }else{
						$this->redirect(array('index'));
				    }
				}
			}

			// $this->pageTitle = 'Login & Register - '.$this->pageTitle;
			// $this->layout='//layouts/home';
			$this->render('index', array(
				'model'=>$model,
				'modelLogin'=>$modelLogin,
				// 'modelDelivery'=>$modelDelivery,
			));	
		}
	}
	public function actionLogout()
	{
		$session = new CHttpSession;
		$session->open();
		unset($session['login_member']);
		$this->redirect(array('index'));
	}

	public function actionVieworder($nota)
	{
		$session = new CHttpSession;
		$session->open();
		$modelOrder = OrOrder::model()->find('id = :id AND customer_id  = :customer_id ', array(':id'=>$nota, ':customer_id'=>$session['login_member']['id']));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'View Order - '.$this->pageTitle;
		$this->render('vieworder', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
		));
	}

}
