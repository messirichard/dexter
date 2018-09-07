<div class="outers-data-inside-about mw-950 tengah text-center">
    <?php foreach ($dataBlog->getData() as $k => $v): ?>
<?php
$criteria=new CDbCriteria;
$criteria->addCondition('status = "1"');
$criteria->addCondition('t.blog_id = :blog_id');
$criteria->params[':blog_id'] = $v->id;
$ticketData = Ticket::model()->findAll($criteria);

?>
<?php if (count($ticketData) > 0): ?>
    <div class="tagline-home text-center">
        <?php echo $v->description->title ?>
    </div>
    <div class="clear height-50"></div>
    <div class="tjadwal-peluncuran text-center">
        <div class="row">
            <?php foreach ($ticketData as $key => $value): ?>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="back-ticket">
                        <div class="ticket-content">
                            <h3><?php echo $value->name ?></h3>
                            <div class="height-10"></div>
                            <div class="ticket-line"></div>
                            <div class="height-20"></div>
                            <div class="ticket-price-title">
                                IDR
                            </div>
                            <div class="height-5"></div>
                            <div class="ticket-price">
                                <?php echo number_format(ceil($value->harga/1000)) ?>K
                            </div>
                            
                        </div>
                    </div>
                    <?php if ($v->active == 1): ?>
                    <div class="height-10"></div>
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/detail', 'id'=>$value->id)); ?>" class="btn ticket-price-title">
                        BUY TICKET
                    </a>
                    <?php endif ?>
                    <div class="height-40"></div>
                </div>
                    
            <?php endforeach ?>
        </div>
        <!-- <p class="text-center">Sorry, Content is empty</p> -->
        <!-- <div id="widget"></div><script type="text/javascript" src="https://neo.loket.com/themes_1.0/js/pym.min.js"></script><script>var pymParent = new pym.Parent("widget", "https://neo.loket.com/widget/iframe/npfcsihcaupjqyb", {});</script> -->


        <div class="clear"></div>
    </div>
<?php endif ?>
    <?php endforeach ?>


    <div class="clear height-40"></div>
    <div class="clear"></div>
</div>
