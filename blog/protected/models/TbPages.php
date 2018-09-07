<?php

/**
 * This is the model class for table "pg_pages".
 *
 * The followings are the available columns in table 'pg_pages':
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $type
 * @property integer $hide
 * @property string $group
 * @property string $dual_language
 * @property integer $sort
 * @property integer $letak
 */
class TbPages extends CActiveRecord
{
	public $page_name;
	public $content;
	public $meta_title;
	public $meta_keyword;
	public $meta_description;

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TbPages the static model class
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
		return 'pg_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('group', 'length', 'max'=>100),
			// array('dual_language', 'length', 'max'=>1),
			// The following rule is used by search().
			array('type, group','safe'),
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, group', 'safe', 'on'=>'search'),
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
			// 'value' => 'Content',
			'type' => 'Type',
			// 'hide' => 'Aktif',
			'group' => 'Group',
			// 'dual_language' => 'Dual Language',
			// 'sort' => 'Sort',
			// 'letak' => 'Letak',
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
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name);
		// $criteria->compare('value',$this->value);
		$criteria->compare('type',$this->type);
		// $criteria->compare('hide',$this->hide);
		$criteria->compare('group',$this->group);
		// $criteria->compare('dual_language',$this->dual_language);
		// $criteria->compare('sort',$this->sort);
		// $criteria->compare('letak',$this->letak);

		// $criteria->order = "id DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getData($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_pages_description.page_name, pg_pages_description.content, pg_pages_description.meta_title, pg_pages_description.meta_keyword, pg_pages_description.meta_description";
		$criteria->join = "
		LEFT JOIN pg_pages_description ON pg_pages_description.page_id=t.id
		";
		$criteria->addCondition('pg_pages_description.language_id = :language_id');
		$criteria->addCondition('t.id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = TbPages::model()->find($criteria);

		return $model;
	}

	public function getDataDesc($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('page_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = PagesDescription::model()->find($criteria);

		return $model;
	}

	public function getAllData($limit = false, $id = false, $languageId=1)
	{
		// default
		$pageTitle = 'All';

		$criteria=new CDbCriteria;

		$criteria->select = "t.*, pg_pages_description.page_name, pg_pages_description.content, pg_pages_description.meta_title, pg_pages_description.meta_keyword, pg_pages_description.meta_description";

		$criteria->join = "
		LEFT JOIN pg_pages_description ON pg_pages_description.page_id=t.id
		";

		$params = array();

		if ($id !== false) {
			$criteria->limit = $limit;
			$criteria->addCondition('t.id != :id');
			$params[':id'] = $id;
		}
		// if ($_GET['q'] != '') {
		// 	$criteria->addCondition('(pg_pages_description.content LIKE :q OR pg_pages_description.page_name LIKE :q)');
		// 	$params[':q'] = '%'.$_GET['q'].'%';

		// }

		$criteria->addCondition('pg_pages_description.language_id = :language_id');
		// $criteria->addCondition('t.`active` = 1');
		$params[':language_id'] = $languageId;

		// if($_GET['order'] == 'from-a') {
		// 	$criteria->order = "pg_pages_description.page_name ASC";
		// } elseif($_GET['order'] == 'from-z') {
		// 	$criteria->order = "pg_pages_description.page_name DESC";
		// } elseif($_GET['order'] == 'rand') {
		// 	$criteria->order = "RAND()";
		// } else {
		// 	$criteria->order = "id DESC";
		// }

		$criteria->order = "id DESC";
		
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
	public static function sortMenu($type = 'header')
	{
		if ($type === 'header') {
			$dataPages = TbPages::model()->findAll();
			$data = array();
			foreach ($dataPages as $key => $value) {
				$data[$value->id] = array(
					'id'=>$value->id,
					'name'=>$value->name,
				);
			}
			$dataPages = $data;
			$dataType = PgTypeLetak::model()->findAll('letak = "header"');
			foreach ($dataType as $key => $value) {
				if (isset($data[$value->page_id])) {
					unset($data[$value->page_id]);
				}
			}
			$dataMenu = array();
			foreach ($dataType as $key => $value) {
				$dataMenu[] = array(
					'id'=>$value->page_id,
					'name'=>$dataPages[$value->page_id]['name'],
					'tampil'=>$value->tampil,
				);
			}
			foreach ($data as $key => $value) {
				$dataMenu[] = array(
					'id'=>$value['id'],
					'name'=>$value['name'],
					'tampil'=>0,
				);
			}
			return $dataMenu;
		}else{
			$dataPages = TbPages::model()->findAll();
			$data = array();
			foreach ($dataPages as $key => $value) {
				$data[$value->id] = array(
					'id'=>$value->id,
					'name'=>$value->name,
				);
			}
			$dataPages = $data;
			$dataType = PgTypeLetak::model()->findAll('letak = "footer"');
			foreach ($dataType as $key => $value) {
				if (isset($data[$value->page_id])) {
					unset($data[$value->page_id]);
				}
			}
			$dataMenu = array();
			foreach ($dataType as $key => $value) {
				$dataMenu[] = array(
					'id'=>$value->page_id,
					'name'=>$dataPages[$value->page_id]['name'],
					'tampil'=>$value->tampil,
				);
			}
			foreach ($data as $key => $value) {
				$dataMenu[] = array(
					'id'=>$value['id'],
					'name'=>$value['name'],
					'tampil'=>0,
				);
			}
			return $dataMenu;
		}
		return $data;
	}
	public function getDataMenu($letak = 'header')
	{
		$data = PgTypeLetak::model()->findAll('letak = :letak', array(':letak'=>$letak));
	}
}
