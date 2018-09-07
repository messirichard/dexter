<?php
$this->breadcrumbs=array(
	'Product',
);
$this->pageHeader=array(
	'icon'=>'fa fa-life-ring',
	'title'=>'Product',
	'subtitle'=>'Data Product',
);

$this->menu=array(
	array('label'=>'Add Product', 'icon'=>'icon-plus-sign','url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Product</h4>
		    </div>
		    <div class="widgetcontent">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'kode',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Code')); ?>
		</div>
		<div class="span8">
			<?php echo $form->textFieldRow($model,'name',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Reset',
		'url'=>Yii::app()->createUrl($this->route),
	)); ?>

<?php $this->endWidget(); ?>

				<hr>
				<?php
				$search = $model->search($this->languageID);
				$data = $search->getData();
				?>
				<?php $this->widget('CLinkPager', array(
				    'pages' => $search->getPagination(),
				)) ?>
				<hr>
				<?php foreach ($data as $key => $value): ?>
				<div class="row-fluid">
					<div class="span3" style="text-align: center;">
						<img style="width: 100%; max-width: 200px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
					</div>
					<div class="span9">
						<h3 class="title-product"><?php echo ucwords($value->name) ?></h3>
						<div class="row-fluid">
							<div class="span5">
								<p><?php echo substr(strip_tags($value->desc), 0, 200) ?></p>
								<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$value->id)); ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$value->id)); ?>" class="btn btn-primary delete-product"><i class="fa fa-trash-o"></i></a>
								<a href="<?php echo CHtml::normalizeUrl(array('create', 'copy'=>$value->id)); ?>" class="btn btn-primary"><i class="fa fa-copy"></i></a>
								<a data-id="<?php echo $value->status ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'status')); ?>" class="btn btn-inverse btn-hide-show"><i class="fa fa-eye"></i></a>
							</div>
							<div class="span7">
				                <table class="table table-bordered responsive table-slim">
				                	<thead>
				                        <tr>
				                            <th>Item Code</th>
				                            <th>Stock</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo $value->kode ?></td>
				                            <td><?php echo $value->stock ?></td>
				                        </tr>
				                    </tbody>
				                	<thead>
				                        <tr>
				                            <th>Price</th>
				                            <th>Category</th>
				                        </tr>
				                	</thead>
				                    <tbody>
				                        <tr>
				                            <td><?php echo Cart::money($value->harga) ?> <span style="color: red; text-decoration: line-through;"><?php echo Cart::money($value->harga_coret) ?></span></td>
				                            <td><?php echo ViewCategory::model()->find('category_id = :category_id AND language_id = :language_id', array(':category_id'=>$value->category_id, ':language_id'=>$this->languageID))->name ?></td>
				                        </tr>
				                    </tbody>
				                </table>
				                <div class="divider5"></div>
				                <?php /*
                            	<a data-id="<?php echo $value->terbaru ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'terbaru')); ?>" class="btn btn-small btn-primary btn-terbaru">Sale <i class="fa fa-check-square-o"></i></a>
                            	<a data-id="<?php echo $value->terlaris ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'terlaris')); ?>" class="btn btn-small btn-terlaris">Gift Item <i class="fa fa-square-o"></i></a>
                            	*/ ?>
                            	<a data-id="<?php echo $value->out_stock ?>" href="<?php echo CHtml::normalizeUrl(array('setStatus', 'id'=>$value->id, 'type'=>'out_stock')); ?>" class="btn btn-small btn-out-stock">Out Of Stock <i class="fa fa-square-o"></i></a>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<?php endforeach ?>
				<?php $this->widget('CLinkPager', array(
				    'pages' => $search->getPagination(),
				)) ?>

		    </div><!--widgetcontent-->
		</div>
	</div>
	<script type="text/javascript">
		jQuery(function ( $ ) {
			$('.btn-hide-show').setStatusAjax({
				content: '<i class="fa fa-eye-slash"></i>',
				contentOK: '<i class="fa fa-eye"></i>',
				class: 'btn-ok',
				classOK: 'btn-inverse',
			})
			$('.btn-terbaru').setStatusAjax({
				content: 'Sale <i class="fa fa-square-o">',
				contentOK: 'Sale <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.btn-terlaris').setStatusAjax({
				content: 'Gift Item <i class="fa fa-square-o">',
				contentOK: 'Gift Item <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.btn-out-stock').setStatusAjax({
				content: 'Out of Stock <i class="fa fa-square-o">',
				contentOK: 'Out of Stock <i class="fa fa-check-square-o">',
				class: 'btn-ok',
				classOK: 'btn-primary',
			})
			$('.delete-product').deleteAjax({
			})
		})
	</script>
	<?php /*
	<div class="span4">
		<?php $this->renderPartial('product_category', array(
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		)) ?>
	</div>
	*/ ?>
</div>
