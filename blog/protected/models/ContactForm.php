<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $address;
	public $city;
	public $postcode;
	public $state;

	public $body;
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('first_name, last_name, phone, email', 'required', 'on'=>'insert'),
			// email has to be a valid email address
			array('email', 'email'),
			array('first_name, last_name, phone, email, address, city, postcode, state, body', 'safe'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>Yii::t('main', 'Verification Code'),
			// 'name'=>Yii::t('main', 'Name'),
			'email'=>Yii::t('main', 'Email Address'),
			// 'subject'=>Yii::t('main', 'Subject'),
			'body'=>Yii::t('main', 'Messages'),
		);
	}
}