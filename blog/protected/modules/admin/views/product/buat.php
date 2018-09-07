<?php
$this->breadcrumbs=array(
	'Produk'=>array('index'),
	'Tambah',
);

$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Produk',
	'subtitle'=>'Tambah Produk',
);

$this->menu=array(
	// array('label'=>'List Produk', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">URL</h4>
		    </div>
		    <div class="widgetcontent">
		    	<form action="" method="post">
					<input type="text" name="Url" class="span12" value="">
					<input type="submit" value="Submit" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>