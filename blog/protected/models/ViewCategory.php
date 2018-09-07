<?php

/**
 * This is the model class for table "prd_category".
 *
 * The followings are the available columns in table 'prd_category':
 * @property integer $id
 * @property integer $parent_id
 * @property string $image
 * @property string $type
 * @property string $data
 */
class ViewCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrdCategory the static model class
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
		return 'view_category';
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
			'parent_id' => 'Parent',
			'image' => 'Image',
			'type' => 'Type',
			'data' => 'Data',
			'id2' => 'id2',
			'category_id' => 'category_id',
			'language_id' => 'language_id',
			'name' => 'Name',
			'data2' => 'Data2',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('language_id',$this->language_id);

		$criteria->order = 'sort asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}