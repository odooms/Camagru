CREATE TABLE users_table (
    `user_id` INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_email` varchar(255) NOT NULL,
    `user_username` varchar(255) NOT NULL,
    `user_password` varchar(255) NOT NULL
);

CREATE TABLE Gallery_table (
    `image.id` INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `image.ower` varchar(255) NOT NULL,
    `image.source` varchar(255) NOT NULL,
    `comment.id` varchar(255) NOT NULL
);

CREATE TABLE comments_table (
    `comments.id` INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `comments.text` varchar(255) NOT NULL
);

