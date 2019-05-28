<?php
/**
 * Created by PhpStorm.
 * User: JasonLee
 * Date: 2019/1/23
 * Time: 22:06
 */

// 1. 删除当前登录用户的session
require '../tools.func.php';

deleteSession('admin');

header('location: login.php');
