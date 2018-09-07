<div class="border-black">
	<div align="center" style="max-width: 400px;">
		<form action="#" onsubmit="hitung_minum(); return false;" id="form_submit_minum">
			<div class="padding-40 padding-bottom-5 padding-top-20">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="265" height="101">
			<div class="height-20"></div>
			<label for="">Masukkan berat badan (dalam kilogram)</label>
			<input type="text" name="form_bb" id="form_bb" onchange="hitung_minum(); return false;" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<label for="">Hasil</label>
			<input type="text" name="form_minum" id="form_minum" class="form-control" style="width: 200px;">
			<div class="height-10"></div>
			<button type="submit" class="btn btn-add-to-cart" onclick="hitung_minum(); return false;">
	            Kalkulasi
	        </button>
			<div class="height-10"></div>
			<p>Setiap kg berat badan anda = 1 oz water
1 oz = 29.57 ml air putih</p>

	        <div class="height-30"></div>
        </form>
	</div>
</div>
<script type="text/javascript">

function hitung_minum () {
	var post = $('#form_submit_minum').serializeArray();

	var bb = post['0'].value;

	bmr = bb * 29.57;

	$('#form_minum').val( bmr + ' ml' );
}
// Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years )
// Men: BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )

</script>