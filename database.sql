CREATE TABLE `users`
(
    `id`         int(11) NOT NULL AUTO_INCREMENT,
    `username`   varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `email`      varchar(255) NOT NULL,
    `phone`      varchar(255)          DEFAULT NULL,
    `balance`    int(11) DEFAULT 0,
    `role`       varchar(45)  NOT NULL DEFAULT 'member',
    `ban`        tinyint(4) DEFAULT 0,
    `created_at` datetime     NOT NULL DEFAULT current_timestamp(),
    `updated_at` datetime     NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`),
    UNIQUE KEY `email_UNIQUE` (`email`),
    UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;