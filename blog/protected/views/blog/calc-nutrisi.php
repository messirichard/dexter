<div class="border-black">
	<div align="center" style="max-width: 400px;">
		<form action="#" onsubmit="hitung_nutrisi(); return false;" id="form_submit_bmr">
			<div class="padding-40 padding-bottom-5 padding-top-20">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="265" height="101">
			<div class="height-20"></div>
			<label for="">Jenis Kelamin</label><br>
			<input type="radio" name="form_if" id="form_if" value="0"> IF GAINING WEIGHT (1kg/week) <br>
			<input type="radio" name="form_if" id="form_if" value="1"> IF FAT LOSS (1kg/week) 
			<input type="radio" name="form_if" id="form_if" value="2"> IF MAINTAIN <br>
			<div class="height-10"></div>
			<label for="">Masukkan Jumlah Kalori Per Hari</label>
			<input type="text" name="form_kalori" id="form_kalori" onchange="hitung_nutrisi(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Protein Intake (in gr)</label>
			<input type="text" name="form_protein" id="form_protein" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Karbohidrat Intake (in gr)</label>
			<input type="text" name="form_karbohidrat" id="form_karbohidrat" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Fat Intake (in gr)</label>
			<input type="text" name="form_fat" id="form_fat" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<button type="submit" class="btn btn-add-to-cart" onclick="hitung_nutrisi(); return false;">
	            Kalkulasi
	        </button>
			<div class="height-10"></div>
	        <!-- <p>BMI dapat digunakan untuk menunjukkan jika Anda kelebihan berat badan, obesitas, kurus atau normal. Sebuah skor BMI yang sehat adalah antara 20 dan 25 Skor di bawah 20 menunjukkan bahwa Anda mungkin kekurangan berat badan.; nilai di atas 25 menunjukkan bahwa Anda mungkin kelebihan berat badan.</p> -->

			<!-- <p>* Hasil BMI dari kalkulator ini hanyalah sebagai referensi anda, karena banyak faktor yang dapat mempengaruhi berat badan anda seperti besarnya otot anda. </p> -->

	        <div class="height-30"></div>
        </form>
	</div>
</div>
<script type="text/javascript">

function hitung_nutrisi () {
	var post = $('#form_submit_bmr').serializeArray();

	var _if = post['0'].value;
	var kalori = post['1'].value;

	if (_if == 0) { // laki-laki
		protein = ((kalori * 1) + 500) * (30 / 100) / 4;
		karbohidrat = ((kalori * 1) + 500) * (50 / 100) / 4;
		fat = ((kalori * 1) + 500) * (20 / 100) / 9;
	} else if (_if == 1) { //perempuan
		protein = ((kalori * 1) + 500) * (45 / 100) / 4;
		karbohidrat = ((kalori * 1) + 500) * (20 / 100) / 4;
		fat = ((kalori * 1) + 500) * (35 / 100) / 9;
	} else if (_if == 2) { //perempuan
		protein = ((kalori * 1) + 500) * (30 / 100) / 4;
		karbohidrat = ((kalori * 1) + 500) * (40 / 100) / 4;
		fat = ((kalori * 1) + 500) * (30 / 100) / 9;
	};

	$('#form_protein').val( protein );
	$('#form_karbohidrat').val( karbohidrat );
	$('#form_fat').val( fat );
}

</script>