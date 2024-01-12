-- Create Career College
-- PHP and Database Final Project
-- by Henry Wat and Jason Lin

--
-- Database: `ecom`
--
CREATE DATABASE IF NOT EXISTS `ecom` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecom`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `category` varchar(255) NOT NULL COMMENT 'category name'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Emulsion Paint'),
(2, 'Creative Coating'),
(3, 'Wood & Metal Paint'),
(4, 'Primer / Sealer');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `color` varchar(255) NOT NULL COMMENT 'color name',
  `hex` varchar(255) NOT NULL COMMENT 'color hex value',
  `disp_order` int(11) NOT NULL COMMENT 'display order'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `hex`, `disp_order`) VALUES
(1, 'Red', '#F44336', 1),
(2, 'Pink', '#E81E63', 2),
(3, 'Purple', '#9C27B0', 3),
(4, 'Deep Purple', '#673AB7', 4),
(5, 'Indigo', '#3F51B5', 5),
(6, 'Blue', '#2196F3', 6),
(7, 'Light Blue', '#03A9F4', 7),
(8, 'Cyan', '#00BCD4', 8),
(9, 'Teal', '#009688', 9),
(10, 'Green', '#4CAF50', 10),
(11, 'Light Green', '#8BC34A', 11),
(12, 'Lime', '#CDDC39', 12),
(13, 'Yellow', '#FFEB3B', 13),
(14, 'Amber', '#FFC107', 14),
(15, 'Orange', '#FF9800', 15),
(16, 'Deep Orange', '#FF5722', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT 'ORDER ID',
  `user_id` int(11) NOT NULL COMMENT 'USER ID',
  `place_time` datetime DEFAULT NULL COMMENT 'PLACING TIME',
  `total_amount` decimal(10,2) NOT NULL COMMENT 'TOTAL AMOUNT',
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `place_time`, `total_amount`, `full_name`, `phone`, `address`, `status`) VALUES
(37, 1, '2024-01-03 09:38:44', 4623.40, 'Henry Wat', '123-456789', 'Room 1234, ANC Street', 'Cancelled'),
(38, 1, '2024-01-03 12:38:59', 640.80, 'Henry Wat2', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(39, 1, '2024-01-04 13:39:19', 2471.60, 'Henry Wat3', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(40, 1, '2024-01-04 14:09:32', 1351.00, 'Henry Wat4', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(41, 1, '2024-01-04 20:40:24', 5255.00, 'Henry Wat5', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(42, 1, '2024-01-05 09:40:53', 4755.00, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(43, 1, '2024-01-05 11:58:44', 1854.00, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(44, 1, '2024-01-05 14:59:04', 1441.60, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivering'),
(45, 1, '2024-01-06 10:06:01', 5755.00, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivering'),
(50, 1, '2024-01-06 11:06:30', 2734.20, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivered'),
(51, 1, '2024-01-06 12:16:58', 602.00, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Processing'),
(47, 1, '2024-01-06 13:27:31', 4804.00, 'Henry Wat6', '123-456789', 'Room 1234, ANC Street', 'Delivering'),
(46, 2, '2024-01-06 10:11:06', 1653.00, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'Delivering'),
(48, 2, '2024-01-06 13:41:25', 1302.00, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'pending'),
(49, 2, '2024-01-06 10:11:43', 2302.00, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'Delivering'),
(489, 1, '2024-01-07 01:33:50', 160.20, 'Jason', '123-456789', 'Room 1234, ANC Street', 'Cancelled'),
(490, 2, '2024-01-07 05:25:55', 1271.80, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'Processing'),
(491, 1, '2024-01-07 07:04:07', 7999.96, 'Jason', '123-456789', 'Room 1234, ANC Street', 'pending'),
(492, 1, '2024-01-07 07:59:29', 9999.95, 'Jason2', '123-456789', 'Room 1234, ANC Street', 'pending'),
(493, 1, '2024-01-07 10:47:48', 1999.99, 'Jason2', '123-456789', 'Room 1234, ANC Street', 'Processing'),
(494, 2, '2024-01-08 05:52:06', 9999.95, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'Cancelled'),
(495, 2, '2024-01-08 05:52:41', 851.00, 'Jason Lin', '123-123456', 'Vancouver, Canada', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `order_id` int(11) NOT NULL COMMENT 'ORDERS ID',
  `product_id` int(11) NOT NULL COMMENT 'PRODUCT ID',
  `color_id` int(11) NOT NULL COMMENT 'COLOR ID',
  `quantity` int(11) NOT NULL COMMENT 'QUANTITY',
  `unit_price` decimal(10,2) NOT NULL COMMENT 'UNIT PRICE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color_id`, `quantity`, `unit_price`) VALUES
(42, 41, 21, 7, 5, 210.20),
(41, 40, 27, 5, 5, 270.20),
(40, 39, 32, 15, 5, 320.20),
(39, 39, 29, 13, 3, 290.20),
(38, 38, 16, 13, 4, 160.20),
(37, 37, 31, 8, 2, 310.20),
(36, 37, 19, 15, 5, 190.20),
(35, 37, 32, 12, 5, 320.20),
(34, 37, 29, 14, 5, 290.20),
(43, 41, 21, 9, 5, 210.20),
(44, 41, 21, 5, 5, 210.20),
(45, 41, 21, 6, 5, 210.20),
(46, 41, 21, 8, 5, 210.20),
(47, 42, 19, 11, 5, 190.20),
(48, 42, 19, 12, 5, 190.20),
(49, 42, 19, 13, 5, 190.20),
(50, 42, 19, 14, 5, 190.20),
(51, 42, 19, 15, 5, 190.20),
(52, 43, 7, 3, 5, 70.20),
(53, 43, 10, 15, 5, 100.20),
(54, 43, 10, 14, 5, 100.20),
(55, 43, 10, 2, 5, 100.20),
(56, 44, 18, 6, 2, 180.20),
(57, 44, 18, 7, 2, 180.20),
(58, 44, 18, 9, 2, 180.20),
(59, 44, 18, 10, 2, 180.20),
(60, 45, 23, 1, 5, 230.20),
(61, 45, 23, 2, 5, 230.20),
(62, 45, 23, 3, 5, 230.20),
(63, 45, 23, 15, 5, 230.20),
(64, 45, 23, 16, 5, 230.20),
(65, 46, 13, 1, 1, 130.20),
(66, 46, 13, 13, 5, 130.20),
(67, 46, 13, 14, 5, 130.20),
(68, 46, 13, 15, 5, 130.20),
(69, 46, 13, 16, 5, 130.20),
(70, 47, 6, 11, 5, 60.20),
(71, 47, 6, 13, 5, 60.20),
(72, 48, 24, 4, 5, 240.20),
(73, 48, 24, 5, 5, 240.20),
(74, 48, 24, 7, 5, 240.20),
(75, 48, 24, 8, 5, 240.20),
(76, 49, 11, 3, 5, 110.20),
(77, 49, 11, 4, 5, 110.20),
(78, 49, 11, 6, 5, 110.20),
(79, 50, 13, 1, 5, 130.20),
(80, 50, 13, 14, 5, 130.20),
(81, 51, 23, 1, 5, 230.20),
(82, 51, 23, 2, 5, 230.20),
(83, 489, 16, 13, 1, 160.20),
(84, 490, 15, 7, 5, 150.20),
(85, 490, 13, 16, 4, 130.20),
(86, 491, 16, 6, 4, 1999.99),
(87, 492, 16, 6, 5, 1999.99),
(88, 493, 16, 6, 1, 1999.99),
(89, 494, 16, 6, 5, 1999.99),
(90, 495, 17, 1, 5, 170.20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `cat_id` int(11) NOT NULL COMMENT 'category id',
  `product` varchar(255) NOT NULL COMMENT 'product name',
  `description` text NOT NULL COMMENT 'product description',
  `image` varchar(255) NOT NULL COMMENT 'product image url',
  `price` decimal(10,2) NOT NULL COMMENT 'product price',
  `popular` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `product`, `description`, `image`, `price`, `popular`) VALUES
(1, 1, 'Nippon Paint Eco Essence Kid\'s Interior Emulsion Paint', 'Nippon Paint Eco Essence Kid\'s Interior Emulsion Paint is an odourless and eco-friendly bio-based interior emulsion paint which is formulated by natural plant extracts and certified by USDA. It reduces the greenhouse gas emissions from fossil fuels and lowers the environmental impact. This product also obtains ï¿½GREENGUARD Gold Certificationï¿½ and certified by Tï¿½V Rheinland. With the functions of formaldehyde abatement, anti-stain and anti-bacteria up to 99.9%, it can ensure safe and high performance interior finishing to people who have health concern.', '1.webp', 10.20, NULL),
(2, 1, 'Nippon Paint Anti-Viral Odour-less Kids Paint PRO', 'Nippon Paint Anti-Viral Odour-less Kids Paint PRO is an innovative interior paint that specially formulated with Corning GuardiantTM Technology (Copper ion Cu+). Paint surfaces can destroy >99.9% SARS-CoV-2, Human Coronavirus 229E and Feline calicivirus (FCV) within just 2 hoursï¿½. It can resist 11 kinds of bacteriaï¿½ and 11 kinds of fungusï¿½, reducing the risk of infections. Its odour-less and formaldehyde abatement? technology helps purify the air. It also achieves the highest level to first-grade anti-stain? and available in excusive colour, providing you and your kids an upgraded all-round protection with a fresh and clean home surroundings.', '2.webp', 20.20, NULL),
(3, 1, 'Nippon Paint Kids Odour-less All In One Art Paint', 'Nippon Paint Kid\'s Odour-less All In One Art Paint is a textured paint that gives eggshell finish and lambskin texture effect. The product is easy to apply, and with a special rollers and tools, it can create a variety of unique lambskin textures suitable for large areas of the whole house. The effect is delicate and smooth, allowing the walls to have a rich texture and giving the home space a refreshing color and texture. This product is formulated with silver ion technology, which is effectively against a variety of common virusesï¿½ and bacteria. It can resist 11 kinds of bacteriaï¿½ and 11 kinds of fungusï¿½. It is odour-less, eco-sense? and capable of purifying air by abating harmful formaldehyde?. It also achieves the standard of first-grade anti-stain? and keep the wall color last longer. It effectively solves indoor wall problems while creating a beautiful effect for you and your child, creating a fresh and clean space and bringing a unique upgrade and protection to your home.', '3.webp', 30.20, NULL),
(4, 1, 'Nippon Paint Anti-Viral Odour-less Kids Paint', 'Nippon Paint Anti-Viral Odour-less Kids Paint is an environmental friendly and all-in one product with innovative technologies: Anti-virus, Anti-bacteria, Formaldehyde Abatement and Anti-stain. It is formulated with silver ion technology, which is effective against a variety of common viruses such as Influenza A (H3N2) and Enterovirus 71 (EV71)1. It can resist 11 kinds of bacteria2 and 11 kinds of fungus3, reducing the risk of infections. It is odour-less, eco-sense and capable of purifying air by abating harmful formaldehyde4. It also achieves the highest level to first-grade anti-stain5 and evoke colour brightness, providing you and your kids an upgraded all-round protection with a fresh and clean home surroundings. This product has passed the international indoor air quality standard, ensure your safety with certified by Tï¿½V Rheinland, obtainsï¿½GREENGUARD Gold Certificationï¿½ and A+Standard, and also approved by US FDA.', '4.webp', 40.20, NULL),
(5, 1, 'Nippon Paint Odour-less Kids Paint', 'Nippon Paint Odour-less Kids Paint (Interior Emulsion) is an environmental friendly and all-in one product with three core technologies: Formaldehyde Abatement, Anti-stain and Evoke Colour Brightness. It is eco-sense and capable of purifying air by abating harmful formaldehyde, transforming it into Water (H2O) in interior. It achieves the highest level to first-grade anti-stain. Meanwhile, it can evoke brightness, colourfulness and high saturation of finish coat. It utilizes unique Nippon Paint Air Guard technology and obtains GREENGUARD Gold Certification and Class A+ Label. It is also odour-less, eco-friendly and has first-grade anti-bacterial functions, so as to provide an all-around protection to your beloved.', '5.webp', 50.20, NULL),
(6, 1, 'VirusGuard Anti-Viral Paint', 'VirusGuard is an ultra-premium, environmentally-friendly, bio-proof paint that promotes good hygiene and health. It is anti-viral and anti-baterial paint, made specifically to ensure that our wall are protceded and safe to touch. It is formulated with Silver ion Technology, which can resist the growth of up to 99% harmful viruses and bacteria on the painted surface. It is effective against Human Coronaviruses (Strain229E), Influenza (H1N1), Hand, Foot and Mouth Disease (HFMD) and many types of bacteria. Highly recommended for use on interiors of household, childcare centres, kindergarten schools, clinics, hospitals and other facilities.', '6.webp', 60.20, NULL),
(7, 1, 'Nippon Paint MozzieGuard Premium Anti-Mosquito Paint', 'Nippon Paint MozzieGuard Premium Anti-Mosquito Paint is a special coating with insecticide encapsulated in the polymer for interior use. It has excellent knockdown property against mosquitoes through contact. It offers consumers a safe and convenient solution to fend off the mosquito and provide protective benefits to the community.', '7.webp', 70.20, NULL),
(8, 1, 'Nippon Paint Gold Formaldehyde-Buster Odour-less All-in-1(Bamboo Charcoal technology)', 'Nippon Paint ï¿½Gold Formaldehyde-Buster Odour-less all in One (Bamboo Charcoal technology)ï¿½ interior emulsion paint is combining both ï¿½Odour-lessï¿½ and ï¿½Formaldehyde Abatementï¿½ advanced technologies. It utilizes innovative polymer synthesis to eliminate unwanted in paint odours, low VOC, as well as decreases a certain level of harmful formaldehyde in interior. It still has more than15 functions, e.g. hiding power, anti-fungus, waterproofing and washability etc., those are ideal for top quality wall decoration and particularly suitable for repainting use. Nippon Paint\'s Colour Creations Centers are available for you to choose personalized colors via Nippon Paint\'s unique computerized colour matching system.', '8.webp', 80.20, NULL),
(9, 1, 'Nippon Paint Formaldehyde-Buster Odour-less 5-in-1 (Bamboo Charcoal technology)', 'Nippon Paint ï¿½Formaldehyde-Buster Odour-less 5-in-1ï¿½ interior emulsion paint is combining both ï¿½Odour-lessï¿½ and ï¿½Formaldehyde Abatementï¿½ advanced technologies. It utilizes innovative polymer synthesis to eliminate unwanted in paint odours, low VOC, as well as decreases a certain level of harmful formaldehyde in interior. It still has 5 functions, including washability, hiding power, waterproofing, cover hairline cracks and anti-fungus, those are ideal for top quality wall decoration and particularly suitable for repainting use.', '9.webp', 90.20, NULL),
(10, 1, 'Nippon Paint Odour-less 5-in-1 (Moisture-Proof) Interior Emulsion Paint', 'Nippon Paint Odour-less 5-in-1 (Moisture-Proof) Interior Emulsion Paint is using advanced moisture-proof technology to reduce the humidity from walls and against mold growth. It gives a very smooth finishing and easy to apply, also has 5 outstanding interior coating functions: excellent hiding power, anti-fungus, waterproof, washability and low VOC. Those are ideal for top quality wall decorative and particularly suitable for repainting use.', '10.webp', 100.20, NULL),
(11, 1, 'Nippon Paint 2nd Generation Super 5-in-1', 'Nippon Paint 2nd Generation Super 5-in-1 Interior Emulsion Paint is now better than ever. It allows dirt and stains to be removed easily. With Nippon Paint 2nd Generation Super 5-in-1 Interior Emulsion Paint, homeowners can enjoy the beauty of their homes longer since colours remain vibrant for a long time. Also it covers hairline cracks and excellent water-proofing property to protect walls from water and moisture. Besides, it also has other outstanding features such as anti-fungus and alkali resistant with refreshing smell. Nippon Paint\'s Colour Creations Centers are available for you to choose personalized colors via Nippon Paint\'s unique computerized colour matching system.', '11.webp', 110.20, 3),
(12, 1, 'Nippon Paint 2-in-1 Interior Emulsion Paint', 'Nippon Paint 2-in-1 Interior Emulsion Paint is specially developed for Asia market. It has 5 functions which are: super hiding power, anti-bacterial and fungus, good adhesion and low VOC. Excellent whiteness of finishing and super hiding power can save your painting time efficiently. Nippon Paint 2-in-1 Interior Emulsion Paint is an economy choice for your home decoration.', '12.webp', 120.20, 2),
(13, 1, 'Nippon Paint Matex M600', 'Nippon Paint Matex M600 Interior Emulsion is ideal for interior walls and ceilings. It dries to a tough, smooth and durable matt finish. It is long lasting, fungus and alkali resistant with excellent adhesion, easy application, good coverage / opacity and matching your simple yet tasteful lifestyle.', '13.webp', 130.20, NULL),
(14, 2, 'Nippon Paint Kids Odour-less All In One Art Paint', 'Nippon Paint Kid\'s Odour-less All In One Art Paint is a textured paint that gives eggshell finish and lambskin texture effect. The product is easy to apply, and with a special rollers and tools, it can create a variety of unique lambskin textures suitable for large areas of the whole house. The effect is delicate and smooth, allowing the walls to have a rich texture and giving the home space a refreshing color and texture. This product is formulated with silver ion technology, which is effectively against a variety of common virusesï¿½ and bacteria. It can resist 11 kinds of bacteriaï¿½ and 11 kinds of fungusï¿½. It is odour-less, eco-sense? and capable of purifying air by abating harmful formaldehyde?. It also achieves the standard of first-grade anti-stain? and keep the wall color last longer. It effectively solves indoor wall problems while creating a beautiful effect for you and your child, creating a fresh and clean space and bringing a unique upgrade and protection to your home.', '14.webp', 140.20, NULL),
(15, 2, 'Nippon Paint Milano', 'Nippon Paint Milano, a professional product which is developed to satisfy the need of household decoration design. It is formulated by eco raw materials from Italian, making it environment-friendly and most importantly safe. It is water-based and non-toxic, you can move-in a new house in a day one. It can show a sense of art with multi-color choices. It is creative, suitable for interior wall, e.g. bedroom and living room. You can decorate your home with this perfect texture paint!', '15.webp', 150.20, 5),
(16, 2, 'Nippe Indy Art Cera', 'A high-tech paint for creating innovative 3-dimensional effects. With special tools, you can create many attractive and unique relief patterns on wall. It is creative, suitable for both interior and exterior walls.', '16.webp', 1999.99, NULL),
(17, 2, 'Nippe Jikitone Si Clear WB GL30', 'Nippe Jikitone Si Clear WB GL30 is a single-pack waterbased silicone acrylic clear paint designed for protection of spray granite coating and creative coating. With excellent stain resistance, weathering resistance, alkali resistance, fungus & algae resistance, waterproof and washable properties, providing an excellent protection for interior and exterior coatings.', '17.jpeg', 170.20, 1),
(18, 3, 'Nippon Paint Formaldehyde-Buster Odour-Less kids Wood Brushing Finish', 'Nippon Paint Formaldehyde-Buster Odour- Less Kids Wood Brushing Finish with two core technologies: Formaldehyde Abatement and Anti-Stain, It is capable of purifying air by abating harmful formaldehyde, transforming it into Water (H2O) in interior. And it achieves the higher level of anti-stain. So as to provide a fresh, clean and colorful home space for you. Let wooden furniture smash your life!', '18.webp', 180.20, NULL),
(19, 3, 'Nippon Paint Formaldehyde-Buster Odour-Less kids Wood Clear Finish', 'Nippon Paint Formaldehyde-Buster Odour- Less Kids Wood Clear Finish with two core technologies: Formaldehyde Abatement and Anti-Stain, It is capable of purifying air by abating harmful formaldehyde, transforming it into Water (H2O) in interior. And it achieves the higher level of anti-stain. So as to provide a fresh, clean and colorful home space for you. Let wooden furniture smash your life!', '19.webp', 190.20, NULL),
(20, 3, 'Nippon Paint Aquatec Wood Brushing Finish (Interior)', 'Nippon Paint Aquatec Wood Brushing Finish is formulated by Japan\'s advanced environmental technology with excellent water-based finish. Top quality Aqua Wood Brushing Finish has not only performed smooth, rich, bright and colorful coats. It can be used on interior furniture, windows, wooden door and other wooden protection. Nippon Paint\'s Colour Creations Centers are available for you to choose personalized colors via Nippon Paint\'s unique computerized colour matching system.', '20.webp', 200.20, NULL),
(21, 3, 'Nippon Paint Aquatec Wood Clear Finish (Lacquer)(Interior)', 'Nippon Paint Aquatec Wood Clear Finish is formulated by Japanese advanced environmental technology with excellent water-based finish. Top quality Aqua Wood Clear Finish has performed crystal clear, even sheen level and smooth coats. It can be used on interior furniture, windows, wooden door and other wooden protection.', '21.webp', 210.20, NULL),
(22, 3, 'Nippon Paint Aquatec Enamel Finish(Exterior/Interior)', 'Nippon Paint Aquatec Enamel Finish is a water-based modification of acrylic copolymer formulated enamel paint, using advanced technology consolidating all materials with a top quality decorative coating. It can be used on both interior and exterior metal and wooden relative objects. Nippon Paint Aquatec Enamel Finish uses water as diluents, which is cost saving, non-toxic, low pollution, low VOC, safe and non-flammable. Comparing to the traditional alkyd solvent-borne coatings, NIPPON PAINT AQUATEC ENAMEL FINISH is low odour, more green, safe and reliable. Nippon Paint\'s Colour Creations Centers are available for you to choose personalized colors via Nippon Paint\'s unique computerized colour matching system.', '22.webp', 220.20, NULL),
(23, 3, 'Nippon Paint Aqua WoodGuard', 'Nippon Paint Aqua WoodGuard is a quick drying water based coating, specially formulated using Advanced Dispersion (PUD) technology. The coating protects timber surfaces from the harmful effects of UV rays and enhances the natural beauty of wood grain with a long lasting finish. It has good durability and flexibility, making it suitable for decks and outdoor furniture.', '23.webp', 230.20, NULL),
(24, 4, 'Nippon Paint Eco Essence Primer', 'Nippon Paint Eco Essence Kid\'s Interior Emulsion Paint is an odourless and eco-friendly bio-based product which is formulated by natural plant extracts and certified by USDA. It reduces the greenhouse gas emissions from fossil fuels and lowers the environmental impact. This product also obtains ï¿½GREENGUARD Gold Certificationï¿½ and certified by Tï¿½V Rheinland.', '24.webp', 240.20, 4),
(25, 4, 'Nippon Paint Odour-less Color Sealer (Interior)', 'It is an eco-friendly, low VOC water-based alkaline resistance sealer with no bland odour, that is suitable for masonry surfaces. It is formulated to prevent deterioration of emulsion paints by strong concentration of cement chemicals. This tintable sealer will bring out the true color of the accent color. The Odour-less Color Sealer tinted with the proper shade will outperform the white sealer and get your job done faster with fewer coats.', '25.webp', 250.20, NULL),
(26, 4, 'Nippon Paint Odour-less Primer (Interior)', 'Nippon Paint Odour-less Primer utilizes innovative process of IPS+ (polymer synthesis) to eliminate unwanted paint odours, while maintain outstanding features such as excellent adhesion, anti- fungus algae resistance, fast-drying for convenient recoating and excellent alkaline resistance.', '26.webp', 260.20, NULL),
(27, 4, 'Nippon Paint Vinilex 5101 Wall Sealer (Interior)', 'This water-based wall sealer is suitable for internal walls. It effectively protects emulsion top coats from corrosion caused by chemical reaction with the cement.', '27.webp', 270.20, NULL),
(28, 4, 'Nippon Paint Aquatec Wood White Primer (interior)', 'Modified waterborne urethane resin, extremely low VOC, non heavy metal and no lead add. Friendly to use no strong odor when apply. Ideal for use on interior furniture, windows, wooden door sets and any other need wood protection and decorative purpose. Sealer primer to seal off and protection base timber quality.', '28.webp', 280.20, NULL),
(29, 4, 'Nippon Paint Aquatec Wood Clear Primer (Interior)', 'Modified waterborne urethane resin, extremely low VOC, non heavy metal and no lead add. Friendly to use no strong odor when apply. Ideal for use on interior furniture, windows, wooden door sets and any other need wood protection and decorative purpose. Sealer primer to seal off and protection base timber quality.', '29.webp', 290.20, NULL),
(30, 4, 'Nippon Paint Aquatec 1900 Multi-Primer (Exterior/Interior)', 'Nippon Paint Aquatec 1900 Multi-Primer is water-based Zinc Phosphate anti-corrosive primer. It has exceptional adhesion and protection to PVC, UPVC, steel surfaces, galvanized steel and aluminum and thus provides a suitable base for most other coating to adhere satisfactory. It is suitable for Interior or Exterior metal & plastic surfaces.', '30.webp', 300.20, NULL),
(31, 4, 'Nippon Paint Water-based Waterproof Primer', 'Nippon Paint Water-based Waterproof Primer refined with high-density ethylene copolymer, with excellent adhesion and penetration. Strong continuity on rough cement surface, smoothen cement surface and concrete surface to achieve a good waterproof effect. In addition, can also be used in the stone surface, calcium silicate board and wave board and other materials, is a multi-function waterproof primer.', '31.webp', 310.20, NULL),
(32, 4, 'Nippon Paint Ultra Sealer III (Exterior)', 'Nippon Paint Ultra Sealer III is a high performance water-based sealer for external coatings. It is formulated to prevent deterioration of emulsion paints by strong concentration of cement chemicals.', '32.webp', 320.20, NULL),
(47, 2, 'aaaa', 'fewfew', '47.jpg', 1233.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `prod_id` int(11) NOT NULL COMMENT 'product id',
  `col_id` int(11) NOT NULL COMMENT 'color id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`prod_id`, `col_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 16),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(7, 1),
(7, 2),
(7, 3),
(7, 15),
(7, 16),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(10, 1),
(10, 2),
(10, 14),
(10, 15),
(10, 16),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(13, 1),
(13, 13),
(13, 14),
(13, 15),
(13, 16),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(16, 4),
(16, 6),
(16, 8),
(16, 14),
(16, 16),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(19, 11),
(19, 12),
(19, 13),
(19, 14),
(19, 15),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(20, 16),
(21, 5),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(22, 10),
(22, 11),
(22, 12),
(22, 13),
(22, 14),
(23, 1),
(23, 2),
(23, 3),
(23, 15),
(23, 16),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(25, 9),
(25, 10),
(25, 11),
(25, 12),
(25, 13),
(26, 1),
(26, 2),
(26, 14),
(26, 15),
(26, 16),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(28, 8),
(28, 9),
(28, 10),
(28, 11),
(28, 12),
(29, 1),
(29, 13),
(29, 14),
(29, 15),
(29, 16),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(31, 7),
(31, 8),
(31, 9),
(31, 10),
(31, 11),
(32, 12),
(32, 13),
(32, 14),
(32, 15),
(32, 16),
(47, 4),
(47, 6),
(47, 8),
(47, 10),
(47, 14),
(47, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'user id',
  `name` varchar(255) NOT NULL COMMENT 'user name',
  `password` varchar(255) NOT NULL COMMENT 'user password',
  `full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `credit_card` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `full_name`, `phone`, `address`, `credit_card`) VALUES
(1, 'usera', 'users', 'Jason2', '123-456789', 'Room 1234, ANC Street', '1234-1678-8765-3243'),
(2, 'userb', 'users', 'Jason Lin', '123-123456', 'Vancouver, Canada', '1234-1234-1234-1234'),
(0, 'admin', 'users', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`prod_id`,`col_id`),
  ADD UNIQUE KEY `col_id` (`col_id`,`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ORDER ID', AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
