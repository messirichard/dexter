<section class="top-content-inside about">
    <div class="container">
        <div class="titlepage-Inside">
            <h1>e-STORE</h1>
        </div>
    </div>
    <div class="celar"></div>
</section>
<section class="middle-content">
    <div class="prelatife container">
        
        <div class="clear height-20"></div>
        <div class="height-3"></div>
        <div class="prelatife">
            <div class="box-featured-latestproduct">
                <div class="box-title">
                    <div class="titlebox-featured" alt="title-product">SHOPPING CART</div>
                    <div class="fright brd-linksetcart"><b>REVIEW SHOPPING CART</b> --- PERSONAL / SHIPPING INFO --- PAYMENT --- DONE</div>
                    <div class="clear"></div>
                </div>
                <div class="box-product-detailg">
                    <div class="clear height-25"></div>
                    <!-- start shopcart box -->
                        <?php //if (count($data)>0): ?>
                    <div class="padding-32">
                        <table class="table table-hover shopcart">
                        <thead>
                            <tr>
                                <td width="150">Item</td>
                                <td>&nbsp;</td>
                                <!-- <td>Option</td> -->
                                <td>Quantity</td>
                                <td>Total</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php // $total = 0 ?>
                            <?php // foreach ($data as $key => $value): ?>
                            <?php
                                    // if ($value['option'] != '') {
                                    //     $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
                                    //     $value['price'] = $option->price;
                                    // }
                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="left pic">
                                                            <!-- <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt=""> -->
                                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(113,85, '/asset/images/estore-test.jpg' , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="title">
                                                            <?php echo $value['name'] ?><b>NEW HP 250 G2 NOTEBOOK</b><br> 
                                                            <?php if ($option != null): ?>
                                                            @<?php echo Cart::money($value['price']) ?>.-
                                                            <br> Option: <?php echo $option->attribute ?>
                                                            <?php else: ?>
                                                            @<?php echo Cart::money($value['price']) ?>.-
                                                            <?php endif ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                                            <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                                            <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                                                                <?php foreach ($value['optional'] as $k => $v): ?>
                                                                <input type="hidden" value="<?php echo $v ?>" name="option[<?php echo $k ?>]">
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                            <span class="quantity"><?php echo $value['qty'] ?> Item(s)</span>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <b><?php echo Cart::money($subTotal = ($value['price']+$totalOption) * $value['qty']) ?>.-</b>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn back-btn-primary-blue btn-edit-cart">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php // $total = $total + $subTotal ?>
                                                <?php // endforeach ?>
                                            </tbody>
                                        </table>

                                                <div class="clear height-0"></div>
                                                <div class="line-grey"></div>
                                                <div class="clear height-15"></div>


                                                <div class="right box-total">
                                                    <table class="table borderless boxouter">
                                                        <tr>
                                                            <td width="54%">
                                                                <table class="table borderless">
                                                                     <tr>
                                                                            <td width="50%">Subtotal</td>
                                                                            <?php $total = 600000; ?>
                                                                            <td width="50%"><?php echo Cart::money($total) ?>.-</td>
                                                                        </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <!-- bottom -->
                                                        <tr class="border-toptotal">
                                                            <td>
                                                                <table class="table borderless">
                                                                    <tr class="double-border">
                                                                        <td class="total" width="50%"><b>TOTAL</b></td>
                                                                        <td class="price-total" width="50%"><b><?php echo Cart::money($total) ?>.-</b></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <?php if (! isset($session['login_member'])): ?>
                                                                    <div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/member/index', 'ret'=>urlencode($this->createUrl('/cart/shipping')))); ?>" class="btn back-btn-primary-gold">Finish Shopping</a></div>
                                                                <?php else: ?>
                                                                    <div class="right box-finish-shop"><a href="<?php echo CHtml::normalizeUrl(array('/cart/shipping')); ?>" class="btn back-btn-primary-gold">Finish Shopping</a></div>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="clear height-30"></div>
                                            <?php //else: ?>
                                                <!-- <h3>Shopping cart is empty</h3> -->
                                            <?php //endif ?>
                    </div>
                    <!-- end shopcart box -->
                    <div class="clear height-35"></div>
                    <div class="clearfix"></div>
                </div>

                <div class="clearfix"></div>
            </div>
            <div class="back-shadow-bottom-featproduct"></div>
        <div class="clear"></div>
        </div>

        <div class="clear height-35"></div>
        <div class="clearfix"></div>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54092b87219ecbb4" async="async"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <div class="clear height-35"></div>
    </div>
    <div class="clearfix"></div>
</section>
