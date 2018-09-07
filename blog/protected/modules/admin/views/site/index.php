<?php
$this->breadcrumbs=array(
    'Dashboard',
);
$session = new CHttpSession;
$session->open();
$login_admin = $session['login'];
?>
    
<div class="pageheader">
    
    <div class="pageicon"><span class="fa fa-laptop"></span></div>
    <div class="pagetitle">
        <h5>All Features Summary</h5>
        <h1>Dashboard</h1>
    </div>
</div><!--pageheader-->

<div class="maincontent">
    <div class="maincontentinner">
        <div class="row-fluid">
            <div id="dashboard-left" class="span8">
                    <h5 class="subtitle">Menu</h5>
                    <ul class="shortcuts">
                    <?php if ($login_admin['type'] == 'root'): ?>
                        <li class="events">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/blog/index')); ?>">
                                <i class="icon-cms fa fa-life-ring"></i>
                                <span class="shortcuts-label">Blog</span>
                            </a>
                        </li>
                        <!-- <li class="products">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/ticket/index')); ?>">
                                <i class="icon-cms fa fa-ticket"></i>
                                <span class="shortcuts-label">Tickets</span>
                            </a>
                        </li>
                        <li class="products">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/order/index')); ?>">
                                <i class="icon-cms fa fa-ticket"></i>
                                <span class="shortcuts-label">Order Tickets</span>
                            </a>
                        </li> -->
                    <?php endif ?>
                        
                        <?php if ($login_admin['type'] == 'gerai'): ?>
                            <li class="products">
                                <a href="<?php echo CHtml::normalizeUrl(array('/admin/order/create')); ?>">
                                    <i class="icon-cms fa fa-facebook"></i>
                                    <span class="shortcuts-label">Gerai</span>
                                </a>
                            </li>    
                        <?php endif ?>
                        
                        <!-- <li class="archive">
                            <a href="<?php echo CHtml::normalizeUrl(array('/admin/customer/index')); ?>">
                                <i class="icon-cms fa fa-group"></i>
                                <span class="shortcuts-label">Customer</span>
                            </a>
                        </li> -->

                </ul>

            </div> <!-- span-8 -->
            
            <div id="dashboard-right" class="span4">
                
                <h5 class="subtitle">Announcements</h5>
                
                <div class="divider15"></div>
                
                <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">&times;</button>
                      <h4>Warning!</h4>
                      <p style="margin: 8px 0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna.</p>
                </div><!--alert-->
                
                <br />
                
                
                <br />
                                        
            </div><!--span4-->
        </div><!--row-fluid-->
        
        <div class="footer">
            <div class="footer-left">
                <span>Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.</span>
            </div>
            <div class="footer-right">
                <span>All Rights Reserved. Developed By <a target="_blank" href="http://markdesign.net">Markdesign</a></span>
            </div>
        </div><!--footer-->
        
    </div><!--maincontentinner-->
</div><!--maincontent-->
1O2.A7M4qgeL