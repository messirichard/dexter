<?php

/**
 * This is the model class for table "pg_faq".
 *
 * The followings are the available columns in table 'pg_faq':
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $status
 */
class Faq extends CActiveRecord
{
	public $question;
	public $answer;
	public $writer_name;
	public $writer_image;
	public $writer_avatar;
	public $year;
	public $month;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pg_faq';
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status', 'safe', 'on'=>'search'),
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
			// 'question' => 'Question',
			// 'answer' => 'Answer',
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
	public function search($language_id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_faq_description.question";
		$criteria->join = "
		LEFT JOIN pg_faq_description ON pg_faq_description.faq_id=t.id
		";
		$criteria->addCondition('pg_faq_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('status',$this->status);

		$criteria->compare('question',$this->question, true);
		
		$criteria->order = "t.id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Faq the static model class
	 */

	public function getData($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_faq_description.question, pg_faq_description.answer";
		$criteria->join = "
		LEFT JOIN pg_faq_description ON pg_faq_description.faq_id=t.id
		";
		$criteria->addCondition('pg_faq_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = Faq::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('faq_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = FaqDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($limit = false, $id = false, $languageId=1)
	{
		// default
		$pageTitle = 'All';
		$title = 'Semua Artikel';

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_faq_description.question, pg_faq_description.answer";

		$criteria->join = "
		LEFT JOIN pg_faq_description ON pg_faq_description.faq_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}
		// if ($_GET['q'] != '') {
		// 	$criteria->addCondition('(pg_faq_description.content LIKE :q OR pg_faq_description.title LIKE :q)');
		// 	$params[':q'] = '%'.$_GET['q'].'%';

		// }
		
		$criteria->addCondition('pg_faq_description.language_id = :language_id');
		$criteria->addCondition('t.`status` = 1');
		$params[':language_id'] = $languageId;
		// if($_GET['order'] == 'from-a') {
		// 	$criteria->order = "pg_faq_description.title ASC";
		// } elseif($_GET['order'] == 'from-z') {
		// 	$criteria->order = "pg_faq_description.title DESC";
		// } elseif($_GET['order'] == 'rand') {
		// 	$criteria->order = "RAND()";
		// } else {
			$criteria->order = "t.id DESC";
		// }
		
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
			'title'=>$title,
			'jml'=>$jml,
			'data'=>$data,
			'categoryId'=>$categoryId,
			'pages'=>$pages,
			// 'strRefine'=>implode(', ', $strRefine),
		);

		return $result;
	}

	public function getAllDataByDate($writer = false, $month, $year, $limit = false, $id = false, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_faq_description.title";
		$criteria->join = "
		LEFT JOIN pg_faq_description ON pg_faq_description.faq_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}

		$criteria->addCondition('pg_faq_description.language_id = :language_id');
		$criteria->addCondition('t.`active` = 1');

		if ($writer != '') {
			$criteria->addCondition('t.writer = :writer');
			$params[':writer'] = $writer;
		}else{
			if ($month != '' AND $year != '') {
				$criteria->addCondition('MONTH(t.date_input) = :month');
				$criteria->addCondition('YEAR(t.date_input) = :year');
				$params[':month'] = $month;
				$params[':year'] = $year;
			}
		}


		$params[':language_id'] = $languageId;
		$criteria->order = "t.date_input DESC";
		$criteria->params = $params;

		if ($limit !== false) {
			$criteria->limit = $limit;
		}

		$model = Faq::model()->findAll($criteria);

		return $model;
	}
	
}
