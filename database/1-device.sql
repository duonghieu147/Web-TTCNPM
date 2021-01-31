CREATE TABLE Device (
   Id int UNIQUE NOT NULL AUTO_INCREMENT,
   Name varchar(40) NOT NULL,
   Supplier varchar(40),
   Amount int DEFAULT 0,
   Description Text,
   Price double,
   Discount double DEFAULT 0,
	Content Text,
   Img Text,
   CreatedTime datetime NOT NULL DEFAULT NOW(),
   UpdatedTime datetime NOT NULL DEFAULT NOW(),
   PRIMARY KEY(Id)
);


INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(1,'VivoBook X509JA','Asus',5,10690000,5,'Asus VivoBook X509JA i3 (EJ480T) là mẫu laptop học tập - văn phòng được trang bị hiệu năng ổn định kết hợp cùng màn hình có viền siêu mỏng mang lại trải nghiệm tốt cho công việc, học tập hay giải trí của các bạn sinh viên, nhân viên văn phòng năng động hiện nay','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/l/a/laptop-asus-vivobook-15-x509ja-i3_1_.jpg');
INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(2,'VivoBook A415EA','Asus',10,17290000,10,'Asus VivoBook A415EA i5 (EB354T) là chiếc laptop 14 inch nhỏ gọn nhưng vô cùng mạnh mẽ. Nhờ đó, bạn sẽ được tận hưởng hiệu suất cao cho công việc trên chiếc máy tính xách tay siêu mỏng nhẹ này','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/l/a/laptop_asus_vivobook_a415ea-eb359t_4_.jpg');
INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(3,'Gaming Rog Strix G512','Asus',15,24490000,10,'Laptop Asus Gaming ROG Strix G512 i5 (IAL013T) mang đến ngôn ngữ thiết kế hiện đại, cấu hình mạnh mẽ với vi xử lí gen 10 mới, card đồ họa rời GeForce GTX 1650Ti, chiến những tựa game nặng kí nhất','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/_/0/_0000_33232_33232_screenshot_2.jpg');
INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(4,'MacBook Air 2017','MACBOOK',20,19990000,5,'MacBook Air 2017 i5 128GB là mẫu laptop văn phòng, có thiết kế siêu mỏng và nhẹ, vỏ nhôm nguyên khối sang trọng. Máy có hiệu năng ổn định, thời lượng pin cực lâu 12 giờ, phù hợp cho hầu hết các nhu cầu làm việc và giải trí','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/1000x/040ec09b1e35df139433887a97daa66f/6/3/636688207026676028_macbookair-1_1.jpg');
INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(5,'MacBook Pro M1','MACBOOK',25,34990000,10,'Apple Macbook Pro M1 2020 (MYD82SA/A) sở hữu thiết kế sang trọng từ kim loại nguyên khối được kế thừa từ các thế hệ trước nhưng bên trong là một cấu hình cực kỳ đáng gờm','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/m/b/mbp-silver-select-202011.jpg');
INSERT INTO Device(Id,Name,Supplier,Amount,Price,Discount,Description,Img) VALUES(6,'Vostro 5402 i7','DELL',5,25590000,7,'Dell Vostro 5402 i7 (70231338) là một lựa chọn đáng tin cậy cho người dùng khi mang trên mình cấu hình tuyệt vời đến từ bộ vi xử lý Intel thế hệ thứ 11, thiết kế tinh tế, bền bỉ cộng với thời lượng pin ấn tượng đến bất ngờ','https://cdn.cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/l/a/laptop-dell-vostro-5301_1_.jpg');

