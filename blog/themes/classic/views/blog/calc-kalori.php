<div class="border-black">
	<div align="center" style="max-width: 500px;">
		<form action="#" onsubmit="hitung_kalori(); return false;" id="form_submit_bmr">
			<div class="padding-40 padding-bottom-5 padding-top-20">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="265" height="101">
			<div class="height-20"></div>
			<label for="">Pilih kategori anda:</label><br>
			<input type="radio" name="form_kategori" id="form_kategori" value="0"> If you are sedentary (little or no exercise) <br>
			<input type="radio" name="form_kategori" id="form_kategori" value="1"> If you are lightly active (light exercise/sports 1-3 days/week) <br>
			<input type="radio" name="form_kategori" id="form_kategori" value="2"> If you are moderatetely active (moderate exercise/sports 3-5 days/week) <br>
			<input type="radio" name="form_kategori" id="form_kategori" value="3"> If you are very active (hard exercise/sports 6-7 days a week) <br>
			<input type="radio" name="form_kategori" id="form_kategori" value="4"> If you are extra active (very hard exercise/sports & physical job or 2x training) <br>
			<div class="height-10"></div>
			<label for="">BMR (Hitung nilai BMR anda terlebih dahulu)</label>
			<input type="text" name="form_bmr" id="form_bmr" onchange="hitung_kalori(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Hasil</label>
			<input type="text" name="form_kalori" id="form_kalori" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<button type="submit" class="btn btn-add-to-cart" onclick="hitung_kalori(); return false;">
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

function hitung_kalori () {
	var post = $('#form_submit_bmr').serializeArray();

	var kategori = post['0'].value;
	var bmr = post['1'].value;
	// alert(jk);
	if (kategori == 0) { // laki-laki
	kalori = bmr * 1.2;
	} else if(kategori == 1) { //perempuan
	kalori = bmr * 1.375;
	} else if(kategori == 2) { //perempuan
	kalori = bmr * 1.55;
	} else if(kategori == 3) { //perempuan
	kalori = bmr * 1.725;
	} else if(kategori == 4) { //perempuan
	kalori = bmr * 1.9;
	} else { //perempuan
	kalori = bmr * 1.9;
	};
	// alert(bmr);
	$('#form_kalori').val( kalori );
}
// If you are sedentary (little or no exercise) : 
// Calorie-Calculation = BMR x 1.2


// If you are lightly active (light exercise/sports 1-3 days/week) : 
// Calorie-Calculation = BMR x 1.375

// If you are moderatetely active (moderate exercise/sports 3-5 days/week) : 
// Calorie-Calculation = BMR x 1.55

// If you are very active (hard exercise/sports 6-7 days a week) : 
// Calorie-Calculation = BMR x 1.725

// If you are extra active (very hard exercise/sports & physical job or 2x training) : 
// Calorie-Calculation = BMR x 1.9
</script>