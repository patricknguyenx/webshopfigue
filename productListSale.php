<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$product = new product();
$list = mysqli_fetch_all($product->getSaleProducts(), MYSQLI_ASSOC);
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
    <title>Trang chủ</title>
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
            <li><a href="productList.php" class="active">Sản phẩm</a></li>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register.php" id="signup">Đăng ký</a></li>
                <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
            <li><a href="order.php" id="order">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        <?= ($totalQty['total']) ? $totalQty['total'] : "0" ?>
                    </span>
                </a>
            </li>
        </ul>
    </header>
    <section class="banner"></section>
    <div class="featuredProducts">
        <h1>Giá từ cao xuống thấp</h1>
    </div>
    <div class="container">
        <?php
        foreach ($list as $key => $value) { ?>
        <div class="card">
            <div class="imgBx" >
                <a href="detail.php?id=<?= $value['id'] ?>"><img src="admin/uploads/<?= $value['image'] ?>" alt=""></a>
            </div>
            <div class="content">
                <div class="productName">
                    <a href="detail.php?id=<?= $value['id'] ?>">
                        <h3><?= $value['name'] ?></h3>
                    </a>
                </div>
                <ul>
                    <li>Đã bán: <?= $value['soldCount'] ?></li>
                    <li>Số lượng còn lại: <?= $value['qty'] ?></li>
                </ul>
                <div class="original-price">
                    <?php
                        if ($value['promotionPrice'] < $value['originalPrice']) { ?>
                    Giá gốc: <del><?= number_format($value['originalPrice'], 0, '', ',') ?>VND</del>
                    <?php } else { ?>
                    <p>.</p>
                    <?php } ?>
                </div>
                <div class="price">
                    Giá bán: <?= number_format($value['promotionPrice'], 0, '', ',') ?>VND
                </div>
                <div class="action">
                    <a class="add-cart" href="add_cart.php?id=<?= $value['id'] ?>">Thêm vào giỏ</a>
                    <a class="detail" href="buy_now.php?id=<?= $value['id'] ?>">Mua ngay</a>
                </div>
            </div>
        </div>
        <?php }
        ?>
    </div>
    <?php
       include('inc/footer.php');
    ?>
</body>

</html>