<?php 
		
		$datathumb = array(
				'alupanel1.jpg',
				 'alupanel-xt.jpg',
				 'mdf2.jpg',
				 'MDF-shelves.jpg',
				 'prodotti-33173-rel75d7a971-e271-4e92-8003-d598a2e3fa0a.jpg',
				 'timbee-2.jpg',
		);
		
		$jumlah_data = count($datathumb);
		
		$datathumb = array_chunk($datathumb, 5);
		$id = $_GET['id'];
		$str = '';
	foreach($datathumb[$id] as $val){
		$str .= "<div class='foto-gallery-thumb'><a href='image.php/$val?width=348&amp;height=227&amp;cropratio=348:227&amp;image=/images/gmbr/$val' data-img='$val' class='link_dt_thumb'><img src='image.php/$val?width=62&amp;height=62&amp;cropratio=62:62&amp;image=/images/gmbr/$val' /></a></div>";
	}
	$data = array(
		'jml' => $jumlah_data,
		'str'    => $str,
	);
	
	echo json_encode($data);
?>