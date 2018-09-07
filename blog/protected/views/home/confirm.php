<div class="outers-data-inside-about mw-950 tengah">
    <div class="tagline-home text-center">
        Confirmation 
    </div>
    <div class="height-20"></div>
    <div class="tjadwal-peluncuran">
        <?php if ($modelOrder->status == 0): ?>
            <?php if ($_GET['code'] != ''): ?>
                <p class="text-center">Apakah anda ingin mengkonfirmasi transfer anda?</p>
                <p class="text-center">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/confirm', 'nota'=>$_GET['nota'], 'code'=>$_GET['code'], 'status'=>'1')); ?>" class="btn btn-danger">Konfirmasi Transfer</a>
                </p>
            <?php else: ?>
                <?php if ($modelOrder->method == 'bank'): ?>
                    <p class="text-center">Silahkan melakukan pembayaran anda dengan transfer ke nomor rekening di bawah ini, kami akan mengirimkan ticket anda setelah anda melakukan pembayaran</p>
                    <?php
                    $dataBank = Bank::model()->findAll();
                    ?>
                        <p class="text-center">
                    <?php foreach ($dataBank as $key => $value): ?>
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(150,100, '/images/bank/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
<!--                             <?php echo $value->nama ?>
                            #<?php echo $value->rekening ?>
 -->                    
                    <?php endforeach ?>
                        </p>
                <?php else: ?>
                    <p class="text-center">Silahkan melanjutkan pembayaran anda dengan ke dokupay atau anda bisa transfer ke nomor rekening di bawah ini, kami akan mengirimkan ticket anda setelah anda melakukan pembayaran</p>
                    <?php
                    $dataBank = Bank::model()->findAll();
                    ?>
                        <p class="text-center">
                    <?php foreach ($dataBank as $key => $value): ?>
                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(150,100, '/images/bank/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
<!--                             <?php echo $value->nama ?>
                            #<?php echo $value->rekening ?>
-->
                    <?php endforeach ?>
                         </p>
                <?php endif ?>
            <?php endif ?>
        <?php endif ?>
        <?php if ($modelOrder->status == 1): ?>
                <p class="text-center">Ticket anda sudah kami proses, silahkan cek email anda</p>
                <p class="text-center">Pastikan anda memeriksa folder SPAM anda jika tidak menemukan email verfikasi.</p>
                <p class="text-center">Jika anda masih tidak menerima email ticket anda, hubungi Decibels dengan menginformasikan nama lengkap anda dan nomor KTP ke nomor telepon: 081 2351 72261  </p>
        <?php endif ?>
        <?php if ($modelOrder->status == 2): ?>
                <p class="text-center">Pembayaran anda sudah kami terima, kami akan segera mengirimkan ticket anda melalui email.</p>
                <p class="text-center">Pastikan anda memeriksa folder SPAM anda jika tidak menemukan email verfikasi.</p>
                <p class="text-center">Jika anda masih tidak menerima email konfirmasi, hubungi Decibels dengan menginformasikan nama lengkap anda dan nomor KTP ke nomor telepon: 081 2351 72261  </p>
        <?php endif ?>
        <?php if ($modelOrder->status == 10): ?>
            <p class="text-center">Trimakasih telah mengkonfirmasi transfer anda, kami akan mengecek pembayaran anda, dan kami akan segera mengirimkan ticket anda melalui email</p>
        <?php endif ?>

        <div class="clear"></div>
    </div>

    <div class="clear height-40"></div>

    <div class="clear"></div>
</div>
