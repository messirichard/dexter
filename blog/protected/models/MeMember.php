<?php

/**
 * This is the model class for table "me_member".
 *
 * The followings are the available columns in table 'me_member':
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $pass
 * @property string $login_terakhir
 * @property integer $aktivasi
 * @property integer $aktif
 * @property string $image
 * @property string $hp
 * @property string $address
 * @property string $city
 * @property string $province
 * @property string $postcode
 */
class MeMember extends CActiveRecord
{
	public $pass2;
	public $passold;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MeMember the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'me_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'unique', 'className' => 'MeMember', 'attributeName' => 'email', 'message'=>'This Email is already in use', 'on'=>'createMember'),
			array('pass, pass2, email, first_name, last_name', 'required', 'on'=>'createMember'),
			array('pass', 'compare', 'compareAttribute'=>'pass2', 'on'=>array('createMember', 'updatePass', 'editMember')),

			array('first_name, last_name', 'required', 'on'=>'update'),

			array('pass, pass2, first_name, last_name', 'required', 'on'=>'updatePass'),

			// array('email, first_name, last_name, pass, login_terakhir, aktivasi, aktif, image, hp, address, city, province, postcode', 'required'),
			array('aktivasi, aktif', 'numerical', 'integerOnly'=>true),
			array('email, first_name, last_name, image', 'length', 'max'=>200),
			array('pass', 'length', 'max'=>100),
			array('hp, city, province', 'length', 'max'=>50),
			array('postcode', 'length', 'max'=>10),
			array('address, pass2, passold', 'safe'),

			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, first_name, last_name, pass, login_terakhir, aktivasi, aktif, image, hp, address, city, province, postcode', 'safe', 'on'=>'search'),
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
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'passold' => 'Old Password',
			'pass' => 'Password',
			'pass2' => 'Confirm Password',
			'login_terakhir' => 'Last Login',
			'aktivasi' => 'Aktivasi',
			'aktif' => 'Aktiv',
			'image' => 'Image',
			'hp' => 'Mobile Phone',
			'address' => 'Address',
			'city' => 'City',
			'province' => 'State',
			'postcode' => 'Postcode',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('login_terakhir',$this->login_terakhir,true);
		$criteria->compare('aktivasi',$this->aktivasi);
		$criteria->compare('aktif',$this->aktif);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('postcode',$this->postcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}