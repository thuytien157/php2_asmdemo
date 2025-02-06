-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 06, 2025 lúc 01:19 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php2_ver2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `is_default` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_parent`, `is_default`) VALUES
(1, 'Quần áo', 0, b'0'),
(2, 'Mũ Nón', 0, b'0'),
(3, 'Giày dép', 0, b'0'),
(4, 'Phụ kiện', 0, b'0'),
(5, 'Túi ví', 0, b'0'),
(6, 'Quần', 1, b'0'),
(7, 'Áo', 1, b'0'),
(8, 'Nón Bucket', 2, b'0'),
(9, 'Nón bóng chày', 2, b'0'),
(10, 'Giày Sneakers', 3, b'0'),
(11, 'Giày Sandals', 3, b'0'),
(12, 'Túi Tote', 5, b'0'),
(13, 'Túi đeo chéo', 5, b'0'),
(14, 'Balo', 5, b'0'),
(15, 'Vớ', 4, b'0'),
(16, 'Chưa phân loại', 0, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hex_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex_code`) VALUES
(1, 'Đen', '#121214'),
(2, 'Trắng', '#ffffff'),
(3, 'Xanh', '#b8efef'),
(4, 'Đỏ', '#c01314'),
(5, 'Nâu', '#af937d'),
(6, 'Xanh đen', '#132040'),
(7, 'Xanh tím', '#3a5685'),
(8, 'Da', '#dccfbf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_detail`
--

CREATE TABLE `image_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_detail`
--

INSERT INTO `image_detail` (`id`, `id_product`, `image`, `alt_image`, `is_main`) VALUES
(1, 5, 'ao1.webp', 'Ảnh chính áo thun màu đen', 1),
(2, 5, 'ao1_ct2.webp', 'Ảnh chi tiết áo thun màu đen', 0),
(3, 5, 'ao1_ct3.webp', 'Ảnh chi tiết áo thun màu đen', 0),
(4, 5, 'ao1_ct4.webp', 'Ảnh chi tiết áo thun màu đen', 0),
(5, 5, 'ao1_ct5.webp', 'Ảnh chi tiết áo thun màu đen', 0),
(6, 5, 'ao1_ct1.webp', 'Ảnh chi tiết áo thun màu đen', 0),
(7, 6, 'giay1.webp', 'Ảnh chính của giày màu đen', 1),
(8, 6, 'giay1_ct1.webp', 'Ảnh chi tiết giày màu đen', 0),
(9, 6, 'giay1_ct2.webp', 'Ảnh chi tiết giày màu đen', 0),
(10, 6, 'giay1_ct3.webp', 'Ảnh chi tiết giày màu đen', 0),
(11, 6, 'giay1_ct4.webp', 'Ảnh chi tiết giày màu đen', 0),
(12, 6, 'giay1_ct5.webp', 'Ảnh chi tiết giày màu đen', 0),
(13, 7, 'non1.webp', 'Ảnh chính nón màu nâu', 1),
(14, 7, 'non1_ct1.webp', 'Ảnh chi tiết nón màu nâu', 0),
(15, 7, 'non1_ct2.webp', 'Ảnh chi tiết nón màu nâu', 0),
(16, 7, 'non1_ct3.webp', 'Ảnh chi tiết nón màu nâu', 0),
(17, 7, 'non1_ct4.webp', 'Ảnh chi tiết nón màu nâu', 0),
(18, 7, 'non1_ct5.webp', 'Ảnh chi tiết nón màu nâu', 0),
(19, 8, 'tui1.webp', 'Ảnh chính túi màu da', 1),
(20, 8, 'tui1_ct1.webp', 'Ảnh chi tiết túi màu da', 0),
(21, 8, 'tui1_ct2.webp', 'Ảnh chi tiết túi màu da', 0),
(22, 8, 'tui1_ct3.webp', 'Ảnh chi tiết túi màu da', 0),
(23, 8, 'tui1_ct4.webp', 'Ảnh chi tiết túi màu da', 0),
(24, 8, 'tui1_ct5.webp', 'Ảnh chi tiết túi màu da', 0),
(25, 1, 'ao2.webp', '', 1),
(26, 1, 'ao2_ct1.webp', '', 0),
(27, 1, 'ao2_ct2.webp', '', 0),
(28, 1, 'ao2_ct3.webp', '', 0),
(29, 1, 'ao2_ct4.webp', '', 0),
(30, 1, 'ao2_ct5.webp', '', 0),
(31, 9, 'giay2.webp', '', 1),
(32, 9, 'giay2_ct1.webp', '', 0),
(33, 9, 'giay2_ct2.webp', '', 0),
(34, 9, 'giay2_ct3.webp', '', 0),
(35, 9, 'giay2_ct4.webp', '', 0),
(36, 9, 'giay2_ct5.webp', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `totalquantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `status` set('cho-xac-nhan','dang-chuan-bi-hang','dang-giao-hang','giao-thanh-cong','don-that-bai') NOT NULL DEFAULT 'cho-xac-nhan',
  `id_user` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `orderdate`, `totalquantity`, `totalprice`, `status`, `id_user`, `payment_method`, `note`) VALUES
(7, '2025-02-06 13:27:49', 3, 1390000, 'don-that-bai', 28, 'Chuyển khoản ngân hàng', ''),
(8, '2025-02-06 13:28:14', 3, 2342000, 'dang-chuan-bi-hang', 28, 'Chuyển khoản ngân hàng', ''),
(9, '2025-02-06 13:35:33', 1, 1056000, 'dang-giao-hang', 28, 'Chuyển khoản ngân hàng', ''),
(10, '2025-02-06 19:13:35', 3, 312000, 'don-that-bai', 30, 'Thanh toán Momo', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id_order`, `id_product`, `price`, `quantity`) VALUES
(7, 1, 104000, 1),
(7, 5, 1056000, 1),
(7, 6, 230000, 1),
(8, 5, 1056000, 2),
(8, 6, 230000, 1),
(9, 5, 1056000, 1),
(10, 1, 104000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `create_at` date NOT NULL DEFAULT '2025-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `discount`, `id_category`, `create_at`) VALUES
(1, 'Áo thun unisex', 'Đem đến cho bạn vẻ ngoài mới mẻ và đầy sức sống với chiếc áo thun Varsity của MLB. Được hoàn thiện từ chất liệu vải cotton nguyên chất mềm mại giúp bạn cảm thấy thoải mái ngay cả khi hoạt động mạnh trên nền gam màu trẻ trung và họa tiết in phong cách hiện', 124000, 16, 7, '2025-01-01'),
(5, 'Áo thun thể thao unisex\r\n', 'Đem đến cho bạn vẻ ngoài mới mẻ và đầy sức sống với chiếc áo thun Varsity của MLB. Được hoàn thiện từ chất liệu vải cotton nguyên chất mềm mại giúp bạn cảm thấy thoải mái ngay cả khi hoạt động mạnh trên nền gam màu trẻ trung và họa tiết in phong cách hiện', 1200000, 12, 7, '2025-01-15'),
(6, 'Giày sneaker unisex năng động', 'Đôi giày Chunky Liner Monogram được chế tác từ chất liệu cao cấp, không chỉ mang đến sự bền bỉ, chắc chắn mà còn tạo cảm giác thoải mái, dễ chịu suốt cả ngày. Điểm nhấn ấn tượng trên đôi giày chính là logo NY tinh xảo mang lại một phong cách thời trang đầ', 230000, 0, 10, '2025-01-01'),
(7, 'Nón MLB cá tính năng động', 'Chiếc nón Classic Monogram Tonton 3D là một phụ kiện thời trang không thể thiếu trong tủ đồ của bạn. Với thiết kế trẻ trung, hiện đại trên nền chất liệu polyester cao cấp, bền đẹp, mang đến cảm giác thoải mái khi đội, điểm nhấn của chiếc nón là logo 3D nổ', 180000, 0, 9, '2024-01-02'),
(8, 'Túi tote MLB thời trang', 'Thoải mái vi vu mọi nơi với chiếc túi tote Dia Monogram Jacquard đến từ MLB. Được hoàn thiện từ chất liệu jacquard cao cấp phối cùng họa tiết monogram sang trọng tạo nên vẻ ngoài đẳng cấp, sành điệu, Dia Monogram Jacquard còn có quai đeo tiện lợi cho phép', 560000, 0, 12, '2025-01-08'),
(9, 'Giày sandals unisex đế thấp Chunky', 'Đôi sandals Chunky Runner là sự hòa quyện tuyệt vời giữa sự thoải mái và phong cách đường phố, mang đến cho bạn những bước đi đầy tự tin và nổi bật. Hãy để mỗi bước chân của bạn trở nên mạnh mẽ và tràn đầy năng lượng với đôi Chunky Runner độc đáo này.', 230000, 20, 11, '2025-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `type`) VALUES
(6, 'FREESIZE');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `role` set('superadmin','admin','user') NOT NULL DEFAULT 'user',
  `status` set('active','banned') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `address`, `email`, `phone`, `role`, `status`) VALUES
(24, 'admin', '$2y$10$.gz2HdvISvQvZB1gOGIauO.5uVY0uPA4tdMLm5QTREnsh4aNVPi6G', '', NULL, 'thuytien.hoctap@gmail.com', 0, '', 'active'),
(26, 'admin1', '$2y$10$PO1Tds/FkZe72mpat5LF2OW1HDHdYMT3myeeSN1Rzb0kVZKPswduO', '', NULL, 'hiu800hu@gmailcom', 0, '', 'active'),
(27, 'adminq', '$2y$10$mc/krT9l2nD2p/DZGFLQtu86DhTgE9.gqLUuYFUYDCcS8tioHFaXK', '', NULL, 'hoainam.hoctap@gmail.com', 0, '', 'active'),
(28, 'thuytien', '$2y$10$GMpbrpK3o9.gDrxfWCWqZe1Z2gB2bgPkBHhqrZadpix5ttvkXIM4S', 'Nguyễn Thị Thuỷ Tiên', 'tp hcm', 'hoainam.hoctap@gmail.com', 389330759, 'user', 'active'),
(30, 'Tieenz', '$2y$10$K15pDuA6dJmQKPlihSrv2.QA6.LfWnwnFnG.jDoNKF479e5IAY036', 'Nguyễn Thị Thuỷ Tiên', 'Quận 12t', 'hoainam.hoctap@gmail.com', 389330759, 'user', 'active');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_detail`
--
ALTER TABLE `image_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `image_detail`
--
ALTER TABLE `image_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `image_detail`
--
ALTER TABLE `image_detail`
  ADD CONSTRAINT `image_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
