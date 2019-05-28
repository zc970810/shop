<?php
/**
 * Created by PhpStorm.
 * User: JasonLee
 * Date: 2019/1/24
 * Time: 15:34
 */
require '../tools.func.php';
require '../db.func.php';
require 'auth.php';
// 1. 获取当前用户的购物车数据
$uid = getSession('id', 'shop');
$prefix = getDBPrefix();
$sql = "SELECT id, price, quantity, products, uid
        FROM {$prefix}cart WHERE uid = '$uid'";
$cart = queryOne($sql);
if (empty($cart)) {
    header('location: cart.php');
    exit;
}
// 2. 将购物车数据写入到订单表当中 (id, price, quantity, products, created_at, uid)
$price = $cart['price'];
$quantity = $cart['quantity'];
$products = $cart['products'];
$created_at = date('Y-m-d H:i:s');
$sql = "INSERT INTO {$prefix}order(price, quantity, products, created_at, uid)
        VALUES('$price', '$quantity', '$products', '$created_at', '$uid')";

if (execute($sql)) {
    setInfo('下单成功');
} else {
    setInfo('下单失败');
}

header('location: order_status.php');