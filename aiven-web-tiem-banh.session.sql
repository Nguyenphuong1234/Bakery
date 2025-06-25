CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_01_05_135822_create_vp_favourite_products_table', 1),
(3, '2025_06_21_191221_create_personal_access_tokens_table', 0),
(4, '2025_06_21_191221_create_vp_categories_table', 0),
(5, '2025_06_21_191221_create_vp_comments_table', 0),
(6, '2025_06_21_191221_create_vp_favourite_products_table', 0),
(7, '2025_06_21_191221_create_vp_products_table', 0),
(8, '2025_06_21_191221_create_vp_users_table', 0),
(9, '2025_06_21_191224_add_foreign_keys_to_vp_comments_table', 0),
(10, '2025_06_21_191224_add_foreign_keys_to_vp_favourite_products_table', 0),
(11, '2025_06_21_191224_add_foreign_keys_to_vp_products_table', 0);

-- --------------------------------------------------------
-- Cấu trúc bảng cho bảng `personal_access_tokens`
-- --------------------------------------------------------
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Cấu trúc bảng cho bảng `vp_categories`
-- --------------------------------------------------------
CREATE TABLE `vp_categories` (
  `cate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) NOT NULL,
  `cate_slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=70;

INSERT INTO `vp_categories` (`cate_id`, `cate_name`, `cate_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(65, 'Bánh sinh nhật', 'banh-sinh-nhat', '2025-06-11 08:48:41', '2025-06-11 08:48:41', NULL),
(66, 'Bánh In Ảnh', 'banh-in-anh', '2025-06-11 08:48:51', '2025-06-13 06:18:34', NULL),
(67, 'Bánh Vẽ', 'banh-ve', '2025-06-11 08:48:57', '2025-06-11 08:48:57', NULL);


-- --------------------------------------------------------
-- Cấu trúc bảng cho bảng `vp_products`
-- --------------------------------------------------------
CREATE TABLE `vp_products` (
  `prod_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_slug` varchar(255) NOT NULL,
  `prod_price` bigint(50) NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `prod_condition` varchar(255) NOT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_featured` tinyint(4) NOT NULL,
  `prod_cate` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `vp_products_prod_cate_foreign` (`prod_cate`),
  CONSTRAINT `vp_products_prod_cate_foreign` FOREIGN KEY (`prod_cate`) REFERENCES `vp_categories` (`cate_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=303;


INSERT INTO `vp_products` (`prod_id`, `prod_name`, `prod_slug`, `prod_price`, `prod_img`, `prod_condition`, `prod_status`, `prod_description`, `prod_featured`, `prod_cate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(296, 'GREENTEA CAKE 4', 'greentea-cake-4', 300000, '1_b2d19bbf3c104f0c94c178c2e9512ca0_master.webp', '100%', 1, '<p>Th&agrave;nh phần ch&iacute;nh:</p>\r\n\r\n<p>- Gato,</p>\r\n\r\n<p>- Kem tươi tr&agrave; xanh</p>\r\n\r\n<p>B&aacute;nh l&agrave;m từ 3 lớp gato trắng xen giữa 3 lớp kem tươi tr&agrave; xanh&nbsp;</p>', 1, 65, '2025-06-13 06:13:09', '2025-06-13 06:13:09', NULL),
(297, 'SPECIAL CAKE', 'special-cake', 360000, '3_34bc6f75ec12459585650c7148330fe3_large.webp', '100%', 1, '<p>Th&agrave;nh phần ch&iacute;nh:</p>\r\n\r\n<p>- Gato,</p>\r\n\r\n<p>- Kem tươi tiramisu vị coffee,</p>\r\n\r\n<p>- Socola,</p>\r\n\r\n<p>- D&acirc;u t&acirc;y.</p>\r\n\r\n<p>B&aacute;nh l&agrave;m từ 3 lớp gato trắng xen giữa 3 lớp kem tươi tiramisu vị coffee. B&ecirc;n tr&ecirc;n trang tr&iacute; bằng hoa quả, socola đen, phủ bột Red xung quanh b&aacute;nh</p>', 0, 65, '2025-06-13 06:13:35', '2025-06-13 06:13:35', NULL),
(298, 'PASSION FRUIT MOUSSE', 'passion-fruit-mousse', 380000, 'frame_fb_5_126e0d02135d4662b29a1f40789b8aba_large.webp', '100%', 1, '<p>- Kem chesse socola,<br />\r\n- Chanh leo tươi,<br />\r\nB&aacute;nh l&agrave;m từ kem tươi nhiều trứng với 1 lớp socola v&agrave; 1 lớp sốt chanh leo tươi. Vị b&aacute;nh rất thanh v&agrave; m&aacute;t lạnh</p>', 1, 65, '2025-06-13 06:13:57', '2025-06-13 06:13:57', NULL),
(299, 'BÁNH ĐẶC BIỆT', 'banh-dac-biet', 400000, '16_1__354eaef191c64c4d8a0a0ba197859a57_large.webp', '100%', 1, '<p><em>(<strong>Ghi ch&uacute;:</strong>&nbsp;M&agrave;u sắc tr&ecirc;n ảnh c&oacute; thể đậm/ nhạt&nbsp;hơn so với thực tế do hiệu ứng &aacute;nh s&aacute;ng khi chụp, g&oacute;c chụp&nbsp;v&agrave; hiệu ứng hiển thị. Hoa quả trang tr&iacute; tr&ecirc;n b&aacute;nh c&oacute; thể thay đổi kh&ocirc;ng giống y hệt mẫu v&igrave; hoa quả thay đổi theo m&ugrave;a.&nbsp;Vui l&ograve;ng li&ecirc;n hệ bộ&nbsp;phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh H&ograve;a xin cảm ơn!)</em></p>', 1, 66, '2025-06-13 06:14:49', '2025-06-13 06:14:49', NULL),
(300, 'BÁNH ĐẶC BIỆT2', 'banh-dac-biet2', 450000, '26_15fe40a94dba45cc86e9f1a21188cbdc_master.webp', '100%', 1, '<p><em>(<strong>Ghi ch&uacute;:</strong>&nbsp;M&agrave;u sắc tr&ecirc;n ảnh c&oacute; thể đậm/ nhạt&nbsp;hơn so với thực tế do hiệu ứng &aacute;nh s&aacute;ng khi chụp, g&oacute;c chụp&nbsp;v&agrave; hiệu ứng hiển thị. Hoa quả trang tr&iacute; tr&ecirc;n b&aacute;nh c&oacute; thể thay đổi kh&ocirc;ng giống y hệt mẫu v&igrave; hoa quả thay đổi theo m&ugrave;a.&nbsp;Vui l&ograve;ng li&ecirc;n hệ bộ&nbsp;phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh H&ograve;a xin cảm ơn!)</em></p>', 1, 66, '2025-06-13 06:15:51', '2025-06-13 06:15:51', NULL),
(301, 'BÁNH VẼ - M048', 'banh-ve-m048', 400000, '33_93f461d6bc78427e8947296ce4c85a51_large.webp', '100%', 1, '<p><em>*/&nbsp;<strong>Ghi ch&uacute;:</strong>&nbsp;</em></p>\r\n\r\n<p>- Phần kem nhiều m&agrave;u sắc tr&ecirc;n b&aacute;nh chỉ để trang tr&iacute;, qu&yacute; kh&aacute;ch n&ecirc;n gạt bỏ phần đ&oacute; ra ngo&agrave;i trước khi ăn để đảm bảo thẩm mỹ v&agrave; hương vị tự nhi&ecirc;n của b&aacute;nh.</p>\r\n\r\n<p><em>(M&agrave;u sắc tr&ecirc;n ảnh c&oacute; thể đậm/ nhạt&nbsp;hơn so với thực tế do hiệu ứng &aacute;nh s&aacute;ng khi chụp, g&oacute;c chụp&nbsp;v&agrave; hiệu ứng hiển thị. Hoa quả trang tr&iacute; tr&ecirc;n b&aacute;nh c&oacute; thể thay đổi kh&ocirc;ng giống y hệt mẫu v&igrave; hoa quả thay đổi theo m&ugrave;a.&nbsp;Vui l&ograve;ng li&ecirc;n hệ bộ&nbsp;phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh H&ograve;a xin cảm ơn!)</em></p>', 1, 67, '2025-06-13 06:16:39', '2025-06-13 06:16:39', NULL),
(302, 'BÁNH VẼ - M047', 'banh-ve-m047', 400000, '3_1__94d32b85275549b69f0c0e3df1df9315_large.webp', '100%', 1, '<p>*/<em>&nbsp;Ch&uacute;&nbsp;</em>&yacute;:</p>\r\n\r\n<p>- Phần kem nhiều m&agrave;u sắc tr&ecirc;n b&aacute;nh chỉ để trang tr&iacute;, qu&yacute; kh&aacute;ch n&ecirc;n gạt bỏ phần đ&oacute; ra ngo&agrave;i&nbsp;trước&nbsp;khi ăn để&nbsp;đảm bảo&nbsp;thẩm&nbsp;mỹ&nbsp;v&agrave; hương vị tự nhi&ecirc;n của b&aacute;nh.</p>\r\n\r\n<p><em>(<strong>Ghi ch&uacute;:</strong>&nbsp;M&agrave;u sắc tr&ecirc;n ảnh c&oacute; thể đậm/ nhạt&nbsp;hơn so với thực tế do hiệu ứng &aacute;nh s&aacute;ng khi chụp, g&oacute;c chụp&nbsp;v&agrave; hiệu ứng hiển thị. Hoa quả trang tr&iacute; tr&ecirc;n b&aacute;nh c&oacute; thể thay đổi kh&ocirc;ng giống y hệt mẫu v&igrave; hoa quả thay đổi theo m&ugrave;a.&nbsp;Vui l&ograve;ng li&ecirc;n hệ bộ&nbsp;phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh H&ograve;a xin cảm ơn!)</em></p>', 1, 67, '2025-06-13 06:17:27', '2025-06-13 06:17:27', NULL);

CREATE TABLE `vp_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=16;

INSERT INTO `vp_users` (`id`, `email`, `password`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$LRHpw928Td0i3NMWuttwBu2qJzwMe/rN9g3CQCMZ2gsIN3MnfBu5W', 1, '2023-10-27 02:11:41', '2023-10-27 02:11:41', NULL),
(10, 'user@gmail.com', '$2y$10$GFeCzuRV6IfnokY4qCFmQeL0E.AmuTVKEwqM5syc6VkhyAdfW4XvK', 2, '2024-06-30 07:42:15', '2025-06-18 12:16:18', NULL),
(11, 'user1@gmail.com', '$2y$10$aKjDs9zkHjZps94ptKFqlecpSN3.ETJrvPRYkVfUVHWV6ZbTwqQNC', 2, '2024-09-14 07:39:30', '2024-09-14 07:39:30', NULL);

-- --------------------------------------------------------
-- Cấu trúc bảng cho bảng `vp_comments`
-- --------------------------------------------------------
CREATE TABLE `vp_comments` (
  `com_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `com_email` varchar(255) NOT NULL,
  `com_name` varchar(255) NOT NULL,
  `com_content` varchar(255) NOT NULL,
  `com_status` int(11) NOT NULL DEFAULT 0,
  `com_product` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `vp_comments_com_product_foreign` (`com_product`),
  KEY `vp_comments_user_id_foreign` (`user_id`),
  CONSTRAINT `vp_comments_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE,
  CONSTRAINT `vp_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vp_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18;

INSERT INTO `vp_comments` (`com_id`, `com_email`, `com_name`, `com_content`, `com_status`, `com_product`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'user2@gmail.com', 'user 2', 'bánh rất ngon', 1, 296, 10, '2025-06-13 06:19:52', '2025-06-13 06:20:07', NULL);

-- --------------------------------------------------------
-- Cấu trúc bảng cho bảng `vp_favourite_products`
-- --------------------------------------------------------
CREATE TABLE `vp_favourite_products` (
  `favourite_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `favou_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`favourite_id`),
  KEY `vp_favourite_products_user_id_foreign` (`user_id`),
  KEY `vp_favourite_products_favou_product_foreign` (`favou_product`),
  CONSTRAINT `vp_favourite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vp_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vp_favourite_products_favou_product_foreign` FOREIGN KEY (`favou_product`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





