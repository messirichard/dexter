<div class="border-black">
	<div align="center" style="max-width: 400px;">
		<form action="#" onsubmit="hitung_bmi(); return false;">
			<div class="padding-40 padding-bottom-5 padding-top-20">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="265" height="101">
			<div class="height-20"></div>
			<label for="">Masukkan berat badan (dalam kilogram)</label>
			<input type="text" name="form[bb]" id="form_bb" onchange="hitung_bmi(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Masukkan tinggi badan (dalam meter)</label>
			<input type="text" name="form[tb]" id="form_tb" onchange="hitung_bmi(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Hasil</label>
			<input type="text" name="form[bmi]" id="form_bmi" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<button type="submit" class="btn btn-add-to-cart" onclick="hitung_bmi(); return false;">
	            Hitung BMI
	        </button>
			<div class="height-10"></div>
	        <p>BMI dapat digunakan untuk menunjukkan jika Anda kelebihan berat badan, obesitas, kurus atau normal. Sebuah skor BMI yang sehat adalah antara 20 dan 25 Skor di bawah 20 menunjukkan bahwa Anda mungkin kekurangan berat badan.; nilai di atas 25 menunjukkan bahwa Anda mungkin kelebihan berat badan.</p>

			<p>* Hasil BMI dari kalkulator ini hanyalah sebagai referensi anda, karena banyak faktor yang dapat mempengaruhi berat badan anda seperti besarnya otot anda. </p>

	        <div class="height-30"></div>
        </form>
	</div>
</div>
<script type="text/javascript">

function hitung_bmi () {

	var bb = $('#form_bb').val();
	var tb = $('#form_tb').val();

	var bmi = bb / ( tb * tb );
	$('#form_bmi').val( bmi );
}
// BMI = ( Berat badan dalam Kilograms / ( Tinggi dalam Meter x Tinggi dalam Meter ) )

</script>