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
	'$label'=>array('index'),
	'Add',
);\n";
?>

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'<?php echo $this->modelClass; ?>',
	'subtitle'=>'Add <?php echo $this->modelClass; ?>',
);

$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
