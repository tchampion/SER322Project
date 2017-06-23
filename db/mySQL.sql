/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Terin, Hajar
 * Created: Jun 18, 2017
 */

CREATE DATABASE IF NOT EXISTS ser322Pantry;

USE ser322Pantry;

CREATE TABLE users(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT NULL);
INSERT INTO users
	(`User ID`, `First Name`, `Last Name`, `Email`, `Password`)
VALUES
	(1, 'Terin', 'Champion', 'terinchampion@gmail.com', 'shesthechamp'),
	(2, 'Nergal', 'Givarkes', 'ngivarke@asu.edu', 'nero'),
	(3, 'Hajar', 'Boughoula', 'hboughou@asu.edu', 'crunchingcode'),
	(4, 'Donald', 'Trump', 'cheeto@whitehouse.gov', 'smallhands'),
	(5, 'Cookie', 'Monster', 'cookie@monster.inc', 'chochip'),
	(6, 'Drake', 'Graham', 'drake@narcissism.org', 'foodbling');
    
CREATE TABLE recipe(
    recipe_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    instructions TEXT NOT NULL,
    servings VARCHAR(20),
    likes INT DEFAULT 0);
INSERT INTO recipe
	(`Recipe ID`, `Title`, `Instructions`, `Servings`, `Likes`)
VALUES
	(1, 'Chocolate Chip Cookies', '1. Buy chocolate chip cookies' + CHAR(13) + '2. Eat them', '12', 2),
	(2, 'Vegan Quiche', '1. Get vegan ingredients' + CHAR(13) + '2. Mix ingredients' + CHAR(13) + '3. bake for 30 minutes', '6', 3),
	(3, 'Berries Smoothie', '1. Get mixed berries' + CHAR(13) + '2. Add banana and yogurt ' + CHAR(13) + '3. Mix in food processor' + CHAR(13) + '4. Serve chilled', '2', 6);
    
CREATE TABLE item(
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50),
    item_name VARCHAR(50) NOT NULL,
    description TEXT,
    amount VARCHAR(20));
INSERT INTO item
	(`Item ID`, `Brand`, `Item Name`, `Description`, `Amount`)
VALUES
	(1, 'Hershey's', 'Chocolate Chips', '', '12 oz'),
	(2, 'Land O'Lakes', 'Butter', '', '4 oz'),
	(3, 'Pillsbury', 'Flour', '', '16 oz'),
	(4, 'Driscoll's', 'Blueberry', '', ''),
	(5, 'Chiquita', 'Banana', '', '1 piece'),
	(6, 'Yoplait', 'Strawberry Yogurt', '', '6 oz');

CREATE TABLE user_recipe(
    user_id INT UNSIGNED NOT NULL REFERENCES users(user_id),
    recipe_id INT UNSIGNED NOT NULL REFERENCES recipe(recipe_id),
    PRIMARY KEY(user_id, recipe_id));
INSERT INTO user_recipe
	(`User ID`, `Recipe ID`)
VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 1),
	(2, 3),
	(3, 1),
	(3, 2),
	(3, 3),
	(4, 2),
	(5, 1),
	(6, 3);
    
CREATE TABLE ingredient(
    recipe_id INT UNSIGNED NOT NULL REFERENCES recipe(recipe_id),
    item_description VARCHAR(50) NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY(recipe_id, item_description));
    
CREATE TABLE pantry(
    pantry_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL REFERENCES users(user_id),
    PRIMARY KEY(pantry_id, user_id));
    
CREATE TABLE pantry_item(
    pantry_id INT UNSIGNED NOT NULL REFERENCES pantry(pantry_id),
    item_id INT UNSIGNED NOT NULL REFERENCES item(item_id),
    amount INT UNSIGNED NOT NULL,
    PRIMARY KEY(pantry_id, item_id));
    
CREATE TABLE shopping_list(
    shopping_list_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL REFERENCES users(user_id),
    PRIMARY KEY(shopping_list_id, user_id));
    
CREATE TABLE shopping_list_item(
    shopping_list_id INT UNSIGNED NOT NULL REFERENCES shopping_list(shopping_list_id),
    item_id INT UNSIGNED NOT NULL REFERENCES item(item_id),
    amount INT UNSIGNED NOT NULL,
    PRIMARY KEY(shopping_list_id, item_id));