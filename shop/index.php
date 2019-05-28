<?php
require '../tools.func.php';
require '../db.func.php';
// 1. 查询所有商品 imooc_product
// 2. 写sql语句
$prefix = getDBPrefix();
$sql = "SELECT id,name,price FROM {$prefix}product ORDER BY created_at DESC";
$data = query($sql);
// 3. 遍历结果

require 'header.php';
?>
<!-- Start Our Product Area -->
<section class="htc__product__area bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-categories-all">
					<div class="product-categories-title" style="border-bottom: 1px solid rgba(129, 129, 129, 0.2)">
						<h3>所有商品</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($data as $product): ?>
			<div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
				<div style="margin-top: 20px" class="product foo">
					<div class="product__inner">
						<div class="pro__thumb">
							<a href="product_details.php?id=<?php echo $product['id']; ?>">
								<img src="assets/uploads/default.jpeg" alt="product images">
							</a>
						</div>
						<div class="product__hover__info">
							<ul class="product__action">
								<li><a title="加入购物车" href="cart_add.php?product_id=<?php echo $product['id']; ?>&quantity=1"><span class="ti-shopping-cart"></span></a></li>
								<li><a title="查看详情" href="product_details.php?id=<?php echo $product['id']; ?>">查看详情</a></li>
							</ul>
						</div>
					</div>
					<div class="product__details">
						<h2 style="margin-left: 20px;text-align: center;"><a href="product_details.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h2>
						<ul class="product__price">
							<li class="new__price" style="margin: 0 auto;">￥<?php echo $product['price']; ?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End Our Product Area -->
<div class="only-banner ptb--10 bg__white">
</div>
<?php
require 'footer.php';
?>