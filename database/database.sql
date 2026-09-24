CREATE DATABASE IF NOT EXISTS mini_riset_sql_injection;

USE mini_riset_sql_injection;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

INSERT INTO users (username, email) VALUES
('andi', 'andi@gmail.com'),
('budi', 'budi@gmail.com'),
('citra', 'citra@gmail.com'),
('dina', 'dina@gmail.com'),
('eko', 'eko@gmail.com');