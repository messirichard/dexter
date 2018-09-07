<?php

/**
 * This is the model class for table "pg_testimonial".
 *
 * The followings are the available columns in table 'pg_testimonial':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $testimonial
 * @property integer $status
 * @property string $date
 */
class PgTestimonial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PgTestimonial the static model class
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
		return 'pg_testimonial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>225),
			array('status, date','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, status, date', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			// 'testimonial' => 'Testimonial',
			'status' => 'Status',
			'date' => 'Date',
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

		$criteria->select = "t.*, pg_testimonial_description.content";
		$criteria->join = "
		LEFT JOIN pg_testimonial_description ON pg_testimonial_description.testimonial_id=t.id
		";
		$criteria->addCondition('pg_testimonial_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		// $criteria->compare('testimonial',$this->testimonial,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public function getData($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_testimonial_description.content";
		$criteria->join = "
		LEFT JOIN pg_testimonial_description ON pg_testimonial_description.testimonial_id=t.id
		";
		$criteria->addCondition('pg_testimonial_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = PgTestimonial::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('testimonial_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = TestimonialDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($limit = false, $id = false, $languageId=1)
	{
		// default
		$pageTitle = 'All';

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_testimonial_description.content";

		$criteria->join = "
		LEFT JOIN pg_testimonial_description ON pg_testimonial_description.testimonial_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}
		// if ($_GET['q'] != '') {
		// 	$criteria->addCondition('(pg_testimonial_description.content LIKE :q OR pg_testimonial_description.title LIKE :q)');
		// 	$params[':q'] = '%'.$_GET['q'].'%';

		// }
		
		$criteria->addCondition('pg_testimonial_description.language_id = :language_id');
		$criteria->addCondition('t.`active` = 1');

		$params[':language_id'] = $languageId;
		
		$criteria->params = $params;

		// mengambil jumlah data
		$jml = $this->count($criteria);

		// pagination
		$pages=new CPagination($jml);
		
		$pages->pageSize=$limit;
		if ($_GET['perpage'] != '' AND $limit == false) {
			$pages->pageSize=$_GET['perpage'];
		}
    	$pages->applyLimit($criteria);

		$data = $this->findAll($criteria);

		$result = array(
			'pageTitle'=>$pageTitle,
			// 'title'=>$title,
			'jml'=>$jml,
			'data'=>$data,
			'categoryId'=>$categoryId,
			'pages'=>$pages,
			// 'strRefine'=>implode(', ', $strRefine),
		);

		return $result;
	}


}