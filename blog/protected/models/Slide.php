<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $id
 * @property string $image
 * @property integer $active
 * @property string $date_input
 * @property string $date_update
 * @property string $insert_by
 * @property string $last_update_by
 */
class Slide extends CActiveRecord
{
	public $title;
	public $content;
	public $writer_name;
	public $writer_image;
	public $writer_avatar;
	public $year;
	public $month;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slide the static model class
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
		return 'sl_slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, active', 'required'),
			array('active, topik_id', 'numerical', 'integerOnly'=>true),
			array('writer, image, insert_by, last_update_by', 'length', 'max'=>255),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>FALSE, 'on'=>'insert'),
			// array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>TRUE, 'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, writer_name ,id, active, date_input, date_update, insert_by, last_update_by', 'safe', 'on'=>'search'),
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
			'images'=>array(self::HAS_MANY, 'SlideImage', 'slide_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'writer_name' => 'writer_name',
			'active' => 'Status',
			'date_input' => 'Date Input',
			'date_update' => 'Date Update',
			'insert_by' => 'Insert By',
			'last_update_by' => 'Last Update By',
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

		$criteria->select = "t.*, sl_slide_description.title";
		$criteria->join = "
		LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id
		";
		$criteria->addCondition('sl_slide_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('active',$this->active);
		$criteria->compare('date_input',$this->date_input,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('insert_by',$this->insert_by,true);
		$criteria->compare('last_update_by',$this->last_update_by,true);

		$criteria->compare('title',$this->title, true);
		$criteria->compare('pastor_description.title',$this->writer_name, true);

		$criteria->order = "date_input DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, sl_slide_description.title, sl_slide_description.content";
		$criteria->join = "
		LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id
		";
		$criteria->addCondition('sl_slide_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = Slide::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('slide_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = SlideDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($limit = false, $id = false, $languageId=1)
	{
		// default
		$pageTitle = 'All';
		$title = 'Semua Artikel';

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, sl_slide_description.title, sl_slide_description.content";

		$criteria->join = "
		LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}
		// if ($_GET['q'] != '') {
		// 	$criteria->addCondition('(sl_slide_description.content LIKE :q OR sl_slide_description.title LIKE :q)');
		// 	$params[':q'] = '%'.$_GET['q'].'%';

		// }
		if ($_GET['topik'] != '') {
			$categoryData = Category::model()->find('slug = :slug',array(':slug'=>$_GET['topik']));
			$criteria->addCondition('t.topik_id = :topik');
			$params[':topik'] = $categoryData->id;

			$pageTitle = 'Topik '. $categoryData->name;
			$title = $categoryData->name;
		}
		if ($_GET['month'] != '' AND $_GET['year'] != '') {
			$criteria->addCondition('MONTH(t.date_input) = :month');
			$criteria->addCondition('YEAR(t.date_input) = :year');
			$params[':month'] = $_GET['month'];
			$params[':year'] = $_GET['year'];
		}

		$criteria->addCondition('sl_slide_description.language_id = :language_id');
		$criteria->addCondition('t.`active` = 1');
		$params[':language_id'] = $languageId;
		if($_GET['order'] == 'from-a') {
			$criteria->order = "sl_slide_description.title ASC";
		} elseif($_GET['order'] == 'from-z') {
			$criteria->order = "sl_slide_description.title DESC";
		} elseif($_GET['order'] == 'rand') {
			$criteria->order = "RAND()";
		} else {
			$criteria->order = "date_input DESC";
		}
		
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

		$criteria->select = "t.*, sl_slide_description.title";
		$criteria->join = "
		LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}

		$criteria->addCondition('sl_slide_description.language_id = :language_id');
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

		$model = Slide::model()->findAll($criteria);

		return $model;
	}

	public function getMenu($languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "YEAR(t.date_input) as `year`, MONTH(t.date_input) as `month`, t.date_input";
		$criteria->join = "LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id";

		$params = array();

		$criteria->addCondition('sl_slide_description.language_id = :language_id');
		$params[':language_id'] = $languageId;
		$criteria->order = "date_input DESC";
		$criteria->params = $params;

		$model = Slide::model()->findAll($criteria);

		$data = array();
		foreach ($model as $key => $value) {
			$data[$value->year][$value->month] = $value->date_input;
		}

		$listMenu = array();
		foreach ($data as $key => $value) {
			foreach ($value as $k => $v) {
				$query2 = Yii::app()->db->createCommand("
					SELECT `t`.`id`, `d`.`title`, `d`.`content`, `t`.`date_input` FROM `slide` `t` INNER JOIN `sl_slide_description` `d`
					ON `t`.`id` = `d`.`slide_id`
					WHERE
					`t`.`active` = '1' AND
					`d`.`language_id` = $languageId AND
					YEAR(`date_input`) = '".$key."' AND
					MONTH(`date_input`) = '".$k."'
					ORDER BY `date_input` DESC
					")->query();

					$data2 = array();
					foreach ($query2 as $kul => $v) {
						$data2[] = array(
							'label'=>$v['title'],
							'url'=>array('/slide/detail', 'id'=> $v['id'], 'slug'=> Slug::create($v['title']) ), 
							// 'active'=>false,
						);
					}

				$listMenu[] = array(
					'label'=>'<i class="glyphicon glyphicon-plus"></i> &nbsp;'. Yii::app()->locale->getMonthName($k).' '.$key,
					'month'=>$k,
					'year'=>$key,
					'items'=>$data2,
				);

			}
		}

		return $listMenu;
	}

	public function getWriter($languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, sl_slide_description.title";
		$criteria->join = "
		LEFT JOIN sl_slide_description ON sl_slide_description.slide_id=t.id
		";

		$params = array();

		$criteria->addCondition('sl_slide_description.language_id = :language_id');
		$params[':language_id'] = $languageId;
		$criteria->order = "date_input DESC";
		$criteria->group = "writer";
		$criteria->params = $params;

		$model = Slide::model()->findAll($criteria);

		return $model;
	}

}