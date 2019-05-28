<?php
$script = basename($_SERVER['SCRIPT_FILENAME']);
// 控制台 index.php admin_edit.php
// 用户管理 users.php user_add.php user_edit.php
// 商品管理 products.php product_add.php product_edit.php
?>
<!doctype html>
<html>

<head>
	<title>慕课商城</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
	      href="assets/css/googlefonts.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- Material Kit CSS -->
	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>
</head>

<body>
<div class="wrapper ">
	<div class="sidebar" data-color="purple" data-background-color="white">
		<div class="logo">
			<a href="index.php" class="simple-text logo-normal">
				慕课商城
			</a>
		</div>
		<div class="sidebar-wrapper">
			<ul class="nav">
				<li class="nav-item <?php echo substr($script, 0, 5) == 'index' || substr($script, 0, 5) == 'admin' ? 'active' : ''; ?>">
					<a class="nav-link" href="index.php">
						<i class="material-icons">dashboard</i>
						<p>控制台</p>
					</a>
				</li>
				<li class="nav-item <?php echo substr($script, 0, 4) == 'user' ? 'active' : ''; ?>">
					<a class="nav-link" href="users.php">
						<i class="material-icons">person</i>
						<p>用户管理</p>
					</a>
				</li>
				<li class="nav-item <?php echo substr($script, 0, 7) == 'product' ? 'active' : ''; ?>">
					<a class="nav-link" href="products.php">
						<i class="material-icons">library_books</i>
						<p>商品管理</p>
					</a>
				</li>
				<li class="nav-item <?php echo substr($script, 0, 4) == 'cart' ? 'active' : ''; ?>">
					<a class="nav-link" href="carts.php">
						<i class="material-icons">shopping_cart</i>
						<p>购物车管理</p>
					</a>
				</li>
				<li class="nav-item <?php echo substr($script, 0, 5) == 'order' ? 'active' : ''; ?>">
					<a class="nav-link" href="orders.php">
						<i class="material-icons">list</i>
						<p>订单管理</p>
					</a>
				</li>
				<!-- your sidebar here -->
			</ul>
		</div>
	</div>
	<div class="main-panel">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
			<div class="container-fluid">
				<div class="navbar-wrapper">
					<a class="navbar-brand" href="index.php">控制台</a>
				</div>
				<div class="collapse navbar-collapse justify-content-end">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
							   aria-expanded="false">
								<i class="material-icons">person</i>
								<p class="d-lg-none d-md-block">
									管理员
								</p>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
								<a class="dropdown-item" href="admin_edit.php">编辑</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">退出</a>
							</div>
						</li>
						<!-- your navbar here -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="content">
			<div class="container-fluid">