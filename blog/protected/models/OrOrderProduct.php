<?php

/**
 * This is the model class for table "or_order_product".
 *
 * The followings are the available columns in table 'or_order_product':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property string $kode
 * @property integer $qty
 * @property string $price
 * @property string $total
 * @property integer $attributes_id
 * @property string $attributes_name
 * @property string $attributes_price
 */
class OrOrderProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrOrderProduct the static model class
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
		return 'or_order_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, product_id, name, kode, qty, price, total, attributes_id, attributes_name, attributes_price', 'required'),
			array('order_id, product_id, qty, attributes_id', 'numerical', 'integerOnly'=>true),
			array('name, kode, attributes_name', 'length', 'max'=>256),
			array('price, total, attributes_price', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_id, product_id, name, kode, qty, price, total, attributes_id, attributes_name, attributes_price', 'safe', 'on'=>'search'),
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
			'order_id' => 'Order',
			'product_id' => 'Product',
			'name' => 'Name',
			'kode' => 'Kode',
			'qty' => 'Qty',
			'price' => 'Price',
			'total' => 'Total',
			'attributes_id' => 'Attributes',
			'attributes_name' => 'Attributes Name',
			'attributes_price' => 'Attributes Price',
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
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('attributes_id',$this->attributes_id);
		$criteria->compare('attributes_name',$this->attributes_name,true);
		$criteria->compare('attributes_price',$this->attributes_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}