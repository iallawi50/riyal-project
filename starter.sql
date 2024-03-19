CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
  `mobile` varchar(10) NOT NULL UNIQUE,
  `password` text NOT NULL,
  `is_store` BOOLEAN NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `banks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `iban` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `transactions` (`id` INT NOT NULL AUTO_INCREMENT , `seller_id` INT NOT NULL , `buyer_id` INT NOT NULL , `invoice_number` INT NOT NULL, `amount` FLOAT NOT NULL , `status` INT NOT NULL , `bill_id` INT NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `cancelationreason` (`id` INT NOT NULL AUTO_INCREMENT , `transaction_id` INT NOT NULL , `reason` TEXT NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `credit` (`id` INT NOT NULL AUTO_INCREMENT , `amount` FLOAT NOT NULL , `user_id` INT NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `storeinformation` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `link` TEXT NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `invoice` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `seller_id` INT NOT NULL,
    `invoice_number` INT NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `product_price` INT NOT NULL,
    `buyer_mobile` VARCHAR(10) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
