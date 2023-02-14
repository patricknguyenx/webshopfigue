<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();
$countCart = $cart->getCountCart();

$product = new product();
$list = mysqli_fetch_all($product->getFeaturedProducts((isset($_GET['page']) ? $_GET['page'] : 1)), MYSQLI_ASSOC);
$pageCount = $product->getCountPaging();

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
    <?php 
        include('inc/header.php'); 
    ?>

    <section class="banner"></section>

    <div class="featuredProducts">
        <h1>Sản phẩm bán chạy</h1>
    </div>
    <div class="container">
        <?php
        foreach ($list as $key => $value) { ?>
        <div class="card">
            <div class="imgBx">
                <a href="detail.php?id=<?= $value['id'] ?>"><img src="admin/uploads/<?= $value['image'] ?>" alt=""></a>
            </div>
            <div class="content">
                <div class="productName">
                    <a href="detail.php?id=<?= $value['id'] ?>" title="<?= $value['name']?>">
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
                    <a class="detail" href="buy_now.php?id=<?= $value['id'] ?>">Mua Ngay</a>
                </div>
            </div>

        </div>
        <?php }
        ?>
    </div>
    <div class="pagination">
            <a href="index.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>">&laquo;</a>
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                if (isset($_GET['page'])) {
                    if ($i == $_GET['page']) { ?>
                        <a class="active" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php } else { ?>
                        <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  }
                } else {
                    if ($i == 1) { ?>
                        <a class="active" href="index.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  } else { ?>
                        <a href="index.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php   } ?>
                <?php  } ?>
            <?php }
            ?>
            <a href="index.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>">&raquo;</a>
        </div>
    <?php
       include('inc/footer.php');
    ?>
</body>

</html>