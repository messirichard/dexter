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
class PrdCategory extends CActiveRecord
{
	public $name;
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
		return 'prd_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('parent_id, image, type, data', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>200),
			array('type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, image, type, data', 'safe', 'on'=>'search'),
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
			'description'=>array(self::HAS_ONE, 'PrdCategoryDescription', 'category_id'),
			'parent'=>array(self::BELONGS_TO, 'PrdCategory', 'parent_id'),
			'child'=>array(self::HAS_MANY, 'PrdCategory', 'parent_id'),
			'product'=>array(self::HAS_ONE, 'PrdCategoryProduct', 'category_id'),
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

		$criteria->select = "t.*, prd_category_description.name";
		$criteria->join = "
		LEFT JOIN prd_category_description ON prd_category_description.category_id=t.id
		";
		$criteria->addCondition('prd_category_description.language_id = :language_id');
		$criteria->params = array(':language_id'=>$language_id);

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('prd_category_description.name',$this->name,true);

		$criteria->order = 'sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getData($setting = array(), $languageId=1)
	{
		$default = array(
			'select'=>'t.*, prd_category_description.name',
			'join'=>'LEFT JOIN prd_category_description ON prd_category_description.category_id=t.id',
			'order'=>'t.sort ASC',
			/**
			 * @addCondition
			 * criteria @string
			 * operator @string default and
			 * params @array
			 */
			'addCondition'=>array(),
			'limit'=>10,
			'return'=>'all', // single or all
		);
		$setting = array_merge($default, $setting);
		$criteria=new CDbCriteria;

		$criteria->select = $setting['select'];
		$criteria->join = $setting['join'];

		$params = array();

		// set bahasa yang di pilih
		$criteria->addCondition('prd_category_description.language_id = :language_id');
		$params[':language_id'] = $languageId;
		
		/**
		 * addCondition
		 * criteria @string
		 * operator @string default and
		 * params @array
		 */
		if (count($setting['addCondition']) > 0) {
			foreach ($setting['addCondition'] as $key => $value) {
				$criteria->addCondition($value['criteria'], ($value['operator'] == '') ? 'AND' : $value['operator']);
				foreach ($value['params'] as $k => $v) {
					$params[$k] = $v;
				}
			}
		}

		$criteria->params = $params;

		if ($setting['order'] !== '') {
			$criteria->order = $setting['order'];
		}

		if ($setting['return'] === 'single') {
			$model = $this->model()->find($criteria);
		}else{
			$model['jml']=$this->count($criteria); // ambil jumlah data
			if ($setting['limit'] !== '') {
				$criteria->limit = $setting['limit'];

				$pages=new CPagination($model['jml']);
				$pages->pageSize=($setting['limit']==='') ? 10 : $setting['limit'];
				if ($setting['limit'] != '') {
					$pages->pageSize=$setting['limit'];
				}
		    	$pages->applyLimit($criteria);
				$model['pages'] = $pages;
			}


			$model['data'] = $this->findAll($criteria);
		}

		return $model;
	}
	public function getDataDesc($id, $languageId=1)
	{
		$model = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'t.id = :id',
					'params'=>array(
						':id'=>$id,
					)
				)
			),
			'return'=>'single',
		), $languageId);

		return $model;
	}
	public function getDataDesc2($id, $languageId=1)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('language_id = :language_id');
		$criteria->addCondition('category_id = :id');
		$criteria->params = array(
			':language_id'=>$languageId,
			':id'=>$id,
		);

		$model = PrdCategoryDescription::model()->find($criteria);

		return $model;
	}

	private $_nestedData;
	public function nested($data)
	{
		foreach ($data as $key => $value) {
			$this->_nestedData[$value->parent_id][$value->id] = $value->attributes;
			$this->_nestedData[$value->parent_id][$value->id]['name']=$value->name;
		}
		return $this->buildNested();
	}

	public function buildNested($parent_id = 0)
	{
        // $data=array();
        $str = '';
        if (count($this->_nestedData[$parent_id]) > 0) {
	        $str .= '<ol class="dd-list">';
	        foreach($this->_nestedData[$parent_id] as $key=>$val){            
		        $str .= '<li class="dd-item dd3-item" data-id="'.$val['id'].'">
	                <div class="dd-handle dd3-handle">&nbsp;</div>
	                <div class="dd3-content">'.$val['name'].'</div>
	                <div class="dd3-button">
	                <a href="'.CHtml::normalizeUrl(array('/admin/category/delete', 'id'=>$val['id'], 'type'=>$val['type'])).'" class="delete"><i class="fa fa-trash-o"></i></a>
	                &nbsp;
	                <a href="'.CHtml::normalizeUrl(array('/admin/category/update', 'id'=>$val['id'], 'type'=>$val['type'])).'" class="update"><i class="fa fa-pencil"></i></a>
	                </div>
	            ';
	            $str .= $this->buildNested($key);
	        	$str .= '</li>';


	            // $children=isset($this->_nestedData[$key])?$this->buildNested($key):null; 
	            // // $expand=$children?true:false;                           
	            // $data[]=array('id'=>$key,'title'=>$val['name'],'desc'=>$val['desc'],'slug'=>$val['slug'],'image'=>$val['image'],'children'=>$children);            
	        }
	        $str .= '</ol>';
        }
        return $str;
	}

	public function saveSortNested($data=array(), $parent = 0)
	{
		foreach ($data as $key => $value) {
			$data = PrdCategory::model()->findByPk($value['id']);
			$data->parent_id = $parent;
			$data->sort = $key + 1;
			$data->save(false);
			if (isset($value['children'])) {
				$this->saveSortNested($value['children'], $value['id']);
			}
		}
	}

	private $_categoryData;
	public function categoryTree($type = 'category', $languageID = 1)
	{
		$data = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'type = :type',
					'params'=>array(
						':type'=>$type,
					)
				)
			),
		), $languageID);
		foreach ($data['data'] as $key => $value) {
			$this->_categoryData[$value->parent_id][$value->id] = $value->attributes;
			$this->_categoryData[$value->parent_id][$value->id]['name']=$value->name;
		}

		return $this->buildCategoryTree();
	}

	public function buildCategoryTree($parent_id = 0)
	{
        $data=array();
        if (count($this->_categoryData) > 0) {
	        foreach($this->_categoryData[$parent_id] as $key=>$val){            
	            $children=isset($this->_categoryData[$key])?$this->buildCategoryTree($key):null; 
	            // $expand=$children?true:false;                           
	            $data[]=array('id'=>$key,'title'=>$val['name'],'desc'=>$val['desc'],'slug'=>$val['slug'],'image'=>$val['image'],'children'=>$children);            
	        }   
        }
        return $data;
	}
	public function getBreadcrump($categoryId, $languageID = 1, $type = 'category')
	{
		$dataBread = array();
		while ($categoryId) {
			$data = $this->getDataDesc($categoryId, $languageID);
			$dataBread[$data->name] = array('product/index', 'category'=>$data->id);
			if ($data->parent_id == 0) {
				$categoryId = false;
			}else{
				$categoryId = $data->parent_id;
			}
		}
		$dataBread = array_reverse($dataBread);

		return $dataBread;
	}
	public function getCategory($categoryId, $languageID = 1, $type = 'category')
	{
		$dataCategory = array();
		$dataAll = PrdCategory::model()->getDataDesc($categoryId, $languageID, $type);
		$dataCategory['ALL'] = array('/product/index', 'category'=>$dataAll->parent_id);
		if ($dataAll->parent_id == 0) {
			$categoryId = $dataAll->id;
		} else {
			$categoryId = $dataAll->parent_id;
		}
		
		$model = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'t.parent_id = :parent_id AND t.type = :type',
					'params'=>array(
						':parent_id'=>$categoryId,
						':type'=>$type,
					)
				)
			),
		), $languageID);
		if ($model['jml'] > 0) {
			foreach ($model['data'] as $key => $value) {
				$dataCategory[$value->name] = array('/product/index', 'category'=>$value->id);
			}
		}else{
			$model = PrdCategory::model()->getData(array(
				'limit'=>'',
				'addCondition'=>array(
					array(
						'criteria'=>'t.parent_id = :parent_id AND t.type = :type',
						'params'=>array(
							':parent_id'=>0,
							':type'=>$type,
						)
					)
				),
			), $languageID);
			foreach ($model['data'] as $key => $value) {
				$dataCategory[$value->name] = array('/product/index', 'category'=>$value->id);
			}
		}

		return $dataCategory;
	}

}
