<?php

/**
 * This is the model class for table "pg_type_letak".
 *
 * The followings are the available columns in table 'pg_type_letak':
 * @property integer $id
 * @property string $letak
 * @property integer $page_id
 * @property integer $tampil
 * @property integer $sort
 */
class PgTypeLetak extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pg_type_letak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('letak, page_id, sort', 'required'),
			array('page_id, tampil, sort', 'numerical', 'integerOnly'=>true),
			array('letak', 'length', 'max'=>225),
			array('tampil', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, letak, page_id, tampil, sort', 'safe', 'on'=>'search'),
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
			'page'=>array(self::BELONGS_TO, 'TbPages', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'letak' => 'Letak',
			'page_id' => 'Page',
			'tampil' => 'Tampil',
			'sort' => 'Sort',
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
		$criteria->compare('letak',$this->letak,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('tampil',$this->tampil);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PgTypeLetak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
