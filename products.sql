-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: sulley.cah.ucf.edu
-- Generation Time: Nov 15, 2017 at 01:36 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dig4530c_group06`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `product_cat` varchar(30) NOT NULL,
  `scent` varchar(30) NOT NULL,
  `scent_cat` varchar(30) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` decimal(10,0) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `size` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `rating` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_cat`, `scent`, `scent_cat`, `price`, `stock`, `cost`, `size`, `weight`, `rating`) VALUES
(1, '190283260311', 'Method Squirt and Mop Wood Floor Cleaner (Almond)', 'rich. nutty. good with chocolate. if these were clues in a game show, you’d guess almond. and you would be right. of course, the answer could also be macadamia. or willy wonka.', 'product_img/almond_floor.jpg', 'Floor Cleaner', 'Almond', 'Wood', '4.74', '49', '2.84', '25.00', '1.56', '4.8'),
(2, '808124174276', 'Mrs. Meyers Apple Hand Soap', 'Mrs. Meyer\'s Clean Day Apple Hand Soap contains a special recipe of aloe vera gel, olive oil and a unique blend of essential oils to create a hard working, non-drying, yet softening cleaner for busy hands. Hands have never had it so good. Paraben free. Ma', 'product_img/apple_hand.jpg', 'Hand Soap', 'Apple', 'Fruit', '3.99', '50', '1.99', '12.50', '0.81', '5.0'),
(3, '808124700499', 'Mrs. Meyers Apple Cider Hand Soap', 'Mrs. Meyer\'s Clean Day Apple Cider Scent Hand Soap contains aloe vera gel, olive oil and a unique blend of natural essential oils to create a hard-working, non-drying, yet softening cleaner for busy hands. Hands have never had it so good. Paraben free. Ma', 'product_img/apple_hand2.jpg', 'Hand Soap', 'Apple', 'Fruit', '3.99', '50', '1.99', '12.50', '0.81', '4.9'),
(4, '37000983910', 'Febreze ONE Fabric & Air Mist Bamboo', 'Febreze ONE Fabric & Air Mist Bamboo gently removes odors with just a hint of misty bamboo scent. You won’t find any aerosols, dyes, or heavy perfumes, either. That’s because this versatile spray gently cleans away odors from both fabrics and the air with', 'product_img/bamboo_freshener.jpg', 'Air Freshener', 'Bamboo', 'Wood', '5.99', '100', '3.59', '10.10', '0.64', '4.2'),
(5, '3584287849028', 'Aspirea Vacuum Deodorizer ', 'Aspirea Deodorizer Special Vacuums disinfects: It destroys the vacuum cleaner bag, mites and bacteria that cause allergies and odors. Aspirea deodorizes: There perfumes and refreshes the house each vacuuming. Perfumes are made from natural essential oils.', 'product_img/vanilla_aromatic.jpg', 'Aromatic Spray', 'Vanilla', 'Herbs', '15.99', '600', '11.99', '12.00', '0.78', '4.4'),
(6, '607963714762', 'Glade Spray Radiant Berries', 'Red Berry scented arromatic spray', 'product_img/berry_spray.jpg', 'Aromatic Spray', 'Berry', 'Fruit', '1.20', '50', '0.60', '8.00', '0.52', '4.6'),
(7, '46500757860', 'Glade Wax Melts, Blackberry Jam', 'Blackberry Jam scented wax melts', 'product_img/blackberry_candle.jpg', 'Candle', 'Blackberry', 'Fruit', '4.77', '50', '2.38', '8.00', '0.52', '4.7'),
(8, '5722771117989', 'Spice of India Pillar Candle', 'All of our candles use only the highest quality scents ensuring that they help illuminate any of those unwanted nasty smells around the home.', 'product_img/cannabis_candle.jpg', 'Candle', 'Cannabis', 'Herbs', '5.99', '1200', '2.99', '4.00', '0.26', '2.1'),
(9, '817939013083', 'Method Gel Hand Wash (Cedar Spice)', 'an abstract geometric pattern in bold, earthy tones is brought to life by this wonderfully woody spiced cedar scent.', 'product_img/cedar_hand.jpg', 'Hand Soap', 'Cedar', 'Wood', '3.49', '13', '2.09', '12.00', '0.75', '4.2'),
(10, '817939011300', 'Method 8x Laundry Detergent (Lavender + Cedar)', 'despite what you might assume, lavender cedar is not a particular variety of bedding for Provençal hamsters. rather, it is a decidedly sophisticated scent suitable for laundering your unmentionables or tidying up your chateau—or your sixth floor walk-up. ', 'product_img/cedar_laundry.jpg', 'Laundry Detergent', 'Cedar', 'Wood', '11.04', '42', '6.62', '20.00', '1.25', '4.1'),
(11, '732913229970', 'Seventh Generation Laundry Packs (Citrus & Cedar)', 'Seventh Generation biobased Laundry Packs use quadruple-enzyme power to remove stains and leave your clothes looking as good as new! 45 toss-and-wash single-dose pods make laundry day simple and mess-free.', 'product_img/cedar_laundry2.jpg', 'Laundry Detergent', 'Cedar', 'Wood', '11.04', '62', '6.62', '31.70', '1.98', '4.7'),
(12, '18065051615', 'Nature\'s Miracle Orange-Oxy Stain & Odor Remover', 'Instantly activates to permanently remove the toughest stainsand odors', 'product_img/citrus_stain.jpg', 'Stain Remover', 'Citrus', 'Citrus', '12.99', '50', '6.99', '24.00', '1.56', '4.6'),
(13, '816559014111', 'Zest Fruitboost Shower Gel Variety Pack 4 Count', 'Fruit scented revitalizing shower body gel', 'product_img/citrus_body.jpg', 'Body Wash', 'Citrus', 'Citrus', '18.46', '50', '9.23', '40.00', '2.61', '4.1'),
(14, '44600004563', 'Clorox Clean Up Cleaner Plus Bleach', 'Clorox Clean-Up all purpose bleach spray cleaner is designed to quickly and effectively clean, disinfect and deodorize a variety of surfaces both indoors and outdoors, while leaving behind a fresh citrus scent. It removes tough kitchen and bath stains, gr', 'product_img/citrus_all.jpg', 'All-Purpose Cleaner', 'Citrus', 'Citrus', '2.99', '50', '1.50', '32.00', '2.09', '4.4'),
(15, '87052127992', 'Citrus Magic Natural All Purpose Cleaner  ', 'Cuts through grease, works on multiple surfaces throughout the home, conveinient, easy to use', 'product_img/citrus_all2.jpg', 'All-Purpose Cleaner', 'Citrus', 'Citrus', '10.56', '50', '5.33', '22.00', '1.43', '4.9'),
(16, '6362571617686', 'Shampoochie', 'All Natural Herbal Dog or Cat Shampoo Soap is a 100% biodegradable, all natural herbal shampoo soap for your dog or cat. This specially blended shampoo bar for dogs or cats is made with Shampoo and Conditioner in one', 'product_img/coconut_shampoo.jpg', 'Shampoo', 'Coconut', 'Fruit', '13.00', '1200', '9.00', '3.50', '0.23', '0.9'),
(17, '46500774676', 'Glade Plugins Car Air Freshener Starter Kit, Hawaiian Breeze', 'Hawaiian/pineapple scented air freshener for cars', 'product_img/coconut_freshener.jpg', 'Air Freshener', 'Coconut', 'Fruit', '3.30', '50', '1.15', '0.11', '0.72', '3.9'),
(18, '807174527247', 'Glade Aerosol Air Freshener, Hawaiian Breeze, 8 Ounce (Pack ', 'Hawaiian/pineapple scented aerosol arromatic spray', 'product_img/coconut_spray.jpg', 'Aromatic Spray', 'Coconut', 'Fruit', '11.88', '50', '5.94', '96.00', '6.26', '4.2'),
(19, '732913228102', 'Seventh Generation Disinfectant Spray (Eucalyptus)', 'Eliminate odors and kill household germs* with this no-rinse required Disinfectant Spray. With the active ingredient Thymol (present as a component of Thyme Oil), this disinfectant spray kills cold and flu viruses* on hard, non-porous surfaces. Non-flamma', 'product_img/eucalyptus_spray.jpg', 'Aromatic Spray', 'Eucalyptus', 'Wood', '5.39', '8', '3.23', '13.90', '0.87', '4.5'),
(20, '817939000083', 'Method Foaming Bathroom Cleaner (Eucalyptus Mint)', 'invigorating is its middle name. the crisp blend of bergamot, citron + lime leaf with eucalyptus + wild mint brings to mind frolicking among the trees in the cool mountain air. and who doesn’t like a healthy dose of frolicking?', 'product_img/eucalyptus_bathroom.jpg', 'Bathroom Cleaner', 'Eucalyptus', 'Wood', '3.79', '72', '2.27', '28.00', '1.75', '4.6'),
(21, '732913227815', 'Seventh Generation Laundry Detergent (Blue Eucalyptus)', 'Our Laundry Detergent is tough on stains, but gentle to your world. With no dyes, optical brighteners or synthetic fragrances, Seventh Generation Laundry Detergent gives you great results in HE and standard machines, and works in all water temperatures. T', 'product_img/eucalyptus_laundry.jpg', 'Laundry Detergent', 'Eucalyptus', 'Wood', '9.99', '3', '5.99', '100.00', '6.25', '4.7'),
(22, '550685787', 'Fabuloso Spring in Bloom Multi-Purpose Cleaner', 'Freshen your home while tidying up with this Fabuloso Multi-Purpose Cleaner. It leaves a lovely fragrance that lasts. Fabuloso cleaner invigorates your space with the scent of glamorous freesia. It comes in a convenient, easy-grip bottle equipped with a c', 'product_img/freesia_all.jpg', 'All-Purpose Cleaner', 'Freesia', 'Floral', '2.77', '50', '0.50', '56.00', '3.65', '5.0'),
(23, '562725434', 'Fabuloso Tropical Spring All Purpose Cleaner', 'Get fabulous results with Fabuloso All-Purpose Cleaner. This versatile cleaner can be used on any non-porous surface to eliminate stains, dirt, grime and more. Fabuloso can be used for everything from wiping up countertops and chrome fixtures to cleaning ', 'product_img/gardenia_all.jpg', 'All-Purpose Cleaner', 'Gardenia', 'Floral', '2.77', '50', '0.50', '56.00', '3.65', '4.6'),
(24, '632709425213', 'Zador Luxury Scented Red Grape Soap', 'A fresh and lively fruit fragrance paired with the powerful antioxidant/anti-aging effects of grape seed oil.', 'product_img/grape_soap.jpg', 'Bar Soap', 'Grape', 'Fruit', '16.80', '50', '8.40', '5.60', '0.37', '4.9'),
(25, '7372581818787', 'Presto! Herbal Laundry Detergent', 'Presto! Biobased Liquid Laundry Detergent, Mountainside Herbal Scent, Tough on dirt and stains thanks to powerful plant-based enzymes 96% USDA Certified Biobased formula offers an effective, alternate choice to petroleum-derived detergents. Highly-concent', 'product_img/herbal_laundry.jpg', 'Laundry Detergent', 'Herbal', 'Herbs', '14.99', '600', '9.99', '40.00', '2.61', '4.9'),
(26, 'UPC 808124700444', 'Honeysuckle Laundry Scent Booster', 'Bring loads of joy to laundry day. New Mrs. Meyer\'s Clean Day Laundry Scent Boosters pop some home-grown inspiration straight into your washer. This plant-based and highly effective booster is completely garden inspired. It\'s a delightfully simple way to ', 'product_img/honeysuckle_laundry.jpg', 'Laundry Detergent', 'Honeysuckle', 'Floral', '9.99', '20', '5.99', '18.00', '1.17', '4.1'),
(27, 'CP 394822', 'Natural Carpet Deodorizer', 'A perfectly natural and wonderfully fragrant carpet deodorizer. It smells so heavenly you won\'t want to vacuum it up! But you should. Your vacuum will thank you for it because it also works as a fabulous vacuum refresher. Good bye stale smells!', 'product_img/hyacinth_carpet.jpg', 'Carpet Cleaner', 'Hyancinth', 'Floral', '5.99', '10', '2.00', '15.00', '1.00', '3.1'),
(28, 'UPC 817810020056', 'Jasmine Dryer Cloths', 'It’s time for a premium clothes-drying experience! Clothing feels extra-soft, honestly fresh, and static free. Great for those with allergies and sensitive skin - no synthetic fragrances or dyes. Non-toxic for you and your family', 'product_img/jasmine_laundry.jpg', 'Laundry Detergent', 'Jasmine', 'Floral', '6.95', '20', '1.50', '38.30', '2.50', '4.3'),
(29, 'UPC 808124111035', 'Lavender Dish Soap', 'Mrs. Meyer\'s Clean Day Lavender Dish Soap is rich, thick and makes grease disappear like nobody\'s business. This concentrated liquid dish formula for hand washing dishes and pots and pans includes Soap Bark Extract, another ingredient from the garden that', 'product_img/lavender_dish.jpg', 'Dish Soap', 'Lavender', 'Floral', '3.99', '30', '1.99', '16.00', '1.04', '4.8'),
(30, 'UPC 044600017617', 'Disinfecting Wipes Fresh Lavender', 'Talk about a multi-tasking clean-it-all. Our Clorox® Disinfecting Wipes remove germs, bacteria, kitchen grease, and countless other nasties you find lurking in your home. That’s multi-surface and multi-mess, all in one wipe.', 'product_img/lavender_wipes.jpg', 'Disinfecting Wipes', 'Lavender', 'Floral', '4.63', '30', '1.00', '18.00', '1.23', '4.7'),
(31, '43318000140', 'Simple Green', 'Cleaner/Degreaser, Equipment/Machinery, Facility Maintenance, Fleet/Vehicle, Parts Washing, Degreaser Container Type Jug, Degreaser Container Size 5 gal., Degreaser Solvent Base Non-Solvent, Degreaser NSF Rating Not Rated, Degreaser VOC Range Contains no ', 'product_img/lemon_all.jpg', 'All-Purpose Cleaner', 'Lemon', 'Citrus', '64.24', '50', '32.24', '640.00', '41.73', '3.0'),
(32, '818570008360', 'J.R. Watkins Lemon All Purpose Cleaner', 'It’s great for appliances, sinks, counter-tops, stainless steel, fixtures, floors, walls, sealed granite, tile and more!', 'product_img/lemon_all2.jpg', 'All-Purpose Cleaner', 'Lemon', 'Citrus', '4.79', '50', '2.39', '24.00', '1.56', '4.8'),
(33, '885588015994', 'Mrs. Meyer\'s Lemon Verbena Large Jar Candle', 'Providing an aromatherapeutic freshness for your home, Mrs. Meyer\'s Clean Day Lemon Verbena Jar Cande is a soothing, pleasant addition to your home. Made of naturally derived ingredients and essential oils, this soy wax candles makes for a lovely gift.', 'product_img/lemon_candle.jpg', 'Candle', 'Lemon', 'Citrus', '9.99', '50', '4.99', '7.20', '0.47', '5.0'),
(34, '808124703124', 'Mrs. Meyer\'s Lemon Verbena Body Wash', 'a fresh and fragrant cleanser that gives your body the soothing, refreshing wash it deserves. Softens with Aloe Vera Gel, and a unique blend of essential oils, including flaxseed oil. The delicate foam rinses clean leaving your skin smooth and soft. Derma', 'product_img/lemon_body.jpg', 'Body Wash', 'Lemon', 'Citrus', '7.99', '50', '3.99', '16.00', '1.04', '3.5'),
(35, '732913228133', 'Seventh Generation\nDisinfectant Wipes ', 'Keep your home and your family safe from germs with Seventh Generation Multi-Surface Disinfecting Wipes. This non-toxic product is great to use on any surface and also won’t remove color from your furniture. Best of all, these wipes are made with natural ', 'product_img/lemongrass_wipes.jpg', 'Disinfectant Wipes', 'Lemongrass', 'Herbs', '7.99', '1200', '4.99', '7.00', '0.46', '4.3'),
(36, 'UPC 817810021442', 'Magnolia Stain Remover', 'Ultra-versatile stain removal and odor eliminating action works great on carpeting, car seats / upholstery, linens, and more', 'product_img/magnolia_stain.jpg', 'Stain Remover', 'Magnolia', 'Floral', '5.95', '20', '2.00', '26.00', '1.69', '4.7'),
(37, '35000053824', 'Fabuloso', 'Easy to use so there is no need to rinse, and leaves no visible residue. Discover the long lasting freshness of Fabuloso multi-purpose cleaner that leaves your home shiny clean, fresh and fragrant.', 'product_img/orange_all.jpg', 'All-Purpose Cleaner', 'Orange', 'Citrus', '3.36', '50', '0.99', '56.00', '3.65', '3.7'),
(38, '147000000002', 'Noble Chemical Orange Peel Cleaner', 'This all-purpose Noble chemical Orange Peel citrus solvent cleaner is perfect for restaurants, hotels, and other public establishments. It cuts through grease, unclogs drains, and deodorizes a wide variety of materials, making it great for nearly any clea', 'product_img/orange_all2.jpg', 'All-Purpose Cleaner', 'Orange', 'Citrus', '28.99', '50', '14.79', '128.00', '8.35', '4.7'),
(39, '893481001723', 'Clean Well, All-Natural Hand Sanitizing Wipe', 'CleanWell believes in the power of nature. Extraordinary solutions are all around us and we strive to bring them to you.', 'product_img/oregano_wipes.jpg', 'Disinfectant Wipes', 'Oregano', 'Herbs', '7.29', '1200', '4.29', '4.00', '0.26', '4.8'),
(40, '817939014530', 'Method All-Purpose Surface Cleaner (Palm Garden)', 'carefully crafted circles layered over a subtle texture of vibrant colors are brought to life by the lush scent of fresh bamboo + palm leaves.', 'product_img/palm_all.jpg', 'All-Purpose Cleaner', 'Palm', 'Wood', '3.31', '9', '1.99', '28.00', '1.75', '4.8'),
(41, '35000530301', 'Fabuloso Passion of Fruits', 'Combination of fruit scents; multi-purpose cleaner', 'product_img/passionfruit_all.jpg', 'All-Purpose Cleaner', 'Passionfruit', 'Fruit', '2.77', '50', '1.38', '56.00', '3.65', '4.6'),
(42, '825484082648', 'SkinLikeButter', 'CHOCOLATE MINT scent || Sulfate Free || Great for dry skin || Liquid Soap || Moisturizing Soap || Exfoliating', 'product_img/peppermint_body.jpg', 'Body Wash,', 'Peppermint', 'Herbs', '20.00', '600', '15.00', '8.00', '0.52', '4.4'),
(43, '895454002645', 'Better Life - Naturally Throne-Tidying Toilet Bowl Cleaner', 'Better Life Naturally Throne-Tidying Toilet Bowl Cleaner Tea Tree & Peppermint is a gel toilet bowl cleaner that makes your nastiest household chore a little nicer, removing rings and banishing buildup faster than you can say \"Who left the seat up?\" With ', 'product_img/peppermint_bathroom.jpg', 'Bathroom Cleaner', 'Peppermint', 'Herbs', '9.14', '600', '5.14', '24.00', '1.56', '4.3'),
(44, '1234567883908', 'Febreze CAR Fresh Cut Pine Vent Clip', 'Bring the sparkling freshness of a wintry forest inside with a Limited Edition Fresh Cut Pine CAR Vent Clip. This crisp, invigorating scent is the perfect way to deck the dashboard (and eliminate odors) throughout the holiday season. You won’t have to nee', 'product_img/pine_freshener.jpg', 'Air Freshener', 'Pine', 'Wood', '3.49', '25', '2.09', '0.06', '0.10', '3.5'),
(45, '41294973267', 'Pine-Sol Multi-Surface, Original Scent 24 oz', 'Kills 99.9% of germs. Cuts through tough stains, grease and grime. Classic pine scent', 'product_img/pine_all.jpg', 'All-Purpose Cleaner', 'Pine', 'Wood', '1.97', '68', '1.18', '24.00', '1.68', '4.1'),
(46, '41294973250', 'Pine-Sol Multi-Surface, Original Scent 40 oz', 'Perfect for offices, day care centers, restaurants, schools and other commercial facilities. Use on a wide variety of tough jobs and surfaces including floors, counters and sinks.', 'product_img/pine_all2.jpg', 'All-Purpose Cleaner', 'Pine', 'Wood', '2.97', '28', '1.78', '40.00', '2.50', '3.9'),
(47, '41294402293', 'Pine-Sol Multi-Surface, Original Scent 100 oz', 'Cuts through tough grease and grime fast. Deodorizes and wipes out odor-causing bacteria, leaving a fresh, clean scent. EPA-registered disinfectant kills germs and bacteria that can cause illness.', 'product_img/pine_all3.jpg', 'All-Purpose Cleaner', 'Pine', 'Wood', '6.88', '66', '4.13', '100.00', '6.25', '3.5'),
(48, '111201188760', 'Mrs. Meyers Rhubarb Hand Soap', 'Mrs. Meyer\'s Clean Day Rhubarb Hand Soap contains a special recipe of aloe vera gel, olive oil and a unique blend of essential oils to create a hard working, non-drying, yet softening cleaner for busy hands. Hands have never had it so good. Paraben free. ', 'product_img/rhubarb_hand.jpg', 'Hand Soap', 'Rhubarb', 'Herbs', '3.99', '50', '1.99', '12.50', '0.81', '5.0'),
(49, 'UPC 018787778081', 'PURE-CASTILE LIQUID SOAP', 'Floral and fresh, with a hint of sweetness, our Rose Pure-Castile Liquid Soap is concentrated, biodegradable, versatile and effective. Made with organic and certified fair trade ingredients, packaged in a 100% post-consumer recycled bottle. All-One!', 'product_img/rose_hand.jpg', 'Hand Soap', 'Rose', 'Floral', '10.99', '30', '7.00', '16.00', '1.04', '3.4'),
(50, '7275907083607', 'Mrs. Meyer\'s Clean Day Rosemary Dish Soap', 'Mrs. Meyer\'s Clean Day Rosemary Dish Soap is rich, thick and makes grease disappear like nobody\'s business. This concentrated liquid dish formula for hand washing dishes and pots and pans includes Soap Bark Extract, another ingredient from the garden that', 'product_img/rosemary_dish.jpg', 'Dish Soap', 'Rosemary', 'Herbs', '5.99', '1200', '3.99', '16.00', '1.04', '4.2'),
(51, '223375761165', 'Better Life What-Ever!', 'What-EVER! all-purpose cleaner takes care of everything included under the name, whatever! This environmentally safe home cleaner covers (and uncovers) any washable non-porous surface, including countertops, appliances, sinks, toilets, walls, baseboards,', 'product_img/sage_all.jpg', 'All-Purpose Cleaner', 'Sage', 'Herbs', '6.09', '50', '3.09', '32.00', '2.09', '4.1'),
(52, '5256505053505', 'Seventh Generation Disinfecting Multi-Surface Cleaner', 'Clean any hard, nonporous surface in your house with Seventh Generation Disinfecting Multi-Surface Cleaner. The product is designed to kill 99.99 percent of household germs, including Influenza A virus, H1N1, the common cold virus, staphylococcus, salmone', 'product_img/thyme_all.jpg', 'All-Purpose Cleaner', 'Thyme', 'Herbs', '5.89', '1200', '2.89', '26.00', '1.69', '4.8'),
(53, '9752571317383', 'Hempz Tahitian Vanilla & Ginger Herbal Body Wash', 'Nourishing Hydrating Herbal Body Wash.', 'product_img/vanilla_body.jpg', 'Body Wash', 'Vanilla', 'Herbs', '18.75', '600', '13.75', '8.00', '0.52', '1.8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
