
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `value` DECIMAL(10, 2) NOT NULL,
  `category` VARCHAR(255) NOT NULL,
  `discount` DECIMAL(10, 2) NOT NULL,
  `image` VARCHAR(255) NOT NULL
);

INSERT INTO `products` (name, value, category, discount, image)
VALUES 
  (1, 'Livro 1', 103.43, 'destaque', 78.80, 'image/book-1.png'),
  (2, 'Livro 2', 99.43, 'destaque', 67.80, 'image/book-2.png'),
  (3, 'Livro 3', 109.43, 'destaque', 87.80, 'image/book-3.png'),
  (4, 'Livro 4', 99.43, 'destaque', 57.80, 'image/book-4.png'),
  (5, 'Livro 5', 66.43, 'destaque', 37.80, 'image/book-5.png'),
  (6, 'Livro 6', 99.43, 'destaque', 77.89, 'image/book-6.png'),
  (7, 'Livro 7', 112.43, 'destaque', 88.89, 'image/book-7.png'),
  (8, 'Livro 8', 77.43, 'destaque', 55.77, 'image/book-8.png'),
  (9, 'Livro 9', 154.22, 'destaque', 99.77, 'image/book-9.png'),
  (10, 'Livro 10', 65.11, 'destaque', 47.22, 'image/book-10.png'),
  (11, 'Livro 1', 65.11, 'chegados', 0, 'image/book-1.png'),
  (12, 'Livro 2', 45.78, 'chegados', 0, 'image/book-2.png'),
  (13, 'Livro 3', 78.90, 'chegados', 0, 'image/book-3.png'),
  (14, 'Livro 4', 32.50, 'chegados', 0, 'image/book-4.png'),
  (15, 'Livro 5', 92.40, 'chegados', 0, 'image/book-5.png'),
  (16, 'Livro 6', 54.75, 'chegados', 0, 'image/book-6.png'),
  (17, 'Livro 7', 36.20, 'chegados', 0, 'image/book-7.png'),
  (18, 'Livro 8', 107.60, 'chegados', 0, 'image/book-8.png'),
  (19, 'Livro 9', 81.30, 'chegados', 0, 'image/book-9.png'),
  (20, 'Livro 10', 69.99, 'chegados', 0, 'image/book-10.png');

CREATE TABLE IF NOT EXISTS `recovery_tokens` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL
);

  CREATE TABLE IF NOT EXISTS orders (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_code` VARCHAR(255) NOT NULL,
    `customer_email` VARCHAR(255) NOT NULL,
    `amount` DECIMAL(10, 2) NOT NULL,
    `product` VARCHAR(255) NOT NULL,
    `order_date` DATETIME NOT NULL,
    `status` VARCHAR(50) DEFAULT 'pending'
)
