CREATE DATABASE mydatabase;

USE mydatabase;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(50)
);

CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    content TEXT,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (name, email) VALUES 
('John Doe', 'johndoe@example.com'),
('Jane Doe', 'janedoe@example.com'),
('Bob Smith', 'bobsmith@example.com'),
('Alice Johnson', 'alicejohnson@example.com');

INSERT INTO posts (user_id, title, content, created_at) VALUES 
(1, 'First Post', 'Lorem ipsum dolor sit amet.', '2022-01-01 12:00:00'),
(1, 'Second Post', 'Consectetur adipiscing elit.', '2022-02-01 12:00:00'),
(2, 'Third Post', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2022-03-01 12:00:00'),
(3, 'Fourth Post', 'Ut enim ad minim veniam.', '2022-04-01 12:00:00'),
(3, 'Fifth Post', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2022-05-01 12:00:00'),
(4, 'Sixth Post', 'Excepteur sint occaecat cupidatat non proident.', '2022-06-01 12:00:00');