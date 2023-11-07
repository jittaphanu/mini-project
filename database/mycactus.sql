-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycactus`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quatity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `order_id`, `product_id`, `order_quatity`) VALUES
(1, 1, 1, 2),
(2, 1, 5, 1),
(3, 1, 10, 3),
(4, 2, 30, 5),
(5, 3, 23, 4),
(6, 3, 45, 2),
(8, 0, 29, 1),
(9, 6, 17, 1),
(10, 7, 12, 1),
(11, 7, 8, 1),
(12, 8, 14, 1),
(13, 8, 34, 1),
(14, 8, 67, 1),
(15, 9, 3, 2),
(16, 9, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `first_name`, `last_name`, `email`, `password`, `address`, `tel`, `image`) VALUES
(1, 'lisswka', '', '', 'somsriwallhack@gmail.com', '02893', '', '', 'S__56123600.jpg'),
(2, 'art', 'jittaphanu', 'kumdee', 'artz@gmail.com', '123', '123 จ.กรุงเทพ', '0987654456', '2.jpg'),
(3, 'por', 'jidapa', 'chaiyakul', 'por@gmail.com', '1234', '4556 จ.ลำปาง', '0989898989', 'Screenshot 2023-11-07 151401.jpg'),
(4, 'pare', 'pichakorn', 'kongmai', 'paree@gamil.com', '33333', '3345 จ.กรุงเทพ', '0864213578', ''),
(5, 'test', '', '', 'asada@gmail.com', '7e8dc366b4', '', '', 'S__56123614.jpg'),
(7, 'test1', 'มาม่า', 'อร่อยดี', 'mml@gmail.com', '028938ef36', '98/45632/123 กุงเทพ', '0855561405', 'S__56123618.jpg'),
(8, 'test2', 'tester', 'fortest', 'passis1234@gmail.com', '81dc9bdb52', '1234', '12343', ''),
(9, 'test3', 'test3', 'test4', 'passis1234@gmail.com', '81dc9bdb52', '12312313', '123123123', ''),
(10, 'asdasdasdadasds', 'asdasdasdad', 'asdasdasdad', 'test99@gmail.com', '123', 'asdaweawdawd', '1231231231', ''),
(11, 'jiaa', 'ainlge', 'hjk', 'ee@gmail.com', '67890', '122', '0987654321', 'ja.png'),
(12, 'testsql;', 'hisql123', 'map', '123@hello.com', 'ffff11', '456 จ.นนทบุรี', '0987654321', 'image.jpg'),
(15, 'testsql', 'hisql123', 'map', 'ee@gmail.com', 'ddd123', '456 จ.นนทบุรี', '0987654321', ''),
(16, 'testsql', 'sqlmap', 'map', '123@hello.com', 'dd1234', '456 จ.นนทบุรี', '0987654321', 'image.jpg'),
(17, 'testsql;', 'hisql123', 'map', '.asd123@gmail.com', 'ddd123', '122', '0987654321', 'image.jpg'),
(18, 'admin', 'ad', 'min', 'admin@gmail.com', '1234', '123', '0987654321', 'exclamation-mark (1).png'),
(19, 'finaltest', 'final', 'test', 'finaltest@gmail.com', '123', 'จังหวัด : ชัยนาท, อำเภอ : สรรคบุรี, ตำบล : โพงาม, รหัสไปรษณีย์ : 17140', '0987654321', 'IMG_4509.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `member_id`, `date`, `time`) VALUES
(1, 3, '2023-09-20', '18:30:00'),
(2, 1, '2023-09-23', '08:45:12'),
(3, 1, '2023-09-25', '21:26:56'),
(4, 3, '2023-11-06', '15:28:58'),
(5, 3, '2023-11-06', '15:31:10'),
(6, 3, '2023-11-06', '15:33:54'),
(7, 3, '2023-11-06', '15:35:36'),
(8, 19, '2023-11-07', '02:45:25'),
(9, 3, '2023-11-07', '15:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `specise_id` int(11) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pdetail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock_quatity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `specise_id`, `pname`, `pdetail`, `price`, `stock_quatity`) VALUES
(1, 1, 'เดย์ดรีม', 'Gymnocalycium Daydream', 450, 20),
(2, 1, 'ซีเปีย', 'Gymnocalycium Sepia', 150, 20),
(3, 1, 'พิงค์ไดมอนด์', 'Gymnocalycium Pink Diamond', 450, 20),
(4, 1, 'มาร์เบิ้ล', 'Gymnocalycium variegata marble', 350, 20),
(5, 1, 'อ้วนส้ม', 'Gymnocalycium Variegata Carnelian', 250, 20),
(6, 1, 'T31115', 'Gymnocalycium ‘T31115’', 150, 20),
(7, 1, 'แบล็ควิโดว์', 'Gymnocalycium Black Widow ', 30, 20),
(8, 1, 'ทีเร็กซ์', 'Gymnocalycium T-Rex', 150, 20),
(9, 1, 'ทีลักซ์', 'Gymnocalycium T-LUX', 400, 20),
(10, 1, 'เซอร์เจ้นท์แซม', 'Gymnocalycium Sergeant Sam ', 330, 20),
(11, 1, 'แบล็คเพิร์ล', 'Gymnocalycium variegated ‘Black Pearl’ ', 390, 20),
(12, 1, 'ไฟเวิร์ค ', 'Gymnocalycium Firework', 500, 20),
(13, 2, 'แมมขนนกขาว ดอกขาว', 'Mammillaria Schiedeana', 80, 20),
(14, 2, 'แมมขนนกขาว ดอกชมพู', 'Mammillaria Schiedeana', 80, 20),
(15, 2, 'แมมขนนกขาว ดอกเหลือง', 'Mammillaria Schiedeana', 80, 20),
(16, 2, 'ขนแมว', 'Mammillaria Bocasana', 130, 20),
(17, 2, 'เลาอาย', 'Mammillaria Laui ', 120, 20),
(18, 2, 'ผู้เฒ่า', 'Cephalophorus Senilis หรือ Old Man Cactus', 450, 20),
(19, 2, 'คาร์มีเนขาว', 'Mammillaria Carmenae', 50, 20),
(20, 2, 'คาร์มีเหลือง', 'Mammillaria Carmenae', 150, 20),
(21, 2, 'คาร์มีแดง', 'Mammillaria Carmenae', 60, 20),
(22, 2, 'เลนต้า', 'Mammillaria lenta ', 350, 20),
(23, 2, 'ลูกกอล์ฟ', 'Mammillaria Humboldtii', 200, 20),
(24, 3, 'ถังทอง', 'Echinopsis grusonii ', 40, 20),
(25, 3, 'กระบองทอง', 'Echinopsis leninghausii ', 150, 20),
(26, 3, 'ดาวล้อมเดือน', 'Echinopsis calochlora ', 50, 20),
(27, 3, 'นูปต้า', 'Echinopsis subdenudata ', 30, 20),
(28, 3, 'หยก', 'Cereus peruvianus f.cristata', 120, 20),
(29, 3, 'ด่างกระจายลายหินอ่อน', 'Echinopsis eyriesii variegated', 250, 20),
(30, 3, 'แองเจิ้ล', 'Echinopsis Hybrid Angel', 40, 20),
(31, 3, 'สายเลื้อย', 'Echinopsis chamaecereus', 50, 20),
(32, 3, 'บอลลูน', 'Echinopsis subdenudata', 30, 20),
(33, 4, 'หอยแม่น', 'Astrophytum asterias', 150, 20),
(34, 4, 'เขาแพะ', 'Astrophytum capricorne ', 250, 20),
(35, 4, 'เมดูซ่า', 'Astrophytum caput-medusae ', 150, 20),
(36, 4, 'โคฮุยเลนส์', 'Astrophytum coahuilense ', 350, 20),
(37, 4, 'หมวกสังฆราช', 'Astrophytum myriostigma ', 80, 20),
(38, 4, 'ออนาตัม ', 'Astrophytum ornatum', 120, 20),
(39, 5, 'หูกระต่าย สีเหลือง', 'Opuntia Microdasys ', 40, 20),
(40, 5, 'หูมิกกี้เม้าส์ ', 'Opuntia rufida', 80, 20),
(41, 5, 'หูกระต่าย สีส้ม', 'Opuntia Microdasys', 20, 20),
(42, 5, 'สามร้อยยอด', 'Opuntia macrocentra', 40, 20),
(43, 5, 'หูกระต่าย สีขาว', 'Opuntia microdasys ', 40, 20),
(44, 6, 'ปราสาทนางฟ้า', 'Cereus Tetragonus', 80, 20),
(45, 6, 'รั้ว', 'Cereus marginatus', 100, 20),
(46, 6, 'สไปราลิส', 'Cereus validus Spiralis', 700, 20),
(47, 6, 'คฤหาสน์นางฟ้า', 'Cereus tetragonus Fairy Castle', 200, 20),
(48, 6, 'ปะการังคริส', 'Cereus spegazzinii', 50, 20),
(49, 6, 'ฟอร์เบซิอาย ', 'Cereus forbesii', 600, 20),
(50, 6, 'จามาคารู', 'Cereus Jamacaru', 80, 20),
(51, 7, 'ลอลา', 'Echeveria Lola', 100, 20),
(52, 7, 'แกรปโตเวีย', 'Echeveria Graptoveria Silver Star', 60, 20),
(53, 7, 'ลอลี่', 'Echeveria rolly', 40, 20),
(54, 7, 'ซาร่า', 'Echeveria zaragoza', 70, 20),
(55, 7, 'กิลล์', 'Echeveria gilva', 90, 20),
(56, 8, 'ม้าทราย', 'Haworthia Picta Concolor', 70, 20),
(57, 8, 'ไก่ต็อกลายจุด', 'Haworthia coarctata v. tenuis', 70, 20),
(58, 8, 'ไก่ต็อก', 'Haworthia coarctata ', 70, 20),
(59, 8, 'ม้ามรกต', 'Haworthia coarctata var. greenii ', 70, 20),
(60, 1, 'คาร์เนเลี่ยน สีชมพู', 'Gymnocalycium Variegata Carnelian', 350, 20),
(61, 1, 'คาร์เนเลี่ยน สีส้ม', 'Gymnocalycium Variegata Carnelian', 350, 20),
(62, 2, 'ขนเเกะ สีชมพู', 'Mammillaria Bocasana', 200, 20),
(63, 2, 'ขนเเกะ สีส้ม', 'Mammillaria Bocasana', 200, 20),
(64, 8, 'ว่ายหางจระเข้', 'Haworthia Aloe', 100, 20),
(65, 8, 'กุหลาบหิน', 'Haworthia reticulata', 90, 20),
(66, 8, 'กุหลาบหิน สีม่วง', 'Haworthia Springbokvlakensis', 120, 20),
(67, 8, 'บอลกระจก', 'Haworthia Mirror Ball', 150, 20),
(68, 8, 'บัวแก้ว', 'Haworthia Cooperi Baker', 50, 20),
(69, 8, 'ม้าเวียนด่าง', 'Haworthia limifolia', 300, 20),
(70, 8, 'แฟรี่', 'Haworthia Limifolia Fairy Washboard', 70, 20),
(71, 8, 'หยดน้ำ', 'Haworthia cooperi', 180, 20),
(72, 8, 'ฟันม้า', 'Haworthia Truncata Lime Green', 120, 20),
(73, 3, 'คลื่นสมอง', 'Echinofossulocactus Multicostatus', 250, 20),
(74, 7, 'แอปเปิ้ล สีน้ำเงิน', 'Echeveria Blue Apple', 40, 20),
(75, 7, 'ไจแอ้น', 'Echeveria Mexican Giant Colorata', 80, 20),
(76, 7, 'แอเรียล', 'Echeveria Ariel', 120, 20),
(77, 7, 'มินิมา', 'Echeveria Blue Minima', 50, 20),
(78, 7, 'มอนิ่งบิวตี้', 'Echeveria Morning Beauty', 100, 20),
(79, 7, 'นานะ', 'Echeveria Nanahukumini', 60, 20),
(80, 7, 'โพโตสินา', 'Echeveria Elegans Potosina', 60, 20),
(81, 7, 'คริสตัล', 'Echeveria Crystal Rose', 50, 20),
(82, 4, 'กิ๊กโกะ', 'Astrophytum Kikko', 400, 20),
(83, 4, 'คาบูโตะ', 'Astrophytum Kabuto', 180, 20),
(84, 4, 'ดอกแดง', 'Astrophytum', 150, 20),
(85, 4, 'มายริโอ้', 'Astrophytum Myriostigma', 250, 20),
(86, 4, 'เมดูซ่าด่าง', 'Astrophytum Carput-Medusa ', 190, 20),
(87, 4, 'ปลาดาว', 'Astrophytum', 150, 20),
(88, 5, 'หนามดูด', 'Opuntia Cylindropuntia fulgida', 20, 20),
(89, 5, 'ตุ๊กตาไม้', 'Opuntia Elata', 40, 20),
(90, 5, 'โมนาแคน', 'Opuntia Monacantha Variegata', 70, 20),
(91, 5, 'หูกระต่าย หิมะ', 'Opuntia Snow หรือ Opuntia erinacea', 50, 20),
(92, 5, 'ไข่จิ๋ว', 'Opuntia Cylindropuntia imbricata', 70, 20),
(93, 5, 'หูช้างคริส', 'Opuntia Microdasys Var. Pallida', 20, 20),
(94, 6, 'ตอริทเทอโร', 'Cereus Riterocereus', 60, 20),
(95, 6, 'ไม้ลำ', 'Cereus Pilosocereus Gounellei', 150, 20),
(96, 6, 'หนามทอง', 'Cereus Pilosocereus Tillianus', 60, 20),
(97, 6, 'ปราสาทนางฟ้าด่าง', 'Cereus tetragonus Variegated ', 120, 20),
(98, 6, 'ไม้ลำ สีฟ้า', 'Cereus Azureus', 150, 20);

-- --------------------------------------------------------

--
-- Table structure for table `specise`
--

CREATE TABLE `specise` (
  `specise_id` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specise`
--

INSERT INTO `specise` (`specise_id`, `sname`) VALUES
(1, 'Gymnocalycium'),
(2, 'Mammillaria'),
(3, 'Echinopsis'),
(4, 'Astrophytum'),
(5, 'Opuntia'),
(6, 'Cereus'),
(7, 'Echeveria'),
(8, 'Haworthia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `specise`
--
ALTER TABLE `specise`
  ADD PRIMARY KEY (`specise_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `specise`
--
ALTER TABLE `specise`
  MODIFY `specise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
