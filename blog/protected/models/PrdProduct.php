<?php

/**
 * This is the model class for table "prd_product".
 *
 * The followings are the available columns in table 'prd_product':
 * @property integer $id
 * @property integer $category_id
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
 */
class PrdProduct extends CActiveRecord
{
	public $name, $desc, $meta_desc, $meta_title, $meta_key;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrdProduct the static model class
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
		return 'prd_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, image, kode, harga, status, date', 'required'),
			array('id, category_id, brand_id, harga, harga_coret, stock, berat, terbaru, terlaris, out_stock, status', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>200),
			array('kode', 'length', 'max'=>50),

			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert', 'except'=>array('createTemp', 'copy')),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update', 'except'=>array('createTemp', 'copy')),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, brand_id, image, kode, harga, harga_coret, stock, berat, terbaru, terlaris, out_stock, status, date, date_input, date_update, name', 'safe', 'on'=>'search'),
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
			'desc'=>array(self::HAS_MANY, 'PrdProductDescription', 'product_id'),
			'description'=>array(self::HAS_ONE, 'PrdProductDescription', 'product_id'),
			'alternateImage'=>array(self::HAS_MANY, 'PrdProductImage', 'product_id'),
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
			'kode' => 'Item Code',
			'harga' => 'Price',
			'harga_coret' => 'Striked-through Price',
			'stock' => 'Stock',
			'berat' => 'Weight',
			'terbaru' => 'Sale',
			'terlaris' => 'Gift Item',
			'out_stock' => 'Out Stock',
			'status' => 'Status',
			'date' => 'Date',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($language_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, prd_product_description.name, prd_product_description.desc";
		$criteria->join = "
		LEFT JOIN prd_product_description ON prd_product_description.product_id=t.id
		";
		$criteria->addCondition('prd_product_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
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
		$criteria->compare('prd_product_description.name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('product_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = PrdProductDescription::model()->find($criteria);

		return $model;
	}
}