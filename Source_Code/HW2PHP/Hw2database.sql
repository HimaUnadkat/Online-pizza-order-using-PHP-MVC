
DROP DATABASE IF EXISTS Hw2Pizza;
CREATE DATABASE Hw2Pizza;
USE Hw2Pizza;

CREATE TABLE orders (
  o_id INT(11)        NOT NULL   AUTO_INCREMENT,
  o_pizzasize varchar(20)        NOT NULL,
  
  o_pizzatype  VARCHAR(25)   NOT NULL,
o_extracheese          VARCHAR(5)   NOT NULL,
o_quantity Int(10) NOT NULL,
o_finalprice Int(10) NOT NULL,
/*o_total        decimal(10,2)   NOT NULL,*/
PRIMARY KEY (o_id)
);

CREATE TABLE customer (
  c_id        INT(11)        NOT NULL   AUTO_INCREMENT,
o_id        INT(11)        NOT NULL,
  c_fname      varchar(20)        NOT NULL,
  c_lname         VARCHAR(25)   NOT NULL,
  c_address          VARCHAR(50)   NOT NULL,
c_email varchar(25) NOT NULL,
  c_phone         vatchar(15)   NOT NULL,
  c_salestype        VARCHAR(10)   NOT NULL,
  c_creditcardtype       VARCHAR(25)   ,
  c_creditcardno         VARCHAR(25) ,
c_randomnumber VARCHAR(25) NOT NULL,

  PRIMARY KEY (c_id),
FOREIGN KEY (o_id) REFERENCES orders(o_id)
);


select * from `Hw2Pizza`.customer;
select * from `Hw2Pizza`.orders;

