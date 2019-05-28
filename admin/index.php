<?php
require '../db.func.php';
require '../tools.func.php';
require 'auth.php';
//1.查询数据库 imooc_admin
//2.写sql语句
$prefix = getDBPrefix();
$sql = "SELECT id,adminuser,created_at,login_at,login_ip 
				FROM {$prefix}admin ORDER BY created_at DESC";
$data = query($sql);
//3.遍历数据

require 'header.php';
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">所有管理员</h4>
				<p class="card-category"> 控制台所有管理员列表</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class=" text-primary">
						<th>
							ID
						</th>
						<th>
							用户名
						</th>
						<th>
							创建时间
						</th>
						<th>
							最后登录时间
						</th>
						<th>
							最后登录IP
						</th>
						</thead>
						<tbody>
						<?php foreach ($data as $admin): ?>
						<tr>
							<td>
								<?php echo $admin['id']; ?>
							</td>
							<td>
                <?php echo $admin['adminuser']; ?>
							</td>
							<td>
                <?php echo $admin['created_at']; ?>
							</td>
							<td>
                <?php echo $admin['login_at']; ?>
							</td>
							<td>
                <?php echo long2ip($admin['login_ip']); ?>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require 'footer.php';
?>
