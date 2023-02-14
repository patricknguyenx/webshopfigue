<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/order.php';

if (isset($_GET['id'])) {
    $order = new order();
    $result = $order->add($_GET['id']);

    if ($result === 'out of stock') {
        echo '<script type="text/javascript">alert("Số lượng sản phẩm đã hết!"); history.back();</script>';
        return;
    }
    if ($result) {
        echo '<script type="text/javascript">alert("Đặt hàng thành công!"); history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Đặt hàng thất bại!"); history.back();</script>';
    }
}