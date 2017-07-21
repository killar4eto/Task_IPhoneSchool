/*Users table*/
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `password` TEXT NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` TEXT NOT NULL,
  `languageCode` varchar(2) NOT NULL DEFAULT 'en',
  `registredOn` timestamp not null default current_timestamp on update current_timestamp,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*Tasks*/
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(80) NOT NULL,
  `created_on` timestamp not null default current_timestamp on update current_timestamp,
  `obtained_by` int(11) NOT NULL,
  `requirements` TEXT NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT "In progress",
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*Notifications*/
CREATE TABLE IF NOT EXISTS `categories`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(80) NOT NULL,
  `modified` timestamp not null default current_timestamp on update current_timestamp,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*About user*/
CREATE TABLE IF NOT EXISTS `user_about`(
  `userID` varchar(80) NOT NULL,
  `location` varchar(80) NOT NULL,
  `skills` TEXT NULL,
  `birthday` datetime NOT NULL,
  `modified` timestamp not null default current_timestamp on update current_timestamp,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;