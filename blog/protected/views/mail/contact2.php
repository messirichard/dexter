<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div style="font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;width:100%!important;min-height:100%;font-size:14px;color:#404040;margin:0;padding:0" bgcolor="#FFFFFF">
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
                        <table bgcolor="#fff" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td bgcolor="#706B5F" height="4" style="background-color:#B4B4B4!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#d50f25" height="4" style="background-color:#959595!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#3369E8" height="4" style="background-color:#000000!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
                        <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td style="margin:0;padding:0">
<?php
$ticket = Ticket::model()->findByPk($model->ticket_id);
$blog = Blog::model()->findByPk($ticket->blog_id);
?>
                                        <img width="100%" src="<?php echo $baseUrl.'/images/blog/'.$blog->image ?>" alt="" style="max-width: 100%;">
                                        <?php if ($model->status == 0): ?>
                                            <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Terima kasih atas pesanan anda, silahkan melakukan pembayaran untuk melanjutkan transaksi ticket anda</h5>
                                            <?php if ($model->method == 'bank'): ?>
                                               <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Harap masukkan no invoice anda ketika transfer menggunakan ibank</h5>
	                                           
                                               <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Silahkan transfer sebelum 24 jam dan klik tombol konfirmasi di bawah ini</h5>

                                                <div align="center" style="text-align:center;margin:20px;padding:0"><a target="_blank" style="margin:0;padding:7px 17px;color:#fff;text-decoration:none;display:inline-block;margin-bottom:0;vertical-align:middle;line-height:20px;font-size:13px;font-weight:600;text-align:center;white-space:nowrap;border-radius:2px;background-color:#777777;background-image:linear-gradient(top,#A2A2A2 0%,#575757 100%);border:1px solid #000000" href="<?php echo $url.CHtml::normalizeUrl(array('/home/confirm', 'nota'=>$model->no_invoice, 'code'=>$model->confirm_code)); ?>">Konfirmasi Transfer</a>
                                                </div>
                                                <?php
                                                $dataBank = Bank::model()->findAll();
                                                ?>
                                                <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Silahkan transfer di rekening di bawah ini:
                                                </p>
                                                <?php foreach ($dataBank as $key => $value): ?>
                                                    <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">
                                                        <img src="<?php echo $baseUrl.ImageHelper::thumb(150,100, '/images/bank/'.$value->image , array('method' => 'resize', 'quality' => '90')) ?>" alt=""> <br>
                                                        Nama Rekening:  <?php echo $value->nama ?> <br>
                                                        Nomor Rekening: <?php echo $value->rekening ?> <br>
                                                        Cabang: Tunjungan Plaza Surabaya
                                                    </p>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        <?php endif ?>
                                        <?php if ($model->status == 2): ?>
	                                        <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Terima kasih Pembayaran anda telah kami terima, kami akan segera mengirimkan ticket kepada anda</h5>
                                        <?php endif ?>
                                        <?php if ($model->status == 1): ?>
                                            <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Terima kasih pesanan anda sudah kami proses, Simpan email ini dan tunjukkan kepada petugas</h5>
                                            <?php Common::barcode( Yii::getPathOfAlias('webroot').'/images/barcode/'.$model->no_invoice.'.png', $model->no_invoice, 100); ?>
<?php
// $ch = curl_init(); 

// // set url 
// curl_setopt($ch, CURLOPT_URL, $baseUrl.'/qrcode.php?qrcode='.$model->no_invoice);

// // return the transfer as a string 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// // $output contains the output string 
// $output = curl_exec($ch); 

// // tutup curl 
// curl_close($ch);
?>
                                            <img width="100%" src="<?php echo $baseUrl.'/images/barcode/'.$model->no_invoice.'.png' ?>" alt="" style="max-width: 100%; display: block !important;">
                                            <p><b>Untuk Print E-Ticket <a href="<?php echo $url.CHtml::normalizeUrl(array('/home/eticket', 'email'=>$model->email, 'ticket'=>$model->no_invoice)); ?>">KLIK DISINI</a></b></p>
                                        <?php endif ?>
                                        <?php if ($model->status == 3): ?>
                                            <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Order anda telah di cancel</h5>
                                        <?php endif ?>

                                        <?php if ($model->status == 5): ?>
                                            <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Terima kasih telah mengikuti event kami</h5>
                                        <?php endif ?>
                                        
<?php
$criteria=new CDbCriteria;
$criteria->addCondition('status = "1"');
$criteria->addCondition('t.id = :id');
$criteria->params[':id'] = $model->ticket_id;
$dataTicket = Ticket::model()->find($criteria);

$criteria=new CDbCriteria;
$criteria->with = array('description');
$criteria->addCondition('description.language_id = :language_id');
$criteria->params[':language_id'] = $this->languageID;
$criteria->addCondition('t.id = :id');
$criteria->params[':id'] = $dataTicket->blog_id;

$dataBlog = Blog::model()->find($criteria);
?>
                                        <div style="margin:0 0 20px;padding:0">
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Event Name:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $dataBlog->description->title ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Event Description:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $dataBlog->description->content ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Ticket Name:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->ticket_name ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Ticket Description:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->ticket_desc ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Ticket Quantity:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->qty ?> Tickets
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php if ($model->method == 'bank'): ?>
                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Kode Unik:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->kode_unik ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php endif ?>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Total Payment:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">
                                                            <?php if ($model->method == 'bank'): ?>
                                                                IDR <?php echo number_format($model->total + $model->kode_unik) ?>
                                                            <?php else: ?>
                                                                IDR <?php echo number_format($model->total) ?>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Invoice Number:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo ($model->no_invoice) ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Payment Method:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">
                                                            <?php if ($model->method == 'bank'): ?>
                                                                Transfer Bank
                                                            <?php else: ?>
                                                                Doku Pay
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Status Order:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">
	                                                        <?php if ($model->status == 0): ?>
	                                                        	Menunggu Pembayaran
	                                                        <?php endif ?>
	                                                        <?php if ($model->status == 2): ?>
	                                                        	Pembayaran Di Terima
	                                                        <?php endif ?>
	                                                        <?php if ($model->status == 1): ?>
	                                                        	Ticket Telah Di Kirim
	                                                        <?php endif ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        </div>

                                        <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Detail Order:</h5>

                                        <div style="margin:0 0 20px;padding:0">
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">First Name:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->first_name ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Last Name:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->last_name ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">No KTP:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->ktp ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Telepon:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->phone ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Email:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->email ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Address:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->address ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">City:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->city ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Post Code:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->post_code ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">State:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $model->state ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Comments:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo nl2br($model->comment) ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <td valign="top" style="margin:0;padding:0 10px 0 0;width:75%">

                                        <span style="font-size:12px;margin-bottom:6px;display:inline-block">
                                            <b><?php echo Yii::t('mail', 'Hubungi') ?> <span class="lG"><?php echo Yii::app()->name; ?></span></b> <br>
                                            Phone: 081 2351 72261  <br>
                                        </span>
                                        <?php /*
                                        <div style="text-align:left">
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/itunes.apple.com?p%3DeyJzIjoiUHRJN2I2TDY4Vm5MdFF0WS1wekhSUm5FU2c0IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL2l0dW5lcy5hcHBsZS5jb21cXFwvdXNcXFwvYXBwXFxcL3Rva29wZWRpYVxcXC9pZDEwMDEzOTQyMDE_bHM9MSZtdD04XCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI5MjQxODEyYzZmMTU0NzA3ODE0ZWI3OGUzYThiZWQ5OWMzZWQ2Mjg0XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNF6o8QgWebBcF7--ThZIK1M3AQJ6Q" target="_blank" href="http://mandrillapp.com/track/click/12090311/itunes.apple.com?p=eyJzIjoiUHRJN2I2TDY4Vm5MdFF0WS1wekhSUm5FU2c0IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL2l0dW5lcy5hcHBsZS5jb21cXFwvdXNcXFwvYXBwXFxcL3Rva29wZWRpYVxcXC9pZDEwMDEzOTQyMDE_bHM9MSZtdD04XCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI5MjQxODEyYzZmMTU0NzA3ODE0ZWI3OGUzYThiZWQ5OWMzZWQ2Mjg0XCJdfSJ9" style="color:#008000"><img alt="Download iOS App" style="border:0;min-height:auto;max-width:120px;outline:0" src="https://ci3.googleusercontent.com/proxy/mow-rlkbJjvXETkuK0phOMqdlK6JhErtD8jeMjd80-BHl9Zj2lFze7s3ejODNAtRiW67oLp4FtPIB4_fCppMo7_890J2Kfc8vTsfBMI=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/apple-download.png"></a>
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/play.google.com?p%3DeyJzIjoic0VISmk1cWphSVVQQURIcWU5WGEtc1hlQUZzIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3BsYXkuZ29vZ2xlLmNvbVxcXC9zdG9yZVxcXC9hcHBzXFxcL2RldGFpbHM_aWQ9Y29tLnRva29wZWRpYS50a3BkJmhsPWVuXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCJhZGEyYzFiZjNlZWYwMDI0NzAzYjJiNTdmMmNmMjc3YTU2MDIyYjU1XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNGcyvjK2yB6OlYm7SOAOhnYoQAqiw" target="_blank" href="http://mandrillapp.com/track/click/12090311/play.google.com?p=eyJzIjoic0VISmk1cWphSVVQQURIcWU5WGEtc1hlQUZzIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3BsYXkuZ29vZ2xlLmNvbVxcXC9zdG9yZVxcXC9hcHBzXFxcL2RldGFpbHM_aWQ9Y29tLnRva29wZWRpYS50a3BkJmhsPWVuXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCJhZGEyYzFiZjNlZWYwMDI0NzAzYjJiNTdmMmNmMjc3YTU2MDIyYjU1XCJdfSJ9" style="color:#008000"><img alt="Download Android App" style="border:0;min-height:auto;max-width:120px;outline:0" src="https://ci5.googleusercontent.com/proxy/2x1UnJnjiQxKNKMf1XswuulERktxkS5zM1D8JpJtorufw1Q2JCju4axF4eMLiEhUKuv3NKzsb3bFYFaVQ3mZ2dUveWnQz1E6Zihn-LtfJQ=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/android-download.png"></a>
                                        </div>
                                        */ ?>
                                    </td>
                                    <td valign="top" style="margin:0;padding:0">

                                        <span style="font-size:12px;margin-bottom:6px;display:inline-block"><?php echo Yii::t('mail', 'Ikuti Kami') ?>
</span>

                                        <div style="text-align:left">
                                            <a target="_blank" style="color:#008000;display:inline-block" href="<?php echo $this->setting['url_facebook'] ?>"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Facebook" src="<?php echo $baseUrl ?>/asset/images/icon-facebook.png"></a>
                                            <a target="_blank" style="color:#008000;display:inline-block" href="<?php echo $this->setting['url_instagram'] ?>"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Instagram" src="<?php echo $baseUrl ?>/asset/images/icon-instagram.png"></a>
                                            <?php /*
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/twitter.com?p%3DeyJzIjoiaFVOemV4WUtXWEdrSjh0U1lqZWdYSXBHQ3F3IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdHdpdHRlci5jb21cXFwvdG9rb3BlZGlhXFxcL1wiLFwiaWRcIjpcImEwNTY3OTMxZjUyOTRmMDA4MmRjNGJlNWZmYmJmMWE1XCIsXCJ1cmxfaWRzXCI6W1wiMWEyZTVlODdmZjI4N2IwMzAyZGFkNjVmYTFkOWU0NzU1MzAzN2EwZlwiXX0ifQ&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNE4kU-8Fxx5Knbj73Ke8pgw1vwhUg" target="_blank" style="color:#008000;display:inline-block" href="http://mandrillapp.com/track/click/12090311/twitter.com?p=eyJzIjoiaFVOemV4WUtXWEdrSjh0U1lqZWdYSXBHQ3F3IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdHdpdHRlci5jb21cXFwvdG9rb3BlZGlhXFxcL1wiLFwiaWRcIjpcImEwNTY3OTMxZjUyOTRmMDA4MmRjNGJlNWZmYmJmMWE1XCIsXCJ1cmxfaWRzXCI6W1wiMWEyZTVlODdmZjI4N2IwMzAyZGFkNjVmYTFkOWU0NzU1MzAzN2EwZlwiXX0ifQ"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Twitter" src="https://ci5.googleusercontent.com/proxy/-8wtK8UCwzgYf5r7ap2pOwgzm80lU2Rgr-FwOsUB0ZUkt96Cp_Cqn3UnIjzdnxVN7F8cBbt6y7XQoBqLZk95pTaRicik7Q=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/twitter.png"></a>
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/gplus.to?p%3DeyJzIjoiNExLUk1BSy1YRm5meHVRbm5PZGstY3loakhNIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvZ3BsdXMudG9cXFwvdG9rb3BlZGlhXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI1MjdiYjU0MjdmZGUyNTIxZmFiNmMyYWU4YWY0NWQ0Zjk0YzRjYjk5XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNEZfJpQq_cpriVwv2W1vNWDuFuazQ" target="_blank" style="color:#008000;display:inline-block" href="http://mandrillapp.com/track/click/12090311/gplus.to?p=eyJzIjoiNExLUk1BSy1YRm5meHVRbm5PZGstY3loakhNIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvZ3BsdXMudG9cXFwvdG9rb3BlZGlhXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI1MjdiYjU0MjdmZGUyNTIxZmFiNmMyYWU4YWY0NWQ0Zjk0YzRjYjk5XCJdfSJ9"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Google Plus" src="https://ci6.googleusercontent.com/proxy/W-I_th7pkNgG9aiQPXzB6HeDi0Rsg7rpvo-FYkluJv4CqZOeVKBUj01VOEiyTc-mzJKqOeDqhvfKkMC0AOMzuYtOscqHmPd89dQ=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/google-plus.png"></a>
                                            */ ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;background-color:#f7f7f7;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <?php /*
                                    <td valign="middle" style="margin:0;padding:0;width:7%"><img alt="Mascot <?php echo Yii::app()->name ?>" style="border:0;min-height:auto;width:41px;outline:0" src="https://ci3.googleusercontent.com/proxy/M5Wa2sXn-ww54cW0Q7cs8swuyUmJmbj4UUcz23zINirnroSu9FRxReISsFpTIHGkHWB32RlSkbrgCtZ3NK7gNsN2NNmYtpWiGkC2Vo5FEOnqwmj94FGsrw=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/buble-owl-color-tokopedia.png">
                                    </td>
                                    */ ?>
                                    <td valign="middle" style="margin:0;padding:0;width:53%">

                                        <p style="color:#91908e;font-size:10px;line-height:150%;font-weight:normal;margin:0px;padding:0px"><?php echo Yii::t('mail', 'Jika butuh bantuan, gunakan halaman') ?> <a target="_blank" style="color:#0f990f;text-decoration:none;margin:0;padding:0" href="<?php echo $url.CHtml::normalizeUrl(array('/home/index')); ?>"><?php echo Yii::t('mail', 'Kontak Kami') ?></a>.<br style="margin:0;padding:0"><?php echo date('Y') ?> &copy;

                                            <span class="lG"><?php echo Yii::app()->name; ?></span></p>
                                    </td>
                                    <td valign="middle" style="width:40%">

                                        <div style="text-align:right"><img alt="<?php echo Yii::app()->name; ?>" style="max-width: 120px;" src="<?php echo $baseUrl ?>/../asset/images/logo-web-decibles.png">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
</div>
