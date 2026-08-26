-- ----------------------------
-- Table structure for np_players
-- ----------------------------
DROP TABLE IF EXISTS `np_players`;
CREATE TABLE `np_players` (
  `timestamp` datetime DEFAULT NULL,
  `players` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for np_psn_games
-- ----------------------------
DROP TABLE IF EXISTS `np_psn_games`;
CREATE TABLE `np_psn_games` (
  `timestamp` datetime NOT NULL,
  `comm_id` varchar(12) NOT NULL,
  `players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for np_ticket_games
-- ----------------------------
DROP TABLE IF EXISTS `np_ticket_games`;
CREATE TABLE `np_ticket_games` (
  `timestamp` datetime NOT NULL,
  `content_id` varchar(19) NOT NULL,
  `players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for np_psn_games_peak
-- ----------------------------
DROP TABLE IF EXISTS `np_psn_games_peak`;
CREATE TABLE `np_psn_games_peak` (
  `comm_id` varchar(12) NOT NULL,
  `timestamp` datetime NOT NULL,
  `players` int(11) NOT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for np_ticket_games_peak
-- ----------------------------
DROP TABLE IF EXISTS `np_ticket_games_peak`;
CREATE TABLE `np_ticket_games_peak` (
  `content_id` varchar(19) NOT NULL,
  `timestamp` datetime NOT NULL,
  `players` int(11) NOT NULL,
  PRIMARY KEY (`content_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;