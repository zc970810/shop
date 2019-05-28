<?php
require '../tools.func.php';
require 'auth.php';
require '../db.func.php';
$prefix = getDBPrefix();
$sql = "SELECT id, uid, price, quantity, created_at 
				FROM {$prefix}order ORDER BY created_at DESC";
$orders = query($sql);
require 'header.php';
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<div class="row">
					<div class="col-12">
						<h4 class="card-title ">所有订单</h4>
						<p class="card-category"> 所有订单列表</p>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead class=" text-primary">
						<th>
							ID
						</th>
						<th>
							下单用户
						</th>
						<th>
							订单价格
						</th>
						<th>
							订单商品数量
						</th>
						<th>
							下单时间
						</th>
						</thead>
						<tbody>
						<?php foreach($orders as $order): ?>
						<tr>
							<td>
								<?php echo $order['id']; ?>
							</td>
							<td>
                <?php echo $order['uid']; ?>
							</td>
							<td>
                <?php echo $order['price']; ?>
							</td>
							<td>
                  <?php echo $order['quantity']; ?>
							</td>
							<td>
                <?php echo $order['created_at']; ?>
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