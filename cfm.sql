-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2025 at 02:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfm`
--
CREATE DATABASE IF NOT EXISTS `cfm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cfm`;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID` int NOT NULL,
  `TITLE` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `CODE` int NOT NULL,
  `CPU` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `RAM` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CONTENT` text COLLATE utf8mb4_general_ci,
  `IMG` text COLLATE utf8mb4_general_ci,
  `PUBLISHED` datetime DEFAULT CURRENT_TIMESTAMP,
  `PRICE` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `TITLE`, `CODE`, `CPU`, `RAM`, `CONTENT`, `IMG`, `PUBLISHED`, `PRICE`) VALUES
(1, 'Carte mère MSI B450 TOMAHAWK MAX', 301, 'N/A', 'N/A', 'Carte mère MSI B450 TOMAHAWK MAX - Conçue pour les processeurs AMD Ryzen.', 'https://asset.msi.com/resize/image/global/product/product_1_20200806161944_5f2bbd20c4441.png62405b38c58fe0f07fcef2367d8a9ba1/1024.png', '2025-03-25 12:00:37', '0.00'),
(2, 'Processeur Intel Core i9-12900K', 302, 'Intel Core i9-12900K', '64GB', 'Processeur Intel Core i9-12900K - Performance de pointe pour les applications exigeantes.', 'https://media.ldlc.com/r1600/ld/products/00/05/90/02/LD0005900231_1.jpg', '2025-03-25 12:00:37', '0.00'),
(3, 'Carte graphique MSI GeForce RTX 3080', 303, 'N/A', 'N/A', 'Carte graphique MSI GeForce RTX 3080 - Idéale pour le gaming en haute résolution.', 'https://m.media-amazon.com/images/I/81lBqpfoncS.jpg', '2025-03-25 12:00:37', '928.99'),
(4, 'Clé USB SanDisk Ultra Flair 128GB', 304, 'N/A', 'N/A', 'Clé USB SanDisk Ultra Flair 128GB - Stockage rapide et fiable pour vos données.', 'https://www.sandisk.com/content/dam/sandisk/main/en_us/assets/images/products/usb-flash-drives/ultra-flair.jpg', '2025-03-25 12:00:37', '0.00'),
(5, 'Casque gamer Razer Kraken V3', 305, 'N/A', 'N/A', 'Casque gamer Razer Kraken V3 - Son surround 7.1 pour une immersion totale.', 'https://www.razer.com/en-us/razer-kraken-v3-pro-wireless-gaming-headset/media', '2025-03-25 12:00:37', '0.00'),
(6, 'Microphone Shure SM7B', 306, 'N/A', 'N/A', 'Microphone Shure SM7B - Idéal pour les podcasts et enregistrements professionnels.', 'https://www.shure.com/sites/default/files/2021-07/SM7B_2.jpg', '2025-03-25 12:00:37', '0.00'),
(7, 'Moniteur LG 27GN950-B', 307, 'N/A', 'N/A', 'Moniteur LG 27GN950-B - Écran 4K pour une expérience visuelle exceptionnelle.', 'https://www.lg.com/us/images/monitors/LG-27GN950-B.jpg', '2025-03-25 12:00:37', '0.00'),
(8, 'Disque SSD externe Crucial X8 1TB', 308, 'N/A', 'N/A', 'Disque SSD externe Crucial X8 1TB - Vitesse fulgurante et capacité généreuse.', 'https://www.crucial.com/-/media/Crucial/product-pages/external-x8.jpg', '2025-03-25 12:00:37', '0.00'),
(9, 'Clavier mécanique SteelSeries Apex Pro', 309, 'N/A', 'N/A', 'Clavier mécanique SteelSeries Apex Pro - Réactivité et personnalisation maximales.', 'https://steelseries.com/gaming-keyboards/apex-pro/media', '2025-03-25 12:00:37', '0.00'),
(10, 'Kit de mémoire G.Skill Trident Z 32GB', 310, 'N/A', '32GB', 'Kit de mémoire G.Skill Trident Z 32GB - Pour une performance ultra-rapide.', 'https://www.gskill.com/wp-content/uploads/2020/04/G-SKILL-Trident-Z-RGB.jpg', '2025-03-25 12:00:37', '0.00'),
(11, 'Boîtier Fractal Design Meshify C', 311, 'N/A', 'N/A', 'Boîtier Fractal Design Meshify C - Flux d\'air optimal pour les configurations puissantes.', 'https://www.fractal-design.com/wp-content/uploads/2019/09/meshify-c.jpg', '2025-03-25 12:00:37', '0.00'),
(12, 'Alimentation EVGA SuperNOVA 850W', 312, 'N/A', 'N/A', 'Alimentation EVGA SuperNOVA 850W - Puissance stable et efficace pour des systèmes haut de gamme.', 'https://www.evga.com/products/media/220-G5-0850-X1.jpg', '2025-03-25 12:00:37', '0.00'),
(13, 'Carte mère ASUS TUF Gaming B550-PLUS', 313, 'N/A', 'N/A', 'Carte mère ASUS TUF Gaming B550-PLUS - Conçue pour les gamers et les overclockeurs.', 'https://rog.asus.com/media/1630731976249.jpg', '2025-03-25 12:00:37', '0.00'),
(14, 'Processeur AMD Ryzen 9 5900X', 314, 'AMD Ryzen 9 5900X', '64GB', 'Processeur AMD Ryzen 9 5900X - Performances exceptionnelles pour les applications multi-thread.', 'https://www.amd.com/system/files/2021-10/5900X.jpg', '2025-03-25 12:00:37', '0.00'),
(15, 'Moniteur Dell U2720Q', 315, 'N/A', 'N/A', 'Moniteur Dell U2720Q - Écran 4K pour une expérience visuelle immersive.', 'https://www.dell.com/sites/csimages/Merchandizing_Imagery/all/inspiron_15_7000_4k.jpg', '2025-03-25 12:00:37', '0.00'),
(16, 'Carte mère MSI B450 TOMAHAWK MAX II', 316, 'N/A', 'N/A', 'Carte mère MSI B450 TOMAHAWK MAX II - Optimisée pour les processeurs AMD Ryzen.', 'https://www.msi.com/blog/wp-content/uploads/2020/07/MSI-B450-TOMAHAWK-MAX-II.jpg', '2025-03-25 12:00:37', '0.00'),
(17, 'Processeur Intel Core i9-12900K', 317, 'Intel Core i9-12900K', '64GB', 'Processeur Intel Core i9-12900K - Performance de pointe pour les applications exigeantes.', 'https://www.intel.com/content/dam/www/central-libraries/us/en/images/desktop-i9-12900k-visual-1.jpg', '2025-03-25 12:00:37', '0.00'),
(18, 'Carte graphique MSI GeForce RTX 3080 Ti', 318, 'N/A', 'N/A', 'Carte graphique MSI GeForce RTX 3080 Ti - Idéale pour le gaming en haute résolution.', 'https://www.msi.com/Graphics-Card/MSI-GeForce-RTX-3080-Ti-GAMING-X-TRIO-12G-LHR/media', '2025-03-25 12:00:37', '0.00'),
(19, 'Clé USB SanDisk Ultra Flair 128 Go', 319, 'N/A', 'N/A', 'Clé USB SanDisk Ultra Flair 128 Go - Stockage rapide et fiable pour vos données.', 'https://www.sandisk.com/content/dam/sandisk/main/en_us/assets/images/products/usb-flash-drives/ultra-flair.jpg', '2025-03-25 12:00:37', '0.00'),
(20, 'Casque gamer Razer Kraken V3 Pro', 320, 'N/A', 'N/A', 'Casque gamer Razer Kraken V3 Pro - Son surround 7.1 pour une immersion totale.', 'https://www.razer.com/media/razer-kraken-v3.jpg', '2025-03-25 12:00:37', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
