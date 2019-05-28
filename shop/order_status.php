<?php
require '../tools.func.php';
require '../db.func.php';
require 'auth.php';
require 'header.php';
?>
<div class="cart-main-area bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;padding: 50px;">
				<h1 style="color: green;"><?php if (hasInfo()) echo getInfo(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="only-banner ptb--10 bg__white">
</div>
<?php
require 'footer.php';
?>
