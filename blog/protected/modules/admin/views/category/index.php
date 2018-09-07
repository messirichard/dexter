<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
);
$this->pageHeader=array(
	'icon'=>'fa fa-tags',
	'title'=>'Product',
	'subtitle'=>'Category Product',
); 
$bread = PrdCategory::model()->getBreadcrump($_GET['parent']);
$bread = array_reverse($bread,true);
foreach ($bread as $key => $value) {
	$this->breadcrumbs[$key]=$value;
}

$this->menu=array(
	// array('label'=>'Add Category', 'icon'=>'th-list','url'=>array('create', 'parent'=>$_GET['parent']), 'visible'=>($_GET['parent'] == '' || $_GET['parent'] == 0) ? true : false),
	array('label'=>'Add Category', 'icon'=>'th-list','url'=>array('create', 'parent'=>$_GET['parent'])),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Category</h4>
		    </div>
		    <div class="widgetcontent">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search($this->languageID),
	'enableSorting'=>false,
	'summaryText'=>false,
	// 'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'parent_id',
		// 'slug',
		// 'image',
		// 'name',
		// array(
  //           'name'=>'image',
  //           'type'=>'raw',
  //           'filter'=>false,
  //           'value'=>"'<img src=\"'.Yii::app()->baseUrl . ImageHelper::thumb(157,157, '/images/category/'.\$data->image , array('method' => 'adaptiveResize', 'quality' => '90')).'\" />'",
  //       ),    
		array(
			'name'=>'name',
			'type'=>'raw',
			'value' => $data->name,
			// 'value'=>'CHtml::link($data->name,array("index","parent"=>$data->id))',
			'value'=>'($data->parent_id == "0") ? CHtml::link($data->name,array("index","parent"=>$data->id)) : $data->name',
		),
		// array(
		// 	'header'=>'Action',
		// 	'type'=>'raw',
		// 	// 'value'=>'CHtml::link("<i class=\'icon-search\'></i>",array("index","parent"=>$data->id))',
		// 	// 'value'=>'($data->parent_id == "0") ? CHtml::link("<i class=\'icon-search\'></i>",array("index","parent"=>$data->id)) : ""',
		// ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
		    </div><!--widgetcontent-->
		</div>
	</div>
	<div class="span4">
		<?php $this->renderPartial('/product/product_category', array(
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		)) ?>
	</div>
</div>
