CREATE TABLE `subcategories`
(
    `id` int NOT NULL AUTO_INCREMENT,
    `parent_id` int NULL,
    `name` varchar(255) NOT NULL,

    PRIMARY KEY (`id`)
);
