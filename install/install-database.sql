-- Database creation
DROP DATABASE IF EXISTS hiringtest;
CREATE DATABASE hiringtest;

USE hiringtest;

-- Tables installation 
CREATE TABLE IF NOT EXISTS categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    parent_id INT UNSIGNED,
    name VARCHAR(255),
    FOREIGN KEY (parent_id) REFERENCES categories(id)
);

CREATE TABLE IF NOT EXISTS currencies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code CHAR(3),
    format CHAR(3)
);

CREATE TABLE IF NOT EXISTS countries (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    code CHAR(2),
    currency_id INT UNSIGNED,
    FOREIGN KEY (currency_id) REFERENCES currencies(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    category_id INT UNSIGNED,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE IF NOT EXISTS prices (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    country_id INT UNSIGNED,
    product_id INT UNSIGNED,
    price INT UNSIGNED,
    FOREIGN KEY (country_id) REFERENCES countries(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE IF NOT EXISTS stocks (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quantity INT UNSIGNED,
    product_id INT UNSIGNED,
    FOREIGN KEY (product_id) REFERENCES products(id)
);