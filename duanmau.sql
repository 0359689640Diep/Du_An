-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2023 lúc 05:42 PM
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
(3, 0, 'diepvhph36272@fpt.edu.vn', '0359689640@Diep', 'Vu Hong Diep', '0359689640', '1', 'z4490016017344_0021e68a10a779b97e8df26b3bbcd46a.jpg', 'Tu Hoan Phương Canh Hà Nội', 1, '0'),
(4, 0, 'Tuan621@gmail.com', 'Tuan621@gmail.com', 'Anh Tuấn', '0359689640', '1', 'Casual.png', 'Tu Hoang Phương Canh Hà Nội', 0, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `IdCart` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Price` float DEFAULT NULL,
  `Size` varchar(10) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`IdCart`, `IdProduct`, `Price`, `Size`, `IdAccount`, `Number`) VALUES
(24, 30, NULL, '', 4, 1);

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
(5, 'Mens shirts', 1, '2023-10-09 05:47:29'),
(6, 'HighClass womens clothes', 0, '2023-10-09 10:51:39'),
(7, 'Womens shirt', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `IdColor` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`IdColor`, `IdProduct`, `Color`) VALUES
(1, 29, '#F5DD06'),
(2, 30, '#F5DD06');

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
(1, 30, 'aothun.png'),
(2, 30, 'aothun1.png'),
(3, 30, 'aothun2.png');

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
(15, 1, 0, 30, 4, '', 1, 1, 'CK'),
(16, 1, 0, 30, 4, '', 1, 1, 'CK');

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
  `DateEdit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`IdProduct`, `NameProducts`, `IdDetails`, `NumberProduct`, `Price`, `Evalute`, `Status`, `IdCategory`, `DateEdit`) VALUES
(13, '1', 37, 1, 1, NULL, 0, 5, '0000-00-00'),
(14, '1', 38, 1, 1, NULL, 0, 5, '0000-00-00'),
(15, '1', 39, 1, 1, NULL, 0, 5, '0000-00-00'),
(16, '1', 40, 1, 1, NULL, 0, 5, '0000-00-00'),
(17, '1', 41, 1, 1, NULL, 0, 5, '0000-00-00'),
(18, '1', 42, 1, 1, NULL, 0, 5, '0000-00-00'),
(19, '1', 43, 1, 1, NULL, 0, 5, '0000-00-00'),
(20, '1', 44, 1, 1, NULL, 0, 5, '0000-00-00'),
(21, '1', 45, 1, 1, NULL, 0, 5, '0000-00-00'),
(22, '1', 46, 1, 1, NULL, 0, 5, '0000-00-00'),
(23, '1', 47, 1, 1, NULL, 0, 5, '0000-00-00'),
(24, '1', 48, 1, 1, NULL, 0, 5, '0000-00-00'),
(25, '1', 49, 1, 1, NULL, 0, 5, '0000-00-00'),
(26, '1', 50, 1, 1, NULL, 0, 5, '0000-00-00'),
(27, '1', 51, 1, 1, NULL, 0, 5, '0000-00-00'),
(28, '1', 52, 1, 1, NULL, 0, 5, '0000-00-00'),
(29, '1', 53, 1, 1, NULL, 0, 5, '0000-00-00'),
(30, '1', 54, 1, 1, NULL, 0, 5, '0000-00-00');

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
(32, NULL, '1', '1'),
(33, NULL, '1', '1'),
(34, NULL, '1', '1'),
(35, NULL, '1', '1'),
(36, NULL, '1', '1'),
(37, NULL, '1', '1'),
(38, NULL, '1', '1'),
(39, NULL, '1', '1'),
(40, NULL, '1', '1'),
(41, NULL, '1', '1'),
(42, NULL, '1', '1'),
(43, NULL, '1', '1'),
(44, NULL, '1', '1'),
(45, NULL, '1', '1'),
(46, NULL, '1', '1'),
(47, NULL, '1', '1'),
(48, NULL, '1', '1'),
(49, NULL, '1', '1'),
(50, NULL, '1', '1'),
(51, NULL, '1', '1'),
(52, NULL, '1', '1'),
(53, NULL, '1', '1'),
(54, NULL, '1', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `IdSize` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`IdSize`, `IdProduct`, `Size`) VALUES
(2, 26, '1'),
(3, 28, 'S'),
(4, 29, 'S'),
(5, 30, 'S');

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
  ADD KEY `fr_idproduct` (`IdProduct`);

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
  ADD KEY `IdProduct` (`IdProduct`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `IdCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `IdColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `IdImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orderconfirmation`
--
ALTER TABLE `orderconfirmation`
  MODIFY `IdOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `IdProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `IdProductDetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `IdSize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
