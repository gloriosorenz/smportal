-- id, quantity, order_product_statueses_id, product_lists_id, orders_id, farmers_id, date, date ,receipt
-- id, quantity, order_product_statuses_id, original_product_lists_id, current_product_lists_id,product_types_id,purchase_price, orders_id, farmers_id, date, date, receipt

INSERT INTO order_products VALUES(1,'10','3','1','1','1','17','1','2',now(),now(),'');
INSERT INTO order_products VALUES(2,'10','3','8','8','2','13','1','2',now(),now(),'');
INSERT INTO order_products VALUES(3,'10','3','5','5','2','13','1','4',now(),now(),'');
INSERT INTO order_products VALUES(4,'20','3','1','1','1','17','2','9',now(),now(),'');
INSERT INTO order_products VALUES(5,'8','3','1','1','1','17','2','9',now(),now(),'');
INSERT INTO order_products VALUES(6,'8','3','2','2','2','13','2','4',now(),now(),'');
INSERT INTO order_products VALUES(7,'5','3','1','1','1','17','2','2',now(),now(),'');
INSERT INTO order_products VALUES(8,'8','1','1','1','1','17','3','10',now(),now(),'');
INSERT INTO order_products VALUES(9,'12','3','1','1','1','17','3','2',now(),now(),'');
INSERT INTO order_products VALUES(10,'10','3','1','1','1','17','3','2',now(),now(),'');
INSERT INTO order_products VALUES(11,'12','3','17','17','2','12','3','9',now(),now(),'');
INSERT INTO order_products VALUES(12,'2','3','10','10','1','16','4','2',now(),now(),'');
INSERT INTO order_products VALUES(13,'10','3','14','14','2','12','4','4',now(),now(),'');
INSERT INTO order_products VALUES(14,'15','3','16','16','1','16','4','9',now(),now(),'');
INSERT INTO order_products VALUES(15,'3','2','19','19','1','14','5','10','2018-03-20','2018-03-20','');
INSERT INTO order_products VALUES(16,'6','3','44','44','2','14','5','12',now(),now(),'');
INSERT INTO order_products VALUES(17,'4','3','40','40','1','19','6','11',now(),now(),'');
INSERT INTO order_products VALUES(18,'12','3','10','10','1','16','6','10',now(),now(),'');
INSERT INTO order_products VALUES(19,'15','3','43','43','1','17','6','12',now(),now(),'');
INSERT INTO order_products VALUES(20,'5','3','44','44','1','19','6','12',now(),now(),'');
INSERT INTO order_products VALUES(21,'6','3','40','40','1','19','7','11',now(),now(),'');
INSERT INTO order_products VALUES(22,'1','3','44','44','2','14','7','12',now(),now(),'');
INSERT INTO order_products VALUES(23,'12','3','37','37','1','19','8','10',now(),now(),'');
INSERT INTO order_products VALUES(24,'13','3','41','41','2','14','8','11',now(),now(),'');
INSERT INTO order_products VALUES(25,'47','3','43','43','1','19','8','12',now(),now(),'');
INSERT INTO order_products VALUES(26,'13','2','37','37','1','19','9','10',now(),now(),'');
INSERT INTO order_products VALUES(27,'10','3','40','40','1','19','9','11',now(),now(),'');
INSERT INTO order_products VALUES(28,'4','3','35','35','2','11','9','12',now(),now(),'');
INSERT INTO order_products VALUES(29,'15','3','43','43','1','19','10','12',now(),now(),'');
INSERT INTO order_products VALUES(30,'5','3','7','7','1','17','10','10',now(),now(),'');

INSERT INTO order_products VALUES(31,'13','3','37','37','1','19','11','10',now(),now(),'');
INSERT INTO order_products VALUES(32,'5','3','41','41','2','14','11','11',now(),now(),'');
INSERT INTO order_products VALUES(33,'8','3','5','5','2','13','11','10',now(),now(),'');
INSERT INTO order_products VALUES(34,'20','3','43','43','1','19','11','12',now(),now(),'');

-- random

INSERT INTO order_products VALUES(35,'8','3','4','4','1','17','17','10',now(),now(),'');
INSERT INTO order_products VALUES(36,'8','3','13','13','1','16','16','10',now(),now(),'');
INSERT INTO order_products VALUES(37,'5','2','10','10','1','16','16','10','2018-03-20','2018-03-20','');
INSERT INTO order_products VALUES(38,'8','1','16','16','1','16','16','10',now(),now(),'');
INSERT INTO order_products VALUES(39,'12','3','10','10','1','16','13','10',now(),now(),'');
INSERT INTO order_products VALUES(40,'10','3','11','11','2','12','13','10',now(),now(),'');

-- Season 3 products 19 to 27 (except 21, 24, 27)
INSERT INTO order_products VALUES(41,'12','3','19','19','1','17','19','10',now(),now(),'');
INSERT INTO order_products VALUES(42,'24','3','20','20','1','16','20','10',now(),now(),'');
INSERT INTO order_products VALUES(43,'53','3','22','22','1','16','23','10','2018-03-20','2018-03-20','');
INSERT INTO order_products VALUES(44,'82','3','19','19','1','16','25','10',now(),now(),'');
INSERT INTO order_products VALUES(45,'23','3','25','25','1','16','19','10',now(),now(),'');
INSERT INTO order_products VALUES(46,'53','3','23','23','2','12','25','10',now(),now(),'');


-- LARRY ORDER PRODUCTS

-- Seaason 4 products 28 to 36 (except 30, 33, 36)
INSERT INTO order_products VALUES(47,'12','3','28','28','1','13','44','10',now(),now(),'');
INSERT INTO order_products VALUES(48,'70','3','31','31','2','9','36','10',now(),now(),'');
INSERT INTO order_products VALUES(49,'70','3','34','34','1','13','35','10',now(),now(),'');
INSERT INTO order_products VALUES(50,'28','3','29','29','1','13','52','10',now(),now(),'');
INSERT INTO order_products VALUES(51,'27','3','28','28','2','9','23','10',now(),now(),'');
INSERT INTO order_products VALUES(52,'88','3','29','29','2','8','47','10',now(),now(),'');

-- season 5 products 37 to 54 (except 39, 42, 45, 48, 51, 54)
INSERT INTO order_products VALUES(53,'10','3','37','37','1','13','52','10',now(),now(),'');
INSERT INTO order_products VALUES(54,'70','3','38','38','2','9','42','10',now(),now(),'');
INSERT INTO order_products VALUES(55,'100','3','53','53','1','13','42','10',now(),now(),'');
INSERT INTO order_products VALUES(56,'30','3','49','49','1','13','42','10',now(),now(),'');
INSERT INTO order_products VALUES(57,'27','3','59','59','2','9','42','10',now(),now(),'');
INSERT INTO order_products VALUES(58,'65','3','52','52','2','8','53','10',now(),now(),'');

-- 55 to 63 (except 57 60 63)
-- id, quantity, order_product_statuses_id, original_product_lists_id, current_product_lists_id,product_types_id,purchase_price, orders_id, farmers_id, date, date, receipt
INSERT INTO order_products VALUES(59,'10','3','55','55','1','13','42','10',now(),now(),'');
INSERT INTO order_products VALUES(60,'70','3','56','56','2','9','23','10',now(),now(),'');
INSERT INTO order_products VALUES(61,'100','3','55','55','1','13','52','10',now(),now(),'');
INSERT INTO order_products VALUES(62,'30','3','61','61','1','13','57','10',now(),now(),'');
INSERT INTO order_products VALUES(63,'27','3','59','59','2','9','60','10',now(),now(),'');
INSERT INTO order_products VALUES(64,'65','3','62','62','2','8','61','10',now(),now(),'');

-- GREGORIO ORDERS PRODUCTS

-- Seaason 4 products 28 to 36 (except 30, 33, 36)
INSERT INTO order_products VALUES(65,'12','3','28','28','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(66,'70','3','31','31','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(67,'70','3','34','34','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(68,'28','3','29','29','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(69,'27','3','28','28','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(70,'78','3','32','32','2','8','35','11',now(),now(),'');

-- season 5 products 37 to 54 (except 39, 42, 45, 48, 51, 54)
INSERT INTO order_products VALUES(71,'10','3','37','37','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(72,'70','3','38','38','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(73,'100','3','53','53','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(74,'30','3','49','49','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(75,'27','3','59','59','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(76,'65','3','52','52','2','8','35','11',now(),now(),'');

-- 55 to 63 (except 57 60 63)
-- id, quantity, order_product_statuses_id, original_product_lists_id, current_product_lists_id,product_types_id,purchase_price, orders_id, farmers_id, date, date, receipt
INSERT INTO order_products VALUES(77,'10','3','55','55','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(78,'70','3','56','56','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(79,'100','3','55','55','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(80,'30','3','61','61','1','13','35','11',now(),now(),'');
INSERT INTO order_products VALUES(81,'27','3','59','59','2','9','35','11',now(),now(),'');
INSERT INTO order_products VALUES(82,'65','3','62','62','2','8','35','11',now(),now(),'');
