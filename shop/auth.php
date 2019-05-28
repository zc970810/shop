<?php
/**
 * Created by PhpStorm.
 * User: JasonLee
 * Date: 2019/1/24
 * Time: 14:47
 */
if (empty(getSession('username', 'shop'))) {
    header('location: login.php');
    exit;
}