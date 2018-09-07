<?php
/**
 * Common functions
 * 
 * @author Deory Pandu
 * @link http://con.cept.me
 */
class Common {

    public static function mail($config = array())
    {
        // bila from tidak di setting
        $config['from'] = ($config['from']=='')?'info@decibelsfestivals.com':$config['from'];
        // $config['bcc'] = ( empty($config['bcc']) )? array('deoryzpandu@gmail.com'):$config['bcc'];

        // $config['to'] = ($config['to']=='')?'ibnudrift@gmail.com':$config['to'];
        // echo $config['to']."<br>";
        // echo $config['message'];
        // exit;
        // self::mailMail($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        
        
        self::mailPhpMailer($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        


        // self::mailSmtp($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailTest();
    }
    public static function mailMail($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        $to = ( is_array($to) )? implode(', ', $to) : $to;
        $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
        $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;
        //$to = 'deory <deoryzpandu@gmail.com>';
        //$from = 'no-reply <no-reply@markdesign.net>';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . " \r\n";
        $headers .= 'From: ' . $from . " \r\n";
        if ($cc!='') {
        $headers .= 'Cc: '. $cc . " \r\n";
        }
        if ($bcc!='') {
        $headers .= 'Bcc: '. $bcc . " \r\n";
        }

        // Mail it
        mail($to, $subject, $message, $headers);
    }
     public function mailSmtp($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
            $to = ( is_array($to) )? implode(', ', $to) : $to;
            $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
            $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;

            $tujuan = "ibnudrift@gmail.com";

            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Mailer = "smtp";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "deo@markdesign.net"; // SMTP username
            $mail->Password = "markdesigndeo"; // SMTP password 
            
            $mail->ClearAddresses();

            $mail->AddAddress($tujuan, $tujuan);

            $mail->From = 'deo@markdesign.net';
            $mail->FromName = 'deo@markdesign.net';
            $mail->AddReplyTo($from, $from);
            $mail->Html = TRUE;
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->Send();
    }

    public static function mailPhpMailer($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        if (is_array($to)) {
            foreach ($to as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($to != '') {
                $mail -> AddReplyTo($to, "Client");
                $mail -> AddAddress($to, "Client");
            }
        }
        if (is_array($cc)) {
            foreach ($cc as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($cc != '') {
                $mail -> AddReplyTo($cc, "Client");
                $mail -> AddAddress($cc, "Client");
            }
        }
        if (is_array($bcc)) {
            foreach ($bcc as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($bcc != '') {
                $mail -> AddReplyTo($bcc, "Client");
                $mail -> AddAddress($bcc, "Client");
            }
        }

        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Mailer = "smtp"; 
        $mail->Host = "decibelsfestivals.com";
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';                  
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = "info@decibelsfestivals.com"; // SMTP username
        $mail->Password = "T_FnXf$9TKsl"; // SMTP password 

        $mail -> SetFrom($from, Yii::app()->name);
        $mail -> Subject = $subject;
        $mail -> AltBody = "To view the message, please use an HTML compatible email viewer!";
        $mail -> MsgHTML($message);
        $mail->Send();
    }

    public function mailTest()
    {
        // multiple recipients
        // $to  = 'deoryzpandu@gmail.com' . ', '; // note the comma
        $to .= 'deoryzpandu@gmail.com';

        // subject
        $subject = 'Birthday Reminders for August';

        // message
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: deory <deoryzpandu@gmail.com>' . "\r\n";
        $headers .= 'From: no-reply <no-reply@markdesign.net>' . "\r\n";
        // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
        exit;
    }

    static public function checkAccess($akses)
    {
        $session=new CHttpSession;
        $session->open();
        $sessionID = $session->getSessionID();

        $auth=Yii::app()->cache->get($sessionID.'getUserAccess');
        if($auth===false)
        {
            $auth = User::model()->getUserAccess();
            Yii::app()->cache->set($sessionID.'getUserAccess',$auth,3600);
        }
        // print_r($akses);echo '|';print_r($auth);echo '|';

        if (isset($auth[$akses]) OR $auth === 'All'){
            return true;
        }else{
            return false;
        }
    }
    static public function createFormDatePick($label='', $name='Date', $type='date', $value = '')
    {
        if ($value == '0000-00-00 00:00:00') {
            $value = date("Y-m-d H:i:s");
        }
        $value = strtotime($value);
        if ($value == 0) {
            $value = strtotime('1910-01-01 00:00:00');
        }

        // Create Year
        $createYear = '<select name="'.$name.'[year]" style="width: auto;">';
        for ($i=date("Y")+10; $i >= date("Y") - 100 ; $i--) { 
            $createYear .= '<option value="'.$i.'" '.((date('Y', $value) == $i) ? 'selected="selected"' : '').'>'.$i.'</option>';
        }
        $createYear .= '</select>';

        // Create month
        $createMonth = '<select name="'.$name.'[month]" style="width: auto;">';
        for ($i=1; $i <= 12 ; $i++) { 
            $createMonth .= '<option value="'.substr('00'.$i, -2).'" '.((date('m', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createMonth .= '</select>';

        // Create Date
        $createDate = '<select name="'.$name.'[date]" style="width: auto;">';
        for ($i=1; $i <= 31 ; $i++) { 
            $createDate .= '<option value="'.substr('00'.$i, -2).'" '.((date('d', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createDate .= '</select>';

        // Create Date
        $createHours = '<input type="text" name="'.$name.'[hours]" value="'.date('H', $value).'" style="width: 20px;"/>';

        // Create Minute
        $createMinute = '<input type="text" name="'.$name.'[minute]" value="'.date('i', $value).'" style="width: 20px;"/>';

        // Create Second
        $createSecond = '<input type="text" name="'.$name.'[second]" value="'.date('s', $value).'" style="width: 20px;"/>';



        $str = '
        <div class="control-group">
            <label for="" class="control-label">
                '.$label.'
            </label>
            <div class="controls">
                '.$createDate.$createMonth.$createYear.$createHours.$createMinute.$createSecond.'
            </div>
        </div>
        ';

        return $str;
    }

    public static function replaceBr($data) {
        $data = preg_replace('#(?:<br\s*/?>\s*?){2,}#', '</p><p>', $data);
        return "<p>$data</p>";
    }

    public static function getVYoutube($url)
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];  
    }
    public static function explodeString($string)
    {
        return explode(',', $string);
    }
    public static function barcode( $filepath="", $text="0", $size="20", $orientation="horizontal", $code_type="code128", $print=false, $SizeFactor=1.5 ) {
        $code_string = "";
        // Translate the $text into barcode the correct $code_type
        if ( in_array(strtolower($code_type), array("code128", "code128b")) ) {
            $chksum = 104;
            // Must not change order of array elements as the checksum depends on the array's key to validate final code
            $code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
            $code_keys = array_keys($code_array);
            $code_values = array_flip($code_keys);
            for ( $X = 1; $X <= strlen($text); $X++ ) {
                $activeKey = substr( $text, ($X-1), 1);
                $code_string .= $code_array[$activeKey];
                $chksum=($chksum + ($code_values[$activeKey] * $X));
            }
            $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];
            $code_string = "211214" . $code_string . "2331112";
        } elseif ( strtolower($code_type) == "code128a" ) {
            $chksum = 103;
            $text = strtoupper($text); // Code 128A doesn't support lower case
            // Must not change order of array elements as the checksum depends on the array's key to validate final code
            $code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","NUL"=>"111422","SOH"=>"121124","STX"=>"121421","ETX"=>"141122","EOT"=>"141221","ENQ"=>"112214","ACK"=>"112412","BEL"=>"122114","BS"=>"122411","HT"=>"142112","LF"=>"142211","VT"=>"241211","FF"=>"221114","CR"=>"413111","SO"=>"241112","SI"=>"134111","DLE"=>"111242","DC1"=>"121142","DC2"=>"121241","DC3"=>"114212","DC4"=>"124112","NAK"=>"124211","SYN"=>"411212","ETB"=>"421112","CAN"=>"421211","EM"=>"212141","SUB"=>"214121","ESC"=>"412121","FS"=>"111143","GS"=>"111341","RS"=>"131141","US"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","CODE B"=>"114131","FNC 4"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
            $code_keys = array_keys($code_array);
            $code_values = array_flip($code_keys);
            for ( $X = 1; $X <= strlen($text); $X++ ) {
                $activeKey = substr( $text, ($X-1), 1);
                $code_string .= $code_array[$activeKey];
                $chksum=($chksum + ($code_values[$activeKey] * $X));
            }
            $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];
            $code_string = "211412" . $code_string . "2331112";
        } elseif ( strtolower($code_type) == "code39" ) {
            $code_array = array("0"=>"111221211","1"=>"211211112","2"=>"112211112","3"=>"212211111","4"=>"111221112","5"=>"211221111","6"=>"112221111","7"=>"111211212","8"=>"211211211","9"=>"112211211","A"=>"211112112","B"=>"112112112","C"=>"212112111","D"=>"111122112","E"=>"211122111","F"=>"112122111","G"=>"111112212","H"=>"211112211","I"=>"112112211","J"=>"111122211","K"=>"211111122","L"=>"112111122","M"=>"212111121","N"=>"111121122","O"=>"211121121","P"=>"112121121","Q"=>"111111222","R"=>"211111221","S"=>"112111221","T"=>"111121221","U"=>"221111112","V"=>"122111112","W"=>"222111111","X"=>"121121112","Y"=>"221121111","Z"=>"122121111","-"=>"121111212","."=>"221111211"," "=>"122111211","$"=>"121212111","/"=>"121211121","+"=>"121112121","%"=>"111212121","*"=>"121121211");
            // Convert to uppercase
            $upper_text = strtoupper($text);
            for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
                $code_string .= $code_array[substr( $upper_text, ($X-1), 1)] . "1";
            }
            $code_string = "1211212111" . $code_string . "121121211";
        } elseif ( strtolower($code_type) == "code25" ) {
            $code_array1 = array("1","2","3","4","5","6","7","8","9","0");
            $code_array2 = array("3-1-1-1-3","1-3-1-1-3","3-3-1-1-1","1-1-3-1-3","3-1-3-1-1","1-3-3-1-1","1-1-1-3-3","3-1-1-3-1","1-3-1-3-1","1-1-3-3-1");
            for ( $X = 1; $X <= strlen($text); $X++ ) {
                for ( $Y = 0; $Y < count($code_array1); $Y++ ) {
                    if ( substr($text, ($X-1), 1) == $code_array1[$Y] )
                        $temp[$X] = $code_array2[$Y];
                }
            }
            for ( $X=1; $X<=strlen($text); $X+=2 ) {
                if ( isset($temp[$X]) && isset($temp[($X + 1)]) ) {
                    $temp1 = explode( "-", $temp[$X] );
                    $temp2 = explode( "-", $temp[($X + 1)] );
                    for ( $Y = 0; $Y < count($temp1); $Y++ )
                        $code_string .= $temp1[$Y] . $temp2[$Y];
                }
            }
            $code_string = "1111" . $code_string . "311";
        } elseif ( strtolower($code_type) == "codabar" ) {
            $code_array1 = array("1","2","3","4","5","6","7","8","9","0","-","$",":","/",".","+","A","B","C","D");
            $code_array2 = array("1111221","1112112","2211111","1121121","2111121","1211112","1211211","1221111","2112111","1111122","1112211","1122111","2111212","2121112","2121211","1121212","1122121","1212112","1112122","1112221");
            // Convert to uppercase
            $upper_text = strtoupper($text);
            for ( $X = 1; $X<=strlen($upper_text); $X++ ) {
                for ( $Y = 0; $Y<count($code_array1); $Y++ ) {
                    if ( substr($upper_text, ($X-1), 1) == $code_array1[$Y] )
                        $code_string .= $code_array2[$Y] . "1";
                }
            }
            $code_string = "11221211" . $code_string . "1122121";
        }
        // Pad the edges of the barcode
        $code_length = 20;
        if ($print) {
            $text_height = 30;
        } else {
            $text_height = 0;
        }
        
        for ( $i=1; $i <= strlen($code_string); $i++ ){
            $code_length = $code_length + (integer)(substr($code_string,($i-1),1));
            }
        if ( strtolower($orientation) == "horizontal" ) {
            $img_width = $code_length*$SizeFactor;
            $img_height = $size;
        } else {
            $img_width = $size;
            $img_height = $code_length*$SizeFactor;
        }
        $image = imagecreate($img_width, $img_height + $text_height);
        $black = imagecolorallocate ($image, 0, 0, 0);
        $white = imagecolorallocate ($image, 255, 255, 255);
        imagefill( $image, 0, 0, $white );
        if ( $print ) {
            imagestring($image, 5, 31, $img_height, $text, $black );
        }
        $location = 10;
        for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
            $cur_size = $location + ( substr($code_string, ($position-1), 1) );
            if ( strtolower($orientation) == "horizontal" )
                imagefilledrectangle( $image, $location*$SizeFactor, 0, $cur_size*$SizeFactor, $img_height, ($position % 2 == 0 ? $white : $black) );
            else
                imagefilledrectangle( $image, 0, $location*$SizeFactor, $img_width, $cur_size*$SizeFactor, ($position % 2 == 0 ? $white : $black) );
            $location = $cur_size;
        }
        
        // Draw barcode to the screen or save in a file
        if ( $filepath=="" ) {
            header ('Content-type: image/png');
            imagepng($image);
            imagedestroy($image);
        } else {
            imagepng($image,$filepath);
            imagedestroy($image);       
        }
    }
}