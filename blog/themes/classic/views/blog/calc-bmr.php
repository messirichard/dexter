<div class="border-black">
	<div align="center" style="max-width: 400px;">
		<form action="#" onsubmit="hitung_bmr(); return false;" id="form_submit_bmr">
			<div class="padding-40 padding-bottom-5 padding-top-20">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="265" height="101">
			<div class="height-20"></div>
			<label for="">Jenis Kelamin</label><br>
			<input type="radio" name="form_jk" id="form_jk" value="1"> Laki-Laki
			<input type="radio" name="form_jk" id="form_jk" value="0"> Perempuan
			<div class="height-10"></div>
			<label for="">Masukkan berat badan (dalam kilogram)</label>
			<input type="text" name="form_bb" id="form_bb" onchange="hitung_bmr(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Masukkan tinggi badan (dalam centimeter)</label>
			<input type="text" name="form_tb" id="form_tb" onchange="hitung_bmr(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Masukkan Umur (dalam tahun)</label>
			<input type="text" name="form_umur" id="form_umur" onchange="hitung_bmr(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Hasil</label>
			<input type="text" name="form_bmr" id="form_bmr" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<button type="submit" class="btn btn-add-to-cart" onclick="hitung_bmr(); return false;">
	            Hitung BMR
	        </button>
			<div class="height-10"></div>
	        <!-- <p>BMI dapat digunakan untuk menunjukkan jika Anda kelebihan berat badan, obesitas, kurus atau normal. Sebuah skor BMI yang sehat adalah antara 20 dan 25 Skor di bawah 20 menunjukkan bahwa Anda mungkin kekurangan berat badan.; nilai di atas 25 menunjukkan bahwa Anda mungkin kelebihan berat badan.</p> -->

			<!-- <p>* Hasil BMI dari kalkulator ini hanyalah sebagai referensi anda, karena banyak faktor yang dapat mempengaruhi berat badan anda seperti besarnya otot anda. </p> -->

	        <div class="height-30"></div>
        </form>
	</div>
</div>
<script type="text/javascript">

function hitung_bmr () {
	var post = $('#form_submit_bmr').serializeArray();

	var jk = post['0'].value;
	var bb = post['1'].value;
	var tb = post['2'].value;
	var umur = post['3'].value;
	// alert(jk);
	if (jk == 1) { // laki-laki
	bmr = 66 + ( 13.7 * bb ) + ( 5 * tb ) - ( 6.8 * umur );
	} else { //perempuan
	bmr = 655 + ( 9.6 * bb ) + ( 1.8 * tb ) - ( 4.7 * umur );
	};
	// alert(bmr);
	$('#form_bmr').val( bmr );
}
// Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
// Men: BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )

</script>