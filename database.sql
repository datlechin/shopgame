CREATE TABLE IF NOT EXISTS `users`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `name`        varchar(255)          DEFAULT NULL,
    `username`    varchar(255) NOT NULL,
    `password`    varchar(255)          DEFAULT NULL,
    `email`       varchar(255) NOT NULL,
    `phone`       varchar(255)          DEFAULT NULL,
    `facebook_id` varchar(255)          DEFAULT NULL,
    `balance`     int(11)               DEFAULT 0,
    `role`        varchar(45)  NOT NULL DEFAULT 'user',
    `lock`        tinyint(4)            DEFAULT 1,
    `created_at`  datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`),
    UNIQUE KEY `email_UNIQUE` (`email`),
    UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `transfers`
(
    `id`           int  NOT NULL AUTO_INCREMENT,
    `user_id`      int  NOT NULL,
    `recipient_id` int  NOT NULL,
    `amount`       int  NOT NULL,
    `description`  text NULL,
    `status`       int  NOT NULL,
    `created_at`   datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at`   datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `transfers_users_id_fk` (`user_id`),
    KEY `transfers_users_id_fk_2` (`recipient_id`),
    CONSTRAINT `transfers_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    CONSTRAINT `transfers_users_id_fk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `transactions`
(
    `id`          int      NOT NULL AUTO_INCREMENT,
    `user_id`     int      NOT NULL,
    `trade_type`  int      NOT NULL,
    `amount`      int      NOT NULL,
    `balance`     int      NOT NULL,
    `description` text     NULL,
    `status`      int      NOT NULL,
    `created_at`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `transactions_users_id_fk` (`user_id`),
    CONSTRAINT `transactions_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `charges`
(
    `id`              int(11)     NOT NULL AUTO_INCREMENT,
    `user_id`         int(11)     NOT NULL,
    `provider`        varchar(45) NOT NULL,
    `telco`           tinytext    NOT NULL,
    `amount`          int(11)  DEFAULT 0,
    `amount_declared` int(11)     NOT NULL,
    `serial`          tinytext    NOT NULL,
    `pin`             tinytext    NOT NULL,
    `request_id`      int(11)     NOT NULL,
    `status`          int(11)  DEFAULT 0,
    `created_at`      datetime DEFAULT current_timestamp(),
    `updated_at`      datetime DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `charges_users_id_fk` (`user_id`),
    CONSTRAINT `charges_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `categories`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `type`        varchar(45)  NOT NULL,
    `name`        varchar(255) NOT NULL,
    `description` text         NULL,
    `image`       text         NULL,
    `slug`        varchar(255) NOT NULL,
    `status`      int          NOT NULL,
    `created_at`  datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `settings`
(
    `id`    int(11)      NOT NULL AUTO_INCREMENT,
    `key`   varchar(255) NOT NULL,
    `value` text         NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `settings` (`key`, value)
VALUES ('title', 'Shopgame'),
       ('keywords', ''),
       ('description', ''),
       ('noticeModal', ''),
       ('banners',
        'https://nick.vn/storage/images/XoBF4ldarS_1623147567.jpg,https://nick.vn/storage/images/lITvp1Ph8r_1623147594.jpg'),
       ('logo', 'https://i.imgur.com/CjCS4eG.png'),
       ('facebook_app_id', ''),
       ('facebook_app_secret', '');

CREATE TABLE IF NOT EXISTS `accounts`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `seller_id`   int(11)      NOT NULL,
    `buyer_id`    int(11)               DEFAULT NULL,
    `category_id` int(11)      NOT NULL,
    `acc_name`    varchar(255) NOT NULL,
    `acc_pass`    varchar(255)          DEFAULT NULL,
    `price`       int(11)      NOT NULL DEFAULT 0,
    `image`       text         NULL,
    `content`     text                  DEFAULT NULL,
    `description` varchar(255)          DEFAULT NULL,
    `status`      int(11)               DEFAULT 1,
    `created_at`  datetime              DEFAULT current_timestamp(),
    `updated_at`  datetime              DEFAULT current_timestamp(),
    `sold_at`     datetime              DEFAULT NULL,
    `checked_at`  datetime              DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;
