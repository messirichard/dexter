<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $postcode
 * @property string $province
 * @property string $hp
 * @property string $date_input
 * @property string $date_approve
 * @property integer $user_approve
 * @property string $status
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'or_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required', 'on'=>'guest'),
			array('first_name, address, city, hp, province, delivery_to, delivery_from, delivery_package', 'required'),
			array('email, payment', 'length', 'max'=>240),
			array('first_name, tracking_code, last_name, address, city', 'length', 'max'=>100),
			array('nota, postcode, province, hp, status', 'length', 'max'=>50),
			array('delivery_to, delivery_from, delivery_price, delivery_weight, delivery_package, total, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, first_name, last_name, address, city, postcode, province, hp, date_input, date_approve, user_approve, status', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'city' => 'City',
			'postcode' => 'Postcode',
			'province' => 'Province',
			'hp' => 'Hp',
			'date_input' => 'Date Input',
			'date_approve' => 'Date Approve',
			'user_approve' => 'User Last Approve',
			'status' => 'Status',
			'payment' => 'Payment No',
			'tracking_code' => 'Tracking Code',
			'note' => 'Catatan Kusus',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('postcode',$this->postcode,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_approve',$this->date_approve,true);
		$criteria->compare('user_approve',$this->user_approve);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'date_input DESC',
			)
		));
	}

	public static function buildTombol($data)
	{
		$str = '<a class="btn btn-small" href="'.CHtml::normalizeUrl(array('update', 'id'=>$data->id)).'">View Order</a>';
		return $str;
	}
	public static function buildStatus($data)
	{
		$str = $data->status.' ';
		if ($data->status == 'pending') {
			$str .= '<a class="btn btn-small btn-primary" href="'.CHtml::normalizeUrl(array('index', 'type'=>'setlunas','id'=>$data->id)).'">Lunas</a>';
		}
		if ($data->status == 'lunas') {
			$str .= '<a class="btn btn-small" target="_blank" href="'.CHtml::normalizeUrl(array('print', 'id'=>$data->id)).'">Print</a>';
		}
		return $str;
	}
}