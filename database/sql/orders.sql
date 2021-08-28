CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `master_id` bigint(20) NOT NULL,
  `merchant_id` bigint(20) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_fee` FLOAT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` FLOAT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fee` FLOAT COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci