--   DDL > CREATE TABLE   ------------------------------------------------------------------------------- 
CREATE DATABASE IF NOT EXISTS bobs-car-rental;

CREATE TABLE customer (
  customerID int(100) NOT NULL AUTO_INCREMENT, 
  username VARCHAR(100), 
  email VARCHAR(100), 
  password VARCHAR(100), 
  user_level int NOT NULL DEFAULT 0, 
  PRIMARY KEY (customerID)
);
CREATE TABLE car (
  carID int(100) NOT NULL AUTO_INCREMENT, 
  make VARCHAR(100) NOT NULL, 
  model VARCHAR(100) NOT NULL, 
  year year(4), 
  price decimal(10, 2) NOT NULL, 
  image VARCHAR(100) NOT NULL, 
  PRIMARY KEY (carID)
);
CREATE table rental (
  rentID int(100) NOT NULL AUTO_INCREMENT, 
  startDate datetime, 
  endDate datetime, 
  customerID int(100) NOT NULL, 
  carID int(100) NOT NULL, 
  FOREIGN KEY (carID) REFERENCES car (carID) ON DELETE CASCADE ON UPDATE CASCADE, 
  FOREIGN KEY (customerID) REFERENCES customer (customerID) ON DELETE CASCADE ON UPDATE CASCADE, 
  PRIMARY KEY (rentID)
);
CREATE table payment (
  payID int(100) NOT NULL AUTO_INCREMENT, 
  cardNumber VARCHAR(100), 
  expirationDate VARCHAR(100), 
  cvcNumber VARCHAR(100), 
  customerID int(100), 
  rentID int(100) NOT NULL, 
  FOREIGN KEY (rentID) REFERENCES rental (rentID) ON DELETE CASCADE ON UPDATE CASCADE, 
  FOREIGN KEY (customerID) REFERENCES customer (customerID) ON DELETE CASCADE ON UPDATE CASCADE, 
  PRIMARY KEY (payID)
);




