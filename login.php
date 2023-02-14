<?php
include 'classes/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $login_check = $user->login($email, $password);
}
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
    <title>Đăng nhập</title>
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
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="productList.php">Sản phẩm</a></li>
            <li><a href="register.php" id="signup" >Đăng ký</a></li>
            <li><a href="login.php" id="signin" class="active">Đăng nhập</a></li>
            <li><a href="order.php" id="order">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        0
                    </span>
                </a>
            </li>
        </ul>
    </header>
    <section class="banner"></section>
    <div class="featuredProducts">
        <h1>Đăng nhập</h1>
    </div>
    <div class="container-single">
        <div class="login">
            <form action="login.php " method="post" class="form-login">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email..." required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu..." required>
                <p style="color: red;"><?= !empty($login_check) ? $login_check : '' ?></p>

                <input type="submit" value="Đăng nhập">
            </form>
        </div>
    </div>
    </div>
    <?php
       include('inc/footer.php');
    ?>
</body>

</html>