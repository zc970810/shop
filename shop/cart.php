<?php
require '../tools.func.php';
require '../db.func.php';
require 'auth.php';
// 1. 从数据表当中查询购物车数据
$uid = getSession('id', 'shop');
$prefix = getDBPrefix();
$sql = "SELECT id,price,products,quantity 
				FROM {$prefix}cart WHERE uid = '$uid'";
$cart_page_data = queryOne($sql);
$cart_page_data['products'] = json_decode($cart_page_data['products'], true);
// 2. 遍历数据到页面


require 'header.php';
?>
<div class="cart-main-area bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php if (hasInfo()) echo getInfo(); ?>
				<form action="#">
					<div class="table-content table-responsive">
						<table>
							<thead>
							<tr>
								<th class="product-thumbnail"></th>
								<th class="product-name">商品名称</th>
								<th class="product-price">单价</th>
								<th class="product-quantity">数量</th>
								<th class="product-subtotal">总计</th>
								<th class="product-remove">编辑</th>
							</tr>
							</thead>
							<tbody>
							<?php if (!empty($cart_page_data)): ?>
							<?php foreach ($cart_page_data['products'] as $pid => $cart_product): ?>
							<tr>
								<td class="product-thumbnail">
									<a href="product_details.php?id=<?php echo $pid ?>">
										<img src="assets/uploads/default.jpeg" alt="product img"/>
									</a>
								</td>
								<td class="product-name">
									<a href="product_details.php?id=<?php echo $pid ?>">
										<?php echo $cart_product['product']['name']; ?>
									</a>
								</td>
								<td class="product-price">
									<span class="amount">￥<?php echo $cart_product['product']['price']; ?></span>
								</td>
								<td class="product-quantity">
									<input type="number" disabled value="<?php echo $cart_product['quantity']; ?>"/>
								</td>
								<td class="product-subtotal">￥<?php echo $cart_product['product']['price'] * $cart_product['quantity']; ?></td>
								<td class="product-remove"><a href="cart_del.php?product_id=<?php echo $pid; ?>">X</a></td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-8 col-sm-7 col-xs-12">
							<div class="buttons-cart">
								<a href="index.php">继续购物</a>
							</div>

						</div>
						<div class="col-md-4 col-sm-5 col-xs-12">
							<div class="cart_totals">
								<table>
									<tbody>
									<tr class="cart-subtotal">
										<th>小计</th>
										<td><span class="amount">￥<?php echo isset($cart_page_data['price']) ? $cart_page_data['price'] : '0.0' ?></span></td>
									</tr>
									<tr class="shipping">
										<th>快递</th>
										<td>
											<ul id="shipping_method">
												<li>
													<input type="radio" checked/>
													<label>
														包邮
													</label>
												</li>
												<li></li>
											</ul>
										</td>
									</tr>
									<tr class="order-total">
										<th>总价</th>
										<td>
											<strong><span class="amount">￥<?php echo isset($cart_page_data['price']) ? $cart_page_data['price'] : '0.0' ?></span></strong>
										</td>
									</tr>
									</tbody>
								</table>

								<div class="wc-proceed-to-checkout" style="clear: both;">
									<a href="checkout.php">去付款</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="only-banner ptb--10 bg__white">
</div>
<?php
require 'footer.php';
?>