<?php
$header = PgTypeLetak::model()->with('page')->findAll(array(
    'condition'=>'letak = :letak AND tampil = "1"',
    'params'=>array(':letak'=>'footer'),
    'order'=>'`t`.`sort` ASC',
));
?>
<ul>
<?php foreach ($header as $key => $value): ?>
	<?php if ($value->page->group === 'static'): ?>
    <li><a href="<?php echo CHtml::normalizeUrl(array('/'.$value->page->group.'/index/', 'slug'=>$value->page->name, 'id'=>$value->page->id)); ?>"><?php echo $value->page->name ?></a></li>
	<?php else: ?>
    <li><a href="<?php echo CHtml::normalizeUrl(array('/'.$value->page->group.'/index/')); ?>"><?php echo $value->page->name ?></a></li>
	<?php endif ?>
<?php endforeach ?>
</ul>