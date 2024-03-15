-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 12:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookwhalesdb`
--
CREATE DATABASE IF NOT EXISTS `bookwhalesdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookwhalesdb`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_img` varchar(255) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_translator` varchar(100) NOT NULL,
  `book_story` varchar(10000) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_stock` int(5) NOT NULL,
  `books_visit` int(10) NOT NULL DEFAULT 0,
  `stores_id` int(100) NOT NULL,
  `type_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_img`, `book_author`, `book_translator`, `book_story`, `book_price`, `book_stock`, `books_visit`, `stores_id`, `type_id`) VALUES
(36, 'BIOLOGY ชีววิทยา', '../seller/img/9786164230705.jpg', 'ศุภณัฐ ไพโรหกุล', '-', 'สรุปสาระสำคัญทั้งความรู้พื้นฐานและเนื้อหาที่ใช้สำหรับในการต่อยอดทางด้าน...ชีววิทยา เหมาะสำหรับนักเรียนในระดับมัธยมศึกษา และนักเรียนที่เตรียมตัวสอบแข่งขันในระดับต่างๆ อาทิ สอวน. ชีวิทยารอบแรก หรือ การสอบคัดเลือกเพื่อศึกษาต่อในระดับมหาวิทยาลัย โดยเฉพาะอย่างยิ่ง ในสาขาชีววิทยาโดยตรง หรือในสาขาวิทยาศาสตร์สาธารณสุขกลุ่มต่างๆ นอกจากนี้ ยังเหมาะกับบุคคลทั่วไปที่มีความสนใจเพิ่มเติมทางด้านชีววิทยาอีกด้วย', '560.00', 35, 7, 10, 3),
(37, 'ภาษาจักรวาล ประวัติย่อของคณิตศาสตร์', '../seller/img/9786169394006.jpg', 'อาจวรงค์ จันทมาศ', '-', 'คณิตศาสตร์เป็นวิชาที่หลายคนอาจไม่ชอบ เวลาเรียนอาจจะง่วง เวลาใกล้สอบอาจรู้สึกเจ็บป่วย ส่วนหนึ่งเพราะไม่เข้าใจที่มาที่ไปของวิชานี้ว่ามันมีประโยชน์อย่างไร และเกี่ยวข้องกับชีวิตประจำวันอย่างไร ผมจึงตั้งใจเขียนหนังสือเล่มนี้ขึ้นมาเพื่อตอบโจทย์ดังกล่าว ให้คนที่เกี่ยวข้องกับการเรียนการสอนและบุคคลทั่วไปที่สนใจ อ่านแล้วเห็นภาพรวมของวิชานี้มากขึ้นแบบเข้าใจง่ายๆ \r\n\r\nไม่ว่าเราจะชอบคณิตศาสตร์หรือไม่ มันก็แทรกซึมอยู่รอบตัวเราและวิธีคิดของมนุษย์เราอย่างแยกไม่ออก ลองนึกถึงสังคมมนุษย์ที่นับจำนวนหรือบวกลบคูณหารไม่ได้ดูสิครับ อารยธรรมและกิจกรรมต่างๆคงไม่สามารถเกิดขึ้นได้เลย และในเมื่อทฤษฎีพื้นฐานทางวิทยาศาสตร์ที่ใช้บรรยายธรรมชาติก็เขียนในรูปคณิตศาสตร์ นักวิทยาศาสตร์ไม่น้อยจึงเชื่อว่าคณิตศาสตร์อาจเป็นภาษาที่มีความสากลที่สุดในเอกภพ อันเป็นที่มาของชื่อหนังสือเล่มนี้', '313.00', 30, 20, 10, 3),
(38, 'ที่นี่ไม่ต้อนรับคนเฮงซวย', '../seller/img/9786161855901.jpg', 'Robert I. Sutton', 'วิกันดา จันทร์ทองสุข', '\"ที่นี่ไม่ต้อนรับคนเฮงซวย\" หนังสือที่ได้รับการกล่าวขวัญทั่วโลก ต้นกำเนิดของ \"ศิลปะการอยู่ร่วมกับคนเฮงซวย\" ที่ขายดีเป็นปรากฏการณ์\r\n\r\n    จากศิลปะการอยู่ร่วมกันให้ได้ ย้อนกลับไป \"ตัดปัญหาถึงต้นตอ\" ถึงเวลาสกัดกั้นไม่ให้คนเฮงซวยมาดึงองค์กรที่มีอารยธรรมให้ตกต่ำ ป้องกันและบรรเทาความเสียหายมหาศาลที่คนเฮงซวยได้ก่อขึ้นแล้ว หรือกำลังจะก่อขึ้น ไม่ว่าคนแย่ ๆ พวกนั้นจะเป็นหัวหน้า หรือเพื่อนร่วมงาน ไม่ว่าคนเดียวหรือเป็นฝูง ไม่ว่าความเฮงซวยนั้นจะมาในรูปของการกลั่นแกล้ง ทำตัวน่ารังเกียจ งี่เง่า เผด็จการ กดขี่ แทงข้างหลัง หรือปั่นประสาทด้วยวิธีใดก็ตาม\r\n\r\n    \"โรเบิร์ต ไอ. ซัตตัน\" ศาสตราจารย์จากมหาวิทยาลัยสแตนฟอร์ด นักเขียน International Bestseller จะช่วยคุณวางกฎอันทรงอานุภาพ ที่จะช่วยสร้างสภาพแวดล้อมการทำงาน \"ปลอดคนเฮงซวย\" ที่ซึ่งผู้คนให้เกียรติกัน กล้าหาญในทางสร้างสรรค์ และใช้พลังงานดี ๆ ผลักดันประสิทธิภาพของกันและกัน ไม่ใช่เขม่นและจ้องทำร้ายกันอย่างใจแคบและหยาบคาย ก่อบรรยากาศ toxic ที่ดูดพลังงานทุกคนให้เหือดแห้ง และหากว่าคุณสร้างที่ทำงานแบบนั้นไม่ได้จริง ๆ และไม่อาจหลีกเลี่ยง หรือเอาตัวเองออกมาจากสภาพแวดล้อมการทำงานที่มีคนเฮงซวยเพ่นพ่านอยู่ได้ \"คุณจะพบทางรอดอันเหมาะสม ชาญฉลาด\" โดยไม่เสียสติและไม่กลายเป็นคนเฮงซวยเสียเอง', '250.00', 45, 11, 11, 4),
(39, 'เหตุผลที่ต้องมีเหตุผล', '../seller/img/9786161855413.jpg', 'Steven Pinker', 'จีรชาตา เอี่ยมรัศมี', 'ในยุคสมัยที่ \"ความมีเหตุผล\" กำลังถูกคุกคาม ทั้งที่มันเป็นสิ่งจำเป็นมากยิ่งกว่ายุคไหน ๆ...\r\n\r\n    หนังสือ \"เหตุผลที่ต้องมีเหตุผล\" เล่มนี้ จะส่องสะท้อนให้เราเห็นโครงสร้างตรรกะอันง่อนแง่น ความเอนเอียง ความวิบัติในการเชื่อมโยงเหตุผลในความคิดของผู้คนมากมาย และแน่นอนรวมตัวเราเอง คุณจะได้เห็นชัด ๆ ว่าความไร้เหตุผลเป็นภัยอย่างไรต่อตัวคุณ คนรอบข้าง และประเทศชาติ และขณะเดียวกัน คุณก็จะได้รับเครื่องมือที่จะสร้างให้ตัวเองเป็นคนมีเหตุผล เครื่องมือนี้มอบให้โดย \"สตีเวน พิงเกอร์\" ผู้เขียนเป็นศาสตราจารย์ฮาร์วาร์ดที่สอนวิชาการใช้เหตุผลมายาวนาน \"เหนือสิ่งอื่นใดแล้ว ความเป็นเหตุเป็นผลเป็นสิ่งยืนยันความเป็นเหตุเป็นผลของตัวมันเอง และมันก็เป็นเพียงเครื่องมือ แต่ผู้ที่ต้องนำไปใช้คือคุณ\" ', '403.00', 89, 0, 11, 4),
(40, 'Crying in H Mart พื้นที่ให้เศร้า', '../seller/img/9786162985645.jpg', 'Michelle Zauner', 'C.S.', 'บันทึกความทรงจำของ มิเชลล์ ซอเนอร์ หญิงสาวชาวเกาหลี-อเมริกัน ศิลปินวงดนตรีอินดี้ร็อก Japanese Breakfast ที่ระหว่างวิ่งตามความฝัน โลกความเป็นจริงก็ดึงเธอกลับมาหาครอบครัว\r\n\r\nมิเชลล์ต้องเดินทางกลับบ้านเพื่อไปดูแลแม่ที่เพิ่งได้รับการวินิจฉัยว่าเป็นโรคมะเร็ง ทำให้เธอนึกย้อนถึงความทรงจำ ตั้งแต่ในช่วงวัยเด็กที่ผูกพันและมีแต่ความรัก ช่วงเวลาที่เติบโตและแยกห่าง ช่วงเวลาที่เมื่อผ่านไปกลับเป็นสิ่งสำคัญอย่างการเดินทางไปโซลเพื่อเยี่ยมครอบครัวของแม่\r\n\r\nนอกจากนี้ มิเชลล์ยังพยายามกอบโกยช่วงเวลาสุดท้ายที่จะได้ใช้ชีวิตร่วมกันกับครอบครัว พร้อมกับรวบรวมหลักฐานที่ยืนยันตัวตนความเป็นเกาหลี ทั้งสิ่งของ ภาษา รสชาติอาหาร และความรักในแบบที่แม่เคยมอบให้อีกครั้ง', '327.00', 71, 0, 11, 1),
(41, 'ปาจิงโกะ', '../seller/img/9786161853976.jpg', 'Min Jin Lee', 'ฐิติพงษ์ เหลืองอรุณเลิศ', '\"ชีวิตลากเราไปนั่นทีนี่ที นายแค่ต้องคอยเล่นไปตามเกม\"\r\n\r\nปาจิงโกะ บอกเล่าชีวิตของคนเกาหลีสี่ชั่วรุ่น ในหนึ่งศตวรรษแห่งการเปลี่ยนแปลง เรื่องราวอันเป็นจุดเริ่มต้นของชีวิตที่ประวัติศาสตร์หลงลืม', '499.00', 19, 0, 12, 1),
(42, 'ชายชื่ออูเว', '../seller/img/9000000000426_1.jpg', 'Fredrik Backman', 'ธีปนันท์ เพ็ชร์ศรี', 'อูเวเป็นชายวัยห้าสิบเก้าที่ทั้งชีวิตถนัดแค่สามอย่าง ซ่อมรถ ซ่อมบ้าน และรักผู้หญิงคนเดียวตลอดชีวิต\r\n\r\nจนวันหนึ่งที่ผู้หญิงคนนั้นตายจากไป และอูเวต้องกลายเป็นคนตกงานเพราะบริษัทมีนโยบาย “ล้างเลือดเก่า” อูเวจึงไม่เหลือเหตุผลที่จะมีชีวิตอยู่อีก\r\n“ความตาย” คือลำดับต่อไปที่เขานึกถึง...อูเววางแผนฆ่าตัวตาย\r\n\r\nอูเวแค่อยากจะตายอย่างสงบ และคิดว่านั่นไม่ใช่คำขอที่มากเกินไป\r\n\r\nแต่ก็อย่างที่เขาเรียนรู้มาทั้งชีวิต บางครั้งชีวิตก็ไม่ให้สิ่งที่เราคิดว่าเรามีสิทธิ์ที่จะได้อย่างง่ายๆ และอุปสรรคขัดขวางแผนฆ่าตัวตายของอูเวก็คือครอบครัวผู้หญิงท้องแก่ต่างชาติที่เพิ่งย้ายมาอยู่บ้านใกล้ๆ กับเจ้าแมวสารรูปพิการพิกลที่เดินงงๆเข้ามาเป็นส่วนหนึ่งของชีวิตเขา\r\n\r\nเมื่อตายไม่ได้ อูเวก็จำใจต้องมีชีวิตอยู่ต่อ พร้อมกันกับที่บางอย่างบางด้านของอูเวได้รับการเปิดเผยให้ใครๆรับรู้\r\n\r\nอูเว ผู้ชายที่ดูเหมือนว่าชีวิตมีแค่ดำกับขาว ผู้ที่ดำเนินชีวิตโดยยึดหลักการว่า อะไรถูกก็ต้องว่าไปตามถูก คนเดียวกับที่เคยเป็นที่รักของผู้หญิงคนหนึ่งโดยเธอให้เหตุผลว่า “เพราะข้างในคุณจะเต้นรำ อูเว เวลาที่ไม่มีใครมอง และตรงนั้นแหละที่ทำให้ฉันรักคุณ”\r\n\r\nเหล่านี้มีที่มา ก็เหมือนอย่างที่อูเวว่า “ถึงจุดหนึ่งเราต้องเลือกว่าจะเป็นคนแบบไหน” อูเวเลือกแล้ว และนี่คือเรื่องราวของเขา...', '323.00', 64, 0, 12, 1),
(43, 'ร้านกาแฟจันทร์เต็มดวงในคืนที่จันทร์ไม่เต็มดวง', '../seller/img/vb_1.jpg', 'ไม โมจิทสึกิ', 'พิมพ์พชร คุณโสภา', 'ผู้ที่รู้ว่าความปรารถนาที่แท้จริงของตัวเองคืออะไร\r\n\r\nย่อมมีพลังในการทำให้ความปรารถนานั้นเป็นความจริง\r\n\r\nแต่ในโลกยุคปัจจุบัน จะมีสักกี่คนที่ไม่หลงทางท่ามกลางความสับสนวุ่นวาย\r\n\r\nยินดีต้องรับสู่ร้านกาแฟจันทร์เต็มดวงที่เปิดทำการเป็นกรณีพิเศษในคืนจันทร์เสี้ยว\r\n\r\nเพื่อช่วยเหลือเหล่าผู้หลงทางทั้งหลายด้วยโหราศาสตร์และเมนูอาหารชั้นยอด\r\n\r\nทั้งซาโตมิที่ตัดสินใจเลือกไม่ได้ระหว่างงานกับการแต่งงาน \r\n\r\nโคยูกิผู้แสร้งทำตัวสดใสทั้งที่ภายในทุกข์ตรม\r\n\r\nและจุนโกะซึ่งแตกหักกับคนสำคัญในครอบครัวจนยากจะเยียวยา...\r\n\r\nถ้าคุณกำลังเหนื่อยล้ากับสิ่งที่ทำอยู่และหาทางออกไม่พบเสียที ก็ขอให้มาเยือนร้านกาแฟแห่งนี้\r\n\r\nให้เราช่วยนำทางคุณจนคุณค้นพบ\"ความปรารถนาที่แท้จริง\"', '261.00', 44, 0, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newpro`
--

CREATE TABLE `newpro` (
  `newpro_id` int(100) NOT NULL,
  `newpro_img` varchar(1000) NOT NULL,
  `newpro_name` varchar(1000) NOT NULL,
  `newpro_detail` varchar(1000) NOT NULL,
  `stores_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newpro`
--

INSERT INTO `newpro` (`newpro_id`, `newpro_img`, `newpro_name`, `newpro_detail`, `stores_id`) VALUES
(7, '../seller/img/dFQROr7oWzulq5Fa5BEdNhwDYYOAKLfAemM5FVrwPjLojjBBz7heEF1qfns3iSV1K3d.jpg', 'สี่อิ้วหิวแสง', 'เรื่องของสี่อิ้ว ผู้ล้างหู เมื่อถูกชวนไปเป็นขุนนางใหญ่ หลายครั้งที่ผมเล่า สี่อิ้วเป็นผู้รู้ผู้บรรลุ ไม่หลงติดอยู่ในลาภยศสรรเสริญ แต่น้อยครั้ง รวมครั้งนี้ สี่อิ้วป่วยเป็นโรคหิวแสง โรคที่คนสมัยใหม่หลายคนเป็น\r\n\r\nสี่อิ้วฉบับนี้ อยู่ในหนังสือสายธารแห่งปัญญา (สำนักพิมพ์ ก.ไก่ พ.ศ.2535) ครับ\r\n\r\nจีนสมัยตำนาน มีชายคนหนึ่งชื่อสี่อิ้ว พระเจ้าหยาวรู้ว่าเขาเป็นคนมีความรู้ความสามารถ ถึงระดับที่ดูแลบ้านเมืองได้ จึงคิดจะมอบบัลลังก์ให้\r\nแต่เขาไม่ยินดียินร้ายในข้อเสนอนั้น จึงหนีไปอยู่ที่ห่างไกล\r\n\r\nกระนั้น พระเจ้าหยาวก็ยังส่งตามไปเชิญ คราวนี้สี่อิ้วฮึดฮัด เดินหัวฟัดหัวเหวี่ยงไปนั่งล้างหูอยู่ริมลำธาร\r\n\r\nบังเอิญมีชายชราคนหนึ่ง จูงควายมากินน้ำ เห็นอาการ ก็แปลกใจ เดินมาถาม\r\n\r\n“เป็นอะไรหนักหนามาหรือ?”\r\n\r\n“พระเจ้าหยาวเรียกข้าไปเป็นเสนาบดีใหญ่” สี่อิ้วตอบ “ข้าเกรงว่าคำชักชวนอัปมงคลนี้ ทำให้รูหูข้าสกปรก จึงอยากมาล้างเสียให้สะอาด”\r\n\r\nชายชราฟังแล้ว แทนที่สรรเสริญ...แต่เขาก็บังเอิญมีข่าวลึกๆอยู่บ้างแล้ว จึงนินทาสี่อิ้วซึ่งหน้า\r\n\r\n“ถ้าหากท่านถูกชวนครั้งแรก ไม่อยากรับจริงๆก็น่าจะหลีกลี้ หนีไปอยู่ในป่าใหญ่เขาสูง ชนิดไ', 10),
(8, '../seller/img/dFQROr7oWzulq5Fa5BEdN2CvV3ZQF6ElKZWYGWcHwxun21Wsdgg9i1FmO33IKy634yf.jpg', '\"ดร.ภากร ปีตธวัชชัย\" ชวนอ่าน', 'เป็นคนไม่เชื่อการลงทุนในคริปโตเคอร์เรนซี แต่ ดร.ภากร ปีตธวัชชัย กรรมการและผู้จัดการตลาดหลักทรัพย์แห่งประเทศไทย (SET) ก็ไม่ใช่คนปฏิเสธเทคโนโลยี มิเช่นนั้นตลาดหลักทรัพย์ฯคงไม่มีผลิตภัณฑ์ใหม่ๆมานำเสนอต่อเนื่อง ตั้งแต่ LiVE Platform เวทีเข้าถึงแหล่งระดมทุนสำหรับคนตัวเล็ก ครอบคลุมเอสเอ็มอีและสตาร์ตอัพ ไปจนถึงศูนย์ซื้อขายสินทรัพย์ดิจิทัลไทย (Thai Digital Assets Exchange: TDX) แพลตฟอร์มสำหรับการซื้อขายโทเคนดิจิทัลทั้ง investment token และ utility token ซึ่งน่าจะคิกออฟได้ภายในไตรมาส 3 ปีนี้\r\n\r\nเพราะรู้ว่าไม่อาจเพิกเฉยต่ออนาคตที่กำลังไล่ล่าพวกเราทุกคน คุณภากรจึงมักศึกษาหาความรู้อยู่เสมอ หนึ่งในนั้นคือการอ่านหนังสือ และที่กำลังอินสุดๆ คือ “ATADIA” (อาทาเดีย) เขียนโดย ดร.ณภัทร จาตุศรี พิทักษ์ ทายาทคนโต 1 ใน 3 บุตรชายอัจ ฉริยะของ ดร.สมคิด-ผศ.อนุรัชนี จาตุศรี พิทักษ์ นั่นเอง\r\nATADIA ซึ่งเขียนกลับหัวกลับหางจากคำว่า AIDATA เป็นเรื่องราวเกี่ยวกับปัญญาประดิษฐ์ (AI) และข้อมูล (DATA) ซึ่งคุณภากรการันตีว่า อ่านสนุกมาก เป็นหนังสือที่มีทั้งส่วนที่เป็นข้อมูลจริงและส่วนที่เป็นนิยาย ไม่อยากสปอยล์เยอะ ขอให้ไปซื', 10),
(9, '../seller/img/dFQROr7oWzulq5Fa5BIVUbz5Tor79yEowouoGCW3hm0TFDgFCblrheyZdOqADRgh44p.jpg', 'สาลิกาลิ้นทอง', 'หลายเรื่อง ในศิลปวัฒนธรรม ฉบับเมษายน 2566 นับแต่ ตามรอยระเด่นลันได เครื่องทองเจ้าสามพระยา ฯลฯ ผมอ่านมาจนถึง เรื่องสาลิกาลิ้นทอง\r\n\r\nคุณบุญเลิศ คชายุทธเดช เขียนให้รู้จักศรคีรี ศรีประจวบ มากกว่าที่เคยรู้จักมาก่อน นี่คือนักร้องลูกทุ่ง ที่ร้องเพลง น้ำท่วม เพลงมนต์รักแม่กลอง เพลงคิดถึงพี่ไหม หนาวลมที่เรณู ฯลฯโด่งดังมาตั้งแต่ปี 2512\r\n\r\nเล่ากันว่า ทุกครั้งที่ศรคีรีร้องเพลง พูดกับใคร หรือหัวเราะ นอกจากจะไม่อ้าปาก บางครั้งยังเอามือปิดปาก\r\nรู้ๆกัน ศรคีรีสักยันต์สาลิกาเอาไว้ที่ฟัน ฝีมืออาจารย์สักชื่อ รื่น นิลแนบแก้ว บ้านอยู่แถวบางใหญ่ ต.กระดังงา ใกล้ๆตำบลบางกระบือ อำเภอบางคนที จังหวัดสมุทรสงคราม บ้านเกิดศรคีรีเอง\r\n\r\nศรคีรีเกิดปี 2478 ตอนหนุ่มๆขึ้นตาลมะพร้าว เวลาปีนถึงยอด...เขาร้องเพลง คำรณ สัมบุญณานนท์ เช่น เสือสำนึกบาป ฯลฯ ดังๆ จนเพื่อนๆเรียกไอ้บ้าเพลง\r\n\r\nบวชเรียนหนึ่งพรรษา สึกออกมาไปซื้อที่ปราณบุรี ทำไร่สับปะรด รวบรวมเพื่อนฝูงตั้งวงดนตรี รวมดาวเมืองปราณ ผู้ว่าฯประจวบเคยมาดูชอบใจ ตั้งชื่อให้ใหม่ จากศรชัย ทองประสงค์เป็นศรคีรี ศรีประจวบ\r\n\r\nร้องเพลงเรื่อยมา จนเป็นนักร้องเพลงดัง เวลาพูดจากับใคร ก็ไม่', 10),
(10, '../seller/img/dFQROr7oWzulq5Fa5BIbGDzC9xyQVe1HZfCaHIPy4hV91scAgXQ4qLHpOHcBmV8EZh9.jpg', 'พี่น้องสองโจ', 'โจโฉผู้ยิ่งใหญ่ สมัยสามก๊ก มีลูกชายเกิดจากฮูหยินเปี้ยนสองคน คนโต โจผี คนรอง โจสิด ระหว่างที่่ลูกทั้งสองเติบใหญ่ โจโฉยังไม่ปักใจ จะให้พี่หรือน้อง เป็นรัชทายาท\r\n\r\n(งำประกาย กโลบายไร้ผู้ต่อต้าน (เห่ง อู๋อั้ง เขียน อธิคม สวัสดิญาณ เรียบเรียง) สำนักพิมพ์เต๋าประยุกต์ 2553)\r\n\r\nโจโฉผู้พ่อ ได้ชื่อว่า เป็นนักการเมือง เป็นนักการทหาร และยังเป็นนักวรรณคดี เขาเป็นกวีที่ได้รับการยอมรับ เมื่อทราบชัด\r\nโจสิด อายุแค่สิบกว่าๆ ก็เขียนบทประพันธ์ได้เนื้อหาสละสลวย\r\nปราชญ์ใหญ่ในแผ่นดิน เคยกล่าวถึงโจสิด อัจฉริยภาพบนแผ่นดิน หากมีสิบโต่ว โจสิดคนเดียวเอาไปได้ 8 โตก บทกวีของเขาใช้ภาษาวิจิตรอลังการลื่นไหล คล้ายมีชีวิต\r\n\r\nกิตติศัพท์นี้เข้าหู โจโฉเรียกโจสิดไปถาม เจ้าเขียนบทกวีบทนี้เอง หรือให้ใครอื่นเขียน โจสิดคุกเข่าทูลว่า “ผู้บุตรพูดเป็นร้อยแก้ว เขียนเป็นร้อยกรอง จะใช้ผู้อื่นเขียนแทนได้อย่างไรกัน”\r\n\r\nโจโฉทดสอบโจสิดหลายครั้ง จนยอมรับว่าลูกคนรองสติปัญญาเป็นเลิศ ร่ำๆจะตั้งให้เป็นรัชทายาท แต่ต้องสะดุด เมื่อถูกทัก ตำแหน่งรัชทายาท ผู้นำในวันข้างหน้า จะต้องเก่งทางอื่นๆอีกด้วย\r\n\r\nท่าทีของโจโฉผู้พ่อ โจผีบุตรผู้พี่รู้ดี เขาพยา', 10),
(11, '../seller/img/dFQROr7oWzulq5Fa5BIbGDzC9xyQVe1HZfCaHIPy4hV91scAgXQ4qLHpOHcBmV8EZh9.jpg', 'อ่านเพิ่มความรู้', 'นะทีเป็นน้องมานะ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(100) NOT NULL,
  `orders_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `orders_fullname` varchar(50) NOT NULL,
  `orders_address` varchar(255) NOT NULL,
  `orders_phone` varchar(20) NOT NULL,
  `users_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_created`, `orders_fullname`, `orders_address`, `orders_phone`, `users_id`) VALUES
(37, '2023-06-12 02:08:12', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(38, '2023-06-12 02:14:51', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(39, '2023-06-12 02:15:09', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(40, '2023-06-12 02:21:39', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(41, '2023-06-12 02:23:40', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(42, '2023-06-12 03:30:05', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(43, '2023-06-12 04:02:40', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(44, '2023-06-12 04:05:54', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(45, '2023-06-12 04:06:12', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(46, '2023-06-12 04:07:05', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(47, '2023-06-12 04:07:52', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(48, '2023-06-12 04:08:36', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(49, '2023-06-12 04:12:26', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(50, '2023-06-12 04:17:14', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(51, '2023-06-12 04:18:00', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(52, '2023-06-12 04:22:55', 'user2 user2', 'user2 user2 user2 22222', '2222222222', 27),
(53, '2023-06-12 04:40:26', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(54, '2023-06-12 04:40:58', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(55, '2023-06-14 04:22:54', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(56, '2023-06-14 05:05:41', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(57, '2023-06-15 04:53:56', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26),
(58, '2023-06-15 08:02:07', 'user1 user1', 'user1 user1 user1 11111', '1111111111', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(100) NOT NULL,
  `detail_quantity` int(10) NOT NULL,
  `detail_price` decimal(10,2) NOT NULL,
  `detail_total` decimal(10,2) NOT NULL,
  `detail_status` int(11) NOT NULL DEFAULT 0,
  `detail_num` varchar(100) DEFAULT NULL,
  `detail_slip` varchar(100) DEFAULT NULL,
  `orders_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `ohistory_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `detail_quantity`, `detail_price`, `detail_total`, `detail_status`, `detail_num`, `detail_slip`, `orders_id`, `book_id`, `ohistory_id`, `post_id`) VALUES
(55, 1, '250.00', '250.00', 2, NULL, NULL, 50, 38, 3, 0),
(56, 1, '250.00', '250.00', 3, '123', '../seller/img/348382837_226189133501941_6788705858838722306_n.jpg', 51, 38, 6, 1),
(57, 1, '403.00', '403.00', 3, '123456879', '../seller/img/348382837_226189133501941_6788705858838722306_n.jpg', 52, 39, 4, 0),
(60, 1, '313.00', '313.00', 0, NULL, '../seller/img/348382837_226189133501941_6788705858838722306_n.jpg', 54, 37, 0, 0),
(61, 1, '403.00', '403.00', 1, NULL, '../seller/img/348382837_226189133501941_6788705858838722306_n.jpg', 54, 39, 0, 0),
(63, 2, '560.00', '1120.00', 0, NULL, NULL, 55, 36, 0, 0),
(64, 2, '313.00', '626.00', 0, NULL, NULL, 55, 37, 0, 0),
(65, 1, '560.00', '560.00', 0, NULL, '../seller/img/vb_1.jpg', 56, 36, 0, 0),
(66, 2, '313.00', '626.00', 0, NULL, '../seller/img/vb_1.jpg', 56, 37, 0, 0),
(67, 3, '250.00', '750.00', 3, '212', '../seller/img/vb_1.jpg', 56, 38, 7, 2),
(68, 2, '403.00', '806.00', 0, NULL, '../seller/img/vb_1.jpg', 56, 39, 0, 0),
(69, 2, '313.00', '626.00', 0, NULL, '../seller/img/dFQROr7oWzulq5Fa5BIbGDzC9xyQVe1HZfCaHIPy4hV91scAgXQ4qLHpOHcBmV8EZh9.jpg', 57, 37, 0, 0),
(70, 1, '313.00', '313.00', 0, NULL, NULL, 58, 37, 0, 0),
(71, 1, '327.00', '327.00', 0, NULL, NULL, 58, 40, 0, 0),
(72, 1, '323.00', '323.00', 0, NULL, NULL, 58, 42, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_history`
--

CREATE TABLE `orders_history` (
  `ohistory_id` int(100) NOT NULL,
  `ohistory_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_history`
--

INSERT INTO `orders_history` (`ohistory_id`, `ohistory_created`, `detail_id`) VALUES
(2, '2023-06-12 04:01:58', 51),
(3, '2023-06-12 04:18:54', 55),
(4, '2023-06-12 04:28:37', 57),
(5, '2023-06-12 04:47:03', 62),
(6, '2023-06-14 12:57:32', 56),
(7, '2023-06-14 12:57:34', 67);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(100) NOT NULL,
  `post_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_name`) VALUES
(1, 'Kerry Express'),
(2, 'Flash Express'),
(3, 'DHL Express'),
(4, 'Ninja Van'),
(5, 'J&T Express');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(100) NOT NULL,
  `stores_id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `stores_id`, `users_id`, `rating`) VALUES
(1, 14, 26, 0),
(2, 10, 26, 3),
(3, 12, 26, 4),
(4, 10, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `stores_id` int(100) NOT NULL,
  `stores_name` varchar(255) NOT NULL,
  `stores_email` varchar(50) NOT NULL,
  `stores_password` varchar(50) NOT NULL,
  `stores_img` varchar(255) NOT NULL,
  `stores_address` varchar(255) NOT NULL,
  `stores_district` varchar(100) NOT NULL,
  `stores_province` varchar(100) NOT NULL,
  `stores_zipcode` varchar(10) NOT NULL,
  `stores_map` varchar(1000) NOT NULL,
  `stores_phone` varchar(20) NOT NULL,
  `stores_facebook` varchar(100) DEFAULT NULL,
  `stores_line` varchar(100) DEFAULT NULL,
  `stores_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `stores_qr` varchar(1000) NOT NULL,
  `stores_permit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`stores_id`, `stores_name`, `stores_email`, `stores_password`, `stores_img`, `stores_address`, `stores_district`, `stores_province`, `stores_zipcode`, `stores_map`, `stores_phone`, `stores_facebook`, `stores_line`, `stores_created`, `stores_qr`, `stores_permit`) VALUES
(10, 'OpenDurian หนังสือ&คอร์สเรียน', 'OpenDurian@store1', '11111111', '../seller/profile/upload/sg-11134004-23020-oodgqiubsinv04_tn.jpg', '-', '-', '-', '11111', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3788.0826203107126!2d99.50040917598213!3d18.297829475938673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d96d6ddaf6a86b%3A0x1e3aeb9d5dd00e8b!2z4Lir4LmJ4Lit4LiH4Liq4Lih4Li44LiU4Liq4Li44LiU4Lir4Lij4Li54LiU4Li54LmB4Lie4LiHIOC5geC4reC4o-C5jOC5gOC4ouC5h-C4meC4q-C4peC4seC4muC5gOC4nuC4peC4tOC4mQ!5e0!3m2!1sth!2sth!4v1686692143848!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1111111111', 'OpenDurian', '@OpenDurian', '2023-06-12 01:10:05', '../seller/img/0812345678.png', '0'),
(11, 'I AM THE BEST', 'iamthebest@store2', 'iamthebest@store2', '../seller/profile/upload/5833b149b2f704c805b3f2bec2653b87_tn.jpg', '-', '-', 'กรุงเทพมหานคร', '22222', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3787.6468635909196!2d99.39965179524536!3d18.317750694043344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d96f264a1dd1f9%3A0xf0346c6d9b33150!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiY4Lij4Lij4Lih4Lio4Liy4Liq4LiV4Lij4LmMIOC4qOC4ueC4meC4ouC5jOC4peC4s-C4m-C4suC4hw!5e0!3m2!1sth!2sth!4v1686747956939!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2222222222', 'I AM THE BEST official', '@iamthebestofficial', '2023-06-12 01:21:22', '../seller/img/0816273893.png', '1'),
(12, 'mystery.booklet', 'mb@store3', '33333333', '../seller/profile/upload/fa67f72ba146b9014bf756f2124f36f3_tn.jpg', 'mystery', 'mystery', 'mystery', '33333', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d483056.6456728549!2d97.80987345428159!3d18.936703021746492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30daa5656552dc99%3A0x3abd3a783fa5831c!2z4LmA4Lih4Li14Lii4Liq4Li14LmIIOC4q-C4oeC4teC5iOC5gOC4geC4teC5iuC4ouC4pw!5e0!3m2!1sth!2sth!4v1686692203082!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '3333333333', 'mystery.booklet', 'mysbook', '2023-06-12 01:31:01', '../seller/img/0882734631.png', '0'),
(14, 'ลำโพงมันดัง', 'store4@store4', 'store4@store4', '../seller/profile/upload/310d4bc762d57feec8a0852cbf1fd0bf.jpg', 'ลำโพงมันดัง', 'ลำโพงมันดัง', 'ลำโพงมันดัง', '12345', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d484824.5648075762!2d99.10282077774154!3d18.31569218826934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da4bb6711b29bf%3A0x4cce15c991ce1460!2z4Lij4LmJ4Liy4LiZ4LmA4LiV4Li14LmL4Lii4Lin4LmB4LiB4LmJ4LiH4LmI4Lin4LiH!5e0!3m2!1sth!2sth!4v1686684761513!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1234567890', 'ลำโพงมันดัง', 'ลำโพงมันดัง', '2023-06-13 18:48:53', '../seller/img/0882734631.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(100) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'นิยาย/วรรณกรรม'),
(2, 'บริหาร'),
(3, 'การศึกษา'),
(4, 'จิตวิทยาและการพัฒนาตัวเอง'),
(5, 'หนังสือเด็กและการ์ตูนความรู้'),
(6, 'การ์ตูนและไลท์โนเวล'),
(7, 'วิทยาการและเทคโนโลยี'),
(8, 'ความรู้ทั่วไป'),
(9, 'ประวัติศาสตร์ ศาสนา วัฒนธรรม การเมือง การปกครอง'),
(10, 'อัตชีวประวัติ ชีวประวัติ'),
(11, 'อาหารและสุขภาพ'),
(12, 'บันเทิงและท่องเที่ยว'),
(13, 'การเกษตรและธรรมชาติ'),
(14, 'ครอบครัว'),
(15, 'บ้านและที่อยู่อาศัย');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(100) NOT NULL,
  `users_firstname` varchar(50) NOT NULL,
  `users_lastname` varchar(50) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_password` varchar(50) NOT NULL,
  `users_img` varchar(255) NOT NULL,
  `users_province` varchar(30) NOT NULL,
  `users_district` varchar(30) NOT NULL,
  `users_zip` varchar(10) NOT NULL,
  `users_address` varchar(255) NOT NULL,
  `users_mobile` varchar(20) NOT NULL,
  `users_role` varchar(1) NOT NULL,
  `users_permit` varchar(10) NOT NULL,
  `users_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_firstname`, `users_lastname`, `users_email`, `users_password`, `users_img`, `users_province`, `users_district`, `users_zip`, `users_address`, `users_mobile`, `users_role`, `users_permit`, `users_created`) VALUES
(25, 'IT', 'ADMIN', 'master@bookwhales', '1234', '', '', '', '', '', '', '0', '1', '2023-06-14 05:02:29'),
(26, 'user1', 'user1', 'user1@user1', 'user1user1', '../buyer/profile/upload/d76b4ba5cf6559fbd7e8ad9dc81b96fa58f2db1d_full.jpg', 'user1', 'user1', '11111', 'user1', '1111111111', '1', '1', '2023-06-14 05:02:33'),
(27, 'user2', 'user2', 'user2@user2', 'user2user2', '../buyer/profile/upload/329051545_120442500785601_3730823797149918024_n.jpg', 'user2', 'user2', '22222', 'user2', '2222222222', '1', '1', '2023-06-14 05:02:36'),
(28, 'user3', 'user3', 'user3', 'user3user3', '../buyer/profile/upload/999.jfif', 'user3', 'user3', '33333', 'user3', '3333333333', '1', '1', '2023-06-14 05:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `users_id`, `book_id`) VALUES
(15, 26, 36),
(12, 26, 37),
(17, 26, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `stores_id` (`stores_id`);

--
-- Indexes for table `newpro`
--
ALTER TABLE `newpro`
  ADD PRIMARY KEY (`newpro_id`),
  ADD KEY `stores_id` (`stores_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `orders_id` (`orders_id`,`book_id`),
  ADD KEY `books_id` (`book_id`),
  ADD KEY `ohistory_id` (`ohistory_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `orders_history`
--
ALTER TABLE `orders_history`
  ADD PRIMARY KEY (`ohistory_id`),
  ADD KEY `detail_id` (`detail_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `stores_id` (`stores_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`stores_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `users_id` (`users_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `newpro`
--
ALTER TABLE `newpro`
  MODIFY `newpro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `orders_history`
--
ALTER TABLE `orders_history`
  MODIFY `ohistory_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `stores_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`stores_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `newpro`
--
ALTER TABLE `newpro`
  ADD CONSTRAINT `stores_id` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`stores_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`stores_id`) REFERENCES `stores` (`stores_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"angular_direct\":\"angular\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bookwhalesdb\",\"table\":\"books\"},{\"db\":\"bookwhalesdb\",\"table\":\"stores\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-06-15 10:55:06', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
