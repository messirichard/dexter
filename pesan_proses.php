<?php
$berhasil = $_SESSION['data'];
include_once("PHPMailer/class.phpmailer.php");
		// nama,  telp,   kota,  jenis_pekerjaan,  ukuran, email,  alamat,  propinsi,  bahan,  jumlah,  perkiraan_biaya,  image_for_up,  file_cs
		$dataBahanT = array(
						// 1
						'md9' => array(
						'text'=>'MDF 9 mm',
						'harga' => '250000',
						),
						'md12' => array(
						'text'=>'MDF 12 mm',
						'harga' => '300000',
						),
						'md15'=>array(
						'text'=>'MDF 15 mm',
						'harga'=> '350000',
						),
						'md18'=>array(								
						'text'=>'MDF 18 mm',
						'harga'=> '400000',
						),
						
						'pv9'=>array(
						'text'=>'PVC 9 mm',
						'harga' => '250000',
						),
						'pv12'=>array(
						'text'=>'PVC 12 mm',
						'harga' => '300000',
						),
						'pv15'=>array(
						'text'=>'PVC 15 mm',
						'harga'=> '350000',
						),
						'pv18'=>array(
						'text'=>'PVC 18 mm',
						'harga'=> '400000',
						),
						
						
						// 2
						'ak2'=>array(
						'text'=>'Akrilik 2 mm',
						'harga'=>'260470',
						),
						'ak3'=>array(
						'text'=>'Akrilik 3 mm',
						'harga'=>'334890',
						),
						'ak5'=>array(
						'text'=>'Akrilik 5 mm',
						'harga'=>'595360',
						),
						'ak10'=>array(
						'text'=>'Akrilik 10 mm',
						'harga'=>'1488400',
						),
						'ak20'=>array(
						'text'=>'Akrilik 20 mm',
						'harga'=>'2604700',
						),
						
						// 3
						'acp4'=>array(
						'text'=>'ACP 4 / 5 mm',
						'harga'=>'300000',
						),
								
					);
							   
if($_POST['b_submit_0']!=''){
	require("inc/validator/FormValidator.php");
	$fv = new FormValidator($_POST);
	$fv->doValidation();
  if($fv->isError()){
    $error = ($fv->getErrorBox());
	$input = $_POST ;
	
  }else{
	  // t_nama_1, t_telp_7, t_email_2, t_alamat_1, t_jenis_pekerjaan_1, s_bahan_1, s_ukuran_1, t_jumlah_7 , t_kota_1,
$nama = htmlspecialchars(trim($_POST['t_nama_1']));
$telp = htmlspecialchars(trim($_POST['t_telp_7']));
$kota = htmlspecialchars(trim($_POST['t_kota_1']));
$jenis_pekerjaan = htmlspecialchars(trim($_POST['t_jenis_pekerjaan_1']));
$email = htmlspecialchars(trim($_POST['t_email_2']));
$alamat = htmlspecialchars(trim($_POST['t_alamat_1']));
$propinsi = htmlspecialchars(trim($_POST['propinsi']));
//$ukuran = htmlspecialchars(trim($_POST['s_ukuran_1']));
if($_POST['s_ukuran_1'] == 1): $ukuran = '1,22 x 2,44 mm'; else: $ukuran = '1,22 x 1,22 mm'; endif;
$bhn = ''; 
foreach ($dataBahanT as $key => $value) {
	if($key.'-'.$value['harga'] == $_POST['s_bahan_1']){
		$bhn = $value['text'];
	}
}

$bahan = $bhn;
$jumlah = htmlspecialchars(trim($_POST['t_jumlah_7']));

$perkiraan_biaya = $_POST['t_biaya2_0'];
//$image_for_up = htmlspecialchars(trim($_POST['image_for_up']));
//$file_cs = htmlspecialchars(trim($_POST['file_cs']));

// subject
$subject = 'Email Order From '.$email;

//upload file
function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = dirname(__FILE__)."/f_desain/";
  $vfile_upload = $vdir_upload . $fupload_name;
  //echo $vfile_upload;
  move_uploaded_file($_FILES["files"]["tmp_name"], $vfile_upload);
}

  $lokasi_file = $_FILES['files']['tmp_name'];
  $nama_file   = $_FILES['files']['name'];


  $file_extension = strtolower(substr(strrchr($nama_file,"."),1));

  switch($file_extension){
    //vector
  	case "cdr": $ctype="application/cdr"; break;
    case "ai": $ctype="application/ai"; break;
	case "fh": $ctype="application/fh"; break;
	case "eps": $ctype="application/eps"; break;
	
    case "pdf": $ctype="application/pdf"; break;
    case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
    case "gif": $ctype="image/gif"; break;
    case "png": $ctype="image/png"; break;
    case "jpeg":
    case "jpg": $ctype="image/jpg"; break;
    default: $ctype="application/proses";
  }

  if ($file_extension=='php' or $file_extension=='php5'){
   echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload tidak bertipe *.PHP');
        window.location=('career.html')</script>";
  }
  else{
    UploadFile($nama_file);

// message
$message = '
Nama: '.$nama.'
Telpon: '.$telp.'
Kota: '.$kota.'
Jenis Pekerjaan: '.$jenis_pekerjaan.'
Email: '.$email.'
Alamat: '.$alamat.'
Propinsi: '.$propinsi.'
Bahan: '.$bahan.'
Ukuran: '.$ukuran.'
Jumlah: '.$jumlah.'
Perkiraan Biaya: '.$perkiraan_biaya;

//$tujuan = "ibnudrift@gmail.com";
$tujuan = "info@dextercut.com";
$name_pengirim = $name;
$pengirim = $email;

$letak_file = dirname(__FILE__)."/f_desain/".$nama_file;

$mail = new PHPMailer;
 
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "mail.dextercut.com";
$mail->Port = 26;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "no-reply@dextercut.com"; // SMTP username
$mail->Password = "5-vtceHy{5Mt"; // SMTP password 

$mail->ClearAddresses();
$mail->AddAddress($tujuan, $tujuan);
$mail->From = "no-reply@dextercut.com";
$mail->FromName = "No-reply";
$mail->Subject = $subject;

$mail->IsHTML(true);
$mail->Body = $message;
$mail->AddAttachment($letak_file, $nama_file);

if ($mail->Send())
{
	@unlink(dirname(__FILE__)."/f_desain/".$nama_file);
	$_SESSION['data'] =  'berhasil';
	header('location:pesan_succes.php');
}else{
	echo "<script type='text/javascript'>alert('Email yang anda inputkan tidak valid !');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=pesan.php' />";
}

}

}
}
?>