<?php

/**
 * This is the model class for table "setting_description".
 *
 * The followings are the available columns in table 'setting_description':
 * @property integer $id
 * @property integer $setting_id
 * @property integer $language_id
 * @property string $value
 */
class SettingDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingDescription the static model class
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
		return 'setting_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setting_id, language_id', 'required'),
			array('setting_id, language_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, setting_id, language_id, value', 'safe', 'on'=>'search'),
			array('value', 'safe'),
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
			'setting_id' => 'Setting',
			'language_id' => 'Language',
			'value' => 'Value',
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
		$criteria->compare('setting_id',$this->setting_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getSettingModel($setting_name, $language_code)
	{
		$setting_id = Setting::model()->find('name = :name',array(':name'=>$setting_name))->id;
		$language_id = Language::model()->find('code = :code',array(':code'=>$language_code))->id;
		$model = $this->find('setting_id = :setting_id AND language_id = :language_id', array(':setting_id'=>$setting_id, ':language_id'=>$language_id));
		return $model;
	}
}