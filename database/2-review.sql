CREATE TABLE Review (
   Id int UNIQUE NOT NULL AUTO_INCREMENT,
   Content Text NOT NULL,
   Star int NOT NULL,
   CreatedTime datetime NOT NULL DEFAULT NOW(),
   UpdatedTime datetime NOT NULL DEFAULT NOW(),
   DeviceId int NOT NULL,
   AccountId int NOT NULL,
   PRIMARY KEY(Id),
	CONSTRAINT FK_Review_Device FOREIGN KEY (DeviceId) REFERENCES Device(Id),
	CONSTRAINT FK_Review_Account FOREIGN KEY (AccountId) REFERENCES Account(Id)
);

INSERT INTO Review(Content,Star,DeviceId,AccountId) VALUES('Không có điểm gì để chê tuyệt vời',5,1,1);
INSERT INTO Review(Content,Star,DeviceId,AccountId) VALUES('Không có điểm gì để chê tuyệt vời',4,1,1);
INSERT INTO Review(Content,Star,DeviceId,AccountId) VALUES('Không có điểm gì để chê tuyệt vời',3,2,1);
INSERT INTO Review(Content,Star,DeviceId,AccountId) VALUES('Không có điểm gì để chê tuyệt vời',2,2,1);
INSERT INTO Review(Content,Star,DeviceId,AccountId) VALUES('Không có điểm gì để chê tuyệt vời',4,2,1);