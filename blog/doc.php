>>>>>>>>>> Multi Language <<<<<<<<<<<< ambil dari project design_manager controller product_category

<!-- Untuk Select Language -->
<div class="multilang pj-form-langbar">
	<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
	<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
	<?php endforeach ?>
</div>
<div class="divider5"></div>

<!-- Untuk menampilkan Form -->
<?php
foreach ($categoryModelDesc as $key => $value) {
	$lang = Language::model()->getName($key);
	?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

	<?php
	echo $form->labelEx($value, '['.$lang->code.']name');
    echo $form->textField($value,'['.$lang->code.']name',array('class'=>'span8', 'maxlength'=>100));
    ?>
    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
    <?php
}
?>

<!-- javascript taruh paling bawah -->
<script type="text/javascript">
	jQuery(function( $ ) {
		$('.multilang').multiLang({
		});
	})
</script>


<!-- di controler -->
$categoryModel = new PrdCategory;
$categoryModelDesc = array();
foreach (Language::model()->getLanguage() as $key => $value){
	$categoryModelDesc[$value->code] = new PrdCategoryDescription;
}


>>>>>>>>>> Ajax Multi Language <<<<<<<<<<<<
<!-- Untuk Error dan Success -->
<div id="<?php echo $form->id ?>_s_" class="alert alert-success" style="display: none;">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<span>Data Saved</span>
</div>
<div id="<?php echo $form->id ?>_es_" class="alert alert-error" style="display: none;">
    <ul>
        <li>Dummy</li>
    </ul>
</div>

<!-- Untuk menampilkan Form -->
<?php
foreach ($categoryModelDesc as $key => $value) {
	$lang = Language::model()->getName($key);
	?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

	<?php
	echo $form->labelEx($value, '['.$lang->code.']name');
    echo $form->textField($value,'['.$lang->code.']name',array('class'=>'span10', 'maxlength'=>100));
    ?>
    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
    <?php
}
?>

<!-- javascript taruh paling bawah -->
$('#category-form').validationAjax({
    success: function(){ //gunakan this untuk selector
    }
});

<!-- di controler validasi ajax -->
unset($categoryModelDesc);
$valid=true;
foreach ($_POST['PrdCategoryDescription'] as $j => $mod) {
    if (isset($_POST['PrdCategoryDescription'][$j])) {
        $categoryModelDesc[$j]=new PrdCategoryDescription;
        $categoryModelDesc[$j]->attributes=$mod;
        $lang = Language::model()->getName($j);
		$categoryModelDesc[$j]->language_id = $lang->id;
        $valid=$categoryModelDesc[$j]->validate() && $valid;
    }
}
if (isset($_POST['ajax']) && $_POST['ajax']==='category-form') {
	echo(json_encode(array(json_decode(CActiveForm::validate($categoryModel)), json_decode(CActiveForm::validateTabular($categoryModelDesc)))));
	Yii::app()->end();
}

<!-- di controler simpan ajax/tidak -->
PrdCategoryDescription::model()->deleteAll('category_id = :id', array(':id'=>$categoryModel->id));
foreach ($categoryModelDesc as $key => $value) {
	$value->category_id=$categoryModel->id;
	$value->save();
}

>>>>>>>>>> Menampilkan data <<<<<<<<<<<<

<!-- pasang di model dan sesuaikan nilai default -->
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



<!-- Cara pemakaian -->
$nestedCategory = PrdCategory::model()->getData(array(
	// option letakkan di sini
), $this->languageID);


>>>>>>>>>> Build Tree Data Unlimited <<<<<<<<<<<<
private $_nestedData;
public function nested($data)
{
	foreach ($data as $key => $value) {
		$this->_nestedData[$value->parent_id][$value->id] = $value->attributes;
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
	        $str .= '<li class="dd-item" data-id="'.$val['id'].'">
                <div class="dd-handle">'.$val['name'].'</div>
                <div class="dd3-button">
                <a href="'.CHtml::normalizeUrl(array('/admin/category/delete', 'id'=>$val['id'])).'" class="delete"><i class="fa fa-trash-o"></i></a>
                &nbsp;
                <a href="'.CHtml::normalizeUrl(array('/admin/category/update', 'id'=>$val['id'])).'" class="update"><i class="fa fa-pencil"></i></a>
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


>>>>>>>>>> Tambah Data Javascript Bukan Ajax <<<<<<<<<<<<

<table class="table table-bordered responsive">
    <thead>
        <tr>
            <th>Option</th>
            <th>Stock</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="option-tempel"></tbody>
    <tbody class="option-add">
        <tr>
            <td><input type="text" class="input-block-level"></td>
            <td><input type="text" class="input-block-level"></td>
            <td><input type="text" class="input-block-level"></td>
            <td><button type="button" class="btn btn-danger delete-option"><i class="fa fa-trash-o"></i> Delete</button></td>
        </tr>
    </tbody>
</table>
<div class="divider5"></div>
<button type="button" class="btn btn-primary tambah-option">Tambah Option</button>
<script type="text/javascript">
jQuery(function( $ ) {
	$('.tambah-option').tambahData({
		targetHtml: '.table tbody.option-add',
		// html: '<tr><td></td></tr>',
		tambahkan: '.table tbody.option-tempel',
	});
	$(document).on('click', '.delete-option',function( e ) {
		$(this).parent().parent().remove();
		return false;
	})
})

</script>

>>>>>>>>>> Cara passang dual bahasa di setting <<<<<<<<<<<<
<?php $type = 'default_meta_title' ?>
<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
	<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
		<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
		<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

	    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
	    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
	</div>
<?php endforeach ?>


>>>>>>>>>> CREATE VIEW SQL <<<<<<<<<<<<
CREATE VIEW view_category as SELECT
prd_category.id,
parent_id,
sort,
image,
type,
prd_category.data,
prd_category_description.id as id2,
category_id,
language_id,
name,
prd_category_description.data as data2
FROM `prd_category` INNER JOIN prd_category_description
ON `prd_category`.`id`=`prd_category_description`.`category_id`

CREATE VIEW view_brand as SELECT
`prd_brand`.`id`,
`image`,
`active`,
`date_input`,
`date_update`,
`insert_by`,
`last_update_by`,
prd_brand_description.`id` as `id2`,
`brand_id`,
`language_id`,
`title`,
`content`
FROM `prd_brand` INNER JOIN prd_brand_description
ON `prd_brand`.`id`=`prd_brand_description`.`brand_id`

CREATE VIEW view_product as SELECT
`prd_product`.`id`,
`category_id`,
`brand_id`,
`image`,
`kode`,
`harga`,
`harga_coret`,
`stock`,
`berat`,
`terbaru`,
`terlaris`,
`out_stock`,
`status`,
`date`,
`date_input`,
`date_update`,
`data`,
`product_id`,
`language_id`,
`name`,
`desc`,
`meta_title`,
`meta_desc`,
`meta_key`
FROM `prd_product` INNER JOIN prd_product_description
ON `prd_product`.`id`=`prd_product_description`.`product_id`

CREATE VIEW view_blog as SELECT
`pg_blog`.`id`,
`topik_id`,
`image`,
`active`,
`date_input`,
`date_update`,
`insert_by`,
`last_update_by`,
`writer`,
pg_blog_description.`id` as `id2`,
`blog_id`,
`language_id`,
`title`,
`content`
FROM `pg_blog` INNER JOIN pg_blog_description
ON `pg_blog`.`id`=`pg_blog_description`.`blog_id`;

CREATE VIEW view_page as SELECT
`pg_pages`.id as `id`,
name ,
type ,
`group`,
`pg_pages_description`.id as `id2`,
page_id,
language_id,
page_name,
content,
meta_title,
meta_keyword,
meta_description
FROM `pg_pages` INNER JOIN pg_pages_description
ON `pg_pages`.`id`=`pg_pages_description`.`page_id`