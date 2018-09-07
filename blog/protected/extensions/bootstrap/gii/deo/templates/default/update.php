<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'".''."),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View <?php echo $this->modelClass; ?>', 'icon'=>'pencil','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
);
?>

<h1>Update <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model, 'modelDesc'=>\$modelDesc)); ?>"; ?>