
<div class="widgetbox block-rightcontent">                        
    <div class="headtitle">
        <h4 class="widgettitle">Default Page</h4>
    </div>
    <div class="widgetcontent">
        <?php 
            $pageDefault = TbPages::model()->findAll('type=0');
         ?>
        <ul class="userlist">
            <?php foreach ($pageDefault as $key => $v_def): ?>
                <li><?php echo ucwords(str_replace('_', ' ', $v_def->name)); ?> <a href="<?php echo ($v_def->group=="static")? CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>$v_def->id)) : CHtml::normalizeUrl(array($v_def->group.'/index', 'id'=>$v_def->id)); ?>" class="editright"><span class="fa fa-pencil"></span> &nbsp;Edit</a></li>
            <?php endforeach ?>
        </ul>
    </div><!--widgetcontent-->
</div>

<div class="divider15"></div>

<div class="widgetbox block-rightcontent">                        
    <div class="headtitle">
        <div class="btn-group">
            <a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/create')); ?>" class="btn"><span class="fa fa-plus-circle"></span> &nbsp;Tambah Halaman</a>
        </div>
        <h4 class="widgettitle">Page List</h4>
    </div>
    <div class="widgetcontent">
        <?php 
            $pageDefault = TbPages::model()->findAll('type=1');
         ?>
        <ul class="userlist">
            <?php foreach ($pageDefault as $key => $v_deff): ?>
                <li><?php echo ucwords(str_replace('_', ' ', $v_deff->name)); ?> <a href="<?php echo CHtml::normalizeUrl(array('/admin/pages/update', 'id'=>$v_deff->id)); ?>" class="editright"><span class="fa fa-pencil"></span> &nbsp;Edit</a></li>
            <?php endforeach ?>
        </ul>
    </div><!--widgetcontent-->
</div>