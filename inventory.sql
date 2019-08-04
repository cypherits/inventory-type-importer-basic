-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2019 at 07:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `particular` enum('sale','import') DEFAULT 'sale',
  `invoice_id` varchar(25) DEFAULT NULL,
  `import_voucher_id` int(11) DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` text,
  `contact` varchar(45) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `order_no` varchar(25) DEFAULT NULL,
  `vat_reg_no` varchar(25) DEFAULT NULL,
  `total_sale` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `total_ammount` float DEFAULT NULL,
  `in_words` varchar(255) DEFAULT NULL,
  `due` float DEFAULT NULL,
  `remarks` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bills_items`
--

CREATE TABLE `bills_items` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `bills_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `per_crtn` int(11) DEFAULT NULL,
  `crtn_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `crtn_price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_challan`
--

CREATE TABLE `delivery_challan` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` text,
  `contact` varchar(45) DEFAULT NULL,
  `vat_reg_no` varchar(45) DEFAULT NULL,
  `transport_type` varchar(45) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_contact` varchar(45) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `remark` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_challan_items`
--

CREATE TABLE `delivery_challan_items` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `delivery_challan_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `per_crtn` int(11) DEFAULT NULL,
  `crtn_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_voucher`
--

CREATE TABLE `import_voucher` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `lc_opening_payment_to_bank` float DEFAULT NULL,
  `bank_charges` float DEFAULT NULL,
  `payment_to_exporter` float DEFAULT NULL,
  `customs_duty` float DEFAULT NULL,
  `others_payment` float DEFAULT NULL,
  `cnf_bill` float DEFAULT NULL,
  `transportation_fare` float DEFAULT NULL,
  `others_cost` float DEFAULT NULL,
  `total_expense` float DEFAULT NULL,
  `unit_cost` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tabls`
--

CREATE TABLE `inventory_tabls` (
  `id` int(11) NOT NULL,
  `import_invoice_ref` varchar(255) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `per_crtn` int(11) DEFAULT NULL,
  `crtn_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `remark` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(25) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` text,
  `contact` varchar(45) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `vat_reg_no` varchar(45) DEFAULT NULL,
  `transport_method` varchar(45) DEFAULT NULL,
  `driver_name` varchar(45) DEFAULT NULL,
  `executive_name` varchar(45) DEFAULT NULL,
  `total_ammount` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(25) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `per_crtn` int(11) DEFAULT NULL,
  `crtn_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `crtn_price` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `money_receipt`
--

CREATE TABLE `money_receipt` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` text,
  `contact` varchar(45) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `order_no` varchar(25) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_type` enum('cash','chq') DEFAULT 'cash',
  `bank_name` varchar(255) DEFAULT NULL,
  `chq_no` varchar(255) DEFAULT NULL,
  `chq_ammount` varchar(255) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `paid` float DEFAULT '0',
  `due` float NOT NULL DEFAULT '0',
  `remark` text,
  `in_words` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `money_receipt_items`
--

CREATE TABLE `money_receipt_items` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `money_receipt_id` int(11) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `remark` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` text,
  `contact` varchar(45) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `date_of_visit` date DEFAULT NULL,
  `payment_type` enum('cash','chq') NOT NULL DEFAULT 'cash',
  `bank_name` varchar(255) DEFAULT NULL,
  `chq_no` varchar(255) DEFAULT NULL,
  `chq_ammount` varchar(255) DEFAULT NULL,
  `total_ammount` float NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` float NOT NULL DEFAULT '0',
  `total_rate` float NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `per_crtn` int(11) DEFAULT NULL,
  `crtn_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `type` enum('cr','dr') DEFAULT NULL,
  `createdt_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `created_at`) VALUES
(1, 'rubel', 'azim@intensebd.com', '124bd1296bec0d9d93c7b52a71ad8d5b', 'Azim Uddin', '2019-07-24 10:03:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_items`
--
ALTER TABLE `bills_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_challan`
--
ALTER TABLE `delivery_challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_challan_items`
--
ALTER TABLE `delivery_challan_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_voucher`
--
ALTER TABLE `import_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_tabls`
--
ALTER TABLE `inventory_tabls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_receipt`
--
ALTER TABLE `money_receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_receipt_items`
--
ALTER TABLE `money_receipt_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills_items`
--
ALTER TABLE `bills_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_challan`
--
ALTER TABLE `delivery_challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_challan_items`
--
ALTER TABLE `delivery_challan_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `import_voucher`
--
ALTER TABLE `import_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_tabls`
--
ALTER TABLE `inventory_tabls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `money_receipt`
--
ALTER TABLE `money_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `money_receipt_items`
--
ALTER TABLE `money_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
