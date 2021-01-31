CREATE TABLE  Account (
   Id int UNIQUE NOT NULL AUTO_INCREMENT,
   Username varchar(40) NOT NULL UNIQUE,
   Password varchar(200) NOT NULL,
   Name varchar(40) NOT NULL,
   Email varchar(40) NOT NULL,
   Phone varchar(40),
   Sex varchar(1),
   Birthday datetime,
LastOnline datetime DEFAULT NOW(),
   Address varchar(200),
   IsAdmin Boolean DEFAULT false,
   CreatedTime datetime NOT NULL DEFAULT NOW(),
   UpdatedTime datetime NOT NULL DEFAULT NOW(),
   PRIMARY KEY(Id)
);

INSERT INTO Account(Id,Username,Password,Name,Email) VALUES(1,'hieu147','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','Dương Văn Hiếu','duonghieu42@gmail.com');
INSERT INTO Account(Id,Username,Password,Name,Email,IsAdmin) VALUES(2,'admin01','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','admin','admin@gmail.com',true);
