<?php

class StaticController extends Controller
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
	
	public function actionIndex()
	{
		$this->render('index', array(
		));
	}
	public function actionHowtoorder()
	{
		$this->render('howtoorder', array(
		));
	}
	public function actionContact()
	{
		$this->layout = '//layouts/column1';

		$model =  new ContactForm;
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
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>'Urban Mail from '.$model->email,
					'message'=>$messaged,
				);
				// kirim email
				Common::mail($config);

				Yii::app()->user->getFlashes('msg','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();

			}

		}


		$this->pageTitle = 'Contact Us - '.$this->pageTitle;
		$this->render('contact',array(
			'model'=>$model,
		));	
	}
}