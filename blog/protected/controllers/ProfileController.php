<?php

class ProfileController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//array('auth.filters.AuthFilter'),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'actions'=>array('login', 'loginpop', 'facebook', 'facebooktoken', 'registerpop'),
				'users'=>array('*'),
			),
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'logout', 'vieworder', 'myaccount'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$order = Order::model()->findAll('email = :email', array(':email'=>Yii::app()->user->name));

		$modelUser = User::model()->find('email = :email', array(':email'=>Yii::app()->user->name));

		$modelDelivery = UserDelivery::model()->find('user_id = :user_id', array(':user_id'=>$modelUser->id));
		if (is_null($modelDelivery)) {
			$modelDelivery = new UserDelivery;
			$modelDelivery->user_id = $modelUser->id;
			$modelDelivery->save();
		}

		$modelUser->scenario = 'editMember';

		if(isset($_POST['User']))
		{
			$modelUser->attributes = $_POST['User'];
			if ($modelUser->passold != '') {
				$modelUser->scenario = 'updatepass';
			}

			if ($modelUser->validate()) {
				$transaction=$modelUser->dbConnection->beginTransaction();
				try
				{
					if ($modelUser->scenario == 'updatepass') {
						$modelUser->pass = sha1($modelUser->pass);
						$modelUser->passconf = sha1($modelUser->passconf);
					}
					$modelUser->save();

					$transaction->commit();

					Yii::app()->user->setFlash('success','Data user updated');

					$this->redirect('index');
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}

			}
				
		}

		if(isset($_POST['UserDelivery']))
		{
			$modelDelivery->attributes = $_POST['UserDelivery'];

			if ($modelDelivery->validate()) {
				$transaction=$modelDelivery->dbConnection->beginTransaction();
				try
				{
					$modelDelivery->save();

					$transaction->commit();

					Yii::app()->user->setFlash('success','Delivery Information Updated');

					$this->redirect('index');
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}

			}
				
		}

		$modelUser->pass = '';

		$this->pageTitle = 'My Account - '.$this->pageTitle;
		$this->layout='//layouts/home';
		$this->render('index', array(
			'order'=>$order,
			'modelUser'=>$modelUser,
			'modelDelivery'=>$modelDelivery,
		));
	}

	public function actionVieworder($nota)
	{
		$modelOrder = Order::model()->find('nota = :nota', array(':nota'=>$nota));

		if (is_null($modelOrder))
			throw new CHttpException(404,'The requested page does not exist.');

		$data = OrderDetail::model()->findAll('order_id = :order_id', array(':order_id'=>$modelOrder->id));

		$this->pageTitle = 'View Order - '.$this->pageTitle;
		$this->layout='//layouts/home';
		$this->render('vieworder', array(
			'data' => $data,
			'modelOrder' => $modelOrder,
		));
	}

	public function actionLogin()
	{
		$model = new User;
		$modelDelivery = new UserDelivery;
		$modelLogin = new LoginForm;
		$model->scenario = 'createMember';

		if(isset($_POST['User']))
		{
			$model->attributes = $_POST['User'];
			$modelDelivery->attributes = $_POST['UserDelivery'];

			if ($model->validate() && $modelDelivery->validate()) {
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->type = 'member';
					$model->group_id = 0;
					$model->aktif = 1;
					$pass = $model->pass;
					$model->pass = sha1($model->pass);
					$model->passconf = sha1($model->passconf);
					$model->save();

					$modelDelivery->user_id = $model->id;
					$modelDelivery->save();

					$transaction->commit();

					Yii::app()->user->setFlash('success','Anda sudah terdaftar sebagai member, Silahkan login');

				    if ($_GET['ret']) {
						$this->redirect($_GET['ret']);
				    }else{
						$this->redirect(array('login'));
				    }
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}

			}
				
		}
		if(isset($_POST['LoginForm']))
		{
			$modelLogin->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($modelLogin->validate() && $modelLogin->login()){
			    if ($_GET['ret']) {
					$this->redirect($_GET['ret']);
			    }else{
					$this->redirect(array('index'));
			    }
			}
		}

		$this->pageTitle = 'Login & Register - '.$this->pageTitle;
		$this->layout='//layouts/home';
		$this->render('login', array(
			'model'=>$model,
			'modelLogin'=>$modelLogin,
			'modelDelivery'=>$modelDelivery,
		));
	}

	public function actionLoginpop()
	{
		$this->pageTitle = 'Login | '.$this->pageTitle;
		$this->layout='//layoutsAdmin/mainKosong';

		$this->render('loginpop', array(	
		));
	}

	public function actionMyaccount()
	{
		$this->pageTitle = 'My Account | '.$this->pageTitle;
		$this->layout='//layoutsAdmin/mainKosong';

		$this->render('myaccount', array(	
		));
	}

	public function actionRegisterpop()
	{
		$this->pageTitle = 'Register | '.$this->pageTitle;
		$this->layout='//layoutsAdmin/mainKosong';

		$model = new User;
		$modelDelivery = new UserDelivery;


		$this->render('registerpop', array(	
			'model'=>$model,
			'modelDelivery'=>$modelDelivery,
		));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('/home/index'));
	}

	public function actionFacebook()
	{
		if ($_GET['error']=='access_denied') {
			$this->redirect(array('/main/index'));
		}else{
			echo "
			<script>
				window.location = '".CHtml::normalizeUrl(array('/profile/facebooktoken', 'return'=>$_GET['return']))."&'+window.location.hash.substr(1);
			</script>
			";
		}
	}
	public function actionFacebooktoken()
	{
		if ($_GET['error']=='access_denied') {
			$this->redirect(array('/main/index'));
		}else{
			$parseUrl = parse_url($_SERVER['REQUEST_URI']);
			parse_str($parseUrl['query'], $parseStr);
			$session=new CHttpSession;
			$session->open();
			$session['token_fb'] = $parseStr['access_token'];

		    $ch = curl_init();
		    // $params = 'value%28actions%29=login&value%28user_id%29=' . $user[$n] . '&value%28user_ip%29=' . $server . '&value%28pswd%29=' . $pass[$n] . '&value%28Submit%29=LOGIN';
		    curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 ( Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1 ) Gecko/20061204 Firefox/2.0.0.1' );
		    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
		    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		    curl_setopt( $ch, CURLOPT_URL, 'https://graph.facebook.com/me?fields=email&access_token='.$session['token_fb'] );
		    // curl_setopt( $ch, CURLOPT_POSTFIELDS, $params );
		    // curl_setopt( $ch, CURLOPT_POST, 1 );
		    $info = curl_exec( $ch );
		    $data = json_decode($info);
			$email = $data->email;
			$email_explode = explode('@', $email);
		    $findMember = User::model()->find('email = :email',array(':email'=>$data->email));

		    if (is_null($findMember)) {

				$model = new User;
				$model->scenario = 'register';
				// setting
				$pass = substr(sha1(time().rand(0,100000000)),0,8);

				// simpan data member
				$model->email = $email;
				$model->type = 'member';
				$model->group_id = 0;
				$model->aktif = 1;
				$model->pass = sha1($pass);
				$model->passconf = sha1($passconf);
				$model->save();
				$model->pass = sha1($pass);
				$model->save();

				// config email
				$message = $this->renderPartial('//mail/registerbyfb',array(
					'model'=> $model,
					'pass'=>$pass,
				), true);
				$config = array(
					'to'=> array($model->email),
					'subject'=>'Selamat bergabung dengan Galeri Fitness',
					'message'=>$message,
				);

				// kirim email
				Common::mail($config);

			    $login = new LoginForm;
			    $login->status = false;
			    $login->setLogin2($model->email, true);
		    	exit;

		    }else{

			    $login = new LoginForm;
			    $login->status = false;
			    $login->setLogin2($data->email, true);

		    }
		    $this->redirect(array('/home/index', 'show'=>$_GET['return']));

   
		}
	}


}