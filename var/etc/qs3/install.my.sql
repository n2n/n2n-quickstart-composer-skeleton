
CREATE TABLE IF NOT EXISTS `blog_article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `lead` varchar(255) NOT NULL,
  `content_html` text,
  `url_part` varchar(128) NOT NULL,
  `online` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `blog_article` (`id`, `title`, `lead`, `content_html`, `url_part`, `online`) VALUES
(1, 'n2n ist OpenSource', 'HNM unterstützt OpenSource und gibt n2n als OpenSource frei.', '<p>Als Lizenz w&auml;hlt HNM die <strong>LGPL Lizenz</strong>.</p>\r\n', 'n2n-ist-open-source', 1),
(2, 'Rocket erlaubt embeded Objects!', 'In einem Screen mehrere Objekte bearbeiten - mit Rocket ist das möglich!', '<p>Mit dem CMS n2n Rocket ist es m&ouml;glich, mehrere Objekte in einem Screen zu bearbeiten.</p>\r\n\r\n<p>Probieren Sie diese tolle Eigenschaft noch heute!</p>\r\n', 'rocket-erlaubt-embeded-objects', 1),
(3, 'n2n-Rocket: Das CMS von n2n', 'n2n ist ein PHP Framework. n2n-Rocket das passende Framework dazu.', '<p>Das Vorteile von Rocket sind:</p>\r\n\r\n<ul>\r\n	<li>einfache Bedienung</li>\r\n	<li>l&uuml;ckenlose Integration der Objekte des Frameworks</li>\r\n	<li>tolle Performance dank vielf&auml;lltigen Caching-M&ouml;glichkeiten</li>\r\n</ul>\r\n\r\n<p>Testen Sie n2n-Rocket noch heute!</p>\r\n', 'n2n-rocket-das-cms-von-n2n', 1);

DROP TABLE IF EXISTS `blog_article_categories`;
CREATE TABLE IF NOT EXISTS `blog_article_categories` (
  `blog_article_id` int(10) UNSIGNED NOT NULL,
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`blog_article_id`,`blog_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `blog_article_categories` (`blog_article_id`, `blog_category_id`) VALUES
(1, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1);

DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `blog_category` (`id`, `name`) VALUES
(1, 'n2n'),
(2, 'rocket');

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_article_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
