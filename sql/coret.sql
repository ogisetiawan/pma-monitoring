-- CHECKED
-- MODULE_ID 01 = LBP, 02 = SAPKASBANK, 03 = SAPINV
SELECT *
FROM rmodule_monitor
WHERE module_name = 'SAPKASBANK' 
AND module_id LIKE '%03-%' 
AND DATE_FORMAT(MODULE_DATE, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');


--- *** SET TRANSACTION MANUAL MONITORING **** ---
-- LBP MONITORING 
SELECT DISTINCT text2, INVDATE
FROM rsap_lbp
WHERE DATE_FORMAT(INVDATE, '%Y %m') = DATE_FORMAT('2019-03-01', '%Y %m');

-- KASBANK MONITORING
SELECT DISTINCT pplant, doc_date
FROM rsap_kasbank
WHERE DATE_FORMAT(doc_date, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');

-- INVENTORY
SELECT DISTINCT pplant, doc_date
FROM rsap_inventory
WHERE DATE_FORMAT(doc_date, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');

-- lBP
select * from rpromo_tpr_Daily limit 100


--- SELECT 