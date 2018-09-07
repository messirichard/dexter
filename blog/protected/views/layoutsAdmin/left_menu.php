<div class="leftmenu">        
    <ul class="nav nav-tabs nav-stacked">
        <li class="nav-header">Navigation</li>

        <?php
        /*
        <li class="dropdown"><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>"><span class="fa fa-life-ring"></span> <?php echo Tt::t('admin', 'Product') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/index')); ?>">View Product</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/product/create')); ?>">Add Product</a></li>
            </ul>
        </li>
        */
        $session = new CHttpSession;
        $session->open();
        $login_admin = $session['login'];
         ?>
        <?php /*
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/order/index')); ?>"><span class="fa fa-fax"></span> <?php echo Tt::t('admin', 'Orders') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')); ?>"><span class="fa fa-file"></span> <?php echo Tt::t('admin', 'Slides') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>"><span class="fa fa-group"></span> <?php echo Tt::t('admin', 'Customers') ?></a></li>
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/linesup/index')); ?>"><span class="fa fa-life-ring"></span> <?php echo Tt::t('admin', 'Line Ups') ?></a></li>
        */
        ?>
        
        <?php if ($login_admin['type'] == 'gerai'): ?>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/order/create'));?>"> <span class= "fa fa-facebook"></span><?php echo Tt::t('admin','Gerai')?></a></li>     
        <?php endif ?>  
        <?php if($login_admin['type'] != 'gerai'): ?>
            <!-- <li class="dropdown">
            <a href="<?php echo CHtml::normalizeUrl(array('/admin/ticket/index')); ?>"><span class="fa fa-ticket"></span> <?php echo Tt::t('admin', 'Tickets') ?></a>
            <ul>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">Event</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/ticket/index')); ?>">Tickets</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/category/index')); ?>">View Category</a></li>
            </ul>
        </li> -->
            <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/order/index')); ?>"><span class="fa fa-ticket"></span> <?php echo Tt::t('admin', 'Order Tickets') ?></a></li>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/bank/index')); ?>"><span class="fa fa-ticket"></span> <?php echo Tt::t('admin', 'Bank') ?></a></li> -->
            <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>"><span class="fa fa-image"></span> <?php echo Tt::t('admin', 'Blog') ?></a></li>

            <!-- <li><a href="<?php echo CHtml::normalizeUrl(array('setting/index')); ?>"><span class="fa fa-cogs"></span> <?php echo Tt::t('admin', 'General Setting') ?></a>
            </li> -->
        <?php endif ?>

        
        <li><a href="<?php echo CHtml::normalizeUrl(array('/admin/home/logout')); ?>"><span class="fa fa fa-sign-out"></span> Logout</a></li>
    </ul>
</div><!--leftmenu-->
