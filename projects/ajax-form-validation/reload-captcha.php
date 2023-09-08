<?php
require_once __DIR__ . '/create-captcha.php';
?>

<div>
  <img class="captcha" src="<?php echo createCaptcha(); ?>" alt="">
  <i id="reload_captcha" class="fa-solid fa-rotate-right" style="cursor:pointer; font-size: 1.2rem"></i>
</div>
<input type="text" id="captcha" name="captcha" placeholder="Please re-enter the captcha">