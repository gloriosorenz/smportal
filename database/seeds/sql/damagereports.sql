-- id, calamity, report_statuses_id, narrative,farmers_id, regions_id,provinces_id,create,update


-- id, calamities_id, report_statuses_id, calamity_start, calamity_end, initial_report_date, final_report_date, provinces_id
-- crop, num_farmers, standing_crop_area, rice_crop_stages_id, harvest_month, total_area, totally_damaged_area, partially_damaged_area
-- yield_before, yield_after, yield_loss, volume, grand_total, remarks, farmers_id, regions_id, created_at, updated_at

INSERT INTO damage_reports VALUES(1,'4','2','2019-05-24', '2019-05-27', '2019-05-27', '2019-05-28', '19','Rice', '9', '4', '2', 'July', '3', '0.4', '2.6', '60', '30', '30', '30', '90', 'N/A', '10', '4',now(),now());
INSERT INTO damage_reports VALUES(2,'1','1','2019-06-22', '2019-06-25', '2019-06-26', '2019-01-27', '19','Rice', '6', '3', '3', 'August', '3', '0.4', '2.6', '60', '30', '30', '30', '90', 'none', '10', '4',now(),now());
INSERT INTO damage_reports VALUES(3,'1','2','2019-05-16', '2019-05-20', '2019-05-18', '2019-05-19', '19','Rice', '7', '3', '2', 'June', '4', '2.2', '1.8', '100', '70', '30', '30', '120', 'N/A', '11', '4',now(),now());
INSERT INTO damage_reports VALUES(4,'5','1','2019-01-24', '2019-06-24', '2019-01-24', '2019-01-24', '19','Rice', '10', '2', '3', 'September', '3', '0.4', '2.6', '60', '50', '10', '70', '90', 'none', '11', '4',now(),now());

-- 
-- INSERT INTO damage_reports VALUES(1, , 1);