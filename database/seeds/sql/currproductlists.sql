-- id, seasons_id, users_id, original_pr_id, current_pr_id, harvest_date,or_qty,curr_qty,price
-- id, seasons_id, users_id, pr_id, , harvest_date,or_qty,curr_qty,price
-- season 1
INSERT INTO current_product_lists VALUES (1, '1','10','3','2017-11-17','150',17.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (2, '1','10','3','2017-11-17','0',13.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (3, '1','10','3','2017-11-17','10',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (4, '1','11','3','2017-11-17','10',17.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (5, '1','11','3','2017-11-17','0',13.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (6, '1','11','3','2017-11-17','10',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (7, '1','12','3','2017-11-17','20',17.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (8, '1','12','3','2017-11-17','0',13.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (9, '1','12','3','2017-11-17','20',0.0,now(),now(),'');

-- season 2
INSERT INTO current_product_lists VALUES (10, '2','10','3','2018-02-20','100',16.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (11, '2','10','3','2018-02-20','0',12.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (12, '2','10','3','2018-02-20','15',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (13, '2','11','3','2018-02-20','90',16.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (14, '2','11','3','2018-02-20','0',12.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (15, '2','11','3','2018-02-20','12',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (16, '2','12','3','2018-02-20','300',16.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (17, '2','12','3','2018-02-20','17',12.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (18, '2','12','3','2018-02-20','3',0.0,now(),now(),'');

-- season 3  (typhoon)
INSERT INTO current_product_lists VALUES (19, '3','10','3','2018-06-28','80',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (20, '3','10','3','2018-06-28','5',9.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (21, '3','10','3','2018-06-28','22',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (22, '3','11','3','2018-06-28','60',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (23, '3','11','3','2018-06-28','20',9.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (24, '3','11','3','2018-06-28','18',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (25, '3','12','3','2018-06-28','200',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (26, '3','12','3','2018-06-28','30',9.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (27, '3','12','3','2018-06-28','28',0.0,now(),now(),'');

-- season 4 (under effect but less quantity, better quality)
INSERT INTO current_product_lists VALUES (28, '4','10','3','2018-11-20','70',15.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (29, '4','10','3','2018-11-20','10',11.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (30, '4','10','3','2018-11-20','5',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (31, '4','11','3','2018-11-20','71',15.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (32, '4','11','3','2018-11-20','19',11.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (33, '4','11','3','2018-11-20','4',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (34, '4','12','3','2018-11-20','200',15.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (35, '4','12','3','2018-11-20','14',11.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (36, '4','12','3','2018-11-20','6',0.0,now(),now(),'');

-- season 5
INSERT INTO current_product_lists VALUES (37, '5','10','3','2019-03-25','180',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (38, '5','10','3','2019-03-25','30',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (39, '5','10','3','2019-03-25','10',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (40, '5','11','3','2019-03-26','80',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (41, '5','11','3','2019-03-26','78',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (42, '5','11','3','2019-03-26','8',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (43, '5','12','3','2019-03-24','0',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (44, '5','12','3','2019-03-24','0',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (45, '5','12','3','2019-03-24','2',0.0,now(),now(),'');

-- season 5 farmers 17-19
INSERT INTO current_product_lists VALUES (46, '5','17','3','2019-03-25','110',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (47, '5','17','3','2019-03-25','10',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (48, '5','17','3','2019-03-25','5',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (49, '5','18','3','2019-03-26','80',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (50, '5','18','3','2019-03-26','202',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (51, '5','18','3','2019-03-26','8',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (52, '5','19','3','2019-03-24','290',19.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (53, '5','19','3','2019-03-24','16',14.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (54, '5','19','3','2019-03-24','4',0.0,now(),now(),'');

-- season 6 farmers 
INSERT INTO current_product_lists VALUES (55, '6','10','1','2019-07-20 ','110',13.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (56, '6','10','2','2019-07-20','10',9.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (57, '6','10','3','2019-07-20','5',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (58, '6','18','1','2019-07-20','80',13.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (59, '6','18','2','2019-07-20','22',8.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (60, '6','18','3','2019-07-20','8',0.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (61, '6','19','1','2019-07-20','290',12.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (62, '6','19','2','2019-07-20','16',8.0,now(),now(),'');
INSERT INTO current_product_lists VALUES (63, '6','19','3','2019-07-20','4',0.0,now(),now(),'');
