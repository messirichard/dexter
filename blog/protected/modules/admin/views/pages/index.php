<?php
$this->breadcrumbs=array(
	'Pages',
);
$this->pageHeader=array(
	'icon'=>'fa fa-file-text-o',
	'title'=>'Pages',
	'subtitle'=>'Data Pages',
);

$this->menu=array(
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<div class="row-fluid">
	<div id="dasboard-left" class="span8">
		
		<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
		<?php if(Yii::app()->user->hasFlash('success')): ?>

		    <?php $this->widget('bootstrap.widgets.TbAlert', array(
		        'alerts'=>array('success'),
		    )); ?>

		<?php endif; ?>
		<form action="" method="post">
		<div class="row-fluid">
			<div class="span6">
				<h1>Edit Header Menu</h1>
				<div id="pages-grid" class="grid-view">
					<table class="items table table-bordered">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>Page Name</th>
								<th>Show</th>
							</tr>
						</thead>
				        <?php 
				            $pageDefault = TbPages::model()->sortMenu('header');
				         ?>
						<tbody class="ui-sortable">
				            <?php foreach ($pageDefault as $key => $v_def): ?>
				            <tr>
								<td style="text-align: center;"><i class="fa fa-sort"></i></td>
								<td>
									<?php echo ucwords(str_replace('_', ' ', $v_def['name'])); ?>
									<input type="hidden" name="sort[header_id][]" value="<?php echo $v_def['id'] ?>" >
								</td>
								<td style="text-align: center;"><input <?php if ($v_def['tampil'] == 1): ?>checked="checked"<?php endif ?> type="checkbox" name="sort[header][<?php echo $v_def['id'] ?>]" value="1"></td>
							</tr>
				            <?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="span6">
				<h1>Edit Footer Menu</h1>
				<div id="pages-grid2" class="grid-view">
					<table class="items table table-bordered">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>Page Name</th>
								<th>Show</th>
							</tr>
						</thead>
				        <?php 
				            $pageDefault = TbPages::model()->sortMenu('footer');
				         ?>
						<tbody class="ui-sortable">
				            <?php foreach ($pageDefault as $key => $v_def): ?>
				            <tr>
								<td style="text-align: center;"><i class="fa fa-sort"></i></td>
								<td>
									<?php echo ucwords(str_replace('_', ' ', $v_def['name'])); ?>
									<input type="hidden" name="sort[footer_id][]" value="<?php echo $v_def['id'] ?>" >
								</td>
								<td style="text-align: center;"><input <?php if ($v_def['tampil'] == 1): ?>checked="checked"<?php endif ?> type="checkbox" name="sort[footer][<?php echo $v_def['id'] ?>]" value="1"></td>
							</tr>
				            <?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<button type="submit" name="pagesort" value="1" class="btn btn-primary">Simpan</button>
		</form>

	</div>
	<div id="dasboard-right" class="span4">
		<div class="divider15"></div>
		<div class="divider15"></div>
		<div class="divider5"></div>

		<?php $this->renderPartial('page_menu') ?>
	</div>
</div>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function() {
	jQuery( "#pages-grid table tbody" ).sortable();
	jQuery( "#pages-grid table tbody" ).disableSelection();
	jQuery( "#pages-grid2 table tbody" ).sortable();
	jQuery( "#pages-grid2 table tbody" ).disableSelection();
});
</script>
