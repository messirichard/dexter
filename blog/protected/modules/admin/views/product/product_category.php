<?php 
$urlUpdate = 'category';
if ($_GET['type'] == 'blog') {
    $urlUpdate = 'blog';
}
?>
<div class="widgetbox block-rightcontent">                        
    <div class="headtitle">
        <h4 class="widgettitle">Category</h4>
    </div>
    <div class="widgetcontent">
        <div id="ajaxNestable">
		<div class="dd" id="nestable2">
            <?php echo $nestedCategory ?>
        </div>
        </div>
        <div class="divider15"></div>
        <button type="button" data-url="<?php echo CHtml::normalizeUrl(array('/admin/'.$urlUpdate.'/index')); ?>" class="btn btn-primary simpan-category-nestable">Save</button>
        <div id="simpan-category-nestable_s_" class="alert alert-success" style="display: none;">
          <span>Data Saved</span>
        </div>
    </div><!--widgetcontent-->
</div>

<div class="divider15"></div>

<div class="widgetbox block-rightcontent">                        
    <div class="headtitle">
        <h4 class="widgettitle">Add Category</h4>
    </div>
    <div class="widgetcontent">
    	<div class="multilang pj-form-langbar">
    		<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
    		<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
    		<?php endforeach ?>
    	</div>
		<div class="divider5"></div>

    	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'category-form',
            'action'=>array('/admin/'.$urlUpdate.'/index'),
			// 'type'=>'horizontal',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		)); ?>
        
        <div id="<?php echo $form->id ?>_s_" class="alert alert-success" style="display: none;">
          <span>Data Saved</span>
        </div>
        <div id="<?php echo $form->id ?>_es_" class="alert alert-error" style="display: none;">
            <ul>
                <li>Dummy</li>
            </ul>
        </div>

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
    		
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>

		<div class="divider5"></div>
        <button type="submit" class="btn btn-primary" name="PrdCategory[submit]" value="1">Add Category</button>
    	<?php $this->endWidget(); ?>
    </div><!--widgetcontent-->
</div>

<div class="divider15"></div>
<script src="<?php echo Yii::app()->baseUrl ?>/asset/backend/js/jquery.nestable.js"></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function($)
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1,
        maxDepth: 2,
    });

    // output initial serialised data
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

	$('.multilang').multiLang({
	});
	$('#category-form').validationAjax({
        success: function(elem){
            // submit form by ajax custom
            url = this.attr('action');
            id = this.attr('id');
            var elem = this;
            $.ajax({
                type: "POST",
                url: url,
                data: this.serialize(),
            })
            .done(function( msg ) {
                elem.find('input').val('');
                $('#'+id+'_s_').show();
                jQuery.noConflict();
                jQuery(document).ready(function($)
                {
                    $( "#ajaxNestable" ).load( "<?php echo CHtml::normalizeUrl(array('/admin/'.$urlUpdate.'/index')); ?> #nestable2", function( response, status, xhr ) {
                        $('#nestable2').nestable({
                            group: 1,
                            maxDepth: 2,
                        });
                    });
                });
            });
        }
	});
    $('.simpan-category-nestable').on('click', function() {
        $('#simpan-category-nestable_s_').hide();
        $.ajax({
            type: "POST",
            url: $(this).attr('data-url'),
            data: JSON.stringify($('#nestable2').nestable('serialize')),
            contentType: "application/json; charset=utf-8",
            dataType: 'json',
        })
        .done(function( msg ) {
            $('#simpan-category-nestable_s_').show().find('span').html('Data Saved');
            jQuery.noConflict();
            jQuery(document).ready(function($)
            {
                $( "#ajaxNestable" ).load( "<?php echo CHtml::normalizeUrl(array('/admin/'.$urlUpdate.'/index')); ?> #nestable2", function( response, status, xhr ) {
                    $('#nestable2').nestable({
                        group: 1,
                        maxDepth: 2,
                    });
                });
            });
        });
    })
    $(document).on('click','#ajaxNestable a.delete',function() {
        if(!confirm('Are you sure you want to delete this item?')) return false;
        $.ajax({
            type:'POST',
            url:$(this).attr('href'),
            data: {ajax: 'delete'},
            success:function(data) {
                $('#simpan-category-nestable_s_').show().find('span').html('Data Deleted');
                jQuery.noConflict();
                jQuery(document).ready(function($)
                {
                    $( "#ajaxNestable" ).load( "<?php echo CHtml::normalizeUrl(array('/admin/'.$urlUpdate.'/index')); ?> #nestable2", function( response, status, xhr ) {
                        $('#nestable2').nestable({
                            group: 1,
                            maxDepth: 2,
                        });
                    });
                });
            },
        });
        return false;
    });
});
</script>
