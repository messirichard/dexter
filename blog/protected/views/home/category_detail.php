<div class="outers-data-inside-about mw-950 tengah text-center">
    <div class="tagline-home text-center">
        <?php echo $data->description->title ?>
    </div>
    <div class="clear height-50"></div>
    <div class="height-30"></div>
    
    <div class="tjadwal-peluncuran text-center blocks_detail_tickets">
        <div class="pictures">
            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(850,412, '/images/blog/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block">
        </div>
        <div class="info">
            <div class="shares_block margin-bottom-20">
                <p>
                    Share this: &nbsp;&nbsp;
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//decibelsfestivals.com/"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
                    <a href="https://plus.google.com/share?url=http%3A//decibelsfestivals.com/"><i class="fa fa-google"></i></a>&nbsp;&nbsp;
                    <a href="https://twitter.com/home?status=http%3A//decibelsfestivals.com/"><i class="fa fa-twitter"></i></a>
                </p>
            </div>
            <p>location: <?php echo $data->event_location ?></p>
            <p>Date Time: <?php echo $data->event_date ?></p>
            <?php echo $data->description->content ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>    
    <div class="clear height-50"></div>
    <div class="height-25"></div>

    <div class="tagline-home text-center">
        BUY TICKETS
    </div>
    <div class="clear height-50"></div>
    <div class="height-15"></div>
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
                    <?php if ($value->quota > 0): ?>
                    <div class="height-10"></div>
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/detail', 'id'=>$value->id)); ?>" class="btn ticket-price-title">
                        BUY TICKET
                    </a>
                    <?php else: ?>
                    <div class="height-10"></div>
                    <a href="#" class="btn btn-danger">
                        Sold Out
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

    <div class="clear height-40"></div>

    <div class="clear"></div>
</div>
