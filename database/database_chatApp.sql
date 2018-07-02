SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `messages` (`id`, `user`, `message`, `createdAt`) VALUES
(1, 'mehdi', 'Hey guys', '2018-07-02 13:17:01'),
(2, 'mehdi', 'Whats up ?', '2018-07-02 13:17:10'),
(3, 'hamza', 'hey', '2018-07-02 13:17:20'),
(4, 'hamza', 'just chilling', '2018-07-02 13:17:30'),
(5, 'jon', 'same here', '2018-07-02 13:17:40'),
(6, 'jon', 'any plans for the day?', '2018-07-02 13:17:50');


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `connected` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `username`, `password`, `connected`) VALUES
(1, 'mehdi', 'd8932fd49bb05ff0670c3545d15547cb7baaf208', 1),
(2, 'hamza', 'b6737fc7368bbc970124bb2cd5c8dfc75b283432', 1),
(3, 'jon', '44f878afe53efc66b76772bd845eb65944ed8232', 1);
COMMIT;

