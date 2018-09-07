<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'<?php echo $this->modelClass; ?>',
	'subtitle'=>'Data <?php echo $this->modelClass; ?>',
);

$this->menu=array(
	array('label'=>'Add <?php echo $this->modelClass; ?>', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo "<?php"; ?> if(Yii::app()->user->hasFlash('success')): ?>

    <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php echo "<?php"; ?> endif; ?>
<h1><?php echo $this->modelClass; ?></h1>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
