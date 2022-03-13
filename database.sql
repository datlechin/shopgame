CREATE TABLE IF NOT EXISTS `users`
(
    `id`         int(11)      NOT NULL AUTO_INCREMENT,
    `username`   varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `email`      varchar(255) NOT NULL,
    `phone`      varchar(255)          DEFAULT NULL,
    `balance`    int(11)               DEFAULT 0,
    `role`       varchar(45)  NOT NULL DEFAULT 'member',
    `ban`        tinyint(4)            DEFAULT 0,
    `created_at` datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
    `id`          int         NOT NULL AUTO_INCREMENT,
    `user_id`     int         NOT NULL,
    `trade_type`  varchar(50) NOT NULL,
    `amount`      int         NOT NULL,
    `balance`     int         NOT NULL,
    `description` text        NULL,
    `status`      int         NOT NULL,
    `created_at`  datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `transactions_users_id_fk` (`user_id`),
    CONSTRAINT `transactions_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;
