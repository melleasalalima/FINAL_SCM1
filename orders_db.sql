-- Create DB Table
CREATE TABLE orders (
o_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT(11),
o_name VARCHAR(255),
o_email VARCHAR (255),
o_tel VARCHAR (255),
o_address VARCHAR (255),
o_city VARCHAR (255),
o_province VARCHAR (255),
o_postal VARCHAR (255),
o_country VARCHAR (100),
o_landmark VARCHAR (255),
o_payment VARCHAR (255),
o_paymentimg VARCHAR (1000),
total_price VARCHAR (255),
total_product VARCHAR (255)
);