CREATE DATABASE `examples`;
USE `examples`;
CREATE TABLE `cars` (
   `id` int UNIQUE NOT NULL,
   `name` varchar(40),
   `year` varchar(50),
   PRIMARY KEY(id)
);
INSERT INTO cars VALUES(1,'Mercedes','2000');
INSERT INTO cars VALUES(2,'BMW','2004');
INSERT INTO cars VALUES(3,'Audi','2001');


-- get đánh giá
SELECT re.Id,re.Content,re.Star,re.CreatedTime,re.UpdatedTime,acc.Name FROM review re JOIN account acc ON account.Id = AccountId



-- get tổng bình luận
SELECT * FROM device de JOIN (
SELECT COUNT(*) ReviewTotal,review.DeviceId FROM review GROUP BY review.DeviceId) re ON re.DeviceId = de.Id WHERE re.DeviceId = 1