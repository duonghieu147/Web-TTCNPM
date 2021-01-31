CREATE TABLE WebInfo (
   Id int UNIQUE NOT NULL AUTO_INCREMENT,
	Phone varchar(40)  NOT NULL,
    Email varchar(40) NOT NULL,
    Facebook varchar(100),
     Address varchar(200)  NOT NULL,
    Twitter varchar(100),
        Webside varchar(100),
    PRIMARY KEY(Id)
);

INSERT INTO WebInfo(Id,Phone,Email,Facebook,Twitter,Address,Webside) VALUES(1,'0395455399','duonghieu4299@gmail.com','https://www.facebook.com/hieu.duong.bku','https://twitter.com/','KTX Khu A ĐHQG TP HCM','https://duonghieu.com/')
