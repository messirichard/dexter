<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property string $name
 * @property string $value
 */
class Setting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('name', 'required'),
			array('name', 'length', 'max'=>256),
			array('value', 'length', 'min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, value', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('value',$this->value,true);
		$criteria->condition = 'hide = 0';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getSetting($lang)
	{
		$data = $this->findAll();
		$dataArray = array();
		foreach ($data as $key => $value) {
			if ($value->dual_language=='y') {
				$v = SettingDescription::model()->getSettingModel($value->name, $lang);
				$dataArray[$value->name]=$v->value;
			} else {
				$dataArray[$value->name]=$value->value;
			}		
		}
		
		return $dataArray;
	}

	public function getModelSetting($group)
	{
		$model = array();
		$data = Setting::model()->findAll('`group` LIKE :group AND hide = 0 ORDER BY sort ASC',array(':group'=>$group));
		foreach ($data as $key => $value) {
			if ($value->dual_language == 'y') {
				$modelDesc = array();
				foreach (Language::model()->getLanguage() as $k => $v) {
					$modelDesc[$v->code] = SettingDescription::model()->getSettingModel($value->name, $v->code);
					if ($modelDesc[$v->code]==null) {
						$modelDesc[$v->code] = new SettingDescription;
					}
				}
			}else{
				$modelDesc = '';
			}

			$model[$value->name] = array(
				'data'=>$value,
				'desc'=>$modelDesc,
			);
		}
		
		return $model;
	}
	public function getSettingByName($name)
	{
		$data = $this->find('name = :name',array(':name'=>$name));
		return $data;
	}
	public function createSettingData($name, $jmlItem)
	{
		$jmlData = array();
		for ($i=0; $i < $jmlItem; $i++) { 
			$jmlData[] = '';
		}
		$model = new Setting;
		$model->name = $name;
		$model->value = json_encode($jmlData);
		$model->type = 'data';
		$model->hide = '0';
		$model->group = 'data';
		$model->dual_language = 'n';
		$model->save();
		foreach (Language::model()->findAll() as $key => $value) {
			Yii::app()->cache->delete('setting_'.$value->code);
		}
	}
	public function saveSettingData($name, $data)
	{
			$model = Setting::model()->find('name = :name', array(':name'=>$name));
			$model->value = json_encode($data);
			$model->save();
			foreach (Language::model()->findAll() as $key => $value) {
				Yii::app()->cache->delete('setting_'.$value->code);
			}
	}

}