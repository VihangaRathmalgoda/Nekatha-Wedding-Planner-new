-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 10:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `avilable`
--

CREATE TABLE `avilable` (
  `availableID` int(11) NOT NULL,
  `dayTypeID` int(11) NOT NULL,
  `providerID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `dayTypeID` int(11) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `placeID` int(11) NOT NULL,
  `numberOfGuest` double NOT NULL,
  `is_booking` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `Date`, `dayTypeID`, `customerID`, `placeID`, `numberOfGuest`, `is_booking`) VALUES
(56, '2023-03-23', 1, 200011400189, 21, 51, 2),
(57, '2023-03-24', 1, 983451781, 21, 50, 0),
(58, '2023-03-23', 1, 200011400199, 21, 54, 2),
(59, '2023-03-03', 1, 200011400199, 21, 150, 0),
(60, '2023-03-09', 1, 200011400189, 21, 150, 0),
(61, '2023-04-15', 1, 200011400000, 22, 53, 2),
(62, '2023-02-09', 1, 200011400000, 21, 150, 0),
(63, '2023-08-11', 2, 200011400444, 21, 55, 0),
(64, '2023-07-20', 1, 200055555555, 21, 50, 0),
(65, '2023-02-08', 2, 200001454545, 21, 50, 0),
(66, '2023-02-25', 1, 993451780, 21, 57, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookingprice`
--

CREATE TABLE `bookingprice` (
  `bookingPriceID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `regiProviderID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `packageID` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingprice`
--

INSERT INTO `bookingprice` (`bookingPriceID`, `bookingID`, `regiProviderID`, `serviceID`, `packageID`, `price`, `status`) VALUES
(54, 56, 56, 36, 53, 50000, 1),
(55, 56, 62, 42, 55, 100000, 1),
(56, 57, 56, 36, 53, 50000, 2),
(57, 57, 62, 42, 55, 100000, 0),
(58, 58, 56, 36, 53, 50000, 1),
(59, 58, 63, 38, 56, 500000, 1),
(60, 58, 62, 42, 55, 100000, 1),
(61, 59, 64, 36, 59, 40000, 2),
(63, 59, 62, 42, 55, 100000, 0),
(64, 60, 56, 36, 54, 40000, 2),
(66, 60, 62, 42, 55, 100000, 0),
(67, 62, 56, 36, 53, 50000, 0),
(68, 63, 56, 36, 53, 50000, 0),
(69, 63, 66, 37, 63, 35000, 0),
(70, 63, 63, 38, 56, 500000, 0),
(71, 63, 67, 39, 65, 65000, 0),
(72, 63, 62, 42, 55, 100000, 0),
(73, 64, 64, 36, 59, 40000, 0),
(74, 64, 66, 37, 63, 35000, 0),
(75, 65, 56, 36, 54, 40000, 2),
(76, 66, 56, 36, 54, 40000, 0),
(77, 66, 67, 39, 65, 65000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `canclation`
--

CREATE TABLE `canclation` (
  `cancleID` int(11) NOT NULL,
  `BookinID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canclation`
--

INSERT INTO `canclation` (`cancleID`, `BookinID`, `staffID`, `reason`) VALUES
(10, 56, 21, ''),
(11, 58, 21, ''),
(12, 61, 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` bigint(20) NOT NULL,
  `customerUserName` varchar(50) NOT NULL,
  `customerEmail` text NOT NULL,
  `bride` text NOT NULL,
  `groom` text NOT NULL,
  `customerContactNumber` int(10) NOT NULL,
  `customerPassword` varchar(12) NOT NULL,
  `is_customer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerUserName`, `customerEmail`, `bride`, `groom`, `customerContactNumber`, `customerPassword`, `is_customer`) VALUES
(23456789, 'sahan', 'sahan@gmail.com', 'seuwandi', 'sahan', 761234567, '123456', 0),
(983451781, 'Vihanga', 'vihanga@gmail.com', 'Chalani Kaushalya', 'Vihanga Rathmalgoda', 761234567, '123456', 0),
(983451880, 'Vihanga', 'vihanga@gmail.com', 'Chalani Kaushalya', 'Vihanga Rathmalgoda', 761234567, '123456', 0),
(993451780, 'yasiru', 'sandeep@gmail.com', 'Yudeesha', 'Vihanga Rathmalgoda', 332287664, '123456', 0),
(200001454545, 'banana', 'Banana@Gmail.com', 'Banana', 'Mango', 112345622, '123456', 0),
(200011400000, 'yasiru', 'ys@gmail.com', 'Yudeesha', 'Yasiru', 761234567, '123456', 0),
(200011400111, 'kamal', 'kamal@gmail.com', 'Yudeesha', 'kamal', 761234567, '123456', 0),
(200011400189, 'yasiru', 'yasiru@gmail.com', 'Yudeesha', 'Yasiru', 761234512, '123456', 0),
(200011400199, 'yasiru', 'yasiru@gmail.com', 'Yudee', 'Yasi', 761234512, '123456', 0),
(200011400444, 'rakitha', 'rakitha@gmail.com', 'Yudeesha', 'rakitha', 761234567, '123456', 0),
(200055555555, 'Dexter', 'Dexter@gmail.com', 'white', 'Dexter white', 332287664, '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daytype`
--

CREATE TABLE `daytype` (
  `dayTypeID` int(11) NOT NULL,
  `dayTypeName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daytype`
--

INSERT INTO `daytype` (`dayTypeID`, `dayTypeName`) VALUES
(1, 'Day'),
(2, 'Night');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` varchar(10) NOT NULL,
  `feedbackName` varchar(50) NOT NULL,
  `feedBack` varchar(100) NOT NULL,
  `customerID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquaryID` int(11) NOT NULL,
  `inquaryName` varchar(50) NOT NULL,
  `contactNumber` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `massage` text NOT NULL,
  `responceStaffID` int(30) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquaryID`, `inquaryName`, `contactNumber`, `email`, `massage`, `responceStaffID`, `remark`) VALUES
(13, 'vihanga', 761234567, 'vihanga@gmail.com', 'I need know about your basic package', 21, NULL),
(14, 'vihanga', 761234567, 'vihanga@gmail.com', 'I need know about your basic package', 20, NULL),
(15, 'sahan', 761234567, 'ys@gmail.com', 'I need know about your basic package', 21, NULL),
(16, 'sahan', 761234567, 'ys@gmail.com', 'I need know about your basic package.', 20, NULL),
(17, 'kamal', 765861234, 'ys@gmail.com', 'I need know about your basic package.', 21, NULL),
(18, 'pubudu ', 757845784, 'sandeep@gmail.com', 'I need know about your basic package', 20, NULL),
(19, 'pubudu', 761234567, 'sandeep@gmail.com', 'I need know about your basic package', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(30) NOT NULL,
  `packageDescription` text NOT NULL,
  `packagePrice` double NOT NULL,
  `is_package` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`, `packageDescription`, `packagePrice`, `is_package`) VALUES
(53, 'Gold Package', '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong> website.</p>\r\n<p>Rs.50000.00</p>\r\n<p>&nbsp;</p>', 50000, 0),
(54, 'Silver Package', '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.40000.00</p>', 40000, 0),
(55, 'Rose packgae', '<p><strong>Cupcakes - 150pcs</strong></p>\r\n<p>5kg cake with a three-layer structure.</p>\r\n<p>Rs.100000</p>\r\n<p>&nbsp;</p>', 100000, 0),
(56, 'Rich Meal', '<h2>Cold Delight</h2>\r\n<p>Chicken Cashew and Grape Croissants<br>Vegetable Crudit&eacute;s and Ranch Dill Dip<br>Fresh Fruit Display<br>Vegetable Pasta Salad With Bay Shrimp<br>House Mixed Green Salad with Two Dressings</p>\r\n<h2>Meats and Cheeses</h2>\r\n<p>Ham, Turkey, Roast Beef, and Provolone, American, Cheddar Cheeses<br>Mayonnaise, Mustard<br>Lettuce, Olives, Pickles and Tomatoes<br>Fresh Fruit In Season<br>Assorted Rolls and Breads<br>House Mixed Green Salad with two dressings</p>\r\n<h2>Pasta Napoli</h2>\r\n<p>Choose two Pastas and three Sauces<br>Penne, Fettucini, Bow-tie, Spaghetti, Rainbow Rotini, Linguini, Shell Pesto, Alfredo, Marinara, Creamy Tomato, Mushroom Marsala and Garlic Butter<br>Mixed Italian Vegetables<br>Caesar Salad<br>Toasted Garlic Bread<br>Chicken Alfredo, Meat Sauce, and One Additional Sauce For $1.00 Per Person Additional A Breast Of Chicken Or Sausage and Peppers For $1.50 Per Person Additional</p>\r\n<h2>Fiesta Verde</h2>\r\n<p>Two of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas Or Cheese Enchilada<br>Corn or Flour Tortillas<br>Condiments Of Cheese, Salsa, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Ambrosia Fruit Salad</p>\r\n<h2>Fiesta Grande</h2>\r\n<p>Three of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas, Chicken Mole, Fajitas, Steak Picado Or Chicken Enchilada Casserole<br>Corn Or Flour Tortillas<br>Condiments Of Cheese, Salsa, Guacamole, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Garden Green Salad With Two Dressings</p>\r\n<h2>Taste of the Orient</h2>\r\n<p>Chicken Lettuce Wraps<br>Hoisin Sauce<br>Cold Sesame Noodle Salad with Snow Peas and Edamame<br>Kung Pao Tofu<br>Sticky Rice</p>\r\n<h2>Nacho Taco Salad Bar</h2>\r\n<p>Crisp Tortilla Chips<br>Flavored Ground Beef<br>Refried Beans<br>Shredded Cheese<br>Sliced Lettuce<br>Tomatoes<br>Black Olives<br>Jalape&ntilde;os<br>Peppers<br>Avocados<br>Onions<br>Cilantro<br>Crema Mexicana<br>Lime Wedges</p>\r\n<h2>Mediterranean Menu</h2>\r\n<p>Chicken Gyros With Lettuce, Tomato, Red Onion, and Tzatziki on Pita Bread<br>Orzo Salad with Tomato, Kalamata Olives and Feta<br>Herbed Vinaigrette<br>Cucumber and Tomato Salad<br>Greek Dressing</p>\r\n<h2>Salad, Salad, Salad!</h2>\r\n<p>Quinoa Salad with Black Beans, Avocado, and Cumin Lime dressing<br>Apple, Walnut, and Feta Salad with Raspberry Vinaigrette<br>BLT Salad<br>Ranch Dressing<br>Thai Chicken and Soba Noodle Salad<br>Housemade Potato Salad with Green Beans and Cherry Tomatoes<br>Breadsticks</p>\r\n<h2>Soup and Sandwich</h2>\r\n<p>Grilled Chicken On Ciabatta<br>Pesto Mayo, Tomato, Arugula<br>Creamy Tomato and Basil Soup<br>Caesar Salad<br>Fresh Fruit<br>Garlic Bread</p>\r\n<h2>Thai Menu</h2>\r\n<p>Red Thai Curry Noodles<br>Sesame Chicken Skewers<br>Massaman Curry<br>Basmati Rice<br>Crab and Cheese Wontons</p>\r\n<h2>Southwest Menu</h2>\r\n<p>Smokey Sweet Potato and Black Bean Enchiladas<br>Sweet Corn Crema<br>Avocado and Fresh Cilantro<br>(add chicken for $1.00 additional)<br>Roasted Poblano Chiles &ndash; Filled with Three Cheeses and Chicken<br>Mexican Rice<br>Mixed Green Salad with Mango and Red Onion served with a Cilantro Lime Vinaigrette</p>\r\n<h2>Spring and Summer Buffet</h2>\r\n<p>Sesame and Soy Glazed Salmon<br>Citrus Rice<br>Garlic and Lemon Saut&eacute;ed Snow Peas<br>Mixed Green Salad with Citrus Vinaigrette<br>Rolls and Butter</p>\r\n<p><strong>** All buffets include Citrus Water and Flavored Lemonade</strong></p>\r\n<p><strong>Any of the following desserts may be added:</strong><br>Bar of Assorted Cookies, and Brownies<br>Cheesecake with Three Sauces<br>Ice Cream Sundae Bar<br>&Eacute;clairs and Strawberries</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">For 150 people</span></p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">Rs 500,000</span></p>', 500000, 0),
(57, 'Light package', '<h2>Cold Delight</h2>\r\n<p>Chicken Cashew and Grape Croissants<br>Vegetable Crudit&eacute;s and Ranch Dill Dip<br>Fresh Fruit Display<br>Vegetable Pasta Salad With Bay Shrimp<br>House Mixed Green Salad with Two Dressings</p>\r\n<h2>Meats and Cheeses</h2>\r\n<p>Ham, Turkey, Roast Beef, and Provolone, American, Cheddar Cheeses<br>Mayonnaise, Mustard<br>Lettuce, Olives, Pickles and Tomatoes<br>Fresh Fruit In Season<br>Assorted Rolls and Breads<br>House Mixed Green Salad with two dressings</p>\r\n<h2>Pasta Napoli</h2>\r\n<p>Choose two Pastas and three Sauces<br>Penne, Fettucini, Bow-tie, Spaghetti, Rainbow Rotini, Linguini, Shell Pesto, Alfredo, Marinara, Creamy Tomato, Mushroom Marsala and Garlic Butter<br>Mixed Italian Vegetables<br>Caesar Salad<br>Toasted Garlic Bread<br>Chicken Alfredo, Meat Sauce, and One Additional Sauce For $1.00 Per Person Additional A Breast Of Chicken Or Sausage and Peppers For $1.50 Per Person Additional</p>\r\n<h2>Fiesta Verde</h2>\r\n<p>Two of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas Or Cheese Enchilada<br>Corn or Flour Tortillas<br>Condiments Of Cheese, Salsa, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Ambrosia Fruit Salad</p>\r\n<h2>Fiesta Grande</h2>\r\n<p>Three of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas, Chicken Mole, Fajitas, Steak Picado Or Chicken Enchilada Casserole<br>Corn Or Flour Tortillas<br>Condiments Of Cheese, Salsa, Guacamole, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Garden Green Salad With Two Dressings</p>\r\n<h2>Taste of the Orient</h2>\r\n<p>Chicken Lettuce Wraps<br>Hoisin Sauce<br>Cold Sesame Noodle Salad with Snow Peas and Edamame<br>Kung Pao Tofu<br>Sticky Rice</p>\r\n<h2>Nacho Taco Salad Bar</h2>\r\n<p>Crisp Tortilla Chips<br>Flavored Ground Beef<br>Refried Beans<br>Shredded Cheese<br>Sliced Lettuce<br>Tomatoes<br>Black Olives<br>Jalape&ntilde;os<br>Peppers<br>Avocados<br>Onions<br>Cilantro<br>Crema Mexicana<br>Lime Wedges</p>\r\n<h2>Mediterranean Menu</h2>\r\n<p>Chicken Gyros With Lettuce, Tomato, Red Onion, and Tzatziki on Pita Bread<br>Orzo Salad with Tomato, Kalamata Olives and Feta<br>Herbed Vinaigrette<br>Cucumber and Tomato Salad<br>Greek Dressing</p>\r\n<h2>Salad, Salad, Salad!</h2>\r\n<p>Quinoa Salad with Black Beans, Avocado, and Cumin Lime dressing<br>Apple, Walnut, and Feta Salad with Raspberry Vinaigrette<br>BLT Salad<br>Ranch Dressing<br>Thai Chicken and Soba Noodle Salad<br>Housemade Potato Salad with Green Beans and Cherry Tomatoes<br>Breadsticks</p>\r\n<h2>Soup and Sandwich</h2>\r\n<p>Grilled Chicken On Ciabatta<br>Pesto Mayo, Tomato, Arugula<br>Creamy Tomato and Basil Soup<br>Caesar Salad<br>Fresh Fruit<br>Garlic Bread</p>\r\n<h2>Thai Menu</h2>\r\n<p>Red Thai Curry Noodles<br>Sesame Chicken Skewers<br>Massaman Curry<br>Basmati Rice<br>Crab and Cheese Wontons</p>\r\n<h2>Southwest Menu</h2>\r\n<p>Smokey Sweet Potato and Black Bean Enchiladas<br>Sweet Corn Crema<br>Avocado and Fresh Cilantro<br>(add chicken for $1.00 additional)<br>Roasted Poblano Chiles &ndash; Filled with Three Cheeses and Chicken<br>Mexican Rice<br>Mixed Green Salad with Mango and Red Onion served with a Cilantro Lime Vinaigrette</p>\r\n<h2>Spring and Summer Buffet</h2>\r\n<p>Sesame and Soy Glazed Salmon<br>Citrus Rice<br>Garlic and Lemon Saut&eacute;ed Snow Peas<br>Mixed Green Salad with Citrus Vinaigrette<br>Rolls and Butter</p>\r\n<p><strong>** All buffets include Citrus Water and Flavored Lemonade</strong></p>\r\n<p><strong>Any of the following desserts may be added:</strong><br>Bar of Assorted Cookies, and Brownies<br>Cheesecake with Three Sauces<br>Ice Cream Sundae Bar<br>&Eacute;clairs and Strawberries</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">For 100 people</span></p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS.450,000</span></p>', 450000, 0),
(58, 'High sound', '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.40000.00</p>', 40000, 0),
(59, 'Fully package', '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.40000.00</p>', 40000, 0),
(60, 'Half package', '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.35000.00</p>', 35000, 0),
(61, 'Rich eat', '<h2>Cold Delight</h2>\r\n<p>Chicken Cashew and Grape Croissants<br>Vegetable Crudit&eacute;s and Ranch Dill Dip<br>Fresh Fruit Display<br>Vegetable Pasta Salad With Bay Shrimp<br>House Mixed Green Salad with Two Dressings</p>\r\n<h2>Meats and Cheeses</h2>\r\n<p>Ham, Turkey, Roast Beef, and Provolone, American, Cheddar Cheeses<br>Mayonnaise, Mustard<br>Lettuce, Olives, Pickles and Tomatoes<br>Fresh Fruit In Season<br>Assorted Rolls and Breads<br>House Mixed Green Salad with two dressings</p>\r\n<h2>Pasta Napoli</h2>\r\n<p>Choose two Pastas and three Sauces<br>Penne, Fettucini, Bow-tie, Spaghetti, Rainbow Rotini, Linguini, Shell Pesto, Alfredo, Marinara, Creamy Tomato, Mushroom Marsala and Garlic Butter<br>Mixed Italian Vegetables<br>Caesar Salad<br>Toasted Garlic Bread<br>Chicken Alfredo, Meat Sauce, and One Additional Sauce For $1.00 Per Person Additional A Breast Of Chicken Or Sausage and Peppers For $1.50 Per Person Additional</p>\r\n<h2>Fiesta Verde</h2>\r\n<p>Two of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas Or Cheese Enchilada<br>Corn or Flour Tortillas<br>Condiments Of Cheese, Salsa, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Ambrosia Fruit Salad</p>\r\n<h2>Fiesta Grande</h2>\r\n<p>Three of Your Choice Of Shredded Chicken, Beef Barbacoa, Carnitas, Chicken Mole, Fajitas, Steak Picado Or Chicken Enchilada Casserole<br>Corn Or Flour Tortillas<br>Condiments Of Cheese, Salsa, Guacamole, Sour Cream, Onions and Olives<br>Spanish Rice<br>Refried, Black, or Pinto Beans<br>Tortilla Chips and Salsa<br>Garden Green Salad With Two Dressings</p>\r\n<h2>Taste of the Orient</h2>\r\n<p>Chicken Lettuce Wraps<br>Hoisin Sauce<br>Cold Sesame Noodle Salad with Snow Peas and Edamame<br>Kung Pao Tofu<br>Sticky Rice</p>\r\n<h2>Nacho Taco Salad Bar</h2>\r\n<p>Crisp Tortilla Chips<br>Flavored Ground Beef<br>Refried Beans<br>Shredded Cheese<br>Sliced Lettuce<br>Tomatoes<br>Black Olives<br>Jalape&ntilde;os<br>Peppers<br>Avocados<br>Onions<br>Cilantro<br>Crema Mexicana<br>Lime Wedges</p>\r\n<h2>Mediterranean Menu</h2>\r\n<p>Chicken Gyros With Lettuce, Tomato, Red Onion, and Tzatziki on Pita Bread<br>Orzo Salad with Tomato, Kalamata Olives and Feta<br>Herbed Vinaigrette<br>Cucumber and Tomato Salad<br>Greek Dressing</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS. 300,000.00</span></p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">for 200 people</span></p>', 300000, 0),
(63, 'Fully package', '<p><strong>This package provides,</strong></p>\r\n<p>we supply all the equipment which are need for the sri lankan tradition weddings poruwa ceremony event.</p>\r\n<p>If you need more details you can contact us through the NAKATHA website.</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS. 35,000.00 ( Starting Price)</span></p>\r\n<p>&nbsp;</p>', 35000, 0),
(64, 'Light Package', '<p><strong>This package provides,</strong></p>\r\n<p>we supply all the equipment which are need for the sri lankan tradition weddings poruwa ceremony event.</p>\r\n<p>If you need more details you can contact us through the NAKATHA website.</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS. 30,000.00 ( Starting Price)</span></p>', 30000, 0),
(65, 'Rose package', '<p><strong>This Package Provides,</strong></p>\r\n<p>All the decoration In related Location and Wedding Vehicle.</p>\r\n<p><strong>Specially,</strong></p>\r\n<ul>\r\n<li>Tables</li>\r\n<li>Wedding Car</li>\r\n<li>Location Outdoor</li>\r\n<li>setiback</li>\r\n</ul>\r\n<p><strong>Rs. 65,000.00</strong></p>\r\n<p>&nbsp;</p>', 65000, 0),
(66, 'Gold Ring so', '<p>dejnbh bncnobhv</p>', 250000, 1),
(67, 'Gold Ring ', '<p>hjhjbnxbxncnncnvnvnn</p>', 250000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `packagehandling`
--

CREATE TABLE `packagehandling` (
  `packageHandlingID` int(11) NOT NULL,
  `packageID` int(11) DEFAULT NULL,
  `serviceID` int(11) NOT NULL,
  `regiProviderID` int(11) NOT NULL,
  `image` text NOT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packagehandling`
--

INSERT INTO `packagehandling` (`packageHandlingID`, `packageID`, `serviceID`, `regiProviderID`, `image`, `price`, `description`) VALUES
(46, 53, 36, 56, '63df5b36871996.30975289.jpg', 50000, '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong> website.</p>\r\n<p>&nbsp;<'),
(47, 54, 36, 56, '63df5da3aa0648.21224545.jpg', 40000, '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.40000.00</p>'),
(48, 55, 42, 62, '63df6df29a2ee8.43658671.jpg', 100000, '<p><strong>Cupcakes - 150pcs</strong></p>\r\n<p>5kg cake with a three-layer structure.</p>\r\n<p>Rs.100000</p>\r\n<p>&nbsp;</p>'),
(49, 56, 38, 63, '63e131c973eb50.73267831.jpg', 500000, '<h2>Cold Delight</h2>\r\n<p>Chicken Cashew and Grape Croissants<br>Vegetable Crudit&eacute;s and Ranch Dill Dip<br>Fresh Fruit Display<br>Vegetable Pasta Salad With Bay Shrimp<br>House Mixed Green Salad with Two Dressings</p>\r\n<h2>Meats and Cheeses</h2>\r\n<p>Ham, Turkey, Roast Beef, and Provolone, American, Cheddar Cheeses<br>Mayonnaise, Mustard<br>Lettuce, Olives, Pickles and Tomatoes<br>Fresh Fruit'),
(50, 57, 38, 63, '63e132e5adaf96.45099045.jpg', 450000, '<h2>Cold Delight</h2>\r\n<p>Chicken Cashew and Grape Croissants<br>Vegetable Crudit&eacute;s and Ranch Dill Dip<br>Fresh Fruit Display<br>Vegetable Pasta Salad With Bay Shrimp<br>House Mixed Green Salad with Two Dressings</p>\r\n<h2>Meats and Cheeses</h2>\r\n<p>Ham, Turkey, Roast Beef, and Provolone, American, Cheddar Cheeses<br>Mayonnaise, Mustard<br>Lettuce, Olives, Pickles and Tomatoes<br>Fresh Fruit'),
(51, 58, 36, 56, '63e28689c2ea34.40530831.jpg', 40000, '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs'),
(52, 59, 36, 64, '63e286ca767693.02848039.jpg', 40000, '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n<li>Welcome song (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs'),
(53, 60, 36, 64, '63e286f4c7cfe2.07364816.jpg', 35000, '<p><strong>This package provides,</strong></p>\r\n<ul>\r\n<li>Udarata Dancing group (Three dancing items</li>\r\n<li>Music group (Udarata or Pahatharata)</li>\r\n<li>Jayamangala Gatha team (With music)</li>\r\n</ul>\r\n<p>If you need additional events or need to customize this package you can contact with us through the&nbsp;<strong>NEKATHA</strong>&nbsp;website.</p>\r\n<p>Rs.35000.00</p>'),
(56, 63, 37, 66, '63e33e9384b107.09990010.jpg', 35000, '<p><strong>This package provides,</strong></p>\r\n<p>we supply all the equipment which are need for the sri lankan tradition weddings poruwa ceremony event.</p>\r\n<p>If you need more details you can contact us through the NAKATHA website.</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS. 35,000.00 ( Starting Price)</span></p>\r\n<p>&nbsp;</p>'),
(57, 64, 37, 66, '63e33f1e9329d4.02514159.jpg', 35000, '<p><strong>This package provides,</strong></p>\r\n<p>we supply all the equipment which are need for the sri lankan tradition weddings poruwa ceremony event.</p>\r\n<p>If you need more details you can contact us through the NAKATHA website.</p>\r\n<p><span style=\"background-color: rgb(241, 196, 15);\">RS. 30,000.00 ( Starting Price)</span></p>'),
(58, 65, 39, 67, '63e341c80364e7.48296126.jpg', 65000, '<p><strong>This Package Provides,</strong></p>\r\n<p>All the decoration In related Location and Wedding Vehicle.</p>\r\n<p><strong>Specially,</strong></p>\r\n<ul>\r\n<li>Tables</li>\r\n<li>Wedding Car</li>\r\n<li>Location Outdoor</li>\r\n<li>setiback</li>\r\n</ul>\r\n<p><strong>Rs. 65,000.00</strong></p>\r\n<p>&nbsp;</p>'),
(59, 66, 36, 68, '63e36c3a4b19d8.73219772.jpg', 250000, '<p>dejnbh</p>'),
(60, 67, 38, 56, '', 250000, '<p>hjhjbnxbxncnncnvnvnn</p>');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(30) NOT NULL,
  `images` text NOT NULL,
  `is_place` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`placeID`, `name`, `description`, `location`, `images`, `is_place`) VALUES
(20, 'REGENCY HOTEL', '<p>Regency Hotel hotel is a Beach Side hotel. You can create your wonderful wedding day hotel inside or outside join with us. <strong>NUMBER OF GUESTS &ndash; 750</strong></p>', 'Negambo', '', 0),
(21, 'HOTEL BLUE MARK', '<p class=\"card-text\">Hotel Blue Mark hotel placed in the Colombo city. It one of best Luxury hotel in Sri Lanka. You can create your color full day with Hotel Blue Mark hotel. <small class=\"text-muted\"><strong>NUMBER OF GUEST &ndash; 500</strong><br><br></small></p>', 'Colombo/06', '63df5328ca83a7.83905129.jpg', 1),
(22, 'GREENWAY HOTEL', '<p class=\"card-text\">Greenway Hotel hotel is Special hotel in the Nekatha company. It is placed in Beautiful area. Color your wedding day with us with the beauty of the Kanda udarata.<strong> </strong><small class=\"text-muted\"><strong>NUMBER OF GUEST &ndash; 700</strong><br><br></small></p>', 'Kandy', '63df53589683d1.23141955.jpg', 1),
(23, 'REGENCY HOTEL', '<p class=\"card-text\">Regency Hotel hotel is a Beach Side hotel. You can create your wonderful wedding day hotel inside or outside join with us. <small class=\"text-muted\"><strong>NUMBER OF GUEST &ndash; 750</strong><br><br></small></p>', 'Negambo', '63df561be90ca9.38044390.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `placeavailable`
--

CREATE TABLE `placeavailable` (
  `placeAvailableID` int(11) NOT NULL,
  `placeID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `providerrate`
--

CREATE TABLE `providerrate` (
  `providerRateID` int(11) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `providerID` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providerrate`
--

INSERT INTO `providerrate` (`providerRateID`, `customerID`, `providerID`, `rate`) VALUES
(53, 200011400189, 56, 2),
(54, 200011400189, 62, 3),
(55, 983451781, 56, 4),
(56, 983451781, 62, 5),
(57, 200011400199, 56, 1),
(58, 200011400199, 63, 2),
(59, 200011400199, 62, 4),
(60, 200011400199, 64, 2),
(62, 200011400199, 62, 4),
(63, 200011400189, 56, 1),
(65, 200011400189, 62, 3),
(66, 200011400000, 56, 0),
(67, 200011400444, 56, 0),
(68, 200011400444, 66, 0),
(69, 200011400444, 63, 0),
(70, 200011400444, 67, 0),
(71, 200011400444, 62, 0),
(72, 200055555555, 64, 0),
(73, 200055555555, 66, 0),
(74, 200001454545, 56, 0),
(75, 993451780, 56, 0),
(76, 993451780, 67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `regiprovider`
--

CREATE TABLE `regiprovider` (
  `regiProviderID` int(11) NOT NULL,
  `providerName` varchar(50) NOT NULL,
  `providerPassword` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `is_provider` tinyint(1) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regiprovider`
--

INSERT INTO `regiprovider` (`regiProviderID`, `providerName`, `providerPassword`, `email`, `location`, `contactNumber`, `is_provider`, `images`) VALUES
(56, 'Nadha1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nadha@gmail.com', 'Kandy', 786543455, 0, '63df57beefe205.51211107.jpg'),
(57, 'Rathmalgoda Cars and Travels ', '8bac82e185f60e1708960f1963d6073251abcc6a', 'Rathmal.cars@gmail.com', 'Malabe', 775646463, 0, '63df64414a90d2.12545088.jpg'),
(58, 'Salini Cakes', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'salini@gmail.com', 'Galle', 767396208, 0, '63df6587d942f8.62823909.jpg'),
(59, 'Samarasekara rent cars', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'samarasekara@gmail.com', 'pasyala', 2147483647, 0, '63df65b579ec38.12424036.jpg'),
(60, 'Creative Wedding Cards', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'creative@gmail.com', 'Gampaha', 775646463, 0, '63df65feef3da3.43124265.jpg'),
(61, 'Pasidu Catering', 'f989cad3687aef9cf1088d926968d7f823364d97', 'pasiducatering@gmail.com', 'Kurunegala', 786543456, 0, '63df663ab9f358.82287424.png'),
(62, 'Rashmi mini Cake', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'rashmicake@gmail.com', 'Kurunegala', 767396208, 0, '63df6c9c3be133.52831242.jpg'),
(63, 'ys food', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ys@gmail.com', 'Malabe', 757845784, 0, '63e130cd2cc027.69346446.jpg'),
(64, 'hadha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hadha@gmail.com', 'Matara', 761234567, 0, '63e283205a90c0.24660704.jpg'),
(66, 'hela siritha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'helasiritha@gmail.com', 'Moratuwa', 773451811, 0, '63e33cbce66953.65173768.jpg'),
(67, 'chalani flowers', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'chalaniflowers@gmail.com', 'Matara', 761234123, 0, '63e3408c2a9547.38529996.jpg'),
(68, 'samira', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'samira@gmail.com', 'Matara', 752222679, 0, '63e36bbf04d3f3.58231556.jpg'),
(69, 'malki', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'malki@gmail.com', 'Malabe', 765861234, 0, '63e6504e3b7cc8.19144143.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(20) NOT NULL,
  `serviceDescription` text NOT NULL,
  `is_service` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `serviceDescription`, `is_service`) VALUES
(36, 'Traditional Music', '<p><strong><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">This function includes all traditional music including <span style=\"background-color: rgb(241, 196, 15);\">upland</span> and <span style=\"background-color: rgb(241, 196, 15);\">lowland dance</span> traditions and <span style=\"background-color: rgb(241, 196, 15);\">Jaya Mangal Gathas</span>.</span></strong></p>\r\n<p>Sri Lankan folk music is rhythmic, layered, and lilting. It combines the beat of the drum with the chink of tiny cymbals and the call of the flute with the crescendo of a strong pair of lungs. This pulsing music is made by a whole host of traditional instruments, which are in turn made with local materials using traditional methods.</p>', 0),
(37, 'Poruwa Ceremony', '<p style=\"text-align: justify;\">Once the NEKATHA for the wedding has been finalized by an astrologer, the Poruwa ceremony will be held according to that. A traditional Sinhala-Buddhist marriage ceremony is referred to by many as Poruwa siritha.</p>\r\n<p style=\"text-align: justify;\"><strong>Poruwa ceremony</strong> (a series of rituals conducted on the wedding day as the couple gets married) is a common marriage ritual among the Sinhalese irrespective of their geographical differences. During the Poruwa ceremony, a set or a series of acts, and rituals that are associated with religion, myth and magic take place.</p>', 0),
(38, 'Catering', '<p style=\"text-align: justify;\">Catering and Menu Selection is the most important part of your date. NEKATHA will provide expert tips on executing every type of reception meal like a seasoned pro, each style, and the cost factors associated with them.<br>Depending on the wedding caterer, the food might be prepared off-site and brought in or they may cook everything on-site before serving. For the latter, the wedding caterer may have specific water, power, and resource requirements, so be sure to cover this during your interview.</p>\r\n<p>&nbsp;</p>', 0),
(39, 'Decorations', '<p style=\"text-align: justify;\">You need a theme to keep the look uniform, or you risk turning your celebration into a chaos of different colors and decor elements. Make your wonderful day with a wonderful theme.</p>\r\n<p style=\"text-align: justify;\">You can use fresh flowers, colorful drapes, etc to decorate the structure. Using garlands of marigold or jasmine is a traditional yet classy mandap decoration style. A Mandap/Altar enriches the look and feel of both indoor and outdoor venues</p>', 0),
(40, 'Videography & Photog', '<p style=\"text-align: justify;\">There are many different styles of music that can be played during the entrance and ceremony. Play and color your wonderful wedding day with our music providers<br>Wedding photography is a specialty in photography that is primarily focused on the photography of events and activities relating to weddings.</p>\r\n<p style=\"text-align: justify;\">A wedding highlight video is usually a 3 to 12 minutes video/short film that highlights the best moments of the wedding day. A highlight video can be edited in Non-linear or Linear fashion. A linear highlight video is a highlight video that shows the sequence of the day in chronological order.</p>', 0),
(41, 'Wedding Cabs & Cars', '<p style=\"text-align: justify;\"><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">Bridal cars. Traditionally, the bridal car is a feature car for the bride and father on the way to the ceremony. Following the ceremony, the car provides transport for the bride and groom for the afternoon to feature photograph locations and on to the reception.</span></p>', 0),
(42, 'Wedding Cakes & Card', '<p style=\"text-align: justify;\"><strong><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">Cakes</span></strong></p>\r\n<p style=\"text-align: justify;\"><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">A good cake, as our experts put it, must look beautiful and taste divine. It must have a perfect balance of appearance, texture, and flavor. It must have nothing but the best and freshest ingredients, meticulously mixed in the right proportions and baked to flawless perfection</span></p>\r\n<p style=\"text-align: justify;\"><strong><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">Cards</span></strong></p>\r\n<p style=\"text-align: justify;\"><span class=\"ui-provider vl b c d e f g h i j k l m n o p q r s t u v w x y z ab ac ae af ag ah ai aj ak\" dir=\"ltr\">List the title of the event (such as post-wedding brunch), dates, times, and locations. You may also include dress codes if certain attire is required at any of these events. What Not to Include: Do not list events that only certain guests are invited to, like your wedding rehearsal.</span></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 0),
(43, 'Makeup & Dressing', '<p style=\"text-align: justify;\">Let us harmonize your wishes with the beauty of your skin tone and loveliness of your face and the elegance of your body. Here at Dhanajaya Bandara\'s Bridal Salon, we bring out that inner beauty in you.</p>', 0),
(44, 'mul adum', '<p>dddaaaa</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(20) NOT NULL,
  `staffPassword` varchar(50) NOT NULL,
  `staffEmail` varchar(30) NOT NULL,
  `empType` tinyint(1) NOT NULL,
  `is_staffmember_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffPassword`, `staffEmail`, `empType`, `is_staffmember_delete`) VALUES
(20, 'pubudu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pubudu@gmail.com', 0, 0),
(21, 'vihanga', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'vihanga@gmail.com', 0, 0),
(23, 'sahan', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 'sahan27@gmail.com', 1, 0),
(33, 'sandeep', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sandeep@gmail.com', 0, 0),
(34, 'lakmalls', '5dd4ebdac62609c834f7768f02286b798bd82a38', 'lakmal@gmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avilable`
--
ALTER TABLE `avilable`
  ADD PRIMARY KEY (`availableID`),
  ADD KEY `f_job` (`dayTypeID`),
  ADD KEY `f_pro` (`providerID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `booking_ibfk_4` (`placeID`),
  ADD KEY `booking_ibfk_5` (`dayTypeID`),
  ADD KEY `booking_ibfk_6` (`customerID`);

--
-- Indexes for table `bookingprice`
--
ALTER TABLE `bookingprice`
  ADD PRIMARY KEY (`bookingPriceID`),
  ADD KEY `bp_1` (`bookingID`),
  ADD KEY `bp_3` (`serviceID`),
  ADD KEY `bp_2` (`regiProviderID`),
  ADD KEY `bp_5` (`packageID`);

--
-- Indexes for table `canclation`
--
ALTER TABLE `canclation`
  ADD PRIMARY KEY (`cancleID`),
  ADD KEY `f_cus1` (`staffID`),
  ADD KEY `f_cus2` (`BookinID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `daytype`
--
ALTER TABLE `daytype`
  ADD PRIMARY KEY (`dayTypeID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquaryID`),
  ADD KEY `responceStaffID` (`responceStaffID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `packagehandling`
--
ALTER TABLE `packagehandling`
  ADD PRIMARY KEY (`packageHandlingID`),
  ADD KEY `ph_1` (`packageID`),
  ADD KEY `ph_2` (`regiProviderID`),
  ADD KEY `ph_3` (`serviceID`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeID`);

--
-- Indexes for table `placeavailable`
--
ALTER TABLE `placeavailable`
  ADD PRIMARY KEY (`placeAvailableID`),
  ADD KEY `pa_1` (`placeID`);

--
-- Indexes for table `providerrate`
--
ALTER TABLE `providerrate`
  ADD PRIMARY KEY (`providerRateID`),
  ADD KEY `r_2` (`providerID`),
  ADD KEY `r_3` (`customerID`);

--
-- Indexes for table `regiprovider`
--
ALTER TABLE `regiprovider`
  ADD PRIMARY KEY (`regiProviderID`),
  ADD UNIQUE KEY `providerName` (`providerName`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `bookingprice`
--
ALTER TABLE `bookingprice`
  MODIFY `bookingPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `canclation`
--
ALTER TABLE `canclation`
  MODIFY `cancleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `daytype`
--
ALTER TABLE `daytype`
  MODIFY `dayTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `packagehandling`
--
ALTER TABLE `packagehandling`
  MODIFY `packageHandlingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `placeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `placeavailable`
--
ALTER TABLE `placeavailable`
  MODIFY `placeAvailableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `providerrate`
--
ALTER TABLE `providerrate`
  MODIFY `providerRateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `regiprovider`
--
ALTER TABLE `regiprovider`
  MODIFY `regiProviderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avilable`
--
ALTER TABLE `avilable`
  ADD CONSTRAINT `f_job` FOREIGN KEY (`dayTypeID`) REFERENCES `daytype` (`dayTypeID`),
  ADD CONSTRAINT `f_pro` FOREIGN KEY (`providerID`) REFERENCES `regiprovider` (`regiProviderID`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`dayTypeID`) REFERENCES `daytype` (`dayTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_6` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookingprice`
--
ALTER TABLE `bookingprice`
  ADD CONSTRAINT `bp_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bp_2` FOREIGN KEY (`regiProviderID`) REFERENCES `regiprovider` (`regiProviderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bp_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bp_5` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `canclation`
--
ALTER TABLE `canclation`
  ADD CONSTRAINT `f_cus1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `f_cus2` FOREIGN KEY (`BookinID`) REFERENCES `booking` (`bookingID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`responceStaffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packagehandling`
--
ALTER TABLE `packagehandling`
  ADD CONSTRAINT `ph_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ph_2` FOREIGN KEY (`regiProviderID`) REFERENCES `regiprovider` (`regiProviderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ph_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `placeavailable`
--
ALTER TABLE `placeavailable`
  ADD CONSTRAINT `pa_1` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `providerrate`
--
ALTER TABLE `providerrate`
  ADD CONSTRAINT `r_2` FOREIGN KEY (`providerID`) REFERENCES `regiprovider` (`regiProviderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
