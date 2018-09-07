<div class="border-black">
	<div align="center">
		<form action="<?php echo CHtml::normalizeUrl(array('/profile/login')); ?>" method="post">
			<div class="padding-40 padding-bottom-5">
			<div class="height-10"></div>
			<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-gallery-fitness-header.png" alt="" width="261" height="97">
			<div class="height-10"></div>
			<label for="">Username</label>
			<input type="text" name="LoginForm[username]" class="form-control search-form-textbox" style="width: 200px;">
			<label for="">Password</label>
			<input type="password" name="LoginForm[password]" class="form-control search-form-textbox" style="width: 200px;">
			<p><a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Forgot Password?</a></p>
			<button type="submit" class="btn btn-add-to-cart">
	            Login
	        </button>
        </form>
        or
		</div>
        <div class="back-black">
		    <img alt="" src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon-facebook.png">
	        <a href="<?php echo CHtml::normalizeUrl(array('')); ?>">Login Facebook</a>
        </div>
	</div>
</div>