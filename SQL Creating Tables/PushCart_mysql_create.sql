CREATE TABLE `roles` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` int NOT NULL AUTO_INCREMENT,
	`fullname` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`role_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`image` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`category_id` int NOT NULL,
	`price` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `transactions` (
	`id` int NOT NULL AUTO_INCREMENT,
	`created_date` TIMESTAMP NOT NULL,
	`transaction_code` varchar(255) NOT NULL UNIQUE,
	`total` FLOAT NOT NULL,
	`user_id` int NOT NULL,
	`payment_mode_id` int NOT NULL,
	`status_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payment_modes` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `statuses` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `product_transactions` (
	`id` int NOT NULL AUTO_INCREMENT,
	`transaction_id` int NOT NULL,
	`product_id` int NOT NULL,
	`quantity` int NOT NULL,
	`price` FLOAT NOT NULL,
	`subtotla` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk1` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes`(`id`);

ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk2` FOREIGN KEY (`status_id`) REFERENCES `statuses`(`id`);

ALTER TABLE `product_transactions` ADD CONSTRAINT `product_transactions_fk0` FOREIGN KEY (`transaction_id`) REFERENCES `transactions`(`id`);

ALTER TABLE `product_transactions` ADD CONSTRAINT `product_transactions_fk1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`);

