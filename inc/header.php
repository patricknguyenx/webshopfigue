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
            <li><a href="index.php" class="active">Trang chủ</a></li>
            <li><a href="productList.php">Sản phẩm</a></li>
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
                        <?= ($countCart['cont']) ? $countCart['cont'] : "0" ?>
                    </span>
                </a>
            </li>
        </ul>
    </header>