<?php
require '../db.func.php';
require '../tools.func.php';
require 'auth.php';
// 1. 接收id
$id = intval($_GET['id']);
if (empty($id)) {
	header('location: users.php');
}
// 2. 根据id查询用户
$prefix = getDBPrefix();
$sql = "SELECT id,username,age,email,phone,name 
				FROM {$prefix}user WHERE id = '$id'";
$current_user = queryOne($sql);
if (empty($current_user)) {
  header('location: users.php');
}
// 3. 将查询出的用户的数据放入到表单当中
// 4. 判断是否为post提交
if (!empty($_POST['name'])) {
  // 5. 接收post数据
	$name = htmlentities($_POST['name']);
	$age = htmlentities($_POST['age']);
	$email = htmlentities($_POST['email']);
	$phone = htmlentities($_POST['phone']);
	// 6. 更新数据记录
	$sql = "UPDATE {$prefix}user 
					SET name = '$name', age = '$age', email = '$email', phone = '$phone'
					WHERE id = '$id'";
	if (execute($sql)) {
    $current_user = array_merge($current_user, $_POST);
		setInfo('更新成功');
	} else {
		setInfo('更新失败');
	}
	// 7. 显示结果
}


require 'header.php';
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">修改用户</h4>
				<p class="card-category">修改一个用户</p>
			</div>
			<div class="card-body">
				<?php if (hasInfo()) echo getInfo(); ?>
				<form action="user_edit.php?id=<?php echo $id; ?>" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">用户名</label>
								<input type="text" name="username" value="<?php echo $current_user['username']; ?>" disabled class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">姓名</label>
								<input type="text" name="name" value="<?php echo $current_user['name']; ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">年龄</label>
								<input type="number" name="age" value="<?php echo $current_user['age']; ?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">联系电话</label>
								<input type="text" name="phone" value="<?php echo $current_user['phone']; ?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="bmd-label-floating">电子邮箱</label>
								<input type="email" name="email" value="<?php echo $current_user['email']; ?>" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary pull-right">更新信息</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php
require 'footer.php';
?>