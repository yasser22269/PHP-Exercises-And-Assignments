create database crud_php_assignments;

use crud_php_assignments;

CREATE TABLE `users` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(100),
    `email` varchar(100),
    `mobile` varchar(15),
    PRIMARY KEY  (`id`)
);

