<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Thiết lập mảng lưu lỗi => Mặc định rỗng
    $name = $_POST['name'];
    $originalPrice = $_POST['originalPrice'];
    $promotionPrice = $_POST['promotionPrice'];
    $img = $_POST['image'];
    $day = $_POST['day'];
    echo "$name<br>$originalPrice<br>$promotionPrice<br>$img<br>$day";
    
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Nhận dữ liệu từ Drop-Down List | Hocweb123</title>
    </head>
    <body>
        <h1>Nhận dữ liệu từ Drop-Down List</h1>
        <form action="" method="POST">
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="name" placeholder="Tên sản phẩm.." required>
                <br>
                <label for="originalPrice">Giá gốc</label>
                <input type="number" id="originalPrice" name="originalPrice" placeholder="Giá.." required min="1">
                <br>
                <label for="promotionPrice">Giá khuyến mãi</label>
                <input type="number" id="promotionPrice" name="promotionPrice" placeholder="Giá.." required min="1">
                <br>
                <label for="image">Hình ảnh</label>
                <input type="file" id="image" name="image" required>
                <br>
                <label for="day">Ngay them</label>
                <input type="date" id="day" name="day" required><br>
                <br>
               
            <input type="submit" value="Lưu" name="submit">
        </form>

        <form action="" method="POST">
                <input type="text" name="search" placeholder="Nhập tên sản phẩm">
                <input type="submit" name="ok" value="search" >
                </form>
    </body>
</html