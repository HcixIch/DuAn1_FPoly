-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2024 lúc 05:34 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `arsenal`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `name_blog` varchar(250) NOT NULL,
  `img_blog` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_blog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Đồ nam'),
(2, 'Đồ nữ'),
(3, 'Phụ kiện'),
(4, 'Đồ lưu niệm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `total_all` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `provisional_total` float NOT NULL,
  `payment_option` varchar(250) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `full_name`, `address`, `phone`, `total_all`, `shipping_cost`, `provisional_total`, `payment_option`, `id_voucher`, `id_user`) VALUES
(3, '1', '1', '1', 1, 1, 1, '1', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `text_cmt` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` date NOT NULL,
  `an_danh` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `unit_price` float NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `date_order` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_cart_detail`, `quantity`, `price`, `unit_price`, `id_product`, `id_checkout`, `date_order`) VALUES
(562684, 1, 684600, 1, 19, 3, '2024-11-28 22:15:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `img_product` varchar(250) NOT NULL,
  `name_product` varchar(250) NOT NULL,
  `price_product` float NOT NULL,
  `description_product` text NOT NULL,
  `sale` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `description_summary` text NOT NULL,
  `sold_product` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `img_product`, `name_product`, `price_product`, `description_product`, `sale`, `hot`, `id_category`, `quantity_product`, `description_summary`, `sold_product`) VALUES
(1, 'product-1.webp', 'Áo Arsenal adidas 24/25 Originals', 2888800, 'Áo sơ mi Arsenal adidas 24/25 Originals mang phong cách thể thao tinh tế, kết hợp thiết kế cổ điển với vẻ đẹp hiện đại. Kiểu dáng ôm sát giúp tăng cường chuyển động, cùng với chi tiết ba sọc biểu tượng ở vai và khẩu pháo gia nhiệt ở ngực, chiếc áo này sẽ giữ bạn ấm áp và phong cách trong nhiều mùa tới. <br><br>\n\nChiếc áo này được làm từ 100% polyester tái chế, là một phần trong nỗ lực chung tay giảm thiểu rác thải nhựa. <br><br>\n\nPháo gia nhiệt ở ngực <br> Khẩu hiệu AFC thêu ở cổ áo <br> Cổ tròn có gân <br> Vừa vặn <br> Màu sắc: Xanh lam <br>\n\nChất liệu: 100% polyester tái chế', 10, 1, 1, 1000, 'Áo sơ mi Arsenal adidas 24/25 Originals có thiết kế ôm sát, chi tiết ba sọc ở vai và khẩu pháo gia nhiệt ở ngực. Được làm từ 100% polyester tái chế, áo mang phong cách thể thao cổ điển, màu xanh lam nổi bật.', 124),
(2, 'product-2.webp', 'Áo hoodie Arsenal adidas 24/25 Originals', 2888800, 'Kết hợp vẻ ngoài cổ điển với sự thoải mái cao cấp và chất liệu thân thiện với môi trường, Áo hoodie Arsenal 24/25 Originals là sản phẩm gần nhất mà bạn có thể có được với sự hoàn hảo trong tủ đồ.<br>\nĐược chế tác từ hỗn hợp cotton và polyester ấm áp, áo có kiểu dáng hộp thoải mái, bo gấu tay và gấu áo có gân và họa tiết đại bác thêu ở giữa ngực để tạo nên phong cách mới mẻ cho trang phục thể thao cổ điển, theo phong cách của Arsenal.<br>\nChiếc áo hoodie adidas này được làm một phần từ vật liệu tái chế như một phần trong tham vọng chung tay chấm dứt rác thải nhựa của chúng tôi.<br>\nPháo thêu<br>\nVừa vặn rộng rãi<br>\nMũ trùm đầu có thể điều chỉnh bằng dây rút<br>\nCổ tay và gấu áo có gân<br>\nTúi trước<br>\nMàu sắc: Xanh lam<br>\nMã sản phẩm: MIS6501<br>\nChất liệu: 78% cotton, 22% polyester tái chế', 0, 0, 1, 1000, '', 51),
(3, 'product-3.webp', 'Áo thun Arsenal adidas 24/25 Originals Track', 2888800, 'Thiết kế vượt thời gian kết hợp với sự thoải mái vượt trội. Với vẻ ngoài lấy cảm hứng từ phong cách cổ điển và cấu trúc bằng nylon nhẹ, Áo thun Arsenal adidas 24/25 Originals Track Top sẽ mang đến cho bạn sự ấm áp bất cứ khi nào bạn cần. Với khóa kéo toàn bộ có cổ đứng, hình khẩu pháo thêu ở ngực và khẩu hiệu Gothic Arsenal ở mặt sau, áo sẽ giúp bạn ấm áp và tự hào về phong cách trong suốt mùa giải. \r\n\r\nChiếc áo thể thao adidas này được làm từ vật liệu tái chế như một phần trong tham vọng giúp chấm dứt rác thải nhựa của chúng tôi.\r\n\r\nPháo thêu\r\nKhẩu hiệu Gothic Arsenal thêu ở mặt sau\r\nVừa vặn thông thường\r\nKhóa kéo toàn phần có cổ đứng\r\nCổ tay và gấu áo có chun co giãn\r\nTúi trước và sau\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: MIS6503\r\n\r\n\r\nChất liệu: 100% polyamide tái chế', 0, 0, 1, 1000, '', 76),
(4, 'product-4.webp', 'Quần nỉ Arsenal adidas 24/25 Originals', 2379000, 'Giữ sự mát mẻ và cổ điển trong Quần nỉ Arsenal adidas 24/25 Originals. Ấm cúng, thời trang và không thể nhầm lẫn với Arsenal, chúng sẽ nâng tầm bất kỳ tủ đồ nào một cách dễ dàng. Với kiểu dáng thon gọn, gấu quần chun co giãn và lớp hoàn thiện bằng vải pha cotton mềm mại để tăng thêm sự thoải mái, bạn sẽ thấy mình với tới chúng mỗi ngày.\r\n\r\nChiếc quần adidas này được làm một phần từ vật liệu tái chế như một phần trong tham vọng giúp chấm dứt rác thải nhựa của chúng tôi.\r\n\r\nPháo thêu \r\nVừa vặn\r\nEo chun có dây rút\r\nTúi trước và sau\r\nCổ chân co giãn\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: MIS6504\r\n\r\n\r\nChất liệu: 78% cotton, 22% polyester tái chế', 0, 0, 1, 1000, '', 82),
(5, 'product-5.webp', 'Quần thể thao Arsenal adidas 24/25 Originals', 2549100, 'Hãy tự hào tuyên bố trong Quần thể thao Arsenal adidas 24/25 Originals. Cho dù bạn ở nhà hay đi chơi, chúng là người bạn đồng hành hoàn hảo cho mọi hoạt động yêu thích của bạn, từ ghế dài đến phố phường. Một nét hiện đại của biểu tượng lưu trữ, chúng đi kèm với một khẩu pháo thêu trên chân, eo chun có dây rút và khóa kéo mắt cá chân để vừa vặn hoàn hảo.\r\n\r\nChiếc quần adidas này được làm từ vật liệu tái chế như một phần trong tham vọng giúp chấm dứt rác thải nhựa của chúng tôi.\r\n\r\nPháo thêu trên chân\r\nEo chun có dây rút\r\nVừa vặn thông thường\r\nTúi trước\r\nKhóa kéo mắt cá chân\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: MIS6500\r\n\r\n\r\nChất liệu: 100% polyester tái chế', 0, 0, 1, 1000, '', 66),
(6, 'product-6.webp', 'Quần short Arsenal adidas 24/25 Originals', 1699600, 'Hoàn hảo cho phòng tập thể dục, ghế dài hoặc đường phố (nếu thời tiết cho phép), Quần short Arsenal adidas 24/25 Originals sẽ giúp bạn nổi bật giữa đám đông với phong cách bóng đá cổ điển. Với hình khẩu pháo thêu ở ống quần, cạp chun có dây rút và túi trước tiện dụng, chúng sẽ giúp bạn thoải mái và tự hào ở mọi nơi, mọi lúc.\r\n\r\nChiếc quần short adidas này được làm một phần từ vật liệu tái chế như một phần trong tham vọng giúp chấm dứt rác thải nhựa của chúng tôi.\r\n\r\nPháo thêu\r\nEo chun có dây rút\r\nTúi trước\r\nVừa vặn thông thường\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: MJJ1682\r\n\r\n\r\nChất liệu: 60% polyester tái chế, 40% cotton', 0, 0, 1, 1000, '', 59),
(7, 'product-7.webp', 'Áo khoác phao Arsenal Burgundy Cannon', 3229000, 'Nhẹ nhưng đủ ấm để giữ ấm cho bạn trong suốt mùa đông và hơn thế nữa, Áo khoác Arsenal Cannon Puffer là nhà vô địch về tính linh hoạt. Được chế tác từ polyester thoáng khí, áo có khóa kéo toàn bộ với cổ đứng, đệm mềm toàn bộ và thêu hình khẩu pháo cổ điển ở ngực để bạn luôn tự hào và thoải mái trong suốt mùa. \r\n\r\nThêu pháo cổ điển ở ngực\r\nKhẩu hiệu Arsenal thêu ở mặt sau\r\nĐệm polyester\r\nHai túi phía trước\r\nKhóa kéo toàn phần có cổ đứng\r\nMũ trùm đầu có thể gập lại\r\nThiết kế Unisex\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: U06733\r\n\r\n\r\nChất liệu: 100% nylon', 0, 0, 1, 1000, '', 185),
(8, 'product-8.webp', 'Áo khoác phao Arsenal Grey Cannon', 3229000, 'Lightweight yet warm enough to keep you cosy through winter and beyond, the Arsenal Cannon Puffer Jacket is a champion of versatility. Crafted from breathable polyester, it features a full zip with stand-up collar, all-over soft padding, and a retro cannon embroidered at chest to keep you proud and comfortable all season long. \r\n\r\nEmbroidered retro cannon at chest\r\nEmbroidered Arsenal slogan on the back\r\nPolyester padding\r\nTwo front pockets\r\nFull zip with stand-up collar\r\nTuck-away hood\r\nUnisex design\r\nColour: Grey\r\n\r\nProduct code: U06734\r\n\r\n\r\nMaterial: 100% nylon', 0, 0, 1, 1000, '', 32),
(9, 'product-9.webp', 'Áo hoodie Arsenal 89 màu kem dành cho nữ', 2053200, 'Gặp gỡ Áo hoodie Arsenal Womens 89, lựa chọn mới cho tất cả những gì bạn cần . Chúng tôi tôn vinh đội hình biểu tượng của năm 89, áo có in hình khẩu pháo cổ điển ở ngực, khẩu hiệu AFC in ở mặt sau và mũ trùm đầu có thể điều chỉnh bằng dây rút để tăng thêm tính linh hoạt. Đơn giản và thoải mái, bạn sẽ muốn mặc nó mỗi ngày, và ai có thể trách bạn chứ?\r\n\r\nIn hình pháo cổ điển ở ngực\r\nIn khẩu hiệu AFC ở mặt sau\r\nMũ trùm đầu có thể điều chỉnh bằng dây rút\r\nTúi Kangaroo\r\nCổ tay và gấu áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Kem\r\n\r\nMã sản phẩm: W06674\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 96),
(10, 'product-10.webp', 'Áo nỉ có khóa kéo sân thượng Arsenal Womens 89 1/4', 2224400, 'Trên sân thượng và xa hơn nữa, hãy giữ cho lòng tự hào của bạn tỏa sáng rực rỡ với Áo nỉ có khóa kéo Arsenal Womens 89 1/4. Chiếc áo nỉ dễ mặc và cởi nhất nhờ cổ áo có khóa kéo một phần tư, là một phần của bộ sưu tập kỷ niệm đội hình biểu tượng năm 89 và chiến thắng hoành tráng của họ tại Anfield trong trận đấu cuối cùng của mùa giải. Với hình ảnh khẩu pháo cổ điển in ở ngực và lớp hoàn thiện bằng cotton mềm mại, bạn sẽ cảm nhận được tất cả cảm giác cổ điển của Arsenal trong suốt mùa giải.\r\n\r\nIn hình pháo cổ điển ở ngực\r\nCổ áo khóa kéo một phần tư\r\nCổ tay và gấu áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Màu be\r\n\r\nMã sản phẩm: M06695\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 74),
(11, 'product-11.webp', 'Áo Hoodie Concordia Đen Của Arsenal Cho Nữ', 2053200, 'Giữ cho bạn sự mát mẻ và giản dị với Áo hoodie Concordia dành cho nữ của Arsenal. Được chế tác từ cotton mềm mại tuyệt vời, áo có huy hiệu Câu lạc bộ cổ điển in ở ngực, khẩu hiệu Arsenal theo phong cách gothic ở mặt sau và túi kangaroo rộng rãi để tăng thêm tính linh hoạt. Mặc áo với quần chạy bộ để thoải mái hoặc kết hợp với quần denim, váy hoặc quần cargo yêu thích của bạn để có phong cách thời trang đường phố cổ điển được nâng tầm.\r\n\r\nHuy hiệu câu lạc bộ cổ điển in ở ngực\r\nKhẩu hiệu Gothic Arsenal được in ở mặt sau\r\nMũ trùm đầu có lót và dây rút\r\nTúi Kangaroo\r\nCổ tay và gấu áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm: W06660\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 203),
(12, 'product-12.webp', 'Áo hoodie Concordia màu đỏ của Arsenal dành cho nữ', 2053200, 'Giữ cho bạn sự mát mẻ và giản dị với Áo hoodie Concordia dành cho nữ của Arsenal. Được chế tác từ cotton mềm mại tuyệt vời, áo có huy hiệu Câu lạc bộ cổ điển in ở ngực, khẩu hiệu Arsenal theo phong cách gothic ở mặt sau và túi kangaroo rộng rãi để tăng thêm tính linh hoạt. Mặc áo với quần chạy bộ để thoải mái hoặc kết hợp với quần denim, váy hoặc quần cargo yêu thích của bạn để có phong cách thời trang đường phố cổ điển được nâng tầm.\r\n\r\nHuy hiệu câu lạc bộ cổ điển in ở ngực\r\nKhẩu hiệu Gothic Arsenal được in ở mặt sau\r\nMũ trùm đầu có lót và dây rút\r\nTúi Kangaroo\r\nCổ tay và gấu áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: W06661\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 157),
(13, 'product-13.webp', 'Áo nỉ Concordia màu đen của Arsenal dành cho nữ', 1882000, 'Thoải mái hàng ngày, nhưng hãy biến nó thành Arsenal. Mềm mại, ấm áp và cực kỳ Arsenal, Áo nỉ Arsenal Womens Concordia có huy hiệu Câu lạc bộ cổ điển tối giản được in ở mặt trước và khẩu hiệu Arsenal theo phong cách gothic ở mặt sau giúp mọi trang phục trở nên nổi bật với phong cách Arsenal cổ điển, bất kể bạn kết hợp với trang phục nào.\r\n\r\nHuy hiệu câu lạc bộ cổ điển in\r\nKhẩu hiệu Gothic Arsenal được in ở mặt sau\r\nCổ tròn, tay áo và viền áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm: W06658\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 217),
(14, 'product-14.webp', 'Áo nỉ Concordia đỏ của Arsenal dành cho nữ', 1882000, 'Thoải mái hàng ngày, nhưng hãy biến nó thành Arsenal. Mềm mại, ấm áp và cực kỳ Arsenal, Áo nỉ Arsenal Womens Concordia có huy hiệu Câu lạc bộ cổ điển tối giản được in ở mặt trước và khẩu hiệu Arsenal theo phong cách gothic ở mặt sau giúp mọi trang phục trở nên nổi bật với phong cách Arsenal cổ điển, bất kể bạn kết hợp với trang phục nào.\r\n\r\nHuy hiệu câu lạc bộ cổ điển in\r\nKhẩu hiệu Gothic Arsenal được in ở mặt sau\r\nCổ tròn, tay áo và viền áo có gân\r\nVừa vặn thông thường\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: W06659\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 294),
(15, 'product-15.webp', 'Áo phông Arsenal x Aries J\'Adoro', 2053200, 'Không chỉ là một chiếc áo phông, Áo phông Arsenal x Aries J\' Adoro chính là *chiếc* áo phông. Một thứ hoàn hảo để mặc với bất kỳ trang phục nào, lớp áo hàng ngày mà bạn hằng mơ ước, bạn sẽ mặc chiếc áo phông này trong nhiều mùa tới. Kết hợp thiết kế đặc trưng của Aries lấy cảm hứng từ Ý với tính cách của Arsenal, áo có khẩu hiệu J\' Adoro Arsenal in lụa ở ngực, cổ tròn có gân cổ điển và kiểu dáng vừa vặn, unisex giúp mọi trang phục tỏa sáng với đẳng cấp Arsenal được nâng cao. \r\n\r\nKhẩu hiệu J\'adoro Arsenal được in ở mặt trước\r\nCổ thuyền có gân\r\nVừa vặn, unisex\r\nĐối với nam giới, chúng tôi khuyên bạn nên chọn size lớn hơn size Arsenal thông thường của bạn\r\nNgười mẫu nam của chúng tôi (cao 6\' 1\") mặc size L và có vòng ngực 34,5\", vòng eo 28,5\"\r\n\r\nNgười mẫu nữ của chúng tôi (cao 5\' 9\") mặc size Nhỏ và có vòng ngực 32”, vòng eo 28\"\r\n\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: U06691\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 304),
(16, 'product-16.webp', 'Áo thun tay dài Arsenal x Aries Black Highbury Temple', 2395300, 'Áo phông dài tay Arsenal x Aries Highbury Temple là lớp áo hoàn hảo cho mùa thu giúp bạn dễ dàng chuyển từ ngày sang đêm, sẽ luôn đồng hành cùng bạn trong suốt mùa giải và hơn thế nữa. Được thiết kế với sự hợp tác của nhãn hiệu thời trang đường phố lấy cảm hứng từ Ý có trụ sở tại London, Aries, áo có họa tiết đặc trưng của thương hiệu ở mặt trước và trên tay áo, được tái hiện theo phong cách Arsenal (ngôi đền lấy cảm hứng từ Highbury với khẩu hiệu của Arsenal và cột Doric được trang trí bằng huy hiệu Câu lạc bộ cổ điển). Với kiểu dáng thoải mái, phù hợp với cả nam và nữ và lớp vải cotton mềm mại, chắc chắn đây sẽ là lựa chọn hàng đầu của bạn cho tất cả những gì bạn muốn .\r\n\r\nĐồ họa in lấy cảm hứng từ ngôi đền Highbury với khẩu hiệu của Arsenal ở mặt trước\r\nĐồ họa cột Bạch Dương được in trên tay áo bên phải\r\nCổ tròn có gân\r\nThoải mái, phù hợp cho cả nam và nữ\r\nNgười mẫu nam của chúng tôi (cao 6\' 1\") mặc size L và có vòng ngực 34,5\", vòng eo 28,5\"\r\n\r\nNgười mẫu nữ của chúng tôi (cao 5\' 9\") mặc size Nhỏ và có vòng ngực 32”, vòng eo 28\"\r\n\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm: U06694\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 2, 1000, '', 149),
(17, 'product-17.webp', 'Arsenal adidas 24/25 Túi đeo hông sân khách', 855400, 'Sự cân bằng hoàn hảo giữa sự thoải mái, tính linh hoạt và phong cách, túi đeo chéo Arsenal adidas 24/25 Away Bumbag là phụ kiện tuyệt vời nhất để mang theo khi bạn di chuyển. Được chế tác từ polyester tái chế nhẹ, chiếc túi đa chức năng này có túi khóa kéo phía trước rộng rãi, dây đeo có thể điều chỉnh và khẩu pháo in họa tiết để tạo nên phong cách thời trang đường phố bền vững theo phong cách Arsenal.\r\n\r\nChiếc túi này được làm từ vật liệu tái chế như một phần trong tham vọng giúp chấm dứt rác thải nhựa của chúng tôi. \r\n\r\nPháo in\r\nKích thước: 25 x 12,5 x 6cm\r\nThể tích: 1,5 L\r\nTúi khóa kéo phía trước có khóa đóng\r\nDây đeo có thể điều chỉnh\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm: AIZ4388\r\n\r\n\r\nChất liệu: 100% polyester tái chế', 0, 0, 3, 1000, '', 243),
(18, 'product-18.webp', 'Balo Arsenal adidas 24/25 Away', 1197900, 'Mang theo niềm tự hào của bạn đến bất cứ nơi nào cuộc sống đưa bạn đến với Balo Arsenal adidas 24/25 Away. Nhiều ngăn, bao gồm cả ngăn đựng giày và máy tính xách tay, giúp bạn hoàn hảo khi đi tập thể dục, đi học hoặc văn phòng. Được chế tác từ polyester tái chế dệt bền, có dây đeo ngực có thể điều chỉnh và mặt sau thoáng khí được trang bị công nghệ AEROREADY thấm hút ẩm để mang lại sự thoải mái tối đa.\r\n\r\nChiếc ba lô adidas này được làm từ vật liệu tái chế như một phần trong tham vọng chung tay chấm dứt rác thải nhựa của chúng tôi.\r\n\r\nPháo in\r\nKích thước: 18,5 x 30 x 50cm\r\nThể tích: 35 L\r\nMặt sau AEROREADY\r\nTúi khóa kéo phía trước và túi trượt bên hông\r\nNgăn đựng giày dép riêng biệt\r\nNgăn đựng máy tính xách tay có đệm bên ngoài\r\nDây đeo ngực có thể điều chỉnh\r\nMàu sắc: Đen\r\n\r\nMã sản phẩm: AIZ4390\r\n\r\n\r\nChất liệu: 100% polyurethane', 0, 0, 3, 1000, '', 231),
(19, 'product-19.webp', 'Mũ lưỡi trai Arsenal adidas 24/25', 684600, 'Hãy tránh xa ánh nắng mặt trời (và giữ lòng tự hào của bạn gần bên) trong mùa này với Mũ lưỡi trai adidas 24/25 của Arsenal. Được chế tác từ cotton có nguồn gốc bền vững, chiếc mũ lưỡi trai adidas unisex này quan tâm đến bạn nhiều như quan tâm đến môi trường. Với chóp và chóp cong vừa phải để có vẻ ngoài sạch sẽ, thể thao, nó đi kèm với khẩu pháo không thể nhầm lẫn và chi tiết 3 sọc adidas cổ điển được thêu ở mặt trước: nét hoàn thiện hoàn hảo của Arsenal cho bất kỳ trang phục nào.\r\n\r\nThêu hình khẩu pháo và 3 sọc adidas\r\nĐỉnh và đỉnh cong vừa phải\r\nKhóa cài có thể điều chỉnh \r\nCó thể giặt bằng máy\r\nThiết kế Unisex\r\nMột kích thước phù hợp với tất cả\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: AIZ4387\r\n\r\n\r\nChất liệu: 100% cotton', 0, 0, 3, 1000, '', 43),
(20, 'product-20.webp', 'Khăn choàng Arsenal adidas 24/25', 684600, 'Hãy dũng cảm vượt qua cả những đêm thi đấu lạnh nhất với khăn choàng Arsenal adidas 24/25. Được chế tác từ vải dệt kim mềm mại, khăn sẽ giữ ấm và thoải mái cho bạn quanh năm. Với khẩu pháo đặc trưng được đặt ở giữa một bên và họa tiết 3 sọc adidas ở bên kia, chiếc khăn unisex này chắc chắn sẽ khiến niềm tự hào về Arsenal của bạn tỏa sáng trong suốt mùa giải.\r\n\r\nPháo được thiết kế, huy hiệu Câu lạc bộ và 3 sọc adidas\r\nViền tua rua\r\nĐược đan hoàn toàn \r\nThiết kế Unisex\r\nMàu sắc: Đỏ\r\n\r\nMã sản phẩm: AIY3828\r\n\r\n\r\nChất liệu: 100% polyacrylic', 0, 0, 3, 1000, '', 92),
(21, 'product-21.webp', 'Arsenal 23/24 Quả bóng thứ ba dành cho người hâm mộ cỡ 5', 684600, 'Hãy làm quen với Quả bóng cổ động viên thứ ba Arsenal 23/24 cỡ 5, người bạn đồng hành mới của bạn trong những cuộc phiêu lưu bóng đá. Cho dù bạn đang đánh bóng những cú flicks và kỹ thuật của mình hay thực hiện một cú đá ngẫu hứng trong công viên, quả bóng đá Arsenal này chắc chắn sẽ khiến ngày của bạn trở nên đặc biệt hơn một chút. Được trang trí bằng màu sắc Third hiện tại, nó có đường khâu máy, lớp phủ TPU mềm, bền và một túi cao su để giữ không khí tối ưu, vì vậy bạn biết rằng nó sẽ đồng hành cùng bạn trong nhiều năm tới.\n\nBề mặt khâu bằng máy\nbàng quang butyl\nMàu sắc: Xanh lá cây\n\nMã sản phẩm: AIA0920\n\n\nChất liệu: Vỏ 100% TPU', 0, 0, 3, 1000, '', 67),
(22, 'product-22.webp', 'Balo Arsenal adidas 24/25', 1197900, 'Mang theo niềm tự hào của Arsenal đến bất cứ nơi đâu với Balo Arsenal adidas 24/25. Rộng rãi và đa năng, có hai túi lưới bên hông để dễ dàng lấy các vật dụng nhỏ và một túi khóa kéo phía trước để giữ đồ vật có giá trị của bạn luôn an toàn. Được chế tác từ polyester tái chế, chiếc ba lô thân thiện với môi trường này có dây đeo ngực tiện dụng và lớp đệm lưới khí ở dây đeo vai và mặt sau để mang lại sự thoải mái tối đa khi đeo.\r\n\r\nPháo in\r\nĐệm lưới khí và dây đeo ngực tạo sự thoải mái\r\nTúi lưới bên hông và túi khóa kéo phía trước\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: AJE4035\r\n\r\n\r\nChất liệu: 100% polyester tái chế', 0, 0, 3, 1000, '', 173),
(23, 'product-23.webp', 'Găng tay đan Arsenal adidas 24/25', 787200, 'Giữ ấm trong thời tiết mát mẻ với Găng tay đan Arsenal adidas 24/25. Được chế tác từ polyester tái chế mềm mại, co giãn để tạo sự thoải mái và độ bền, những chiếc găng tay adidas có thể giặt bằng máy này đi kèm với một khẩu pháo thêu và đầu ngón tay dẫn điện tiện dụng để giúp bạn luôn kết nối khi di chuyển, theo phong cách của Arsenal.\r\n\r\nPháo thêu\r\nĐầu ngón tay dẫn điện để sử dụng di động\r\nCó thể giặt bằng máy\r\nMàu sắc: Xanh lam\r\n\r\nMã sản phẩm: AJE4036\r\n\r\n\r\nChất liệu: 99% polyester tái chế, 1% elastane', 0, 0, 3, 1000, '', 213),
(24, 'product-24.webp', 'Giày Arsenal x adidas by Stella McCartney Ultraboost', 5475000, 'Tiến xa hơn nữa với Arsenal x adidas by Stella McCartney Ultraboost 22. Được làm một phần từ vật liệu tái chế, đôi Ultraboost độc quyền này kết hợp đệm BOOST với thiết kế tiên tiến để mang đến sự thoải mái và tính linh hoạt tối ưu mà không ảnh hưởng đến phong cách. Với cảm giác ổn định, hỗ trợ, công nghệ hoàn trả năng lượng và logo adidas by Stella McCartney, bạn có thể kết hợp đôi giày chạy bộ này với bất kỳ thứ gì, từ quần chạy bộ thường ngày đến quần dài đi chơi, và chắc chắn rằng chúng sẽ mang đến sự bật nhảy sành điệu cho bước chân của bạn, bất kể cuộc sống đưa bạn đến đâu.\r\n\r\nHuy hiệu Arsenal và logo adidas của Stella McCartney ở bên trong đế\r\nChiến thắng thông qua sự hòa hợp được in ở mặt sau của lưỡi\r\nĐóng ren\r\nThân giày bằng vải có lồng hỗ trợ\r\nĐế giữa BOOST\r\nĐế ngoài bằng cao su\r\nMàu sắc: Trắng/Đỏ\r\n\r\nMã sản phẩm: AGV9156\r\n\r\n\r\nChất liệu: Tổng hợp, dệt may', 0, 0, 3, 1000, '', 166),
(25, 'product-25.webp', 'Hoa tai đinh tán Arsenal mạ vàng 18ct hình pháo', 1711200, 'Thêm nét tinh tế của Arsenal vào trang phục của bạn với Hoa tai đinh tán Arsenal mạ vàng 18ct. Được chế tác từ bạc sterling mạ vàng, chúng có thiết kế đinh tán hình đại bác đơn giản và được đựng trong hộp đựng trang sức có thương hiệu để tạo nên món quà Arsenal xa xỉ tuyệt đỉnh.\n\nMạ vàng 18 ct\nHộp trình bày bao gồm\nMã sản phẩm: N06461\n\n\nChất liệu: Bạc mạ vàng\nĐược ký tay bởi Alessia Russo\nKèm theo giấy chứng nhận xác thực \nĐược trình bày trong hộp đen có thương hiệu Arsenal\nXin lưu ý rằng sản phẩm này không được áp dụng bất kỳ chương trình giảm giá nào.\n\n \n\nMã sản phẩm: N06703\n\n\nChất liệu: HỘP CÁC TÔNG, 100% REC.PES', 0, 0, 4, 1000, '', 301),
(26, 'product-26.webp', 'Cốc có chữ cái đầu cá nhân của Arsenal', 342100, 'Làm cho giờ nghỉ uống cà phê của bạn thêm ngọt ngào với cốc chữ cái đầu cá nhân hóa Arsenal. Món quà nhỏ hoàn hảo cho những Pháo thủ đặc biệt trong cuộc sống của bạn (hoặc cho chính bạn), cốc có màu đỏ cổ điển của Arsenal với tay cầm bằng vàng, huy hiệu Câu lạc bộ và chữ cái đầu bạn chọn ở mặt sau. Thiết thực, thanh lịch và không thể nhầm lẫn với Arsenal, bạn có thể tin tưởng rằng cốc cà phê này sẽ làm cho ngày của bạn trở nên đặc biệt hơn, mỗi ngày.\n\nHuy hiệu và tay cầm của Gold Club\nChữ cái đầu ở mặt sau\n \nKhông an toàn với lò vi sóng\nKhông an toàn với máy rửa chén\nMã sản phẩm: N04516\n\n\nChất liệu: Gốm sứ', 0, 0, 4, 1000, '', 213),
(27, 'product-27.webp', 'Bộ móc chìa khóa và huy hiệu Pháo cổ điển Arsenal', 410700, 'Giữ sự đơn giản và cổ điển với Móc chìa khóa Pháo cổ điển Arsenal và Bộ huy hiệu và Bộ huy hiệu. Bao gồm móc chìa khóa Pháo cổ điển và huy hiệu màu đồng thau, bộ nhỏ này sẽ là món quà chu đáo hoàn hảo cho những người hâm mộ Arsenal đặc biệt trong cuộc sống của bạn. Hoặc cho chính bạn, chỉ vì thế. \r\n\r\nBộ hai mảnh \r\nBùa hộ mệnh pháo cổ điển\r\nMã sản phẩm: G06674\r\n\r\n\r\nChất liệu: 100% kim loại cơ bản', 0, 0, 4, 1000, '', 253),
(28, 'product-28.webp', 'Móc khóa Arsenal Cannon Charm', 273900, 'Giữ nét cổ điển với Móc chìa khóa Arsenal Cannon Charm. Đơn giản, phong cách và tinh tế, sản phẩm đi kèm với khẩu hiệu Arsenal được khắc trên mặt dây chuyền và một mặt dây chuyền cannon tối giản để mang đến cảm giác Gunners tuyệt vời cho ngày của bạn, mỗi ngày.\r\n\r\nKhẩu hiệu Arsenal khắc\r\nMạ vàng\r\nMã sản phẩm: G06678\r\n\r\n\r\nChất liệu: 100% kim loại cơ bản', 0, 0, 4, 1000, '', 79),
(29, 'product-29.webp', 'Bộ ví đựng thẻ bằng da Arsenal và móc chìa khóa', 1026600, 'Bộ sản phẩm ví đựng thẻ bằng da Arsenal, bút và móc chìa khóa là món quà hoàn hảo cho những người hâm mộ thanh lịch nhất, bao gồm một móc chìa khóa có huy hiệu kim loại, một ví đựng thẻ bằng da và một cây bút có chi tiết màu bạc để truyền cảm hứng tinh tế của Arsenal vào ngày của bạn, mỗi ngày. \r\n\r\nBộ 3 món\r\nBao gồm một cây bút, một móc chìa khóa có huy hiệu kim loại và một ví đựng thẻ bằng da\r\nMã sản phẩm: N06008\r\n\r\n\r\nChất liệu: Kim loại', 0, 0, 4, 1000, '', 137),
(30, 'product-30.webp', 'Bộ vòng tay và đồng hồ vàng hồng Arsenal', 3695700, 'Cho dù đó là món quà tặng cho một người hâm mộ Arsenal đặc biệt trong cuộc sống của bạn hay là món quà cho chính bạn, bạn không thể bỏ qua Bộ vòng tay và đồng hồ Arsenal Rose Gold. Được trình bày trong hộp trang sức thanh lịch, bộ sản phẩm bao gồm vòng cổ, vòng tay và đồng hồ mạ vàng hồng giúp mọi trang phục trở nên nổi bật với nét quyến rũ giản dị của Arsenal.\r\n\r\nBộ 3 món\r\nBao gồm vòng cổ, vòng tay và đồng hồ\r\nMặt dây chuyền huy hiệu câu lạc bộ\r\nKhẩu hiệu và khẩu pháo Arsenal được khắc trên mặt đồng hồ\r\nDây da\r\nHộp trình bày bao gồm\r\nMạ vàng hồng\r\nMã sản phẩm: N05933\r\n\r\n\r\nChất liệu: Da, mạ vàng hồng', 0, 0, 4, 1000, '', 119),
(31, 'product-31.webp', 'Arsenal Lớn Sinh Thái Gunnersaurus', 855400, 'Eco chưa bao giờ trông dễ thương đến thế trước đây, Arsenal Eco Gunnersaurus này được tạo ra cho cả những người hâm mộ Arsenal nhỏ tuổi và không nhỏ tuổi trong cuộc sống của bạn. Ngọt ngào, bền vững và siêu mềm mại, linh vật thân thiện này được sản xuất bằng 100% polyester tái chế từ rác thải nhựa để làm bừng sáng ngày của bạn, mỗi ngày.\r\n\r\nChiều cao: 45cm\r\nThân thiện với môi trường: được làm từ 28 chai nước 500ml với mức tiêu thụ năng lượng ít hơn 59%\r\nMã sản phẩm: N04187\r\n\r\n\r\nChất liệu: 100% polyester tái chế', 0, 0, 4, 1000, '', 132),
(32, 'product-32.webp', 'Gấu bông sinh thái lớn Arsenal', 855400, 'Eco chưa bao giờ trông dễ thương đến thế trước đây, chú gấu bông Arsenal Eco Teddy Bear này được làm cho cả những người hâm mộ Arsenal nhỏ tuổi và không nhỏ tuổi trong cuộc sống của bạn. Ngọt ngào, bền vững và siêu mềm mại, anh chàng nhỏ bé này được sản xuất bằng 100% polyester tái chế từ rác thải nhựa để mang đến hơi thở hy vọng và dịu dàng cho bất kỳ ngày nào. \r\n\r\nChiều cao: 30,5cm\r\nChỉ rửa tay\r\nĐược làm bằng vật liệu tương đương với 15 chai nước nhựa tái chế 500ml\r\nMã sản phẩm: N04190\r\n\r\n\r\nChất liệu: 100% polyester tái chế', 0, 0, 4, 1000, '', 195);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img`
--

CREATE TABLE `product_img` (
  `id_product` int(11) NOT NULL,
  `hinh1` varchar(250) NOT NULL,
  `hinh2` varchar(250) NOT NULL,
  `hinh3` varchar(250) NOT NULL,
  `hinh4` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_img`
--

INSERT INTO `product_img` (`id_product`, `hinh1`, `hinh2`, `hinh3`, `hinh4`) VALUES
(1, 'product-1-1.webp', 'product-1-2.webp', 'product-1-3.webp', 'product-1-4.webp'),
(2, 'product-2-1.webp', 'product-2-2.webp', 'product-2-3.webp', 'product-2-4.webp'),
(3, 'product-3-1.webp', 'product-3-2.webp', 'product-3-3.webp', 'product-3-4.webp'),
(4, 'product-4-1.webp', 'product-4-2.webp', 'product-4-3.webp', 'product-4-4.webp'),
(5, 'product-5-1.webp', 'product-5-2.webp', 'product-5-3.webp', 'product-5-4.webp'),
(6, 'product-6-1.webp', 'product-6-2.webp', 'product-6-3.webp', 'product-6-4.webp'),
(7, 'product-7-1.webp', 'product-7-2.webp', 'product-7-3.webp', 'product-7-4.webp'),
(8, 'product-8-1.webp', 'product-8-2.webp', 'product-8-3.webp', 'product-8-4.webp'),
(9, 'product-9-1.webp', 'product-9-2.webp', 'product-9-3.webp', 'product-9-4.webp'),
(10, 'product-10-1.webp', 'product-10-2.webp', 'product-10-3.webp', 'product-10-4.webp'),
(11, 'product-11-1.webp', 'product-11-2.webp', 'product-11-3.webp', 'product-11-4.webp'),
(12, 'product-12-1.webp', 'product-12-2.webp', 'product-12-3.webp', 'product-12-4.webp'),
(13, 'product-13-1.webp', 'product-13-2.webp', 'product-13-3.webp', 'product-13-4.webp'),
(14, 'product-14-1.webp', 'product-14-2.webp', 'product-14-3.webp', 'product-14-4.webp'),
(15, 'product-15-1.webp', 'product-15-2.webp', 'product-15-3.webp', 'product-15-4.webp'),
(16, 'product-16-1.webp', 'product-16-2.webp', 'product-16-3.webp', 'product-16-4.webp'),
(17, 'product-17-1.webp', 'product-17-2.webp', 'product-17-3.webp', 'product-17-4.webp'),
(18, 'product-18-1.webp', 'product-18-2.webp', 'product-18-3.webp', 'product-18-4.webp'),
(19, 'product-19-1.webp', 'product-19-2.webp', 'product-19-3.webp', 'product-19-4.webp'),
(20, 'product-20-1.webp', 'product-20-2.webp', 'product-20-3.webp', 'product-20-4.webp'),
(21, 'product-21-1.webp', 'product-21-2.webp', 'product-21-3.webp', 'product-21-4.webp'),
(22, 'product-22-1.webp', 'product-22-2.webp', 'product-22-3.webp', 'product-22-4.webp'),
(23, 'product-23-1.webp', 'product-23-2.webp', 'product-23-3.webp', 'product-23-4.webp'),
(24, 'product-24-1.webp', 'product-24-2.webp', 'product-24-3.webp', 'product-24-4.webp'),
(25, 'product-25-1.webp', 'product-25-2.webp', 'product-25-3.webp', 'product-25-4.webp'),
(26, 'product-26-1.webp', 'product-26-2.webp', 'product-26-3.webp', 'product-26-4.webp'),
(27, 'product-27-1.webp', 'product-27-2.webp', 'product-27-3.webp', 'product-27-4.webp'),
(28, 'product-28-1.webp', 'product-28-2.webp', 'product-28-3.webp', 'product-28-4.webp'),
(29, 'product-29-1.webp', 'product-29-2.webp', 'product-29-3.webp', 'product-29-4.webp'),
(30, 'product-30-1.webp', 'product-30-2.webp', 'product-30-3.webp', 'product-30-4.webp'),
(31, 'product-31-1.webp', 'product-31-2.webp', 'product-31-3.webp', 'product-31-4.webp'),
(32, 'product-32-1.webp', 'product-32-2.webp', 'product-32-3.webp', 'product-32-4.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `address_user` varchar(250) NOT NULL,
  `phone_user` varchar(250) NOT NULL,
  `email_user` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `address_user`, `phone_user`, `email_user`, `user_name`, `password`, `role`) VALUES
(1, '1', '1', '1', '1', '1', '1', b'0'),
(2, 'Nguyễn Hải Hà', 'tổ 1 ấp thanh hòa xã thanh lương', '0369427302', 'hanhps41059@gmail.com', '', '123', b'0'),
(3, '', '', '', 'admin@gmail.com', 'admin', '123', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `coupon_code` varchar(10) NOT NULL,
  `discount` float NOT NULL,
  `condition_voucher` varchar(250) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `coupon_code`, `discount`, `condition_voucher`, `deadline`) VALUES
(1, '', 1, '', '2024-11-12 14:55:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_user` (`id_user`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `checkout_voucher` (`id_voucher`),
  ADD KEY `checkout_user` (`id_user`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `comment_user` (`id_user`),
  ADD KEY `comment_product` (`id_product`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_cart_detail`),
  ADD KEY `product_cart` (`id_product`),
  ADD KEY `cart_checkout` (`id_checkout`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_categories` (`id_category`);

--
-- Chỉ mục cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD KEY `product_img` (`id_product`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562686;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `checkout_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `cart_checkout` FOREIGN KEY (`id_checkout`) REFERENCES `checkout` (`id_checkout`),
  ADD CONSTRAINT `product_cart` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Các ràng buộc cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
