<?php
require '../tools.func.php';
require '../db.func.php';
// 1. 接收get id
$id = intval($_GET['id']);
// 2. 判断 get id，如果id不存，跳回到首页
if (empty($id)) {
	header('location: index.php');
}
// 3. 根据ID 查询对应的商品
$prefix = getDBPrefix();
$sql = "SELECT id, name, price, description
				FROM {$prefix}product WHERE id = '$id'";
$current_product = queryOne($sql);
// 4. 将数据写入到页面当中
require 'header.php';
?>
<!-- Start Product Details -->
<section class="htc__product__details pt--120 pb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
				<div class="product__details__container">
					<div class="product__big__images" style="width: 100%;max-width: 100%">
						<div class="portfolio-full-image tab-content">
							<div role="tabpanel" class="tab-pane fade in active">
								<img width="100%" src="assets/uploads/default.jpeg" alt="full-image">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 smt-30 xmt-30">
				<div class="htc__product__details__inner">
					<div class="pro__detl__title">
						<h2><?php echo $current_product['name']; ?></h2>
					</div>
					<div class="pro__details">
						<p><?php echo mb_substr($current_product['description'], 0, 50, 'utf-8') . '...'; ?></p>
					</div>
					<ul class="pro__dtl__prize">
						<li>￥<?php echo $current_product['price']; ?></li>
					</ul>
					<div class="product-action-wrap">
						<div class="prodict-statas"><span>数量 :</span></div>
						<div class="product-quantity">
							<form id='myform' method='GET' action='cart_add.php'>
								<input type="hidden" name="product_id" value="<?php echo $id; ?>">
								<div class="product-quantity">
									<div class="cart-plus-minus">
										<input class="cart-plus-minus-box" type="text" name="quantity" value="1">
									</div>
								</div>
							</form>
						</div>
					</div>
					<ul class="pro__dtl__btn">
						<li class="buy__now__btn"><a href="javascript:document.getElementById('myform').submit();">加入购物车</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Product Details -->
<!-- Start Product tab -->
<section class="htc__product__details__tab bg__white pb--120">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				<ul class="product__deatils__tab mb--60" role="tablist">
					<li role="presentation" class="active">
						<a href="#description" role="tab" data-toggle="tab">商品描述</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="product__details__tab__content">
					<!-- Start Single Content -->
					<div role="tabpanel" id="description" class="product__tab__content fade in active">
						<div class="product__description__wrap">
							<div class="product__desc">
								<h2 class="title__6">详情</h2>
								<p><?php echo $current_product['description']; ?></p>
							</div>
						</div>
					</div>
					<!-- End Single Content -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Product tab -->
<div class="only-banner ptb--10 bg__white">
</div>
<?php
require 'footer.php';
?>