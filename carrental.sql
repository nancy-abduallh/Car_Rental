-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 13, 2025 at 01:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserName_ar` varchar(255) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `UserName_ar`, `Password`, `updationDate`) VALUES
(1, 'admin', NULL, '$2y$12$Mc/jIG9lly7euvbWiMBy5eTgrJqB90qNcrJeRgghBSs0vh.4jh6f6', '2025-11-17 18:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_09_091710_create_admins_table', 2),
(5, '2025_11_09_091710_create_bookings_table', 2),
(6, '2025_11_09_091711_create_brands_table', 2),
(7, '2025_11_09_091712_create_contact_infos_table', 2),
(8, '2025_11_09_091713_create_contact_queries_table', 2),
(9, '2025_11_09_091713_create_pages_table', 2),
(10, '2025_11_09_091714_create_subscribers_table', 2),
(11, '2025_11_09_091715_create_testimonials_table', 2),
(12, '2025_11_09_091802_create_vehicles_table', 2),
(13, '2025_11_11_194038_add_remember_token_to_tblusers_table', 2),
(14, '2025_11_20_170921_add_arabic_columns_to_admin_table', 3),
(15, '2025_11_20_171027_add_arabic_columns_to_tblbooking_table', 3),
(16, '2025_11_20_171051_add_arabic_columns_to_tblbrands_table', 3),
(17, '2025_11_20_171113_add_arabic_columns_to_tblcontactusinfo_table', 3),
(18, '2025_11_20_171131_add_arabic_columns_to_tblcontactusquery_table', 3),
(19, '2025_11_20_171148_add_arabic_columns_to_tblpages_table', 3),
(20, '2025_11_20_171206_add_arabic_columns_to_tbltestimonial_table', 3),
(21, '2025_11_20_171224_add_arabic_columns_to_tblusers_table', 3),
(22, '2025_11_20_171246_add_arabic_columns_to_tblvehicles_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('auCQumnpwDMaVBdtv9GVPawoR7iAYYXLmO3qspX3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0dDZHUzQWthaTJ6elFJWjhpRnB0REh5OVJmTVdva2s4N1JxVEFTWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1762883746);

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `message_ar` text DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Status_ar` varchar(255) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `message_ar`, `Status`, `Status_ar`, `PostingDate`, `LastUpdationDate`) VALUES
(1, 443108139, 'amikt12@gmail.com', 2, '2024-06-08', '2024-06-10', 'I want booking', NULL, 1, NULL, '2024-06-05 05:32:39', '2024-06-05 05:34:08'),
(2, 128061580, 'eman123@gmail.com', 2, '2024-08-11', '2024-08-17', 'i hope to enjoy it', NULL, 1, NULL, '2024-08-11 11:55:02', '2024-08-12 07:25:52'),
(3, 201832430, 'ahmed@gmail.com', 2, '2025-11-14', '2025-11-30', 'no', NULL, 2, NULL, '2025-11-14 15:55:15', '2025-11-17 17:52:01'),
(4, 203686995, 'aser@gmail.com', 13, '2025-11-18', '2025-11-30', NULL, NULL, 2, NULL, '2025-11-18 13:24:58', '2025-11-18 13:34:51'),
(5, 788688166, 'aser@gmail.com', 13, '2025-11-18', '2025-11-19', NULL, NULL, 2, NULL, '2025-11-18 13:35:55', '2025-11-18 13:36:26'),
(6, 467331521, 'aser@gmail.com', 13, '2025-11-18', '2025-11-20', 'i want it now', NULL, 1, NULL, '2025-11-18 13:39:05', '2025-11-18 13:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `BrandName_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `BrandName_ar`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', 'ماروتي', '2024-05-01 16:24:34', '2025-11-20 16:19:01'),
(2, 'BMW', 'بي إم دبليو', '2024-05-01 16:24:34', '2025-11-20 16:19:36'),
(3, 'Audi', 'أودي', '2024-05-01 16:24:34', '2025-11-20 16:19:48'),
(4, 'Nissan', 'نيسان', '2024-05-01 16:24:34', '2025-11-20 16:20:01'),
(5, 'Toyota', 'تويوتا', '2024-05-01 16:24:34', '2025-11-20 16:24:48'),
(7, 'Volkswagon', 'فولكس فاجن', '2024-05-01 16:24:34', '2025-11-20 16:25:02'),
(8, 'Hyundai', 'هيونداي', '2025-11-18 10:39:10', '2025-11-20 16:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `Address_ar` text DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `Address_ar`, `EmailId`, `ContactNo`) VALUES
(1, 'Dokki, cairo', NULL, 'salahabueldahab5@gmail.com', '01229563812');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `Message_ar` text DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `name_ar`, `EmailId`, `ContactNumber`, `Message`, `Message_ar`, `PostingDate`, `status`) VALUES
(1, 'Kunal ', NULL, 'kunal@gmail.com', '7977779798', 'I want to know you brach in Chandigarh?', NULL, '2024-06-04 09:34:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `PageName_ar` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` text DEFAULT NULL,
  `detail_ar` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageName_ar`, `type`, `detail`, `detail_ar`) VALUES
(1, 'Terms and Conditions', NULL, 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>', NULL),
(2, 'Privacy Policy', NULL, 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>', NULL),
(3, 'About Us ', NULL, 'aboutus', '<div style=\"color: #2c3e50; font-family: \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; line-height: 1.6;\">\r\n    <h2 style=\"color: #e74c3c; border-bottom: 3px solid #3498db; padding-bottom: 10px; margin-bottom: 20px;\">Welcome to Salah Abu Eldahab for Cars</h2>\r\n    \r\n    <div style=\"background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 20px; border-radius: 10px; margin-bottom: 25px;\">\r\n        <h3 style=\"color: #2980b9; margin-bottom: 15px;\">► Your Premium Mobility Partner</h3>\r\n        <p style=\"font-size: 16px; color: #34495e;\">We pride ourselves on delivering exceptional car rental experiences with a diverse fleet designed to meet every need and preference. From compact city cars to spacious family vehicles, we have the perfect ride for every journey.</p>\r\n    </div>\r\n\r\n    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 25px;\">\r\n        <div style=\"background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 4px solid #27ae60;\">\r\n            <h4 style=\"color: #27ae60; margin-bottom: 10px;\">★ Premium Fleet Quality</h4>\r\n            <p style=\"color: #2c3e50;\">Our entire fleet is sourced exclusively from official dealerships and maintained to the highest standards, ensuring your safety and comfort on every trip.</p>\r\n        </div>\r\n        \r\n        <div style=\"background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 4px solid #e67e22;\">\r\n            <h4 style=\"color: #e67e22; margin-bottom: 10px;\">↻ Complete Vehicle Choice</h4>\r\n            <p style=\"color: #2c3e50;\">Enjoy the freedom of choice with multiple brands and models. As an independent provider, we offer unbiased options across all vehicle categories.</p>\r\n        </div>\r\n    </div>\r\n\r\n    <div style=\"background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; padding: 25px; border-radius: 10px; margin-bottom: 25px;\">\r\n        <h3 style=\"color: white; margin-bottom: 15px;\">⚡ Modern Convenience Features</h3>\r\n        <p style=\"font-size: 16px; margin-bottom: 10px;\">Every vehicle in our fleet comes equipped with:</p>\r\n        <ul style=\"columns: 2; list-style: none; padding: 0;\">\r\n            <li style=\"margin-bottom: 8px;\">✓ Climate Control Air Conditioning</li>\r\n            <li style=\"margin-bottom: 8px;\">✓ Power Steering & Electric Windows</li>\r\n            <li style=\"margin-bottom: 8px;\">✓ Automatic Transmission Available</li>\r\n            <li style=\"margin-bottom: 8px;\">✓ Premium Comfort Interiors</li>\r\n        </ul>\r\n    </div>\r\n\r\n    <div style=\"background: #2c3e50; color: white; padding: 25px; border-radius: 10px; text-align: center;\">\r\n        <h3 style=\"color: #f39c12; margin-bottom: 15px;\">🎯 Our Vision</h3>\r\n        <p style=\"font-size: 18px; font-weight: 300;\">To revolutionize mobility solutions by becoming the global benchmark in car rental services, serving corporate clients, public institutions, and private customers with innovative, efficient, and personalized transportation solutions.</p>\r\n    </div>\r\n</div>', NULL),
(11, 'FAQs', NULL, 'faqs', '<div style=\"color: #2c3e50; font-family: \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, sans-serif; line-height: 1.6;\">\r\n    <h2 style=\"color: #e74c3c; border-bottom: 3px solid #3498db; padding-bottom: 10px; margin-bottom: 30px; text-align: center;\">Frequently Asked Questions</h2>\r\n    \r\n    <div style=\"background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 25px; border-radius: 10px; margin-bottom: 30px;\">\r\n        <h3 style=\"color: #2980b9; margin-bottom: 20px; text-align: center;\">Quick Answers to Your Questions</h3>\r\n        <p style=\"font-size: 16px; color: #34495e; text-align: center;\">Find everything you need to know about renting with Salah Abu Eldahab for Cars</p>\r\n    </div>\r\n\r\n    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 25px; margin-bottom: 30px;\">\r\n        <!-- Column 1 -->\r\n        <div>\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #e74c3c;\">\r\n                <h4 style=\"color: #e74c3c; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #e74c3c; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    What are your rental requirements?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">To rent a vehicle, you need a valid driver\'s license, credit card, and must be at least 21 years old. Additional documentation may be required for specific vehicle categories.</p>\r\n            </div>\r\n\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #3498db;\">\r\n                <h4 style=\"color: #3498db; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #3498db; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    What payment methods do you accept?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">We accept all major credit cards (Visa, MasterCard, American Express), debit cards, and cash payments. Corporate accounts with credit terms are also available.</p>\r\n            </div>\r\n\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #27ae60;\">\r\n                <h4 style=\"color: #27ae60; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #27ae60; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    Are your vehicles well-maintained?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">Absolutely! All our vehicles are purchased from official dealerships and undergo regular maintenance checks. Each car features air conditioning, power steering, and electric windows.</p>\r\n            </div>\r\n        </div>\r\n\r\n        <!-- Column 2 -->\r\n        <div>\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #e67e22;\">\r\n                <h4 style=\"color: #e67e22; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #e67e22; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    Do you offer automatic transmission vehicles?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">Yes! Automatic transmission cars are available across all booking classes, from compact cars to premium vehicles, ensuring comfort for every driver.</p>\r\n            </div>\r\n\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #9b59b6;\">\r\n                <h4 style=\"color: #9b59b6; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #9b59b6; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    What is your cancellation policy?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">You can cancel free of charge up to 24 hours before your scheduled pickup. Late cancellations may incur a fee. Please check our terms for specific details.</p>\r\n            </div>\r\n\r\n            <div style=\"background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 20px; border-left: 4px solid #34495e;\">\r\n                <h4 style=\"color: #34495e; margin-bottom: 10px; display: flex; align-items: center;\">\r\n                    <span style=\"background: #34495e; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-size: 12px;\">Q</span>\r\n                    Can I choose specific car models?\r\n                </h4>\r\n                <p style=\"color: #2c3e50; margin-left: 34px;\">As an independent provider, we offer diverse makes and models. While we guarantee the vehicle category, specific models are subject to availability.</p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <div style=\"background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; padding: 25px; border-radius: 10px; margin-bottom: 25px;\">\r\n        <h3 style=\"color: white; margin-bottom: 15px; text-align: center;\">Vehicle Features & Services</h3>\r\n        <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;\">\r\n            <div style=\"text-align: center;\">\r\n                <div style=\"background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;\">\r\n                    <span style=\"font-size: 20px;\">❄️</span>\r\n                </div>\r\n                <p style=\"margin: 0; font-size: 14px;\">Air Conditioning</p>\r\n            </div>\r\n            <div style=\"text-align: center;\">\r\n                <div style=\"background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;\">\r\n                    <span style=\"font-size: 20px;\">⚡</span>\r\n                </div>\r\n                <p style=\"margin: 0; font-size: 14px;\">Power Features</p>\r\n            </div>\r\n            <div style=\"text-align: center;\">\r\n                <div style=\"background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;\">\r\n                    <span style=\"font-size: 20px;\">🔄</span>\r\n                </div>\r\n                <p style=\"margin: 0; font-size: 14px;\">Automatic Transmission</p>\r\n            </div>\r\n            <div style=\"text-align: center;\">\r\n                <div style=\"background: rgba(255,255,255,0.2); width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px;\">\r\n                    <span style=\"font-size: 20px;\">🏢</span>\r\n                </div>\r\n                <p style=\"margin: 0; font-size: 14px;\">Official Dealership Maintenance</p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <div style=\"background: #2c3e50; color: white; padding: 25px; border-radius: 10px; text-align: center;\">\r\n        <h3 style=\"color: #f39c12; margin-bottom: 15px;\">Still Have Questions?</h3>\r\n        <p style=\"font-size: 16px; font-weight: 300; margin-bottom: 20px;\">Our customer service team is available 24/7 to assist you with any additional questions.</p>\r\n        <div style=\"display: inline-flex; gap: 15px;\">\r\n            <div style=\"background: #e74c3c; color: white; padding: 12px 25px; border-radius: 25px; font-weight: 600;\">Contact Us</div>\r\n            <div style=\"background: #27ae60; color: white; padding: 12px 25px; border-radius: 25px; font-weight: 600;\">Live Chat</div>\r\n        </div>\r\n    </div>\r\n</div>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'harish@gmail.com', '2024-06-01 09:26:21'),
(6, 'eman123@gmail.com', '2024-08-11 11:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `Testimonial_ar` text DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `FullName_ar` varchar(255) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Address_ar` text DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `City_ar` varchar(255) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `Country_ar` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `FullName_ar`, `EmailId`, `Password`, `remember_token`, `ContactNo`, `dob`, `Address`, `Address_ar`, `City`, `City_ar`, `Country`, `Country_ar`, `RegDate`, `UpdationDate`) VALUES
(3, 'Eman Mohammed', NULL, 'eman123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '01279424259', '5/1/1983', '75 Dokki street', NULL, 'Giza', NULL, 'Egypt', NULL, '2024-08-11 11:37:47', '2024-08-11 11:57:38'),
(4, 'Nancy Abduallh', NULL, 'nancy@gmail.com', '$2y$12$lIBUhf8BHJKbDEQNAgGhR.xLuU7BpDiui9V.nYTpNP5mSAYlPOL9e', '1G6gNIIJAnvizeS6mB1bfMWfLtL5s3mvz4j31xHuUXyR2HRMsdKizzrvCF78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-09 10:13:10', '2025-11-11 20:02:20'),
(5, 'Nancy Abduallh', NULL, 'nancyabdo857@gmail.com', '$2y$12$v0qlE.gasT.WQfSdpJpTiOamJpp5nhSbPizRx6qin6IBIKk8IX5lC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 12:32:12', NULL),
(6, 'mazen', NULL, 'mazen@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, '1279424259', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 17:32:55', NULL),
(7, 'mazen abduallh', NULL, 'mazen1@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, '1279424259', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 17:43:19', NULL),
(8, 'eman', NULL, 'eman@gmail.com', '$2y$12$IOrlU.QwtP9dBrjyg6EFL.AtfhgWUA8V0yl85H9hq3Jlexga1PVBW', 'nZo9XGhFfjUIoRwvR7w7eEe0UHSPwTZxqITl89ZRFnhpPSMz8drhd4OFlqlk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 17:43:15', '2025-11-11 20:11:29'),
(16, 'aser', NULL, 'aser@gmail.com', '$2y$12$Oz6tBmMSazCFQRPZ4ZkcFOMUWCVIbmgNgQtDEy2NMqk0ehrpjPCS2', 'VMX7ECJyiMdvx1ay0kb61E4Ht8iirjV96gGIxIy0vHBsOBYfMVxEyADA1Stx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-11 18:58:59', '2025-11-14 15:16:26'),
(17, 'mohammed', NULL, 'mohammed@gmail.com', '$2y$12$/RCWrN7c1NAieoEciU95D.koba99giG6OEECYhhTykIIkn8Czk996', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-12 17:06:09', NULL),
(18, 'ahmed', NULL, 'ahmed@gmail.com', '96e79218965eb72c92a549dd5a330112', NULL, '1279424259', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-14 15:54:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesTitle_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `VehiclesOverview_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `FuelType_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` varchar(50) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesTitle_ar`, `VehiclesBrand`, `VehiclesOverview`, `VehiclesOverview_ar`, `PricePerDay`, `FuelType`, `FuelType_ar`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(13, 'Hyundai Creta', 'هيونداي كريتا', 8, 'Spacious white Hyundai Creta SUV. Features a bold front grille, distinctive split lighting signature (LED daytime running lights on top, main lights below), and roof rails. Excellent for city driving and family trips.', 'هيونداي كريتا SUV بيضاء واسعة. تتميز بشبك أمامي جريء، وإضاءة مميزة منقسمة (مصابيح LED نهارية في الأعلى، ومصابيح رئيسية في الأسفل)، وقضبان سقف. مثالية للقيادة في المدينة والرحلات العائلية.', 1000, 'Petrol', 'بنزين', 2024, '5', '1763469653_691c6955b10f3.png', '1763469653_691c6955b6e22.png', '1763469653_691c6955b7f3e.png', '1763469653_691c6955b8ab7.png', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, '2025-11-18 12:40:53', '2025-12-09 13:53:05'),
(14, 'Hyundai Elantra', 'هيونداي إلنترا', 8, 'This is a sleek, modern Hyundai Elantra sedan, typically a 2026 or newer model, presented in a stylish silver/light grey finish. Known for its reliability and comfortable ride, the Elantra is a popular choice for both city driving and longer journeys. Key features generally include a modern exterior design with a distinctive grille, efficient fuel economy, and a spacious cabin. Standard features on most trims often include air conditioning, power windows, power door locks, and safety features like multiple airbags and ABS. This particular vehicle appears to be in excellent condition.', 'هذه سيارة سيدان أنيقة وحديثة من طراز هيونداي إلنترا، وعادة ما تكون من طراز 2026 أو أحدث، مقدمة باللون الفضي/الرمادي الفاتح الأنيق. تشتهر إلنترا بموثوقيتها وقيادتها المريحة، وهي خيار شائع لكل من القيادة داخل المدينة والرحلات الطويلة. تشمل الميزات الرئيسية عمومًا تصميمًا خارجيًا عصريًا مع شبكة مميزة، وكفاءة في استهلاك الوقود، ومقصورة واسعة. غالبًا ما تتضمن الميزات القياسية في معظم الفئات تكييف الهواء، والنوافذ الكهربائية، وأقفال الأبواب الكهربائية، وميزات السلامة مثل الوسائد الهوائية المتعددة ونظام منع انغلاق المكابح (ABS). تبدو هذه المركبة تحديداً في حالة ممتازة.', 1000, 'Petrol', 'بنزين', 2026, '5', '1764355939_6929ef637432d.jpg', '1764355939_6929ef6379423.jpg', '1764355939_6929ef637a2ef.jpg', '1764355939_6929ef637cc2c.jpg', '1764355939_6929ef637d9a4.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '2025-11-28 18:52:19', '2025-12-09 13:54:42'),
(15, 'Hyundai H-1 (Starex) Minivan - White', 'هيونداي H-1 (ستاركس) ميني فان - أبيض', 8, 'This is a robust, white Hyundai H-1 (or Starex) van, typically used for passenger transport due to its large seating capacity. This model features a modern, assertive grille and spacious dimensions. The H-1 is known for its durable Diesel engine (common configuration) and reliable performance. It provides ample room for luggage and passengers, making it ideal for group travel, hotels, or large families. Standard features usually include powerful air conditioning, power steering, Anti-lock Braking System (ABS), and essential safety airbags.', 'هذه سيارة فان هيونداي H-1 (أو ستاركس) بيضاء وقوية، تُستخدم عادة لنقل الركاب نظراً لسعة مقاعدها الكبيرة. يتميز هذا الطراز بشبكة أمامية حديثة وجريئة وأبعاد واسعة. تُعرف H-1 بـ محرك الديزل المتين (التكوين الأكثر شيوعاً) وأدائها الموثوق. توفر مساحة واسعة للأمتعة والركاب، مما يجعلها مثالية للسفر الجماعي أو الفنادق أو العائلات الكبيرة. تشمل الميزات القياسية عادة تكييف هواء قوي، وتوجيه معزز (باور ستيرنج)، ونظام منع انغلاق المكابح (ABS)، ووسائد هوائية أساسية للسلامة.', 1000, 'Diesel', 'سولار', 2020, '8 - 12', '1764356423_6929f147b6d10.jpg', '1764356423_6929f147bbeaf.jpg', '1764356423_6929f147bcb4f.jpg', '1764356423_6929f147bf80d.jpg', '1764356423_6929f147c0535.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '2025-11-28 19:00:23', '2025-12-09 13:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
