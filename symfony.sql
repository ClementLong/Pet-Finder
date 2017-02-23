/*
 Navicat Premium Data Transfer

 Source Server         : Symfony
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : 127.0.0.1
 Source Database       : symfony

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 02/23/2017 23:04:47 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fos_user`
-- ----------------------------
DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `fos_user`
-- ----------------------------
BEGIN;
INSERT INTO `fos_user` VALUES ('1', 'TestUser', 'testuser', 'test@test.fr', 'test@test.fr', '1', null, '$2y$13$NlunWZyUl25TtpFHzLooouz2MNIgB.37DjDucjlfIkB8wBNTma.NG', '2017-02-23 22:26:45', null, null, 'a:0:{}'), ('2', 'nico0290', 'nico0290', 'catellsnicolas@gmail.com', 'catellsnicolas@gmail.com', '1', null, '$2y$13$uisC8mekKmGdMHEh76P.3.Yzg63EZ7yvZs4ihG90JjSZl9cjrWwLu', '2017-02-23 22:33:52', null, null, 'a:0:{}'), ('3', 'pauloDansLauto', 'paulodanslauto', 'paulborenzstein@gmail.com', 'paulborenzstein@gmail.com', '1', null, '$2y$13$eOzncOmHcdxMalEsexwdj.FfdeBiLMiBB6yf/oVPoWoJ5uK7s5NRO', '2017-02-23 22:37:33', null, null, 'a:0:{}'), ('4', 'ClementMolo', 'clementmolo', 'clementlong@gmail.com', 'clementlong@gmail.com', '1', null, '$2y$13$WVC.iBR8xh4I35dOqkgsHOv5IbQQSEhgmA2940C3IFwK9NuKsY.J6', '2017-02-23 22:41:26', null, null, 'a:0:{}'), ('5', 'totyqlf', 'totyqlf', 'thomashoogstoel@gmail.com', 'thomashoogstoel@gmail.com', '1', null, '$2y$13$C.4304cxgONRJjmvWVkzGeMnzskNlAQGig/4j2KSTylXIzpxzdfIW', '2017-02-23 22:43:58', null, null, 'a:0:{}'), ('6', 'hugoboss', 'hugoboss', 'hugoquincey@gmail.com', 'hugoquincey@gmail.com', '1', null, '$2y$13$/jLaIeFpd1.YVW.YmNB0Z.GzXR0UgHZQOgYY3DgBaDWYko1S5uJ2e', '2017-02-23 22:46:27', null, null, 'a:0:{}'), ('7', 'adriri', 'adriri', 'adrienbetoliere@gmail.com', 'adrienbetoliere@gmail.com', '1', null, '$2y$13$.VuKfIBcG0RdDHcrsN70i.IuTRkn2eNk9VQV3X704iCKRBZ7G19BC', '2017-02-23 22:50:25', null, null, 'a:0:{}'), ('8', 'vousnepasserezpas', 'vousnepasserezpas', 'gandalf@hobbit.fr', 'gandalf@hobbit.fr', '1', null, '$2y$13$7goRlR7NIYUycyoJUj5fduLhlalWj4CVwVSryHgichZ38TgGlhgG.', '2017-02-23 22:54:44', null, null, 'a:0:{}'), ('9', 'jeandu45', 'jeandu45', 'jeanvaljean@gmail.fr', 'jeanvaljean@gmail.fr', '1', null, '$2y$13$dagam.ga9MeYLtNYOgqYTuINYFKAy48kWCxaWj60om5ftZES/MWV6', '2017-02-23 22:58:11', null, null, 'a:0:{}');
COMMIT;

-- ----------------------------
--  Table structure for `found`
-- ----------------------------
DROP TABLE IF EXISTS `found`;
CREATE TABLE `found` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_found` date NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `found`
-- ----------------------------
BEGIN;
INSERT INTO `found` VALUES ('1', 'France', 'Paris', '44, boulevard hausseman', 'Wesley Reid', '2016-11-16', 'Chat de race Himalayen, jeune de 2 ans, il a une tache blanche sur la patte arrière gauche', 'Himalayan-cat-2.jpg', '2017-02-23 22:32:50', '1'), ('2', 'France', 'Brest', '5 Rue Louis Jouvet', 'Thomas Hoogstoel', '2017-01-09', 'Chat de race Siamoise', 'fr_5_0196.jpg', '2017-02-23 22:45:54', '5'), ('3', 'France', 'Bordeaux', 'Rue Georges Bonnac', 'Adrien Betoliere', '2016-08-07', 'Chat de race maine-coon, une chose est sure il pese son poids', 'maine-coon.jpg', '2017-02-23 22:52:47', '7'), ('4', 'France', 'Besancon', '5 Rue Sauria', 'Jean Maurienne', '2015-10-11', 'Bebe chat, trop mignon, j\'espere personne ne se manifestera', 'photo-petit-chaton-mignon.jpg', '2017-02-23 22:59:53', '9');
COMMIT;

-- ----------------------------
--  Table structure for `lost`
-- ----------------------------
DROP TABLE IF EXISTS `lost`;
CREATE TABLE `lost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_lost` date NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `lost`
-- ----------------------------
BEGIN;
INSERT INTO `lost` VALUES ('1', 'Kito', 'Nicolas Castells', 'France', 'Freyming-Merlebach', '34, rue de la frontiere', '2017-01-09', 'Chat de race Persan, vieux de 7 ans, avec un peu de surpoids', 'jardin-persan.jpg', '2017-02-23 22:36:33', '2'), ('2', 'Chauvage', 'Paul Borenzstein', 'France', 'Le Raincy', '30 Allée de Bellevue', '2017-02-06', 'Chat de gouttiere, roux et blanc', 'gouttiere.jpg', '2017-02-23 22:40:29', '3'), ('3', 'Rototo', 'Clement Long', 'France', 'Montreuil', '14 Rue Girard', '2016-11-14', 'Jeune chat de gouttiere, roux et blanc', '7-raisons-jouer-chat.jpg', '2017-02-23 22:43:14', '4'), ('4', 'Tigrou', 'Hugo Quincey', 'France', 'Marseille', '7 Rue Louis Grobet', '2016-05-15', 'Chat Bengal, ressemble a un tigre mais en moins violent', 'Zenyatta3avril15E.JPG', '2017-02-23 22:49:07', '6'), ('5', 'Frodon', 'Gandalf', 'France', 'Terre du milieu', 'a coté des rochers de la foret', '2012-12-21', 'Perdu mon Frodon, si vous le croisez, ramenez juste l\'anneau', '1fbdb31d.jpg', '2017-02-23 22:56:55', '8');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
