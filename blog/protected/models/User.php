<?php

/**
 * This is the model class for table "tb_user".
 *
 * The followings are the available columns in table 'tb_user':
 * @property integer $id
 * @property string $email
 * @property string $pass
 * @property integer $group_id
 * @property string $login_terakhir
 * @property integer $aktivasi
 * @property integer $aktif
 * @property string $user_input
 * @property string $tanggal_input
 */
class User extends CActiveRecord
{
	public $passold;
	public $passconf;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pass, passconf, email', 'required', 'on'=>'createMember'),
			array('pass', 'compare', 'compareAttribute'=>'passconf', 'on'=>array('createMember', 'updatepass', 'editMember')),
			
			array('pass, group_id, initial', 'required', 'on'=>'insert'),

			array('pass, passold, passconf', 'required', 'on'=>array('updatepass', 'editMember')),
			array('passold', 'cekPass', 'on'=>array('updatepass', 'editMember')),
			array('pass, email', 'required', 'on'=>'insert'),
			array('email', 'unique', 'on'=>array('insert', 'createMember')),

			array('group_id, aktivasi, aktif', 'numerical', 'integerOnly'=>true),
			array('email, user_input', 'length', 'max'=>200),
			array('pass', 'length', 'max'=>100),
			array('initial', 'length', 'max'=>255),
			array('tanggal_input, nama, image, type', 'safe'),

			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, pass, group_id, login_terakhir, aktivasi, aktif, user_input, tanggal_input', 'safe', 'on'=>'search'),
		);

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'group'=>array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'pass' => 'Pass',
			'passconf' => 'Pass Confirm',
			'group_id' => 'Group',
			'login_terakhir' => 'Login Terakhir',
			'aktivasi' => 'Aktivasi',
			'aktif' => 'Aktif',
			'user_input' => 'User Input',
			'tanggal_input' => 'Tanggal Input',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('login_terakhir',$this->login_terakhir,true);
		$criteria->compare('aktivasi',$this->aktivasi);
		$criteria->compare('aktif',$this->aktif);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('tanggal_input',$this->tanggal_input,true);

		// $criteria->addCondition('type = ""');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('login_terakhir',$this->login_terakhir,true);
		$criteria->compare('aktivasi',$this->aktivasi);
		$criteria->compare('aktif',$this->aktif);
		$criteria->compare('user_input',$this->user_input,true);
		$criteria->compare('tanggal_input',$this->tanggal_input,true);

		$criteria->addCondition('type = "member"');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getDataLogin()
	{
		$session = new CHttpSession;
		$session->open();
		$login = $session['login'];
		return $login;
	}

	public function getUserAccess()
	{
		$login = $this->getDataLogin();
		if ($login['type'] === 'root') {
			return 'All';
		}
		// $group = Group::model()->findByPk($login['group_id']);
		// $data = unserialize($group->akses);
		$akses = array();
		// if (count($data)>0 AND $data !== '') {
		// 	foreach ($data as $key => $value) {
		// 		$akses[$value] = $value;
		// 	}
		// }
		return $akses;
	}
	public function cekPass($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$data = User::model()->find('email = :email', array(':email'=>Yii::app()->user->name));
			if (sha1($this->{$attribute}) != $data->pass) {
				$this->addError('passold','Wrong Password.');
			}
		}
	}
}
