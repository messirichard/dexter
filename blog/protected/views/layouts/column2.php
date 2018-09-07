<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
function createCategory($category, $str = '')
{
    if (count($category) > 0) {
        foreach ($category as $key => $value) {
            $child_str = createCategory($value['children']);
            $str .= '<li><a href="'.CHtml::normalizeUrl(array('product/index', 'category'=>$value['id'])).'">'.$value['title'].'</a><ul>'.$child_str.'</ul></li>';
        }
    }
    return $str;
}
$cart = new Cart;
$jmlCart = $cart->getTotalCartItem();
?>
<header class="head header-inside">
    <div class="back-header-out">
        <?php echo $this->renderPartial('/layouts/in_headerdata'); ?>
    </div>
    <?php echo $this->renderPartial('/layouts/_header_respons'); ?>
</header>
<!-- <div class="container">
    <div class="clearfix"></div> -->
    <!-- <div class="menu-category">
        <div class="clear"></div>
        <div class="row">
            <div class="col-lg-9">
                <div class="menu-category-list">
                    <ul class="list-inline">
                        <li class="browse-product"><a href="<?php // echo CHtml::normalizeUrl(array('product/index')); ?>">BROWSE PRODUCTS</a></li>
                        <?php // echo createCategory(PrdCategory::model()->categoryTree('category', $this->languageID)); ?>
                        <li><a href="<?php // echo CHtml::normalizeUrl(array('product/index')); ?>">BRANDS</a></li>
                        <li><a href="<?php // echo CHtml::normalizeUrl(array('product/index')); ?>">SALE</a></li>
                        <li><a href="<?php // echo CHtml::normalizeUrl(array('product/index')); ?>">GIFT ITEMS</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="menu-category-search">
                    <label for="">SEARCH</label> &nbsp;&nbsp;
                    <div class="box-search">
                        <input type="text">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- </div> -->

<?php echo $content ?>
<?php if ($jmlCart > 0): ?>
    
<div class="back-fix-rightstore">
    <div class="box-log-itemstore">
        <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>">
        <div class="b-iconlog-store"><i class="icon-storelog"></i></div>
        <div class="item-list"><?php echo $jmlCart ?> <br> ITEM(S)</div>
        </a>
    </div>
    <div class="clear height-5"></div>
    <div class="height-2"></div>
    <div class="box-log-checkoutstore fright">
        <a href="<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>">
        <div class="b-iconlog-check"><i class="icon-checkoutlog"></i></div>
        <div class="item-list">CHECK OUT</div>
        </a>
    </div>
    <div class="clear"></div>
</div>
<?php endif ?>

<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>