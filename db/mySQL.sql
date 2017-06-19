/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Terin
 * Created: Jun 18, 2017
 */

DROP DATABASE IF EXISTS ser322Pantry;
CREATE DATABASE ser322Pantry;

USE ser322Pantry;

CREATE TABLE users(
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT NULL);
    
CREATE TABLE recipe(
    recipe_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    instructions TEXT NOT NULL,
    servings VARCHAR(20),
    likes INT DEFAULT 0);
    
CREATE TABLE item(
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50),
    item_name VARCHAR(50) NOT NULL,
    description TEXT,
    amount VARCHAR(20));

CREATE TABLE user_recipe(
    user_id INT UNSIGNED NOT NULL REFERENCES users(user_id),
    recipe_id INT UNSIGNED NOT NULL REFERENCES recipe(recipe_id),
    PRIMARY KEY(user_id, recipe_id));
    
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