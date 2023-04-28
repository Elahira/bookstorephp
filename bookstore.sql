-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2023 lúc 12:05 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Idcthd` int(11) NOT NULL,
  `Idhd` int(11) NOT NULL,
  `Idsp` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Tongtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`Idcthd`, `Idhd`, `Idsp`, `Soluong`, `Tongtien`) VALUES
(1, 1, 1, 1, 116),
(2, 1, 5, 1, 84),
(3, 2, 5, 1, 84);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Idhd` int(11) NOT NULL,
  `Ngaymua` date NOT NULL,
  `Ngaynhan` date NOT NULL,
  `Idtk` int(11) NOT NULL,
  `Ghichu` varchar(100) NOT NULL,
  `StatusHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`Idhd`, `Ngaymua`, `Ngaynhan`, `Idtk`, `Ghichu`, `StatusHD`) VALUES
(1, '2023-04-21', '2023-04-30', 2, 'Địa chỉ: 213', 2),
(2, '2023-04-27', '2023-04-30', 2, 'giao nhanh nha\r\n', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphathanh`
--

CREATE TABLE `nhaphathanh` (
  `Idnph` int(11) NOT NULL,
  `Tennph` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaphathanh`
--

INSERT INTO `nhaphathanh` (`Idnph`, `Tennph`) VALUES
(1, 'Nhà xuất bản Kim Đồng - WingsBook'),
(2, 'Tsuki Light Novel'),
(3, 'Nhã Nam'),
(4, 'Amak Books'),
(5, 'Thái Hà'),
(6, 'IPM'),
(7, 'Huy Hoàng'),
(8, 'Alpha Books'),
(9, '1980 Books');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `Idrole` int(11) NOT NULL,
  `Rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`Idrole`, `Rolename`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Idsp` int(11) NOT NULL,
  `Tensp` varchar(200) NOT NULL,
  `Tacgia` varchar(100) NOT NULL,
  `Minhhoa` varchar(100) NOT NULL,
  `Dichgia` varchar(100) NOT NULL,
  `Loaibia` varchar(20) NOT NULL,
  `Sotrang` int(11) NOT NULL,
  `Giasp` float NOT NULL,
  `Giamgia` float NOT NULL,
  `Giamoi` float NOT NULL,
  `Idnph` int(11) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `Mota` varchar(10000) NOT NULL,
  `Idloai` int(11) NOT NULL,
  `StatusSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Idsp`, `Tensp`, `Tacgia`, `Minhhoa`, `Dichgia`, `Loaibia`, `Sotrang`, `Giasp`, `Giamgia`, `Giamoi`, `Idnph`, `Img`, `Mota`, `Idloai`, `StatusSP`) VALUES
(1, 'Tanya Chiến Ký 1: Deus Lo Vult', 'Carlo Zen', 'Shinotsuki Shinobu', 'Dương Gia Thịnh', 'Bìa mềm', 592, 145, 20, 116, 5, 'tanya1.jpg', 'Tanya Chiến ký (tên gốc: Youjo senki) là light novel đầu tay của tác giả Carlo Zen, minh họa bởi Shinotsuki Shinobu lấy đề tài chiến tranh, giả tưởng thời cận hiện đại trên một thế giới khác, tồn tại đồng thời pháo binh, những cỗ tăng thiết giáp và máy bay chiến đấu cùng với những ma pháp sư sử dụng ngọc diễn toán can thiệp vào thế giới vật lý bay lượn trên bầu trời.\r\n\r\nTanya chiến ký bắt đầu với khung cảnh một bé gái cất tiếng khóc chào đời tại một cô nhi viện, tuy nhiên, có vẻ như bé gái ấy lại tồn tại một ý thức khác, một ý thức chưa từng nghĩ tới rằng mình sẽ tái sinh thành một cô bé trong một thế giới thảm khốc như vậy. Ý thức ấy thuộc về một trưởng phòng nhân sự mẫn cán tại Nhật Bản xa xôi. Là một người làm công ăn lương mẫu mực, chăm chỉ nhưng không có lòng trắc ẩn và có phần vô tâm, từ khi đi học cho tới khi đi làm, anh ta luôn làm theo đúng y sì những gì mà xã hội và cấp trên mong muốn, tuân thủ mọi quy định và hoàn thành mọi mệnh lệnh từ trên xuống. Là người phụ trách nhân sự, trong thời buổi kinh tế khó khăn và đổi mới công nghệ, anh ta đã hoàn thành xuất sắc việc cắt giảm nhân sự không hiệu quả cho công ty, dẫu đó có là một nhân viên lâu năm hay dẫu người ấy có quỳ lạy khóc lóc như nào. Sự vô tình này đã khiến anh ta hứng thụ sự uất hận từ người bị sa thải, và trong một khoảnh khắc trước khi ý thức mất đi, anh ta vẫn nhớ rằng mình đang đứng đợi tàu điện ở sát đường ray rồi bị một ai đó đẩy từ phía sau.\r\n\r\nChính lúc này, cảm giác về không gian và thời gian xung quanh anh ta chợt ngừng lại. Một thực thể bí ẩn X tự xưng là thần xuất hiện, phê phán cách sống thiếu đức tin và lòng trắc ẩn của nhân loại ngày nay như anh ta. Sau một hồi phân trần, thực thể X kết luận, nếu phải sống trong một thế giới nhiều chiến loạn và hạn chế về cơ thể, hẳn sinh vật vô tâm và vô thần kia cũng sẽ nảy sinh đức tin và gửi những lời cầu nguyện lên thần linh. Khoảnh khắc này cũng đánh dấu sự chào đời của một bé gái có tên Tanya tại một cô nhi viện thuộc Đế Quốc, cường quốc quân sự tại một thế giới khác.\r\nBằng tài năng và sự tính toán, Tanya được thừa nhận là một ma pháp sư, nhanh chóng hoàn thành khóa học quân sự tại trường sĩ quan, được điều ra cụm tập đoàn quân phía tây của Đế Quốc để thực tập, trước khi bị cuốn vào xung đột biên giới giữa Đế Quốc và Liên Hiệp Hợp Thương.\r\n\r\nHình ảnh một bé gái dễ thương tóc vàng, mắt xanh bay giữa chiến trường hỗn loạn đau thương và mất mát trở thành một giai thoại, mở đầu cho câu chuyện về hành trình chứng minh giá trị bản thân để leo lên vị trí tốt với nhiều chế độ ưu đãi của cựu trưởng phòng nhân sự giờ đây mang hình hài một bé gái ở một thế giới khác có tên gọi Tanya Degurechaff!', 1, 1),
(2, 'Tanya Chiến Ký 2: Plus Ultra', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 668, 200, 20, 160, 5, 'tanya2.jpg', 'Hành trình tiến thân tại thế giới khác trong thân thể một bé gái của vị cựu trưởng phòng nhân sự lại tiếp tục.\r\n\r\nNgay sau khi không đoàn ma pháp sư số 203 của Tanya được thành lập và hoàn thành khoá huấn luyện chưa được bao lâu, Đại công quốc Dacia láng giềng cử 60 vạn quân bộ binh tiến hành tấn công xâm lược Đế quốc. Bất chấp bộ tổng tham mưu rối loạn bởi tin tức đau đầu này, chỉ mình Tanya nhận thấy đây là cơ hội không thể tốt hơn để không đoàn non trẻ của cô có được kinh nghiệm thực chiến cũng như lập những chiến công đầu tiên.\r\n\r\nTừ series dị giới quân sự đình đám đã tạo tiếng vang cực lớn của tác giả Carlo Zen với hơn 4 triệu bản in được bán ra trên toàn thế giới.\r\n\r\nTiếp tục tiến lên phía trước bởi vì không còn lựa chọn nào khác. Plus Ultra!\r\n\r\nTrích đoạn sách:\r\n\r\nCâu hỏi đầu tiên của Không đoàn trưởng Degurechaff là về tình hình không chiến của mặt trận.\r\n\r\nKhi nhận được câu trả lời của người truyền tin từ Bộ Chỉ huy rằng không có thông tin nào về không lực địch, Không đoàn trưởng Degurechaff nghiêng đầu như thể vừa nhận được một báo cáo không thể tin nổi. Cô phải hỏi lại lần thứ hai, rằng đường truyền có đang bị vấn đề gì không?\r\n\r\nĐáp lại câu hỏi, sĩ quan liên lạc khẳng định đường truyền vô tuyến lẫn hữu tuyến đều bình thường. Và thậm chí, kênh liên lạc FAC từ trung tâm kiểm soát Dacia vẫn đang được kết nối.\r\n\r\nNgay sau khoảnh khắc báo cáo trên, các sĩ quan phụ trách của Bộ Tư lệnh cảm thấy một luồng hơi lạnh chạy dọc theo sống lưng mình.\r\n\r\nThiếu tá Degurechaff đang mỉm cười, thậm chí là đang cười với một vẻ mặt vui sướng tột độ. Trong giây phút ấy, không từ nào có thể diễn tả hết được sự kinh ngạc của toàn trụ sở.\r\n\r\nLúc đấy, không ai hiểu ra được ẩn ý đằng sau nụ cười ấy. Tuy nhiên, nếu bây giờ được nhìn thấy nụ cười mỉm đó có lẽ tôi cũng sẽ nở một nụ cười đáp lại y như vậy. Đó là nụ cười của một con thú săn mồi vô cùng dữ tợn, như niềm hân hoan của một con sói đói vừa nhìn thấy con mồi của mình.', 1, 1),
(3, 'Tanya Chiến Ký 3: The Finest Hour', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 488, 159, 26, 117, 5, 'tanya3.jpg', 'Hành trình tiến thân tại thế giới khác trong thân thể một bé gái của vị cựu trưởng phòng nhân sự lại tiếp tục.\r\nBộ tổng tham mưu quân đội đế quốc, với đầu não là thiếu tướng tác chiến Ruderdorf và thiếu tướng hậu cầu Zettour, đã cho phát động kế hoạch rút lui quy mô lớn quân đội đế quốc tại chiến tuyến phía bắc. Một bản kế hoạch điên rồ, khiến tất cả những thành viên ban nội các của Đế quốc cảm thấy phẫn nộ, còn kẻ địch từ cộng hoà cho tới vương quốc Liên hiệp, đều cảm nhận được chiến tranh sắp kết thúc với phần thắng thuộc về mình. Bởi lẽ, khu công nghiệp phía Bắc đế quốc là một trong những công xưởng sản xuất khí tài quân sự phục vụ cho chiến tranh lớn nhất của Đế quốc. Mất đi tuyến hậu cần này, quân đội đế quốc sẽ không đủ khả năng tiếp tục chiến tranh nữa và buộc phải đầu hàng vô điều kiện.\r\nLẽ nào những vị tướng tài năng kia đã quá mệt mỏi với những cuộc chiến kéo dài và tình trạng trì trệ tới gần như bất động tại chiến tuyến Rhine, nên đã vạch ra một kế hoạch để bảo toàn lực lượng và gián tiếp tuyên bố đầu hàng cho quân Đế quốc? Hay đấy là con mồi béo bở nhằm che dấu những ý đồ đầy dã tâm chứa đựng trong những bộ não siêu việt kia, nhằm bẫy đối thủ vào một cuộc tổng phản công quy mô lớn?\r\nVượt qua được những khó khăn muôn trùng, thời khắc huy hoàng nhất sẽ tới! Tanya chiến ký 3 – The finest hour', 1, 1),
(4, 'Tanya Chiến Ký 4: Dabit Deus His Quoque Finem', 'Carlo Zen', 'Shinotsuki Shinobu', 'Sinh tố, Dương Gia Thịnh', 'Bìa mềm', 520, 159, 26, 117, 5, 'tanya4.jpg', 'Dabit deus his quoque finem – Rồi Chúa cũng đặt dấu chấm hết cho những vấn đề này.\r\n\r\nMặt trận phương Nam của Đế quốc giành được nhiều lợi thế trước tàn dư của quân đội Cộng hoà – Nước Cộng hoà tự do. Nhờ những đóng góp vô cùng tích cực, Tanya và không đoàn của mình được hiệu triệu về đế đô. Những tưởng chuỗi ngày tận hưởng yên bình ở hậu phương đáng mơ ước của Tanya sắp tới, nào ngờ đấy lại là lệnh thuyên chuyển không đoàn của cô đến một chiến tuyến còn nguy hiểm hơn nhiều – Liên Bang.\r\n\r\nVùng lãnh thổ khép kín của những người theo chủ nghĩa cực tả cực đoan – Liên Bang, rõ ràng là nguy hiểm hơn nhiều so với một đội quân đã từng bại trận như Cộng hoà tự do. Không chỉ vậy, Liên Bang cũng từng được xem là một cường quốc cả về kinh tế và quân sự, đến mức dù luôn thiết lập quan hệ hợp tác hữu hảo với Liên Bang, nhưng quân đội Đế quốc vẫn luôn phải duy trì cụm tập đoàn quân phương đông cực kỳ hùng hậu và không di dịch bất cứ một nguồn lực nào khỏi khu vực này, để đề phòng sự đe doạ từ người hàng xóm khó đoán này.\r\n\r\nVà rồi mối quan hệ hoà bình mỏng manh như đi trên lớp băng mỏng của Đế quốc và Liên bang cũng sắp sửa tới hồi tan vỡ. Tanya một lần nữa phải tham gia vào một cuộc chiến nguy hiểm mà mình không bao giờ muốn cuốn vào. Cuộc đổ bộ của Tanya và không đoàn ma pháp sư số 203 vào lãnh thổ Liên Bang, báo hiệu một trận chiến quy mô rộng khắp toàn thế giới, chính thức bắt đầu.', 1, 1),
(5, '86 - Eightysix - 1', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Thạch Linh', 'Bìa mềm', 392, 105, 20, 84, 6, '86ep1.jpg', 'Chín năm nay, Cộng hòa San Magnolia liên tục bị Legion - vũ khí tự hành của Đế quốc láng giềng tấn công. Để đối phó, Cộng hòa cũng phát triển vũ khí tự hành, giúp họ không phải đưa lính ra chiến trường, giảm thiểu triệt để thương vong về người.\r\n\r\nNhưng đó chỉ là bề nổi của tảng băng chìm. Đời nào có chuyện không ai phải chết.\r\n\r\nNgoài 85 khu hành chính chính thức, Cộng hòa còn lập ra Khu 86 trên phần lãnh thổ “phi nhân” từng bị Legion càn quét, gán cho những con người bị đày ra đó cái mác “Tám Sáu” và bắt họ bán mạng chiến đấu trong những cỗ “vũ khí tự hành có người lái”.\r\n\r\nCậu thiếu niên Shin trực tiếp dẫn dắt đồng đội nơi tử địa. Nữ sĩ quan trẻ tuổi Lena ở hậu phương chỉ huy họ bằng phương thức liên lạc đặc biệt. Câu chuyện về cuộc chiến đầy khốc liệt, đau thương và li biệt của cả hai sẽ đi về đâu…?\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 1, 1),
(6, 'Dược Sư Tự Sự (Manga) - Tập 1', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 176, 47, 0, 47, 1, 'duocsu1_manga.jpg', 'Miêu Miêu là một cô gái làm công việc hầu hạ trong cung đình thời phong kiến.\r\nCâu chuyện của chúng ta bắt đầu với việc cô gái từng hành nghề dược sư ở phố hoa này nghe thấy người ta đồn thổi rằng: tất cả những đứa con của Hoàng đế đều đoản mệnh.\r\nBị thúc đẩy bởi niềm khát khao tri thức và tính hiếu kì cố hữu, Miêu Miêu bắt tay vào tìm hiểu nguyên nhân, xem đó như một cách giải khuây không hơn không kém.\r\n\r\n* WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng hân hạnh gửi đến các bạn độc giả phiên bản chuyển thể manga đặc sắc của bộ light-novel siêu ăn khách DƯỢC SƯ TỰ SỰ!', 2, 1),
(7, 'Hành Trình Của Elaina - Tập 12', 'Jougi Shiraishi', 'Azure', 'Aki', 'Bìa mềm', 336, 118, 20, 94.4, 4, 'elaina12.jpg', 'Ngày xửa ngày xưa, có một cô phù thủy tên Elaina.\r\n\r\nCô đang trong chuyến hành trình chu du tự do, không bị ràng buộc bởi bất cứ ai hay bất cứ chuyện gì.\r\n\r\nLần này, chuyến ngao du sẽ đưa cô đến gặp những con người đầy cá tính…\r\n\r\nMột nhóm thợ săn yêu tinh và yêu tinh bóng tối lang thang tìm kiếm bạn đồng hành.\r\n\r\nNgười du hành giàu có trên con đường đấu tranh để lấy lại nụ cười cho con gái mình.\r\n\r\n“Phù thủy than củi” cùng em gái trong nhiệm vụ điều tra bí mật.\r\n\r\nCặp chị em đang tìm kiếm một mái ấm mới.\r\n\r\nMột nữ phù thủy cá tính mạnh mẽ nhắm đến công việc kinh doanh đầy nhiệt huyết.\r\n\r\nVà một thầy trừ tà trẻ tuổi dừng chân tại một ngôi làng nọ.\r\n\r\nNhững cuộc gặp gỡ và sự kiện lần này sẽ được viết lại trong nhật ký của Elaina như nào đây?\r\n\r\n\"Chà, nếu tôi đã ra tay thì mọi chuyện sẽ ổn thôi.”', 1, 1),
(8, 'Hành Trình Của Elaina – Tập 1', 'Jougi Shiraishi', 'Azure ', 'Hương Giang', 'Bìa mềm', 372, 98, 20, 78.4, 4, 'elaina1.jpg', 'Ở một xứ sở xa xôi, có một cô bé phù thủy thích ngao du thiên hạ. Tên cô là Elaina, biệt danh \"phù thủy tro tàn\". \r\n\r\nTrong hành trình trải dài thú vị của mình, Elaina đã gặp gỡ rất nhiều người và phiêu lưu đến nhiều vùng đất trên thế giới. \r\n\r\nMột vương quốc mà chỉ chấp nhận pháp sư, một gã khổng lồ mê cơ bắp, một thiếu niên muốn cứu người yêu khỏi lưỡi hái Tử thần, một cô công chúa bị bỏ mặc giữa thành phố hoang tàn đổ nát, và câu chuyện của chính cô phù thuỷ nhỏ vẫn đang chờ được kể... \r\n\r\nTừ khi gặp gỡ những nhân vật lạ thường và trải nghiệm những khoảnh khắc tươi đẹp của họ, đến tận bây giờ, cuộc sống của cô phù thuỷ nhỏ vẫn không ngừng xoay quanh câu chuyện của những cuộc gặp gỡ và chia ly. \r\n\r\n“Không sao đâu. Dù gì tôi cũng là khách lữ hành mà. Tôi phải mau đi thôi.” \r\n\r\nVâng, cô phù thủy đó chính là tôi.', 1, 1),
(9, 'Lời Nói Đùa 1: Vòng Xoáy Chặt Đầu - Bác Học Màu Lam Và Kẻ Thích Bông Đùa', 'Nisio Isin', 'Take', 'Trang', 'Bìa mềm', 500, 162, 20, 129.6, 3, 'zaregoto1.jpg', 'Lời nói đùa (Tên gốc: Zaregoto) của tác giả Nisio Isin.\r\n\r\n“Có thể yêu một ai đó không phải mình chính là một loại tài năng. Dù không bằng được các tài năng khác thì nó cũng phải gần bằng, nhưng nếu có nó mà không sử dụng thì cũng chẳng thể làm nên chuyện gì cả.”\r\n\r\n\"Tôi\", nhân vật chính của bộ truyện, đã cùng người bạn là kỹ sư thiên tài của mình đến du lịch ở một hòn đảo tụ hội rất nhiều thiên tài trong các lĩnh vực khác. Nhưng cuối cùng họ đã mắc kẹt vào một chuỗi án mạng vô cùng bí ẩn. Trong lúc phá giải vụ án này, cuối cùng \"tôi\" đã hiểu được rốt cuộc tài năng là thứ mang ý nghĩa nặng nề đến nhường nào.\r\n\r\nCâu chuyện thiên tài về những thiên tài, viết bởi một thiên tài.\r\n\r\nTác phẩm đầu tay viết năm mười tám tuổi đã đoạt ngay giải thưởng Mephisto danh giá, đưa tên tuổi Nisio Isin đến với độc giả Light Novel Nhật Bản, trở thành nguồn cảm hứng cho hàng loạt tiểu thuyết gia trẻ tuổi trong suốt thập kỷ đó.\r\n\r\nTRÍCH ĐOẠN\r\n\r\n“Chắc cậu cũng giỏi Toán lắm nhỉ? Thường thì con trai giỏi các môn khoa học tự nhiên hơn con gái. Có vẻ não bộ được quy định như vậy.”\r\n\r\n“Thật sao?”\r\n\r\n“Theo kết quả thống kê thì là vậy.”\r\n\r\n“Kết quả gì mà trọng nam khinh nữ thế…”\r\n\r\nMấy kết luận dựa trên kết quả thống kê toàn kiểu trời ơi đất hỡi. Gieo xúc xắc được 100 lần liên tiếp ra số 6 không có nghĩa lần tiếp theo cũng sẽ ra số 6. Nghe tôi nói vậy, Akane liền phản đối.\r\n\r\n“Con xúc xắc gieo 100 lần đều ra 6 chắc chắn sẽ mãi mãi chỉ ra 6. Bên trong con xúc xắc đó tồn tại một sự khác biệt có ý nghĩa, không thể giải thích bằng ngẫu nhiên hay lệch lạc tỉ lệ đơn thuần, kiểu như là vì cậu đen nên mãi chưa tung ra số khác đâu. Thống kê theo giới tính cũng như vậy… Ha ha, cậu về phe nữ quyền hả? Hay cậu ngại vì tôi là phụ nữ? Tiếc là tôi không theo nữ quyền đâu. Hễ nghe mấy chuyện vận động nữ quyền với giải phóng phụ nữ là tôi thấy sôi bụng ghê gớm. Họ chỉ toàn nói chuyện tào lao, cậu không thấy thế à? Phải thừa nhận thế giới hiện giờ đang xoay quanh đàn ông. Nhưng thứ đáng được cổ vũ không phải là bình đẳng giới, mà là sự bình đẳng về cơ hội cho mỗi người thể hiện tài năng. Nam nữ vốn dĩ đã khác biệt đến độ có thể coi là hai loài với di truyền khác hẳn nhau. Vì vậy tôi, Sonoyama Akane, cho rằng mỗi giới đều có vai trò và nghĩa vụ riêng. Đương nhiên, tiền đề trọng yếu là ngoài nghĩa vụ phải làm còn có ‘việc mà mình thật sự muốn làm’, hai cái đó tách biệt nhau, tiền đề thứ yếu là nếu phải chọn một trong hai thì nên ưu tiên việc mình muốn làm. À tất nhiên mình phải làm được việc mà mình muốn làm đã. Nhưng ít nhất tôi vẫn nghĩ rằng ‘tôi là đứa không làm được gì cả’ chỉ là một sự kiếm cớ, một con đường trốn tránh dễ dàng mà thôi.”\r\n\r\n“Tôi nghĩ vấn đề cũng nằm ở môi trường nữa.”\r\n\r\n“Môi trường. Nhưng đã có thời nào phụ nữ bị cấm viết văn, tạc tượng chưa? Với khuynh hướng hiện nay, tôi cảm thông với nam giới hơn. Có lẽ vì lập trường của tôi gần với họ hơn chăng, nhưng trước giờ có những việc vốn là lĩnh vực của nam giới mà. Giờ bị người khác chen chân vào thì ai mà chẳng bực?”\r\n\r\n“Nhưng trước giờ chúng ta đã sai, giờ mới đang phải làm cho đúng lại. Những người tiên phong bao giờ cũng vấp phải vô số khó khăn mà.”\r\n\r\nVừa tự hỏi không hiểu sao mình lại về phe nữ giới, tôi vừa phản bác Akane.', 1, 1),
(10, 'Lời Nói Đùa 2: Kẻ Siết Cổ Mộng Mơ - Zerozaki Hitoshiki - Mất Tư Cách Làm Người', 'Nisio Isin', 'Take', 'Đen Nhỏ', 'Bìa mềm', 560, 175, 20, 140, 3, 'zaregoto2.jpg', 'Lời Nói Đùa 2: Kẻ Siết Cổ Mộng Mơ - Zerozaki Hitoshiki - Mất Tư Cách Làm Người\r\n\r\nTháng Tư năm 2020, Công ty Cổ phần Văn hóa và Truyền thông Nhã Nam giới thiệu đến bạn đọc tập thứ hai của tựa truyện nổi tiếng tại Nhật Bản: Lời nói đùa (Tên gốc: Zaregoto) của tác giả Nisio Isin.\r\n\r\nYêu một người thì dễ, nhưng tiếp tục yêu họ thì khó. Cũng giống như giết người thì dễ, nhưng tiếp tục giết người thì khó vậy.\r\n\r\nTrung thực và chân thành, sống đến từng này tuổi mà không hề biết đến khái niệm dối trá, dù trong bất cứ hoàn cảnh nào cũng không thể rời mắt khỏi sự thật… nói tóm lại đó có thể coi là tính cách bẩm sinh của “tôi”, người đã chạm trán con quỷ giết người mang tên Zerozaki Hitoshiki vào một ngày tháng Năm. Đó vừa là một cuộc tao ngộ, vừa là điều đương nhiên phải tới. Đó là một ý chí sắc lẻm, một nguyên lý nhọn hoắt, và cũng là một trò đùa như mũi dao. Ngoài ra “tôi” còn có một cuộc gặp gỡ nho nhỏ với những người bạn cùng lớp nữa, nhưng cái đó thì chẳng biết nói sao, tôi chẳng biết nên bắt đầu kể từ chỗ nào. Bởi vì, này nhé, thân là con người, “tôi” làm sao nỡ nói dối cơ chứ…\r\n\r\nTác phẩm đầu tay viết năm mười tám tuổi đã đoạt ngay giải thưởng Mephisto danh giá, đưa tên tuổi Nisio Isin đến với độc giả Light Novel Nhật Bản, trở thành nguồn cảm hứng cho hàng loạt tiểu thuyết gia trẻ tuổi trong suốt thập kỷ đó.\r\n\r\nTRÍCH ĐOẠN\r\n\r\nMỗi khi nghĩ về Zerozaki, tôi chỉ có thể lý giải cậu ta bằng một khái niệm duy nhất: “hình ảnh phản chiếu trên mặt nước”. Nếu không hiểu như vậy, có lẽ hành động diễn tả kẻ mất tư cách làm người ấy bằng ngôn từ cũng sẽ trở nên vô nghĩa mất thôi. Nhưng thay vì suy xét về hành động diễn tả, có lẽ câu hỏi chúng ta cần phải trả lời sẽ là: Vốn ngay từ đầu ở Zerozaki có tồn tại thứ gọi là “ý nghĩa” hay không? Giống như danh xưng “kẻ thích đùa” của tôi không mang một ý nghĩa nào cụ thể, đánh giá kẻ giết người ấy thông qua biểu hiện bên ngoài chẳng khác nào tin vào mấy bài giải mẫu đã bị sai lầm từ lâu. Nên diễn tả cảm giác ấy thế nào nhỉ? Tựa như đang đứng trước bản thể của chính mình, tựa như đang nói chuyện với chính bản thân mình, một câu chuyện với cốt truyện vừa kỳ quặc lại vừa hợp lý.\r\n\r\nPhải rồi.\r\n\r\nCho nên, ngay từ đầu đây đã là một cuộc gặp gỡ tình cờ bất khả thi.\r\n\r\nCó lẽ, đó là trải nghiệm nguyên sơ nhất.\r\n\r\nLà ngôn từ đầu tiên mà ta nghe thấy.\r\n\r\nLà những ghi chép vào bộ nhớ gốc.\r\n\r\nLà quá khứ ta có thể liên tưởng và so sánh.\r\n\r\nLà véc-tơ cùng gốc, cùng phương hướng.\r\n\r\nTựa như còn bình thường hơn cả bình thường.\r\n\r\nTựa như hình ảnh phản chiếu trên mặt gương.\r\n\r\nNói tóm lại, chúng tôi quá giống nhau.', 1, 1),
(11, 'Lời Nói Đùa 3: Học Viện Treo Cổ - Đệ Tử Của Kẻ Thích Bông Đùa', 'Nisio Isin', 'Take', 'Đen Nhỏ', 'Bìa mềm', 300, 140, 20, 112, 3, 'zaregoto3.jpg', 'Có một quy tắc bạn buộc phải tuân thủ khi muốn kết thân với một người xa lạ, đó là luôn luôn yêu quý đối phương. Nói tóm lại, chúng ta có thể hiểu rằng kết thân với một người xa lạ nào đó là điều bất khả thi. Mà không, nội cái ý muốn kết thân với một người xa lạ nào đó, vốn đã rất bất bình thường rồi.\r\n\r\n“Tôi” là một người chính trực và thành thực, không bao giờ cho phép bản thân nói nhăng nói cuội, không thể bỏ qua bất cứ mâu thuẫn nào... Cuối tháng Sáu vừa rồi, khi còn chưa kịp thắc mắc nửa lời, “tôi” đã bị Người nhận khoán mạnh nhất nhân loại Aikawa Jun lôi đến Học viện Sumiyuri, ngôi trường danh giá dành cho các thiên kim tiểu thư. Và rồi học viện đó nảy sinh rắc rối. Nói “tôi” bị cuốn vào cũng đúng, nói “tôi” tự nhảy vào mớ bòng bong ấy cũng chẳng sai. Mà kệ đi, dù có thanh minh thanh nga như thế nào đi chăng nữa thì cũng chẳng có nghĩa lý gì. Bởi những rắc rối đã xảy ra vốn dĩ chỉ tựa như một lời nói đùa mà thôi.\r\n\r\nTập thứ ba trong câu chuyện về Lời nói đùa!', 1, 1),
(12, 'Dược Sư Tự Sự (Manga) - Tập 2', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 176, 47, 10, 42.3, 1, 'duocsu2_manga.jpg', 'Miêu Miêu trước đây vốn là một dược sư, sau khi bị hoạn quan Nhâm Thị phát hiện ra tài năng, cô đã trở thành thị nữ của vị phi tần có tên là Ngọc Diệp. Cô nhận một mệnh lệnh trực tiếp từ “Hoàng đế”, nhưng công việc mà cô được uỷ thác ấy rốt cuộc là gì...!?\r\n\r\nTrong tập thứ 2 này, Miêu Miêu cũng hoạt động vô cùng tích cực!! Bị thôi thúc bởi niềm khát khao tri thức và tính hiếu kì cố hữu, cô bất ngờ thu hút sự chú ý của tất cả mọi người!!\r\n\r\n* WINGS BOOKS - Thương hiệu sách trẻ của NXB Kim Đồng hân hạnh gửi đến các bạn độc giả phiên bản chuyển thể manga đặc sắc của bộ light-novel siêu ăn khách DƯỢC SƯ TỰ SỰ!', 2, 1),
(13, 'Dược Sư Tự Sự (Manga) - Tập 3', 'Natsu Hyuuga (Hero Bunko/Shufunotomosha), Itsuki Nanao', 'Nekokurage, Touco Shino', 'Hide', 'Bìa mềm', 194, 47, 10, 42.3, 1, 'duocsu3_manga.jpg', 'Miêu Miêu đã giải đáp cho Nhâm Thị bối cảnh xuất hiện phần ăn có độc tại yến tiệc ngoài trời. Sau đó, mặc kệ Nhâm Thị bận tối mắt tối mũi với cả núi công việc còn dang dở, Miêu Miêu tận dụng cây trâm mình đã nhận được vào hôm diễn ra yến tiệc để lần đầu tiên sau 10 tháng, trở về phố hoa, cũng là trở về nhà.\r\n\r\nThế nhưng, cô lại bị vướng vào một vụ án mới...!?\r\n\r\nMời các bạn đọc tập 3 để chứng kiến khả năng suy luận ngày càng sắc bén của Miêu Miêu!!', 2, 1),
(14, '86 - Eightysix - 2', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Quang Phúc', 'Bìa mềm', 292, 105, 20, 84, 6, '86ep2.jpg', 'Sau khi từ biệt Lena, nữ Handler của Cộng hòa, nhóm Tám Sáu do Shin dẫn đầu được nước láng giềng Liên bang Giad đón nhận. Tại đây, họ được trao cơ hội hưởng hòa bình và tự do. Nhưng chỉ sau một thời gian nghỉ ngơi ngắn, họ đã chọn quay lại chiến trường. \r\n\r\nSau khi trở thành quân nhân Liên bang, họ tiếp tục xông pha trên những mặt trận ác liệt nhất, trước khi đối mặt với đợt tổng tấn công của Legion mà Shin dự báo được nhờ dị năng của mình. Lần này họ có thêm sự đồng hành của Frederica Rosenfort, một cô bé bí ẩn kém họ nhiều tuổi.\r\n\r\nĐối diện với câu hỏi “Tại sao lại chiến đấu?”, họ sẽ trả lời thế nào…?\r\n\r\nĐiều gì đã gọi “Tử thần” quay trở lại “địa ngục”…?', 1, 1),
(15, '86 - Eightysix - 3', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Minh Thúy', 'Bìa mềm', 380, 105, 20, 84, 6, '86ep3.jpg', 'Bằng những đợt pháo kích cự li siêu trường lên tới hàng trăm kilomet, lớp Legion mới trang bị railgun đã đập nát hàng thủ cuối cùng của Cộng hòa San Magnolia - nơi Lena trụ lại, sau đó gây tổn thất nặng nề cho phòng tuyến của Liên bang Giad - nơi Shin đang phục vụ.\r\nTrong tình thế ngặt nghèo cực độ, Liên bang quyết định mở một chiến dịch liều lĩnh đến độ điên rồ. Đó là lập một đơn vị cảm tử với vai trò “mũi giáo” chọc thẳng vào trận địa pháo gia tốc điện từ của Legion. Nòng cốt của đơn vị này chính là các Tám Sáu do Shin dẫn dắt.\r\nTrong quá trình thực hiện nhiệm vụ ấy, trái tim Shin không ngừng bị giằng xé. Rõ ràng cậu đã đưa tiễn anh trai, đã thoát khỏi Cộng hòa, vậy mà… \r\nTại sao “Tử thần” vẫn chiến đấu? \r\nVì cái gì? \r\nVì ai?', 1, 1),
(16, '86 - Eightysix - 4', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Quang Phúc', 'Bìa mềm', 340, 0, 20, 96, 6, '86ep4.jpg', 'Sau cuộc hội ngộ định mệnh, Shin và Lena nhanh chóng xích lại gần nhau, làm Frederica và Crena ngay ngáy lo sợ, còn Raiden và những người khác phải giữ ý đến phát mệt.\r\n\r\nTuy nhiên, quãng thời gian nghỉ ngơi ngắn ngủi nhanh chóng kết thúc. Đơn vị mới do Lena chỉ huy tác chiến nhận được nhiệm vụ đầu tiên. \r\n\r\nDưới ga tàu điện ngầm tại thành phố phía Bắc Cộng hòa, căn cứ khổng lồ của Legion đang đón đợi họ. Thứ ẩn sâu dưới đó là “mặt tối”. Của Legion. Của Cộng hòa. Và của cả những con người từng bị tổ quốc bức hại.\r\n\r\n“Tiếng gọi vọng lên từ lòng đất, báo hiệu thử thách mới cho nhóm thiếu niên.”', 1, 1),
(18, '86 - Eightysix - 5', 'Asato Asato', 'SHIRABII, Thiết kế vũ khí: I-IV', 'Minh Thúy', 'Bìa mềm', 400, 145, 20, 116, 6, '86ep5.jpg', '“Tới tìm ta đi.”\r\n\r\nSau khi Shin “nhìn” thấy lời nhắn được cho là của Zelena - người phát minh ra Legion, Lena cùng Lữ đoàn Biệt kích Cơ động 86 bước sang chiến trường Vương quốc Liên hiệp Roa Gracia - nơi phát hiện con Ameise màu trắng nghi là Zelena. Tuy nhiên…\r\n\r\nChẳng rõ là nhạo báng sự sống hay khinh nhờn cái chết, Vương quốc Liên hiệp đang áp dụng một chiến lược đi chệch luân thường để chống Legion, khiến ngay cả các Tám Sáu còn phải rùng mình. Tại đây, kẻ thù lẩn khuất trong rừng sâu lạnh giá và “cái chết” sát sườn không ngừng trêu đùa nhóm thiếu niên.\r\n\r\n“Lũ quái vật ẩn mình trong núi tuyết mỉm cười hỏi họ…”', 1, 1),
(20, 'Trọn Bộ 3 Tập Sherlock Holmes (Kèm Hộp)', 'Sir Arthur Conan Doyle', '', 'Nhiều người dịch', 'Bìa mềm,có hộp cứng', 2004, 345, 22, 269.1, 7, 'sherlockholmes.jpg', '“Tên tôi là Sherlock Holmes. Công việc của tôi là tìm hiểu những gì mà người khác không biết…”\r\n\r\nĐối với các độc giả yêu thích dòng văn trinh thám nói riêng cũng như những người yêu sách trên toàn thế giới nói chung thì không phải nói nhiều về sức hút của hai cái tên: nhà văn Conan Doyle và “đứa con tinh thần” của cả cuộc đời ông – Sherlock Holmes.\r\n\r\nNhân vật Sherlock Holmes từ lâu đã trở thành nguồn cảm hứng cho hàng trăm, hàng ngàn tác phẩm ở nhiều loại hình nghệ thuật khác: từ âm nhạc, ca kịch đến điện ảnh… Bộ sách Sherlock Holmes toàn tập (boxset trọn bộ 3 tập) một lần nữa mang đến cho người đọc cơ hội được nhìn ngắm, ngưỡng mộ và đánh giá nhân vật độc đáo của nhà văn tài năng Conan Doyle. Chân dung cuộc đời, sự nghiệp và nhân cách của Sherlock Holmes chưa bao giờ được tái hiện chân thực, đầy đủ và sống động đến thế… Chỉ từ một giọt nước, người giỏi suy luận có thể đoán ra rất nhiều chuyện liên quan đến một thác nước hay một đại dương dù họ chưa bao giờ tận mắt nhìn thấy chúng.Như vậy, cuộc sống là một chuỗi mắt xích rộng lớn nhất của nó, nếu ta biết được một mắt xích. Như tất cả mọi khoa học khác, “suy đoán và phân tích” là một khoa học mà ta chỉ có thể làm chủ nó sau một quá trình nghiên cứu dài lâu, bền bỉ.\r\n\r\nNgười mới đi vào lĩnh vực này nên bắt đầu bằng những vấn đề sơ đẳng: gặp bất kỳ ai, chỉ bằng vào sự quan sát, hãy cố tìm hiểu tiểu sử, nghề nghiệp hay thói quen của người ấy. Tuy có vẻ ấu trĩ nhưng thực ra sự thật này được rèn giũa các khả năng quan sát của ta và nó dạy cho ta biết cần phải nhìn thẳng vào đâu và phải tìm kiếm cái gì. Móng tay, những vết chai ở ngón trỏ và ngón cái, ống tay áo, đầu gối quần, dáng đi, cách đứng đều là những thứ nói lên nghề nghiệp của một con người…', 5, 1),
(21, 'Đọc Vị Bất Kỳ Ai (Tái Bản 2022)', 'TS David J Lieberman', '', 'Quỳnh Lê', 'Bìa Mềm', 223, 89, 15, 75.65, 5, 'docvi.png', 'Bạn băn khoăn không biết người ngồi đối diện đang nghĩ gì? Họ có đang nói dối bạn không? Đối tác đang ngồi đối diện với bạn trên bàn đàm phán đang nghĩ gì và nói gì tiếp theo?\r\n\r\nĐỌC người khác là một trong những công cụ quan trọng, có giá trị nhất, giúp ích cho bạn trong mọi khía cạnh của cuộc sống. ĐỌC VỊ người khác để:\r\n\r\nHãy chiếm thế thượng phong trong việc chủ động nhận biết điều cần tìm kiếm - ở bất kỳ ai bằng cách “thâm nhập vào suy nghĩ” của người khác. ĐỌC VỊ BẤT KỲ AI là cẩm nang dạy bạn cách thâm nhập vào tâm trí của người khác để biết điều người ta đang nghĩ. Cuốn sách này sẽ không giúp bạn rút ra các kết luận chung về một ai đó dựa vào cảm tính hay sự võ đoán. Những nguyên tắc được chia sẻ trong cuốn sách này không đơn thuần là những lý thuyết hay mẹo vặt chỉ đúng trong một số trường hợp hoặc với những đối tượng nhất định. Các kết quả nghiên cứu trong cuốn sách này được đưa ra dựa trên phương pháp S.N.A.P - cách thức phân tích và tìm hiểu tính cách một cách bài bản trong phạm vi cho phép mà không làm mếch lòng đối tượng được phân tích. Phương pháp này dựa trên những phân tích về tâm lý, chứ không chỉ đơn thuần dựa trên ngôn ngữ cử chỉ, trực giác hay võ đoán.\r\n\r\nCuốn sách được chia làm hai phần và 15 chương:\r\n\r\nPhần 1: Bảy câu hỏi cơ bản: Học cách phát hiện ra điều người khác nghĩ hay cảm nhận một cách dễ dàng và nhanh chóng trong bất kỳ hoàn cảnh nào.\r\nPhần 2: Những kế hoạch chi tiết cho hoạt động trí óc - hiểu được quá trình ra quyết định. Vượt ra ngoài việc đọc các suy nghĩ và cảm giác đơn thuần: Hãy học cách người khác suy nghĩ để có thể nắm bắt bất kỳ ai, phán đoán hành xử và hiểu được họ còn hơn chính bản thân họ.\r\nTrích đoạn sách hay:\r\n\r\nMột giám đốc phụ trách bán hàng nghi ngờ một trong những nhân viên kinh doanh của mình đang biển thủ công quỹ. Nếu hỏi trực tiếp “Có phải cô đang lấy trộm đồ của công ty?” sẽ khiến người bị nghi ngờ phòng bị ngay lập tức, việc muốn tìm ra chân tướng sự việc càng trở nên khó khăn hơn. Nếu cô ta không làm việc đó, dĩ nhiên cô ta sẽ nói với người giám đốc mình không lấy trộm. Ngược lại, dù có lấy trộm đi chăng nữa, cô ta cũng sẽ nói dối mình không hề làm vậy. Thay vào việc hỏi trực diện, người giám đốc khôn ngoan nên nói một điều gì đó tưởng chừng vô hại, như “Jill, không biết cô có giúp được tôi việc này không. Có vẻ như dạo này có người trong phòng đang lấy đồ của công ty về nhà phục vụ cho tư lợi cá nhân. Cô có hướng giải quyết nào cho việc này không?” rồi bình tĩnh quan sát phản ứng của người nhân viên.\r\n\r\nNếu cô ta hỏi lại và có vẻ hứng thú với đề tài này, anh ta có thể tạm an tâm rằng cô ta không lấy trộm, còn nếu cô ta đột nhiên trở nên không thoải mái và tìm cách thay đổi đề tài thì rõ ràng cô ta có động cơ không trong sáng.\r\n\r\nNgười giám đốc khi đó sẽ nhận ra sự chuyển hướng đột ngột trong thái độ và hành vi của người nhân viên. Nếu cô gái đó hoàn toàn trong sạch, có lẽ cô ta sẽ đưa ra hướng giải quyết của mình và vui vẻ khi sếp hỏi ý kiến của mình. Ngược lại, cô ta sẽ có biểu hiện không thoải mái rõ ràng và có lẽ sẽ cố cam đoan với sếp rằng cô không đời nào làm việc như vậy. Không có lí do gì để cô ta phải thanh minh như vậy, trừ phi cô là người có cảm giác tội lỗi…\r\n\r\n', 3, 1),
(22, 'Phong Thái Của Bậc Thầy Thuyết Phục (Tái Bản 2020)', 'Dave Lakhani', '', 'Thanh Mai, Đỗ Quyên, Hồng Khải', 'Bìa Mềm', 244, 99, 10, 89.1, 8, 'bacthay.jpg', 'Phong Thái Của Bậc Thầy Thuyết Phục (Tái Bản 2020) Là người bán hàng, bạn mong muốn có thể khiến khách hàng đưa ra quyết định mua hàng nhanh chóng. Là lãnh đạo, bạn mong muốn nhân viên luôn sẵn lòng ủng hộ và tin tưởng. Là người làm quảng cáo, bạn mong muốn bất cứ ai xem quảng cáo của mình cũng bị thu hút và buộc phải hành động... Để thực hiện thành công tất cả những điều đó, bạn không thể không có một kỹ năng hiệu quả - kỹ năng thuyết phục. Trong Phong thái của bậc thầy thuyết phục, bạn sẽ tìm thấy: Sự khác biệt căn bản giữa thuyết phục và dụ dỗ. Một sơ đồ hoàn chỉnh của quá trình thuyết phục. Một bộ công cụ thuyết phục và bảng hướng dẫn sử dụng chi tiết. Mười bảy chiến thuật thuyết phục cụ thể, hiệu quả. Đẳng thức thuyết phục. Sáu nguyên lý thuyết phục. Các bước trở thành chuyên gia thuyết phục trong chưa đầy 30 ngày. Các cách thuyết phục nhanh chóng mà bạn có thể làm chủ và sử dụng hàng ngày. Thuyết phục đích thực dựa trên lẽ phải, lòng chân thành, khả năng khơi gợi tính hiếu kỳ, kể chuyện hấp dẫn và giỏi nắm bắt mong muốn của người khác. Sự thuyết phục tuyệt vời là cả một nghệ thuật công phu - bản hòa âm tinh tế giữa bạn và người bạn muốn thuyết phục.', 7, 1),
(23, 'Sự Im Lặng Của Bầy Cừu (Tái Bản 2019)', 'Thomas Harris', '', 'Phạm Hồng Anh', 'Phạm Hồng Anh', 359, 115, 25, 86.25, 3, 'suimlang.jpg', 'Những cuộc phỏng vấn ở xà lim với kẻ ăn thịt người ham thích trò đùa trí tuệ, những tiết lộ nửa chừng hắn chỉ dành cho kẻ nào thông minh, những cái nhìn xuyên thấu thân phận và suy tư của cô mà đôi khi cô muốn lảng tránh... Clarice Starling đã dấn thân vào cuộc điều tra án giết người lột da hàng loạt như thế, để rồi trong tiếng bức bối của chiếc đồng hồ đếm ngược về cái chết, cô phải vật lộn để chấm dứt tiếng kêu bao lâu nay vẫn đeo đẳng giấc mơ mình: tiếng kêu của bầy cừu sắp bị đem đi giết thịt.\r\n\r\nSự im lặng của bầy cừu hội tụ đầy đủ những yếu tố làm nên một cuốn tiểu thuyết trinh thám kinh dị xuất sắc nhất: không một dấu vết lúng túng trong những chi tiết thuộc lĩnh vực chuyên môn, với các tình tiết giật gân, cái chết luôn lơ lửng, với cuộc so găng của những bộ óc lớn mà không có chỗ cho kẻ ngu ngốc để cuộc chơi trí tuệ trở nên dễ dàng. Bồi đắp vào cốt truyện lôi cuốn đó là cơ hội được trải nghiệm trong trí não của cả kẻ gây tội lẫn kẻ thi hành công lý, khi mỗi bên phải vật vã trong ngục tù của đau đớn để tìm kiếm, khẩn thiết và liên tục, một sự lắng dịu cho tâm hồn.\r\n\r\nNhận định\r\n“...xây dựng tình tiết đẹp với lối viết thông tuệ. Không tác phẩm kinh dị nào vượt được cuốn này.”\r\n- Clive Barker\r\n\r\n\r\n“Một cuốn sách giáo khoa đúng nghĩa về nghệ thuật viết truyện kinh dị, một kiệt tác chứa xung lực đưa nó lao vụt lên đỉnh cao không một khiếm khuyết... Harris đơn giản chính là tiểu thuyết gia kinh dị xuất sắc nhất thời nay.”\r\n- The Washington Post\r\n\r\n\r\n“Tiết điệu dồn dập... đánh thức sự tò mò... lôi cuốn.”\r\n- Chicago Tribune\r\n', 5, 1),
(24, 'Tư Duy Phản Biện', 'Zoe McKey', '', 'Jaden Minh', 'Bìa mềm', 172, 85, 20, 68, 9, 'tuduyphabien.jpg', 'Tư duy phản biện là chìa khóa để bạn thoát khỏi những lối mòn trong suy nghĩ, giúp bạn giải quyết các vấn đề khó khăn một cách sáng tạo và hiệu quả hơn. Cuốn sách \"Tư duy phản biện\" được viết bởi chuyên gia đào tạo Zoe McKey sẽ giúp bạn khai phá được sức mạnh trí óc của mình. Tác phẩm chứa đựng những bí quyết và chiến lược của các cá nhân thành công nhất, giúp người đọc có thể:\r\n\r\n\r\n- Khám phá chiều sâu tư duy\r\n\r\n\r\n- Đánh thức trí sáng tạo\r\n\r\n\r\n- Nắm bắt được cơ hội\r\n\r\n\r\n- Không ngại mơ ước\r\n\r\n\r\n- Vượt qua sự lo lắng\r\n\r\n\r\n- Quản lí thời gian hiệu quả\r\n\r\n\r\nĐọc xong tác phẩm, trực giác của bạn sẽ được mài sắc một cách rõ rệt, nhờ vậy khả năng đánh giá và đưa ra quyết định cũng được cải thiện, giúp bạn tự tin hơn trong mọi hành động.\r\n\r\n\r\nNếu đủ động lực để thực hành các phương pháp trong “Tư duy phản biện”, bạn sẽ học được một lối tư duy có định hướng, tập trung, kỉ luật và tự chủ. Bạn sẽ biết cách phân tích các tình huống từ nhiều góc độ khác nhau, không vội vàng đưa ra những kết luận sai lầm và chủ quan, có cái nhìn đúng đắn hơn với các hiện tượng trong cuộc sống, và không còn phải hối tiếc với các quyết định và hành xử của mình.', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Idtk` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `Idrole` int(11) NOT NULL,
  `StatusTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Idtk`, `Username`, `Password`, `Avatar`, `Idrole`, `StatusTK`) VALUES
(1, 'admin', '123', '', 1, 1),
(2, 'khach1', '321', '', 2, 1),
(3, 'test', '123', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `Idloai` int(11) NOT NULL,
  `Tenloai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`Idloai`, `Tenloai`) VALUES
(1, 'Light Novel'),
(2, 'Manga - Comic'),
(3, 'kỹ năng sống'),
(4, 'Kinh tế'),
(5, 'Trinh thám'),
(7, 'Tâm lý học'),
(8, 'Bách khoa'),
(9, 'Quân sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Iduser` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `Diachi` varchar(200) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Sdt` int(11) NOT NULL,
  `Idtk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Iduser`, `Ten`, `Diachi`, `Mail`, `Sdt`, `Idtk`) VALUES
(1, 'I am Admin', '273 An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh', 'admin@gmail.com', 18008098, 1),
(2, 'Nguyen Van A', '294 Nguyễn Tri Phương, Phường 4, Quận 10, Thành phố Hồ Chí Minh', 'khach1@gmai.com', 907738923, 2),
(3, 'Test', 'USA', 'test@gmail.com', 231233, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_payment`
--

CREATE TABLE `users_payment` (
  `Idpay` int(11) NOT NULL,
  `Iduser` int(11) NOT NULL,
  `Bank` varchar(50) DEFAULT NULL,
  `Sotk` int(15) DEFAULT NULL,
  `Tentk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users_payment`
--

INSERT INTO `users_payment` (`Idpay`, `Iduser`, `Bank`, `Sotk`, `Tentk`) VALUES
(1, 1, 'MB', 21323, 'ADmin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Idcthd`),
  ADD KEY `hoadon_rel` (`Idhd`),
  ADD KEY `sanpham` (`Idsp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Idhd`),
  ADD KEY `tkhd_rel` (`Idtk`);

--
-- Chỉ mục cho bảng `nhaphathanh`
--
ALTER TABLE `nhaphathanh`
  ADD PRIMARY KEY (`Idnph`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Idrole`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Idsp`),
  ADD KEY `loaihang_rel` (`Idloai`),
  ADD KEY `nhaphathanh-rel` (`Idnph`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Idtk`),
  ADD KEY `Idrole` (`Idrole`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Idloai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Iduser`),
  ADD KEY `tk_rel` (`Idtk`);

--
-- Chỉ mục cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  ADD PRIMARY KEY (`Idpay`),
  ADD KEY `lrel_upay` (`Iduser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `Idcthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Idhd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhaphathanh`
--
ALTER TABLE `nhaphathanh`
  MODIFY `Idnph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `Idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `Idtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `Idloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  MODIFY `Idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `hoadon_rel` FOREIGN KEY (`Idhd`) REFERENCES `hoadon` (`Idhd`),
  ADD CONSTRAINT `sanpham` FOREIGN KEY (`Idsp`) REFERENCES `sanpham` (`Idsp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `tkhd_rel` FOREIGN KEY (`Idtk`) REFERENCES `taikhoan` (`Idtk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `loaihang_rel` FOREIGN KEY (`Idloai`) REFERENCES `theloai` (`Idloai`),
  ADD CONSTRAINT `nhaphathanh-rel` FOREIGN KEY (`Idnph`) REFERENCES `nhaphathanh` (`Idnph`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `role_rel` FOREIGN KEY (`Idrole`) REFERENCES `role` (`Idrole`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tk_rel` FOREIGN KEY (`Idtk`) REFERENCES `taikhoan` (`Idtk`);

--
-- Các ràng buộc cho bảng `users_payment`
--
ALTER TABLE `users_payment`
  ADD CONSTRAINT `lrel_upay` FOREIGN KEY (`Iduser`) REFERENCES `users` (`Iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
