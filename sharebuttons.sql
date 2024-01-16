/*
 * (c) 2019: 975L <contact@975l.com>
 * (c) 2019: Laurent Marquet <laurent.marquet@laposte.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

SET FOREIGN_KEY_CHECKS=0;

-- --------------------------------------
-- Table structure for sharebuttons
-- --------------------------------------
-- DROP TABLE IF EXISTS `sharebuttons`;
CREATE TABLE `sharebuttons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `share` varchar(24) NULL,
  `url` varchar(255) NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
