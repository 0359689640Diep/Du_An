-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 08:13 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `Id` int(11) NOT NULL,
  `IdComment` int(11) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Permission` varchar(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Status` int(11) DEFAULT 0,
  `Sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`Id`, `IdComment`, `Gmail`, `Password`, `Name`, `Phone`, `Permission`, `Image`, `Address`, `Status`, `Sex`) VALUES
(1, 0, 'vudiep621@gmail.com', 'vudiep621@gmail.com', 'Diep', '359689640', '0', 'book.jpg', 'Tu Hoan Phuong Canh Ha Noi', 0, ''),
(4, 0, 'Tuan621@gmail.com', 'Tuan621@gmail.com', 'Trần Anh Tuấn', '0359689640', '1', 'Casual.png', 'Tu Hoang Phương Canh Hà Nội', 0, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `IdCart` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `Price` float DEFAULT NULL,
  `Size` varchar(10) NOT NULL,
  `Number` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `IdCategory` int(11) NOT NULL,
  `NameCategory` text NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `DateEdit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`IdCategory`, `NameCategory`, `Status`, `DateEdit`) VALUES
(5, 'Mens shirts', 0, '2023-10-13 17:15:18'),
(8, 'Shorts', 0, '2023-10-13 17:30:07'),
(9, 'Shirt', 0, '2023-10-13 17:32:32'),
(10, 'Jeans', 0, '2023-10-13 17:36:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `IdColor` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `IdColorDefault` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`IdColor`, `IdProduct`, `IdColorDefault`) VALUES
(79, 66, 10),
(80, 67, 9),
(81, 67, 12),
(82, 68, 2),
(83, 68, 3),
(84, 68, 4),
(85, 69, 2),
(86, 69, 3),
(87, 69, 4),
(88, 70, 6),
(89, 70, 7),
(90, 70, 10),
(91, 71, 2),
(92, 71, 3),
(93, 71, 4),
(94, 72, 9),
(95, 72, 10),
(96, 73, 9),
(97, 74, 10),
(98, 74, 11),
(99, 74, 12),
(100, 75, 5),
(101, 75, 6),
(102, 76, 4),
(103, 76, 5),
(104, 77, 6),
(105, 77, 7),
(106, 77, 8),
(107, 78, 9),
(108, 78, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colordefault`
--

CREATE TABLE `colordefault` (
  `IdColorDefalut` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `colordefault`
--

INSERT INTO `colordefault` (`IdColorDefalut`, `Color`) VALUES
(1, '#00C12B'),
(2, '#F50606'),
(3, '#F5DD06'),
(4, '#F57906'),
(5, '#06CAF5'),
(6, '#063AF5'),
(7, '#7D06F5'),
(8, '#F506A4'),
(9, '#000000'),
(10, '#4F4631'),
(11, '#314F4A'),
(12, '#31344F');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `IdComment` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `Date` date DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`IdComment`, `IdAccount`, `IdProduct`, `Content`, `Date`, `Status`) VALUES
(38, 4, 77, 'San pham khong dung order', '2023-10-22', 0),
(39, 4, 69, 'San pham rat tot va toi rat hai long ve no', '2023-10-22', 0),
(40, 4, 69, 'San pham khong dung order', '2023-10-22', 0),
(41, 4, 67, 'San pham rat tot va toi rat hai long ve no', '2023-10-22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `IdImage` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`IdImage`, `IdProduct`, `Image`) VALUES
(89, 66, 'aothun.png'),
(90, 67, 'FadedSkinnyJeans.png'),
(91, 68, 'checkeredShirt.png'),
(92, 69, 'CourageGraphicT-shirt.png'),
(93, 70, 'image7.png'),
(94, 71, 'COURAGE_GRAPHIC_T-SHIRT.png'),
(95, 72, 'LosseFitBermudaShorts.png'),
(96, 73, 'FadedSkinnyJeans.png'),
(97, 74, 'aothun1.png'),
(98, 74, 'aothun11.png'),
(99, 74, 'aothun111.png'),
(100, 75, 'PoloWithContrastTrims.png'),
(101, 76, 'aothun2.png'),
(102, 77, 'polo.png'),
(103, 78, 'BlackStripedT-shirt.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderconfirmation`
--

CREATE TABLE `orderconfirmation` (
  `IdOrder` int(11) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `StatusComment` int(11) DEFAULT NULL,
  `IdProduct` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `Size` varchar(11) NOT NULL,
  `Price` float NOT NULL,
  `Number` int(11) NOT NULL,
  `Type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderconfirmation`
--

INSERT INTO `orderconfirmation` (`IdOrder`, `Status`, `StatusComment`, `IdProduct`, `IdAccount`, `Size`, `Price`, `Number`, `Type`) VALUES
(28, 4, 1, 69, 4, 'Medium', 130, 1, 'TM'),
(29, 4, 1, 69, 4, 'Medium', 1040, 2, 'TM'),
(30, 4, 1, 67, 4, 'X-Small', 97, 1, 'CK'),
(31, 4, 1, 77, 4, 'Small', 67, 1, 'TM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `IdProduct` int(11) NOT NULL,
  `NameProducts` text NOT NULL,
  `IdDetails` int(11) NOT NULL,
  `NumberProduct` int(11) NOT NULL,
  `Price` float DEFAULT NULL,
  `Evalute` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `IdCategory` int(11) NOT NULL,
  `DateEdit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`IdProduct`, `NameProducts`, `IdDetails`, `NumberProduct`, `Price`, `Evalute`, `Status`, `IdCategory`, `DateEdit`) VALUES
(66, 'T-SHIRT WITH TAPE DETAILS', 88, 23, 120, NULL, 0, 5, '0000-00-00 00:00:00'),
(67, 'SKINNY FIT JEANS', 89, 34, 97, NULL, 0, 10, '0000-00-00 00:00:00'),
(68, 'CHECKERED SHIRT', 90, 180, 180, NULL, 0, 9, '0000-00-00 00:00:00'),
(69, 'SLEEVE STRIPED T-SHIRT', 91, 45, 130, NULL, 0, 5, '0000-00-00 00:00:00'),
(70, 'VERTICAL STRIPED SHIRT', 92, 34, 1242, NULL, 0, 9, '0000-00-00 00:00:00'),
(71, 'COURAGE GRAPHIC T-SHIRT', 93, 12, 42, NULL, 0, 5, '0000-00-00 00:00:00'),
(72, 'LOOSE FIT BERMUDA SHORTS', 94, 43, 125, NULL, 0, 8, '0000-00-00 00:00:00'),
(73, 'FADED SKINNY JEANS', 95, 53, 159, NULL, 0, 10, '0000-00-00 00:00:00'),
(74, 'One Life Graphic T-shirt', 96, 35, 251, NULL, 0, 5, '0000-00-00 00:00:00'),
(75, 'Polo with Contrast Trims', 97, 34, 124, NULL, 0, 5, '0000-00-00 00:00:00'),
(76, 'Gradient Graphic T-shirt', 98, 56, 128, NULL, 0, 5, '0000-00-00 00:00:00'),
(77, 'Polo with Tipping Details1', 99, 5, 67, NULL, 0, 5, '0000-00-00 00:00:00'),
(78, 'Black Striped T-shirt', 100, 65, 167, NULL, 0, 5, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetails`
--

CREATE TABLE `productdetails` (
  `IdProductDetails` int(11) NOT NULL,
  `IdComment` int(11) DEFAULT NULL,
  `ProductDetails` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ProductDescription` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetails`
--

INSERT INTO `productdetails` (`IdProductDetails`, `IdComment`, `ProductDetails`, `ProductDescription`) VALUES
(88, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(89, NULL, 'High quality silver jeans', 'High quality silver jeans for men'),
(90, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(91, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(92, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(93, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(94, NULL, 'High quality silver briefs for men', 'Velvet shirt for men aged 18 to 30'),
(95, NULL, 'High quality silver jeans for men', 'High quality silver jeans for men'),
(96, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(97, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(98, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(99, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30'),
(100, NULL, 'High quality mens shirts', 'Velvet shirt for men aged 18 to 30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `IdSize` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `IdSizeDefault` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`IdSize`, `IdProduct`, `IdSizeDefault`) VALUES
(67, 66, 1),
(68, 66, 2),
(69, 66, 3),
(70, 66, 4),
(71, 67, 1),
(72, 67, 2),
(73, 67, 3),
(74, 67, 5),
(75, 68, 2),
(76, 68, 3),
(77, 68, 4),
(78, 68, 6),
(79, 69, 2),
(80, 69, 4),
(81, 69, 5),
(82, 69, 6),
(83, 70, 3),
(84, 70, 4),
(85, 70, 5),
(86, 70, 7),
(87, 71, 4),
(88, 71, 5),
(89, 71, 6),
(90, 72, 1),
(91, 72, 2),
(92, 72, 3),
(93, 73, 4),
(94, 73, 5),
(95, 73, 6),
(96, 73, 7),
(97, 74, 1),
(98, 74, 2),
(99, 74, 4),
(100, 74, 5),
(101, 75, 2),
(102, 75, 3),
(103, 75, 4),
(104, 75, 6),
(105, 76, 1),
(106, 76, 2),
(107, 76, 3),
(108, 76, 4),
(109, 77, 1),
(110, 77, 2),
(111, 77, 3),
(112, 77, 4),
(113, 78, 5),
(114, 78, 6),
(115, 78, 7),
(116, 78, 8),
(117, 78, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizedefault`
--

CREATE TABLE `sizedefault` (
  `IdSizeDefalut` int(11) NOT NULL,
  `Size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `sizedefault`
--

INSERT INTO `sizedefault` (`IdSizeDefalut`, `Size`) VALUES
(1, 'XX-Small'),
(2, 'X-Small'),
(3, 'Small'),
(4, 'Medium'),
(5, 'Large'),
(6, 'X-Large'),
(7, 'XX-Large'),
(8, '3X-Large'),
(9, '4X-Large');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IdCart`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `FK_IdAccount` (`IdAccount`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IdCategory`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`IdColor`),
  ADD KEY `fr_idproduct` (`IdProduct`),
  ADD KEY `fk_color_defalut` (`IdColorDefault`);

--
-- Chỉ mục cho bảng `colordefault`
--
ALTER TABLE `colordefault`
  ADD PRIMARY KEY (`IdColorDefalut`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdComment`),
  ADD KEY `fk_comment` (`IdAccount`),
  ADD KEY `IdProduct` (`IdProduct`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`IdImage`),
  ADD KEY `IdProduct` (`IdProduct`);

--
-- Chỉ mục cho bảng `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  ADD PRIMARY KEY (`IdOrder`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `IdAccount` (`IdAccount`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IdProduct`),
  ADD KEY `fk_product` (`IdDetails`),
  ADD KEY `FK` (`IdCategory`);

--
-- Chỉ mục cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`IdProductDetails`),
  ADD KEY `fk_productdetails` (`IdComment`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`IdSize`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `fk_size_defalut` (`IdSizeDefault`);

--
-- Chỉ mục cho bảng `sizedefault`
--
ALTER TABLE `sizedefault`
  ADD PRIMARY KEY (`IdSizeDefalut`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `IdCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `IdColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `colordefault`
--
ALTER TABLE `colordefault`
  MODIFY `IdColorDefalut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `IdImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  MODIFY `IdOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `IdProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `IdProductDetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `IdSize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `sizedefault`
--
ALTER TABLE `sizedefault`
  MODIFY `IdSizeDefalut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_IdAccount` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);

--
-- Các ràng buộc cho bảng `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `fk_color_defalut` FOREIGN KEY (`IdColorDefault`) REFERENCES `colordefault` (`IdColorDefalut`),
  ADD CONSTRAINT `fr_idproduct` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);

--
-- Các ràng buộc cho bảng `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  ADD CONSTRAINT `IdAccount` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`Id`),
  ADD CONSTRAINT `IdProduct` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`IdCategory`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`IdDetails`) REFERENCES `productdetails` (`IdProductDetails`);

--
-- Các ràng buộc cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `fk_productdetails` FOREIGN KEY (`IdComment`) REFERENCES `comment` (`IdComment`);

--
-- Các ràng buộc cho bảng `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `fk_size_defalut` FOREIGN KEY (`IdSizeDefault`) REFERENCES `sizedefault` (`IdSizeDefalut`),
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
