<?php

/**
 * This is the model class for table "cs_customer".
 *
 * The followings are the available columns in table 'cs_customer':
 * @property integer $id
 * @property string $email
 * @property string $pass
 * @property integer $group_member_id
 * @property string $first_name
 * @property string $last_name
 * @property string $telp
 * @property string $date_join
 * @property string $last_login
 * @property integer $status
 * @property string $data
 */
class CsCustomer extends CActiveRecord
{
	public $oldpass, $confirmpass;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CsCustomer the static model class
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
		return 'cs_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, first_name, status', 'required'),
			array('pass', 'required', 'on'=>array('insert', 'updatepass')),
			array('group_member_id, status', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>200),
			array('pass, first_name, last_name', 'length', 'max'=>100),
			array('telp', 'length', 'max'=>20),
			array('confirmpass, pass', 'length', 'min'=>6),
			array('data, confirmpass', 'safe'),
			array('email', 'unique'),
			array('pass', 'compare', 'compareAttribute'=>'confirmpass', 'on'=>array('insert', 'updatepass')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, pass, group_member_id, first_name, last_name, telp, date_join, last_login, status, data', 'safe', 'on'=>'search'),
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
			'pass' => 'Password',
			'confirmpass' => 'Confirm Password',
			'group_member_id' => 'Group Member',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'telp' => 'Telp',
			'date_join' => 'Date Join',
			'last_login' => 'Last Login',
			'status' => 'Status',
			'data' => 'Data',
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
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('group_member_id',$this->group_member_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('date_join',$this->date_join,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}