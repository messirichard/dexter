<?php

    // we use merged version of lib (single file)
    include('../phpqrcode/phpqrcode.php');
    $code = $_GET['qrcode'];
    QRcode::png('http://decibelsfestivals.com/dev/ticket/admin/order/index?TicketOrder%5Bcari%5D='.$code.'&yt0=', 'images/qrcode/'.$code.'.png', QR_ECLEVEL_Q, 4);