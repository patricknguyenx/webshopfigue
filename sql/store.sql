-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 04, 2023 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(2, 'Mô Hình Size Lớn', 1),
(3, 'Mô Hình Size Vừa', 1),
(4, 'Mô Hình Size Nhỏ', 1),
(5, 'Phụ kiện', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(2, 'Mô hình Rồng Ngàn Tuổi 13cm – Elder Dragon XL Figure', '1800000', '1500000', '1.png', 1, '2023-01-08', 3, 20, 'Cao: 5.1 in / 13 cm\r\nRộng: 5.1 in / 13 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 9),
(3, 'Mô hình Ahri K/DA 24cm – Hãng Apex Toys x Riot Games', '5000000', '4700000', '2.png', 1, '2023-01-08', 2, 10, 'Cao: 24 cm\r\nRộng: 29 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Apex Toy x Riot Games', 1, 4),
(4, 'Mô hình LMHT Set Vệ Binh Tinh Tú 1- Star Guardian Team Minis Set 1', '2000000', '1990000', '3.png', 1, '2023-01-08', 4, 20, 'Cao khoảng: 6.4 – 7.6 cm\r\nChiều Rộng từ: 3.8 – 5.1 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 12),
(5, 'Mô hình LMHT Set Yordle – Yordle Team Minis Set [Lulu, Teemo, Ziggs, Tristana, Veigar]', '1300000', '1000000', '4.png', 1, '2023-01-08', 4, 20, 'Chiều cao: 2,5 – 3,0 in / 6,4 – 7,6 cm\r\nChiều rộng: 1,5 – 2,0 in / 3,8 – 5,1 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 17),
(6, 'Mô hình Teemo Figure', '2500000', '2300000', '5.png', 1, '2023-01-08', 3, 30, 'Chiều cao: 4.5 in / 11.4 cm\r\nChiều rộng: 3.6 in / 9.2 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 15),
(7, 'Mô hình Viego Unlocked Statue 28cm', '3300000', '2800000', '6.png', 1, '2023-01-08', 2, 15, 'Chiều cao: 28.5cm\r\nChiều rộng:16cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 3),
(8, 'Mô hình Yuumi Figure 11.5cm', '1400000', '1300000', '7.png', 1, '2023-01-08', 3, 40, 'Chiều cao: 4,5 in / 11,5 cm\r\nChiều rộng: 3,1 in / 8,0 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 28),
(9, 'Mô hình Morderkaiser XL Figure Có Đèn LED 13.5cm', '1990000', '1500000', '8.png', 1, '2023-01-08', 3, 20, 'Cao: 13.5 cm\r\nRộng: 11.5 cm\r\nCó đèn LED ở phần mắt và base\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 6),
(10, 'Mô hình Garen Unlocked Statue 28cm', '2900000', '2750000', '9.png', 1, '2023-01-08', 2, 20, 'Chiều cao: 27.8 cm\r\nChiều rộng: 20 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 14),
(11, 'Mô hình Corki Corgi Figure 12.5cm\r\n', '1800000', '1700000', '10.png', 1, '2023-01-08', 3, 20, 'Cao: 12.5 cm\r\nRộng: 11.2 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 8),
(12, 'Mô hình Zed Unlocked Statue 24cm', '7800000', '6500000', '11.png', 1, '2023-01-08', 2, 30, 'Cao: 23 cm\r\nRộng: 24 cm\r\nChất liệu: PVC/ABS (nhựa cao cấp)\r\nHãng sản xuất: Riot Games', 1, 19),
(13, 'Star Guardian Ina Stacker Rings', '3100000', '2800000', '12.png', 1, '2023-01-08', 5, 10, 'Chất liệu: Bạc Sterling mạ vàng 14K\r\nKích thước: 5 – 6 – 7 – 8 – 9 – 10\r\nKích thước: 21mm x 15mm\r\nHãng sản xuất: League of Legends X RockLove', 1, 3),
(14, 'Star Guardian Soraka Wand Pendant', '4000000', '3600000', '13.png', 1, '2023-01-08', 5, 10, 'Chất liệu: bạc sterling mạ vàng 14K\r\nTinh thể: Zirconia khối\r\nChuỗi: Chuỗi dây chuyền có thể điều chỉnh 18 đến 20 inch\r\nKích thước: 26mm x 18mm\r\nHãng sản xuất: League of Legends X RockLove', 1, 5),
(15, 'Bàn Phím Logitech G412 x LoL Star Guardian [Limited]', '2700000', '2600000', '14.png', 1, '2023-01-08', 5, 20, 'Trọng lượng: 650 g\r\nĐộ dài dây: 1,8 m\r\nMũ phím PBT\r\nLớp vỏ trên cùng bằng nhôm\r\nGiao thức USB: USB 2.0\r\nLED: Có', 1, 12),
(16, 'Tai Nghe Không Dây Logitech G435 x LoL Star Guardian [Limited]', '3500000', '3200000', '15.png', 1, '2023-01-08', 5, 20, 'Trọng lượng siêu nhẹ, chỉ 165 gram\r\nPhạm vi hoạt động: 10m\r\nThơi lượng pin lên tới 18 giờ\r\nMàng loa 40mm thế hệ mới cho âm thanh tuyệt vời\r\nHỗ trợ 2 kết nối không dây: LightSpeed và Bluetooth\r\nHỗ trợ âm thanh vòm Dolby Atmos, Tempest 3D AudioTech và Windows Sonic Spatial Sound\r\nHỗ trợ đa nền tảng: Windows, các thiết bị di động (Bluetooth), hỗ trợ cả PS4, PS5', 1, 17),
(17, 'Miếng lót chuột LMHT Kai’sa x Akali VBTT size XL', '1000000', '960000', '16.png', 1, '2023-01-08', 5, 30, 'Kích thước: 70×40\r\nTrọng lượng: 600g\r\nChất liệu: Vải Thun\r\nCông nghệ in cao cấp\r\nBo viền 2 đường may chắc chắn\r\nĐế cao su chống trượt\r\nHãng sản xuất: Riot Games', 1, 21),
(18, 'Pad chuột LMHT kỉ niệm 10 năm LCK', '1500000', '1300000', '17.png', 1, '2023-01-08', 5, 20, 'Kích thước: 80×30\r\nĐộ dầy: 3mm\r\nCloth Spandex Print\r\nHai đường may, chống sờn mép\r\nĐế cao su chống trượt', 1, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `address` varchar(500) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `captcha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `dob`, `password`, `role_id`, `status`, `address`, `isConfirmed`, `captcha`) VALUES
(1, 'admin@gmail.com', 'Le Thanh Tung', '2023-01-10', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', 1, ''),
(30, 'iamrobotdiy@gmail.com', 'tung', '2023-01-30', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, 'ha noi', 1, '65460');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
