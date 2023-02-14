<?php
include_once 'lib/session.php';
Session::checkSession('client');
include 'classes/order.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();
$countCart = $cart->getCountCart();

$order = new order();
$result = $order->getOrderByUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Order</title>
</head>

<body>
<header>
        <label class="logo">
            <a href="index.php">
                <img  src="images/logo.jpg"  alt="logo">
            </a>          
        </label>
        <div class="search">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Nhập tên sản phẩm">
                <button name="ok" value="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <ul>
            <li><a href="index.php" >Trang chủ</a></li>
            <li><a href="productList.php" >Sản phẩm</a></li>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register.php" id="signup">Đăng ký</a></li>
                <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
            <li><a href="order.php" id="order" class="active">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        <?= ($countCart['cont']) ? $countCart['cont'] : "0" ?>
                    </span>
                </a>
            </li>
        </ul>
    </header>
    <section class="banner"></section>
    <div class="featuredProducts">
        <h1>Đơn hàng</h1>
    </div>
    <div class="container-single">
        <?php if ($result) { ?>
            <table class="order">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày giao</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
                <?php $count = 1;
                foreach ($result as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['createdDate'] ?></td>
                        <td><?= ($value['status'] != "Đang xử lý") ? $value['receivedDate'] : "Dự kiến 3 ngày sau khi đơn hàng đã được xử lý" ?> <?=  ($value['status'] != "Đã giao hàng" && $value['status'] != "Đang xử lý") ? "(Dự kiến)" : "" ?> </td>
                        <?php
                        if ($value['status'] == 'Đang giao hàng') { ?>
                            <td>
                                <a href="complete_order.php?orderId=<?= $value['id'] ?>">Đang giao (Click vào để xác nhận đã nhận)</a>
                            </td>
                            <td>
                                <a href="orderdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <?= $value['status'] ?>
                            </td>
                            <td>
                                <a href="orderdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                            </td>
                        <?php }
                        ?>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h3>Đơn hàng hiện đang rỗng</h3>
        <?php } ?>


    </div>
    </div>
    <?php
       include('inc/footer.php');
    ?>
</body>

</html>