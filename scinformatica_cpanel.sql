/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : scinformatica_cpanel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-23 16:37:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('escolar','empresa','personal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for marca
-- ----------------------------
DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of marca
-- ----------------------------
INSERT INTO `marca` VALUES ('1', 'hp');
INSERT INTO `marca` VALUES ('2', 'lexmarck');
INSERT INTO `marca` VALUES ('3', 'dell');
INSERT INTO `marca` VALUES ('4', 'compaq');
INSERT INTO `marca` VALUES ('5', 'lenovo');
INSERT INTO `marca` VALUES ('6', 'generico');
INSERT INTO `marca` VALUES ('7', 'scinformatica');
INSERT INTO `marca` VALUES ('8', 'servicio de laboratorio');
INSERT INTO `marca` VALUES ('9', 'soporte on  site');
INSERT INTO `marca` VALUES ('10', 'servicio laboratorio');
INSERT INTO `marca` VALUES ('11', 'soporte remoto');
INSERT INTO `marca` VALUES ('12', 'servicio');
INSERT INTO `marca` VALUES ('13', 'asistencia a distancia');
INSERT INTO `marca` VALUES ('14', 'ventas');
INSERT INTO `marca` VALUES ('15', 'soporte informatico mes');
INSERT INTO `marca` VALUES ('16', 'xerox');
INSERT INTO `marca` VALUES ('17', 'epson');
INSERT INTO `marca` VALUES ('18', 'samsung');
INSERT INTO `marca` VALUES ('19', 'garantia');
INSERT INTO `marca` VALUES ('20', 'actualizacion web');
INSERT INTO `marca` VALUES ('21', 'nec');
INSERT INTO `marca` VALUES ('22', 'toshiba ');
INSERT INTO `marca` VALUES ('23', 'olidata');
INSERT INTO `marca` VALUES ('24', 'okidata');
INSERT INTO `marca` VALUES ('25', 'sony');
INSERT INTO `marca` VALUES ('26', 'sentey');
INSERT INTO `marca` VALUES ('27', 'packard bell');
INSERT INTO `marca` VALUES ('28', 'ricoh');
INSERT INTO `marca` VALUES ('29', 'lg');
INSERT INTO `marca` VALUES ('30', 'brother');
INSERT INTO `marca` VALUES ('31', 'mantencion en contrato');
INSERT INTO `marca` VALUES ('32', 'acer');
INSERT INTO `marca` VALUES ('33', 'fujitel');
INSERT INTO `marca` VALUES ('34', 'hitachi');
INSERT INTO `marca` VALUES ('35', 'panasonic');
INSERT INTO `marca` VALUES ('36', 'apc');
INSERT INTO `marca` VALUES ('37', 'canon');
INSERT INTO `marca` VALUES ('38', 'brandt');
INSERT INTO `marca` VALUES ('39', 'g. comercial ');
INSERT INTO `marca` VALUES ('40', 'comercial terreno');
INSERT INTO `marca` VALUES ('41', 'viewsonic');
INSERT INTO `marca` VALUES ('42', 'soporte emergencia');
INSERT INTO `marca` VALUES ('43', 'kyocera');
INSERT INTO `marca` VALUES ('44', 'seagate');
INSERT INTO `marca` VALUES ('45', 'proy. instalacion proyectores');
INSERT INTO `marca` VALUES ('46', 'redes datos');
INSERT INTO `marca` VALUES ('47', 'nota credito');
INSERT INTO `marca` VALUES ('48', 'servicio mantencion impresoras');
INSERT INTO `marca` VALUES ('49', 'cisco');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('41', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('42', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('43', '2017_02_10_124625_create_sessions_table', '1');
INSERT INTO `migrations` VALUES ('44', '2017_02_20_165101_create_user_parameterizations_table', '1');
INSERT INTO `migrations` VALUES ('45', '2017_02_20_165238_create_user_customizations_table', '1');
INSERT INTO `migrations` VALUES ('46', '2017_03_09_132634_create_clientes_table', '1');
INSERT INTO `migrations` VALUES ('47', '2017_03_20_100755_entrust_setup_tables', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('JsC0PzTLtNpNBsGhFLILrF9IkgH80cA2S7cpeCwT', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoibUpQU21WNjRYUmV0SHozRk1iVm5BMFFXWDhZQU91R1ZFcGJTNEk5dSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL2xvY2FsaG9zdC9zY2luZm9ybWF0aWNhX2NwYW5lbC9wdWJsaWMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MDoiaHR0cDovL2xvY2FsaG9zdC9zY2luZm9ybWF0aWNhX2NwYW5lbC9wdWJsaWMvbWFyY2EiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo1OiJ0aXRsZSI7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjEwOiJicmVhZENydW1iIjtzOjE1OiJhcnRpY3Vsb3MuaW5kZXgiO3M6MTc6ImJyZWFkQ3J1bWJEeW5hbWljIjtPOjExOiJDcGFuZWxcVXNlciI6MjU6e3M6MTE6IgAqAGZpbGxhYmxlIjthOjQ6e2k6MDtzOjQ6Im5hbWUiO2k6MTtzOjU6ImVtYWlsIjtpOjI7czo4OiJwYXNzd29yZCI7aTozO3M6MTE6ImRlc2NyaXB0aW9uIjt9czo5OiIAKgBoaWRkZW4iO2E6Mjp7aTowO3M6ODoicGFzc3dvcmQiO2k6MTtzOjE0OiJyZW1lbWJlcl90b2tlbiI7fXM6MTM6IgAqAGNvbm5lY3Rpb24iO047czo4OiIAKgB0YWJsZSI7TjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YTo5OntzOjI6ImlkIjtpOjQ7czo0OiJuYW1lIjtzOjE4OiJQYXRyaWNpbyBSb2RyaWd1ZXoiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjA6IiI7czo1OiJlbWFpbCI7czoyNToic3RlY25pY29Ac2NpbmZvcm1hdGljYS5jbCI7czozOiJpbWciO047czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEwJFFyV0dSWGlvZ0NCZnJ3OTJzazQ3Mi5jakc1eVZ4OUR3cWtGVTZEeUJOQVFibmFJaHVRZVI2IjtzOjE0OiJyZW1lbWJlcl90b2tlbiI7TjtzOjEwOiJjcmVhdGVkX2F0IjtOO3M6MTA6InVwZGF0ZWRfYXQiO047fXM6MTE6IgAqAG9yaWdpbmFsIjthOjk6e3M6MjoiaWQiO2k6NDtzOjQ6Im5hbWUiO3M6MTg6IlBhdHJpY2lvIFJvZHJpZ3VleiI7czoxMToiZGVzY3JpcHRpb24iO3M6MDoiIjtzOjU6ImVtYWlsIjtzOjI1OiJzdGVjbmljb0BzY2luZm9ybWF0aWNhLmNsIjtzOjM6ImltZyI7TjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkUXJXR1JYaW9nQ0Jmcnc5MnNrNDcyLmNqRzV5Vng5RHdxa0ZVNkR5Qk5BUWJuYUlodVFlUjYiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO047czoxMDoidXBkYXRlZF9hdCI7Tjt9czo4OiIAKgBjYXN0cyI7YTowOnt9czo4OiIAKgBkYXRlcyI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjk6IgAqAGV2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fXM6MjA6IgAqAHJlbWVtYmVyVG9rZW5OYW1lIjtzOjE0OiJyZW1lbWJlcl90b2tlbiI7fXM6NToidGl0bGUiO3M6MjQ6IkludmVudGFyaW8gZGUgQXJ0w61jdWxvcyI7fQ==', '1498249960');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$Dmf4VUCBWWcB5CM.hJkj9eY4Qsbke.7StBZZwCc1ColDr3NlrQ.jC',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Rosmar Blasquez', 'Programador Analista', 'desarrollo@scinformatica.cl', null, '$2y$10$Qrdpt//cvgFOlwqw3IIru.QwGr7lB.8flZH8WVxsJ/3mLZxqHeAZW', 'fOr1wr43n0C96gpM04tm9bHWPPplrajKljMZHM2JKlul3VcUavFHbtqUK6pl', null, '2017-03-17 17:30:24');
INSERT INTO `users` VALUES ('2', 'Tania Gonzalez', 'Finanzas', 'finanzas@scinformatica.cl', null, '$2y$10$UcjFK7IOYMYXqd8dk.pXwetoBCxD9dBzLCiXnNXpSaWu8b5j6b8FW', null, null, null);
INSERT INTO `users` VALUES ('3', 'Raul Moya', 'Jefe de Proyectos y Servicios', 'rmoya@scinformatica.cl', null, '$2y$10$r1WdzuuJ1vyc.5K91BQuJO6HJkfp12gLz4pc2.NhsnsqyQ4TkS2Sy', null, null, null);
INSERT INTO `users` VALUES ('4', 'Patricio Rodriguez', 'Soporte TI', 'stecnico@scinformatica.cl', null, '$2y$10$QrWGRXiogCBfrw92sk472.cjG5yVx9DwqkFU6DyBNAQbnaIhuQeR6', null, null, '2017-06-23 16:12:06');
INSERT INTO `users` VALUES ('5', 'Alessandra Arias', 'Supervisora de Ventas', 'informatica@scinformatica.cl', null, '$2y$10$bPuk8zOj9QOp6XjVAy1LCOXwtoDan8nq1PpKxuhMWjjobB1kRKlU2', null, null, '2017-03-16 13:00:40');
INSERT INTO `users` VALUES ('6', 'Maria Lozada', 'Ejecutiva de Ventas', 'ventas03@scinformatica.cl', null, '$2y$10$JCMZarHhmNjt4IaG8HTpiOJsONlFmwG27UDoWEfaseDJrjnAIs9YK', null, null, '2017-03-17 17:27:38');

-- ----------------------------
-- Table structure for user_customizations
-- ----------------------------
DROP TABLE IF EXISTS `user_customizations`;
CREATE TABLE `user_customizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_customizations
-- ----------------------------

-- ----------------------------
-- Table structure for user_parameterizations
-- ----------------------------
DROP TABLE IF EXISTS `user_parameterizations`;
CREATE TABLE `user_parameterizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_parameterizations
-- ----------------------------
