<?php
require '../tools.func.php';
require '../db.func.php';
require 'auth.php';
if (!empty($_POST['username'])) {
	// 1. 接收post数据
	$username = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);
	$confirmpass = htmlentities($_POST['confirmpass']);
	$name = htmlentities($_POST['name']);
	$age = htmlentities($_POST['age']);
	$email = htmlentities($_POST['email']);
	$phone = htmlentities($_POST['phone']);
	$created_at = date('Y-m-d H:i:s');
	$prefix = getDBPrefix();
	// 2. 验证密码输入是否一致
	if ($password != $confirmpass) {
		setInfo('两次密码输入不一致');
	} else {
		$password = md5($password);
    // 3. 写sql语句
		$sql = "INSERT INTO {$prefix}user(username, password, age, name, email, phone, created_at)
						VALUES('$username', '$password', '$age', '$name', '$email', '$phone', '$created_at')";
    // 4. 执行添加，如果成功，显示成功信息
		if (execute($sql)) {
			setInfo('添加成功');
		} else {
      setInfo('添加失败');
		}
	}

}


require 'header.php';
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">添加用户</h4>
				<p class="card-category">添加一个用户</p>
			</div>
			<div class="card-body">
				<?php if (hasInfo()) echo getInfo(); ?>
				<form action="user_add.php" method="post">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="bmd-label-floating">用户名</label>
								<input type="text" name="username" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="bmd-label-floating">密码</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="bmd-label-floating">确认密码</label>
								<input type="password" name="confirmpass" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">姓名</label>
								<input type="text" name="name" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">年龄</label>
								<input type="number" name="age" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">联系电话</label>
								<input type="text" name="phone" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">电子邮箱</label>
								<input type="email" name="email" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary pull-right">添加用户</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php
require 'footer.php';
?>
