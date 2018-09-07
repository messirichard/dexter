<?php

/**
 * This is the model class for table "view_product".
 *
 * The followings are the available columns in table 'view_product':
 * @property integer $id
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $image
 * @property string $kode
 * @property integer $harga
 * @property integer $harga_coret
 * @property integer $stock
 * @property integer $berat
 * @property integer $terbaru
 * @property integer $terlaris
 * @property integer $out_stock
 * @property integer $status
 * @property string $date
 * @property string $date_input
 * @property string $date_update
 * @property string $data
 * @property integer $product_id
 * @property integer $language_id
 * @property string $name
 * @property string $desc
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_key
 */
class ViewProduct extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ViewProduct the static model class
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
		return 'view_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, brand_id, image, kode, harga, harga_coret, stock, berat, terbaru, terlaris, out_stock, status, date, date_input, date_update, data, product_id, language_id, name, desc, meta_title, meta_desc, meta_key', 'required'),
			array('id, category_id, brand_id, harga, harga_coret, stock, berat, terbaru, terlaris, out_stock, status, product_id, language_id', 'numerical', 'integerOnly'=>true),
			array('image, name, meta_title', 'length', 'max'=>200),
			array('kode', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, brand_id, image, kode, harga, harga_coret, stock, berat, terbaru, terlaris, out_stock, status, date, date_input, date_update, data, product_id, language_id, name, desc, meta_title, meta_desc, meta_key', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'brand_id' => 'Brand',
			'image' => 'Image',
			'kode' => 'Kode',
			'harga' => 'Harga',
			'harga_coret' => 'Harga Coret',
			'stock' => 'Stock',
			'berat' => 'Berat',
			'terbaru' => 'Terbaru',
			'terlaris' => 'Terlaris',
			'out_stock' => 'Out Stock',
			'status' => 'Status',
			'date' => 'Date',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
			'data' => 'Data',
			'product_id' => 'Product',
			'language_id' => 'Language',
			'name' => 'Name',
			'desc' => 'Desc',
			'meta_title' => 'Meta Title',
			'meta_desc' => 'Meta Desc',
			'meta_key' => 'Meta Key',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('harga_coret',$this->harga_coret);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('berat',$this->berat);
		$criteria->compare('terbaru',$this->terbaru);
		$criteria->compare('terlaris',$this->terlaris);
		$criteria->compare('out_stock',$this->out_stock);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_desc',$this->meta_desc,true);
		$criteria->compare('meta_key',$this->meta_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}