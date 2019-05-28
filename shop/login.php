<?php
require '../tools.func.php';
require '../db.func.php';
// 判断当前是否为post提交
if (!empty($_POST['username'])) {
	$action = htmlentities($_GET['action']);
  $prefix = getDBPrefix();
	if ($action == 'reg') {
		$username = htmlentities($_POST['username']);
		$password = md5(htmlentities($_POST['password']));
		$email = htmlentities($_POST['email']);

		$created_at = date('Y-m-d H:i:s');
		$sql = "INSERT INTO {$prefix}user(username, password, email, created_at)
						VALUES('$username', '$password', '$email', '$created_at')";
		if (execute($sql)) {
			setInfo('注册成功');
		} else {
			setInfo('注册失败');
		}
	} elseif ($action == 'login') {
		$username = htmlentities($_POST['username']);
		$password = md5(htmlentities($_POST['password']));
		$sql = "SELECT id, username 
						FROM {$prefix}user
						WHERE username = '$username' AND password = '$password'";
		$res = queryOne($sql);
		if ($res) {
			setSession('shop', ['username' => $username, 'id' => $res['id']]);
			header('location: index.php');
		} else {
			setInfo('用户名或者密码错误');
		}
	}
}
// 判断操作为login 还是 reg
// 如果是reg，要接收post数据，插入新数据
// 如果是login，要查询数据库，判断用户名或者密码是否正确，正确的话写入session
// 显示结果

require 'header.php';
?>
	<!-- Start Login Register Area -->
	<div class="htc__login__register bg__white ptb--130">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<ul class="login__register__menu" role="tablist">
						<li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">登录</a></li>
						<li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">注册</a></li>
					</ul>
				</div>
			</div>
			<!-- Start Login Register Content -->
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="htc__login__register__wrap">
						<!-- Start Single Content -->
						<div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
							<p><?php if (hasInfo()) echo getInfo(); ?></p>
							<form id="loginform" class="login" method="post" action="login.php?action=login">
								<input type="text" name="username" placeholder="User Name*">
								<input type="password" name="password" placeholder="Password*">
							</form>

							<div class="htc__login__btn mt--30">
								<a href="javascript:document.getElementById('loginform').submit();">登录</a>
							</div>

						</div>
						<!-- End Single Content -->
						<!-- Start Single Content -->
						<div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
							<p><?php if (hasInfo()) echo getInfo(); ?></p>
							<form id="regform" class="login" action="login.php?action=reg" method="post">
								<input type="text" name="username" placeholder="Name*">
								<input type="email" name="email" placeholder="Email*">
								<input type="password" name="password" placeholder="Password*">
							</form>

							<div class="htc__login__btn">
								<a href="javascript:document.getElementById('regform').submit();">注册</a>
							</div>

						</div>
						<!-- End Single Content -->
					</div>
				</div>
			</div>
			<!-- End Login Register Content -->
		</div>
	</div>
	<!-- End Login Register Area -->

	<div class="only-banner ptb--10 bg__white">
	</div>
<?php
require 'footer.php';
?>