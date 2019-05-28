<?php
/**
 * Created by PhpStorm.
 * User: JasonLee
 * Date: 2019/1/24
 * Time: 15:06
 */
require '../tools.func.php';
require '../db.func.php';
require 'auth.php';

$product_id = intval($_GET['product_id']);
if (empty($product_id)) {
    header('location: cart.php');
    exit;
}
// 0. auth
// 1. 查询当前用户的购物车
$prefix = getDBPrefix();
$uid = getSession('id', 'shop');
$sql = "SELECT id,price,quantity,products
        FROM {$prefix}cart WHERE uid = '$uid'";
$cart = queryOne($sql);
// 2. 将购物车当中对应id的商品删除，更新总价格，总数量
$cart['products'] = json_decode($cart['products'], true);
$cart['price'] -= $cart['products'][$product_id]['quantity'] * $cart['products'][$product_id]['product']['price'];
$cart['quantity'] -= $cart['products'][$product_id]['quantity'];
unset($cart['products'][$product_id]);
$cart['products'] = addslashes(json_encode($cart['products']));
$sql = "UPDATE {$prefix}cart 
        SET price = '{$cart['price']}',
        quantity = '{$cart['quantity']}',
        products = '{$cart['products']}'
        WHERE uid = '$uid'";
if (execute($sql)) {
    setInfo('删除成功');
} else {
    setInfo('删除失败');
}
header('location: cart.php');