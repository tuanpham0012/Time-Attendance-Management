-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2020 lúc 02:58 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_nhanvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` int(30) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manhanvien` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_trangthai` int(30) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `email`, `manhanvien`, `id_trangthai`) VALUES
(1, 'admin', 'admin', 'tuanpham0012@gmail.com', 'NV00001', 1),
(2, 'Sadmin', 'Sadmin', 'tuanpham3108@gmail.com', 'NV00002', 1),
(3, 'lungthiling', '123456789', 'lungthiling@gmail.com', 'NV00003', 1),
(4, 'lungthiling', '123456789', 'lungthiling@gmail.com', 'NV00003', 1),
(5, 'vitamin01', '123456789', 'vitaminA123@gmail.com', 'NV00004', 1),
(17, 'tuanpham1212', '123123123', 'tuanpham@gmail.com', 'NV00005', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `id_ngaycong` int(255) UNSIGNED NOT NULL,
  `id_nhanvien` int(12) NOT NULL,
  `thoigian` datetime NOT NULL,
  `tinhtrang` varchar(12) COLLATE utf8_unicode_ci DEFAULT 'Nghỉ',
  `status` int(5) DEFAULT 0 COMMENT '0-chưa duyệt,1-đã duyệt',
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`id_ngaycong`, `id_nhanvien`, `thoigian`, `tinhtrang`, `status`, `ghichu`) VALUES
(62403, 2, '2020-11-01 00:00:01', 'Đúng Giờ', 1, ''),
(62404, 2, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62405, 2, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62406, 2, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62407, 2, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62408, 2, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62409, 2, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62410, 2, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62411, 2, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62412, 2, '2020-11-13 23:51:43', 'Đúng Giờ', 1, '11'),
(62413, 2, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62414, 2, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62415, 2, '2020-11-13 10:01:45', 'Muộn', 1, NULL),
(62416, 2, '2020-11-14 00:21:30', 'Đúng Giờ', 1, NULL),
(62417, 2, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62418, 2, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62419, 2, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62420, 2, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62421, 2, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62422, 2, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62423, 2, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62424, 2, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62425, 2, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62426, 2, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62427, 2, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62428, 2, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62429, 2, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62430, 2, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62431, 2, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62432, 2, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62433, 3, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62434, 3, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62435, 3, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62436, 3, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62437, 3, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62438, 3, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62439, 3, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62440, 3, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62441, 3, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62442, 3, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62443, 3, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62444, 3, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62445, 3, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62446, 3, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62447, 3, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62448, 3, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62449, 3, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62450, 3, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62451, 3, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62452, 3, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62453, 3, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62454, 3, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62455, 3, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62456, 3, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62457, 3, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62458, 3, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62459, 3, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62460, 3, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62461, 3, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62462, 3, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62463, 4, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62464, 4, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62465, 4, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62466, 4, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62467, 4, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62468, 4, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62469, 4, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62470, 4, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62471, 4, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62472, 4, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62473, 4, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62474, 4, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62475, 4, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62476, 4, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62477, 4, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62478, 4, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62479, 4, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62480, 4, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62481, 4, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62482, 4, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62483, 4, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62484, 4, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62485, 4, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62486, 4, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62487, 4, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62488, 4, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62489, 4, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62490, 4, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62491, 4, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62492, 4, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62493, 5, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62494, 5, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62495, 5, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62496, 5, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62497, 5, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62498, 5, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62499, 5, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62500, 5, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62501, 5, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62502, 5, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62503, 5, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62504, 5, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62505, 5, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62506, 5, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62507, 5, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62508, 5, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62509, 5, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62510, 5, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62511, 5, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62512, 5, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62513, 5, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62514, 5, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62515, 5, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62516, 5, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62517, 5, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62518, 5, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62519, 5, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62520, 5, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62521, 5, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62522, 5, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62523, 6, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62524, 6, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62525, 6, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62526, 6, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62527, 6, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62528, 6, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62529, 6, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62530, 6, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62531, 6, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62532, 6, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62533, 6, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62534, 6, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62535, 6, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62536, 6, '2020-11-14 23:21:24', 'Đi Muộn', 1, NULL),
(62537, 6, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62538, 6, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62539, 6, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62540, 6, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62541, 6, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62542, 6, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62543, 6, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62544, 6, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62545, 6, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62546, 6, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62547, 6, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62548, 6, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62549, 6, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62550, 6, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62551, 6, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62552, 6, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62553, 13, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62554, 13, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62555, 13, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62556, 13, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62557, 13, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62558, 13, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62559, 13, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62560, 13, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62561, 13, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62562, 13, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62563, 13, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62564, 13, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62565, 13, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62566, 13, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62567, 13, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62568, 13, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62569, 13, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62570, 13, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62571, 13, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62572, 13, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62573, 13, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62574, 13, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62575, 13, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62576, 13, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62577, 13, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62578, 13, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62579, 13, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62580, 13, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62581, 13, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62582, 13, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62583, 14, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62584, 14, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62585, 14, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62586, 14, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62587, 14, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62588, 14, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62589, 14, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62590, 14, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62591, 14, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62592, 14, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62593, 14, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62594, 14, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62595, 14, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62596, 14, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62597, 14, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62598, 14, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62599, 14, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62600, 14, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62601, 14, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62602, 14, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62603, 14, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62604, 14, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62605, 14, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62606, 14, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62607, 14, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62608, 14, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62609, 14, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62610, 14, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62611, 14, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62612, 14, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62613, 15, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62614, 15, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62615, 15, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62616, 15, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62617, 15, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62618, 15, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62619, 15, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62620, 15, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62621, 15, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62622, 15, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62623, 15, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62624, 15, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62625, 15, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62626, 15, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62627, 15, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62628, 15, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62629, 15, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62630, 15, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62631, 15, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62632, 15, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62633, 15, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62634, 15, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62635, 15, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62636, 15, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62637, 15, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62638, 15, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62639, 15, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62640, 15, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62641, 15, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62642, 15, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62643, 16, '2020-11-01 00:00:01', 'Nghỉ', 0, NULL),
(62644, 16, '2020-11-02 00:00:01', 'Nghỉ', 0, NULL),
(62645, 16, '2020-11-03 00:00:01', 'Nghỉ', 0, NULL),
(62646, 16, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62647, 16, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62648, 16, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62649, 16, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62650, 16, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62651, 16, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62652, 16, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62653, 16, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62654, 16, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62655, 16, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62656, 16, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62657, 16, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62658, 16, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62659, 16, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62660, 16, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62661, 16, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62662, 16, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62663, 16, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62664, 16, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62665, 16, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62666, 16, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62667, 16, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62668, 16, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62669, 16, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62670, 16, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62671, 16, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62672, 16, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL),
(62673, 17, '2020-11-01 00:00:01', 'Đúng Giờ', 1, ''),
(62674, 17, '2020-11-02 00:00:01', 'Đúng Giờ', 1, ''),
(62675, 17, '2020-11-03 00:00:01', 'Đi Muộn', 1, ''),
(62676, 17, '2020-11-04 00:00:01', 'Nghỉ', 0, NULL),
(62677, 17, '2020-11-05 00:00:01', 'Nghỉ', 0, NULL),
(62678, 17, '2020-11-06 00:00:01', 'Nghỉ', 0, NULL),
(62679, 17, '2020-11-07 00:00:01', 'Nghỉ', 0, NULL),
(62680, 17, '2020-11-08 00:00:01', 'Nghỉ', 0, NULL),
(62681, 17, '2020-11-09 00:00:01', 'Nghỉ', 0, NULL),
(62682, 17, '2020-11-10 00:00:01', 'Nghỉ', 0, NULL),
(62683, 17, '2020-11-11 00:00:01', 'Nghỉ', 0, NULL),
(62684, 17, '2020-11-12 00:00:01', 'Nghỉ', 0, NULL),
(62685, 17, '2020-11-13 00:00:01', 'Nghỉ', 0, NULL),
(62686, 17, '2020-11-14 00:00:01', 'Nghỉ', 0, NULL),
(62687, 17, '2020-11-15 00:00:01', 'Nghỉ', 0, NULL),
(62688, 17, '2020-11-16 00:00:01', 'Nghỉ', 0, NULL),
(62689, 17, '2020-11-17 00:00:01', 'Nghỉ', 0, NULL),
(62690, 17, '2020-11-18 00:00:01', 'Nghỉ', 0, NULL),
(62691, 17, '2020-11-19 00:00:01', 'Nghỉ', 0, NULL),
(62692, 17, '2020-11-20 00:00:01', 'Nghỉ', 0, NULL),
(62693, 17, '2020-11-21 00:00:01', 'Nghỉ', 0, NULL),
(62694, 17, '2020-11-22 00:00:01', 'Nghỉ', 0, NULL),
(62695, 17, '2020-11-23 00:00:01', 'Nghỉ', 0, NULL),
(62696, 17, '2020-11-24 00:00:01', 'Nghỉ', 0, NULL),
(62697, 17, '2020-11-25 00:00:01', 'Nghỉ', 0, NULL),
(62698, 17, '2020-11-26 00:00:01', 'Nghỉ', 0, NULL),
(62699, 17, '2020-11-27 00:00:01', 'Nghỉ', 0, NULL),
(62700, 17, '2020-11-28 00:00:01', 'Nghỉ', 0, NULL),
(62701, 17, '2020-11-29 00:00:01', 'Nghỉ', 0, NULL),
(62702, 17, '2020-11-30 00:00:01', 'Nghỉ', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `ID_ChucVu` int(30) UNSIGNED NOT NULL,
  `ChucVu` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id_nhanvien` int(50) UNSIGNED NOT NULL,
  `hoten` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `manhanvien` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(12) COLLATE utf8_unicode_ci DEFAULT 'Khác',
  `ngaysinh` date DEFAULT NULL,
  `quequan` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maphongban` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `ngayvao` date NOT NULL,
  `chucvu` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User',
  `dangnhapcuoi` timestamp NULL DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `chinhsuacuoi` timestamp NULL DEFAULT NULL,
  `anh` varchar(225) COLLATE utf8_unicode_ci DEFAULT 'normal.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id_nhanvien`, `hoten`, `manhanvien`, `gioitinh`, `ngaysinh`, `quequan`, `diachi`, `sdt`, `maphongban`, `trangthai`, `ngayvao`, `chucvu`, `dangnhapcuoi`, `ngaytao`, `chinhsuacuoi`, `anh`) VALUES
(2, 'Phạm Quốc Tuấn', 'NV00001', 'Nam', '2020-11-18', 'Hải Dương', 'Cầu Giấy-Hà Nội', '0983776901', 'NS001', 1, '2020-11-06', 'SupperAdmin', '2020-11-16 08:42:36', '2020-11-12', '2020-11-11 21:15:39', 'normal.png'),
(3, 'Phạm Quốc Tuấn', 'NV00002', 'Nữ', '2020-11-18', 'Hai Duong', 'HN', '0983776901', '009', 1, '2020-11-06', 'Admin', NULL, '2020-11-11', NULL, 'normal.png'),
(4, 'Lê Lung Linh', 'NV00003', 'Nữ', '2020-11-06', 'Hưng yên', 'Hà nội', '0981024320', '009', 1, '0000-00-00', 'User', NULL, '2020-11-11', NULL, 'normal.png'),
(5, 'Nguyễn Văn A', 'NV00004', 'Nam', '2020-11-01', 'Quảng Ninh', 'Hà Nội', '0988888888', '009', 1, '2020-11-12', 'User', NULL, '2020-11-11', NULL, 'normal.png'),
(6, 'Phạm Đăng Tuấn', 'NV00005', 'Nam', '2020-11-07', 'Hải Dương', 'Long Biên-Hà Nội', '0979604604', '009', 1, '2020-11-04', 'User', '2020-11-14 16:13:11', '2020-11-11', '2020-11-12 10:54:34', 'normal.png'),
(13, 'Lê Quốc Cường', 'NV00006', 'Nam', '2001-09-12', 'Bắc Ninh', 'Mai Dịch-Cầu Giấy- Hà Nội', '0988776901', 'TK001', 1, '2020-11-13', 'User', NULL, '0000-00-00', NULL, 'normal.png'),
(14, 'Phạm Tấn Tài', 'NV00007', 'Nam', '2020-11-11', 'Hà Nội', 'Đống Đa - Hà Nội', '0975678557', 'KD001', 1, '2020-11-11', 'User', NULL, '0000-00-00', NULL, 'normal.png'),
(15, 'Hoàng Văn Hùng', 'NV00014', 'Nam', '2020-11-11', 'Quảng Ninh', 'Cầu Giấy- Hà Nội', '0909123123', 'KT001', 1, '2020-11-11', 'User', NULL, '0000-00-00', NULL, 'normal.png'),
(16, 'Phạm Quốc Tuấn', 'NV00015', 'Nam', '2020-11-18', 'Hải Dương', 'Hà Nội', '0983776901', '009', 1, '2020-11-06', 'User', NULL, '2020-11-11', NULL, 'normal.png'),
(17, 'Đường Mía Trắng', 'NV00016', 'Nam', '2020-11-12', 'Hà Giang', 'Đống Đa - Hà Nội', '0123123321', 'KT001', 1, '2020-11-12', 'Admin', NULL, '2020-11-11', NULL, 'normal.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `maphong` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tenphong` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lienhe` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`maphong`, `tenphong`, `diachi`, `lienhe`) VALUES
('HC001', 'Phòng Hành Chính', 'p301', '0333444555'),
('KD001', 'Phòng Kinh Doanh', 'p306', '0398777888'),
('KT001', 'Phòng Kế Toán', 'p302', '0313313333'),
('KT002', 'Phòng Kĩ Thuật', 'p304', '0344555666'),
('NS001', 'Phòng Nhân Sự', 'p303', '0312345345'),
('TK001', 'Phòng Thiết Kế', 'p305', '0378609769');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `maduan` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã phòng phụ trách',
  `tenduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên dự án',
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả dự án',
  `NgayBatDau` date DEFAULT NULL COMMENT 'Ngày bắt đầu thực hiện dự án, ngày kickoff',
  `NgayBanGiao` date DEFAULT NULL COMMENT 'Ngày bàn giao dự án',
  `NgayKetThuc` date DEFAULT NULL COMMENT 'Ngày kết thúc dự án',
  `id_trangthai` int(11) NOT NULL DEFAULT 1,
  `id_nhanvien` int(11) DEFAULT NULL COMMENT 'ID của user tạo dự án',
  `manhanvien` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID_người phụ trách',
  `ngaytao` timestamp NULL DEFAULT NULL,
  `ngaysua` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `maduan`, `tenduan`, `mota`, `NgayBatDau`, `NgayBanGiao`, `NgayKetThuc`, `id_trangthai`, `id_nhanvien`, `manhanvien`, `ngaytao`, `ngaysua`) VALUES
(1, 'DA00001', 'Giờ vàng chốt số', NULL, '2020-01-25', NULL, '2020-01-31', 1, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(2, 'DA00002', 'Tử vi 24', NULL, '2020-01-01', NULL, NULL, 1, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(3, 'DA00003', 'Tri thức Việt', NULL, '2020-01-02', NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(4, 'DA00004', 'Nhật ký radio', NULL, '2020-01-03', NULL, NULL, 3, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(5, 'DA00005', 'BigIdol', NULL, '2020-01-13', NULL, NULL, 4, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(6, 'DA00006', 'Face life', NULL, '2020-01-05', NULL, NULL, 5, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(7, 'DA00007', 'Sổ liên lạc điện tử', 'Sổ liên lạc điện tử', '2020-11-07', '2020-11-18', '2020-11-30', 2, 5, 'NV00005', '2020-01-25 02:48:56', '2020-11-16 09:45:30'),
(8, '1', 'Mailserver', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(9, '1', 'Tevo Bulk SMS', NULL, NULL, NULL, NULL, 2, 5, 'NV00014', '2020-01-25 02:48:56', '2020-01-25 02:48:56'),
(10, 'DA00009', 'Hóa đơn Việt', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(11, '1', 'A hóa đơn', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(12, '1', 'ICT Life', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(13, '1', 'POSS', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(14, '1', 'M-Store', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(15, '1', 'MegaOne', NULL, NULL, NULL, NULL, 2, 5, 'NV00005', '2020-01-25 02:48:57', '2020-01-25 02:48:57'),
(16, '', '', NULL, NULL, NULL, NULL, 2, NULL, '', NULL, NULL),
(17, 'DA00016', 'Sổ Số Miền Bắc', '123123', '2020-11-01', '2020-11-30', '2020-11-26', 1, 2, 'NV00014', '2020-11-16 09:20:12', '2020-11-16 09:20:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id_task` int(12) UNSIGNED NOT NULL,
  `maduan` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id_nhanvien` int(22) UNSIGNED NOT NULL,
  `ngayvao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id_task`, `maduan`, `id_nhanvien`, `ngayvao`) VALUES
(1, 'DA00003', 2, '2020-11-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `id_TrangThai` int(30) UNSIGNED NOT NULL,
  `TrangThai` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai_project`
--

CREATE TABLE `trangthai_project` (
  `id_trangthai` int(12) UNSIGNED NOT NULL,
  `trangthai` varchar(22) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai_project`
--

INSERT INTO `trangthai_project` (`id_trangthai`, `trangthai`) VALUES
(1, 'Đang Chờ Duyệt'),
(2, 'Đã Duyệt'),
(3, 'Tạm Dừng'),
(4, 'Đã Hoàn Thành'),
(5, 'Đã Hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`id_ngaycong`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`ID_ChucVu`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id_nhanvien`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`maphong`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id_TrangThai`);

--
-- Chỉ mục cho bảng `trangthai_project`
--
ALTER TABLE `trangthai_project`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `id_ngaycong` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62703;

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `ID_ChucVu` int(30) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id_nhanvien` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id_TrangThai` int(30) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trangthai_project`
--
ALTER TABLE `trangthai_project`
  MODIFY `id_trangthai` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
