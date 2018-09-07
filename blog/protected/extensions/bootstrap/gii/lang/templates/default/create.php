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
	'$label'=>array('index'".''."),
	'Add',
);\n";
?>

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add <?php echo $this->modelClass; ?></h1>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model, 'modelDesc'=>\$modelDesc)); ?>"; ?>
