<?php
require '../tools.func.php';
require 'auth.php';
require '../db.func.php';
// 1. 判断是否为post提交
if (!empty($_POST['name'])) {
  // 2. 接收post数据
	$name = htmlentities($_POST['name']);
	$code = htmlentities($_POST['code']);
	$price = doubleval($_POST['price']);
	$stock = intval($_POST['stock']);
	$description = htmlentities($_POST['description']);
	$created_at = date('Y-m-d H:i:s');
	// 3. 写sql语句
	$prefix = getDBPrefix();
	$sql = "INSERT INTO {$prefix}product(name, code, price, stock, description, created_at)
					VALUES('$name', '$code', '$price', '$stock', '$description', '$created_at')";
	// 4. 执行插入
	if (execute($sql)) {
		setInfo('添加成功');
	} else {
    setInfo('添加失败');
	}
	// 5. 显示结果
}


require 'header.php';
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">添加商品</h4>
				<p class="card-category">添加一个商品</p>
			</div>
			<div class="card-body">
				<?php if (hasInfo()) echo getInfo(); ?>
				<form action="product_add.php" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">商品名称</label>
								<input type="text" name="name" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">商品单价</label>
								<input type="number" name="price" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">商品库存</label>
								<input type="number" name="stock" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="bmd-label-floating">商品编号</label>
								<input type="text" name="code" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>商品描述</label>
								<div class="form-group bmd-form-group">
									<textarea name="description" class="form-control" rows="5"></textarea>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary pull-right">添加商品</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>

</div>
<?php
require 'footer.php';
?>
