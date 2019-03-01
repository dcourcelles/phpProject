use mysql;
go
drop database IF EXISTS dbDansCoffeeShop;
go
create database dbDansCoffeeShop;
go
use dbDansCoffeeShop;
go

/* -----------------------USERS------------------------- */

Create table tbLogin
(
  userID INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(20),
  password VARCHAR(20),
  pathIm VARCHAR(120),
  PRIMARY KEY(userID)
);
go

delimiter //

Create procedure spCreateUser
(
  _username VARCHAR(20),
  _password VARCHAR(20),
  _pathIM VARCHAR(120)
)
begin
  INSERT INTO tbLogin (username, password, pathIM) VALUES
                      (_username, _password, _pathIM);
end//
go

Create procedure spLogin
(
  _username VARCHAR(20),
  _password VARCHAR(20)
)
begin
  select * from tbLogin
  where username = _username && password = _password;
end//
go

Create procedure spReadUser
(
)
begin
  SELECT userID, username, pathIm FROM tbLogin;
end//
go

Create procedure spUpdatePath
(
  _username VARCHAR(20),
  _PathIm VARCHAR(120)
)
begin
  update tbLogin SET
    pathIm = _PathIm
  WHERE username = _username;
end//
go

delimiter ;

CALL spCreateUser('dcourcelles', 'password', 'coffeebook2.jpg');
CALL spCreateUser('jwhite', 'password', 'profilepic.jpeg');
CALL spCreateUser('gwatsky', 'password', 'profilepic.jpeg');

SELECT * FROM tbLogin;

CALL spLogin('dcourcelles', 'password');

CALL spReadUser;


/* -----------------------COFFEE------------------------- */

Create table tbCoffee
(
  coffeeID INT NOT NULL AUTO_INCREMENT,
  coffeeName VARCHAR(40),
  region VARCHAR(15),
  roastLevel VARCHAR(10),
  quantity INT,
  PRIMARY KEY(coffeeID)
);
go

delimiter //

Create procedure spCreateCoffee
(
  _coffeeName VARCHAR(40),
  _region VARCHAR(15),
  _roastLevel VARCHAR(10),
  _quantity int
)
begin
  INSERT INTO tbCoffee (coffeeName, region, roastLevel, quantity) VALUES
                      (_coffeeName, _region, _roastLevel, _quantity);
end//
go

Create procedure spReadCoffee
(

)
  begin
    SELECT coffeeID, coffeeName FROM tbCoffee;
  end//
  go

Create procedure spUpdateQuanity
(
  _coffeeID INT,
  _addQuantity INT
)
begin
    UPDATE tbCoffee SET
      quantity =  quantity + _addQuantity
    WHERE coffeeID = _coffeeID;
end//
go

delimiter ;

CALL spCreateCoffee('Organic Yukon Blend', 'Latin American', 'Medium', 50);
CALL spCreateCoffee('Dans Manitoba Blend', 'Canadian', 'Medium', 45);
CALL spCreateCoffee('Dark Beans Blend', 'Asian', 'Dark',47);
CALL spCreateCoffee('Prepare To Wake Up Blend', 'Asian', 'Blonde',40);
CALL spCreateCoffee('Praise The Coffee', 'Asian', 'Blonde', 45);
CALL spCreateCoffee('Hunt Your Coffee', 'Asian', 'Dark',37);
CALL spCreateCoffee('Good Morning Blend', 'African', 'Blonde', 20);
CALL spCreateCoffee('Wakes You Up Blend', 'Latin American', 'Blonde', 30);
CALL spCreateCoffee('Super Organic Delicious Blend', 'Latin American', 'Medium',35);

CALL spUpdateQuanity(1, 5);

CALL spReadCoffee();

/* -----------------------Purchases------------------------- */

Create table tbPurchase
(
  purchaseID INT NOT NULL AUTO_INCREMENT,
  userID INT,
  coffeeID INT,
  amountPurchased INT,
  datePurchased date,
  PRIMARY KEY(purchaseID),
  FOREIGN KEY(coffeeID) REFERENCES tbCoffee(coffeeID),
  FOREIGN KEY(userID) REFERENCES tbLogin(userID)
);
go

delimiter //

Create procedure spCreatePurchase
(
  _userID INT,
  _coffeeID INT,
  _amountPurchased INT,
  _datePurchased date
)
  begin
  INSERT INTO tbPurchase (userID, coffeeID, amountPurchased, datePurchased) VALUES
                      (_userID, _coffeeID, _amountPurchased, _datePurchased);
  end//
  go

Create procedure spReadAllPurchase
(
)
  begin
    SELECT * FROM tbPurchase;
  end//
  go

Create procedure spUpdatePurchase
(
  _purchaseID INT,
  _userID INT,
  _coffeeID INT,
  _amountPurchased INT,
  _datePurchased date
)
  begin
    UPDATE tbPurchase SET
      userID = _userID,
      coffeeID = _coffeeID,
      amountPurchased = _amountPurchased,
      datePurchased = _datePurchased
    WHERE purchaseID = _purchaseID;
  end//
  go

Create procedure spDeletePurchase
(
  _purchaseID INT
)
begin
  delete from tbPurchase
  WHERE purchaseID = _purchaseID;
end//
go

Create procedure spReadPurchaseReport
(
)
begin
  SELECT purchaseID, username, coffeeName, amountPurchased, datePurchased FROM
    tbPurchase INNER JOIN tbCoffee ON
    tbPurchase.coffeeID = tbCoffee.coffeeID
    INNER JOIN tbLogin ON
    tbPurchase.userID = tbLogin.userID;
end//
go

Create procedure spReadPurchase
(
  _purchaseID INT
)
  begin
    SELECT * FROM tbPurchase WHERE purchaseID = _purchaseID;
  end//
  go

delimiter ;

CALL spCreatePurchase(1, 1, 3, '2018-06-15');
CALL spCreatePurchase(1, 2, 6, '2018-06-15');
CALL spCreatePurchase(1, 5, 7, '2018-06-18');
CALL spCreatePurchase(2, 2, 2, '2018-06-18');
CALL spCreatePurchase(2, 3, 4, '2018-06-18');
CALL spCreatePurchase(3, 8, 3, '2018-06-18');
CALL spCreatePurchase(3, 9, 3, '2018-06-18');
CALL spCreatePurchase(3, 5, 10, '2018-06-18');
CALL spCreatePurchase(3, 4, 7, '2018-06-18');
CALL spCreatePurchase(2, 6, 3, '2018-06-18');
CALL spCreatePurchase(3, 7, 17, '2018-06-18');
CALL spCreatePurchase(1, 9, 11, '2018-06-18');

CALL spDeletePurchase(12);

CALL spUpdatePurchase(1, 1, 4, 7, '2018-06-17');

CALL spReadPurchaseReport();
