<?php

/**
 * This is the model class for table "ticket_order".
 *
 * The followings are the available columns in table 'ticket_order':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $post_code
 * @property string $state
 * @property string $comment
 * @property integer $status
 */
class TicketOrder extends CActiveRecord
{
	public $cari;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ticket_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, phone, email, qty, ktp', 'required'),
			array('status, qty', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, phone, email, address, city, post_code, state', 'length', 'max'=>200),
			array('ticket_name, ticket_desc, ticket_price, no_invoice, kode_unik, method, ticket_id, confirm_order, gerai', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, phone, email, address, city, post_code, state, comment, status, cari', 'safe', 'on'=>'search'),
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
			'description'=>array(self::BELONGS_TO, 'Blog', 'blog_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone' => 'Phone',
			'email' => 'Email',
			'address' => 'Address',
			'city' => 'City',
			'post_code' => 'Post Code',
			'state' => 'State',
			'comment' => 'Comment',
			'status' => 'Status',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('post_code',$this->post_code,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);

		if ($this->cari != '') {
			$criteria->addCondition('
				first_name LIKE :cari OR
				no_invoice LIKE :cari OR
				ticket_name LIKE :cari OR
				last_name LIKE :cari OR
				email LIKE :cari OR
				phone LIKE :cari
			');
			$criteria->params[':cari'] = '%'.$this->cari.'%';
		}

		$criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TicketOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
