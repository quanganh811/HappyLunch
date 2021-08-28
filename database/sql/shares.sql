CREATE TABLE `shares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `master_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `debt` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci