--- *** CHECK TRANSACTION **** ---
-- MODULE_ID 01 = LBP, 02 = SAPKASBANK, 03 = SAPINV
SELECT *
FROM rmodule_monitor
WHERE module_name = 'SAPKASBANK' 
AND module_id LIKE '%03-%' 
AND DATE_FORMAT(MODULE_DATE, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');
-- sama
SELECT a.module_site AS kode_site, a.module_name, MONTH(a.module_date) AS bulan, YEAR(a.module_date) AS tahun, DAY(a.module_date) AS tgl,module_flag AS STAT
FROM rmodule_monitor a
WHERE MONTH(a.module_date) = '05' AND a.module_name = 'LBP' AND YEAR(a.module_date) = '2019'



--- *** SET TRANSACTION MANUAL MONITORING **** ---
-- LBP MONITORING 
SELECT DISTINCT text2, INVDATE
FROM rsap_lbp
WHERE DATE_FORMAT(INVDATE, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');
-- KASBANK MONITORING
SELECT DISTINCT pplant, doc_date
FROM rsap_kasbank
WHERE DATE_FORMAT(doc_date, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');
-- INVENTORY
SELECT DISTINCT pplant, doc_date
FROM rsap_inventory
WHERE DATE_FORMAT(doc_date, '%Y %m') = DATE_FORMAT('2019-05-01', '%Y %m');
-- lBP
SELECT *
FROM rpromo_tpr_Daily
LIMIT 100


--- *** count per tanggal **** ---
SELECT module_id, module_date,
(SELECT count(*)
FROM rmodule_monitor
WHERE module_name = 'LBP' 
AND DATE_FORMAT(module_date, '%Y %m %d') = DATE_FORMAT('2019-06-1', '%Y %m %d')) as data_upload, 
(select COUNT(*) from rdepo where status_system = 'SCYLLA' AND status ='A')-(SELECT count(*)
FROM rmodule_monitor
WHERE module_name = 'LBP' 
AND DATE_FORMAT(module_date, '%Y %m %d') = DATE_FORMAT('2019-06-1', '%Y %m %d')) as sisa_data_upload
FROM rmodule_monitor
WHERE module_name = 'LBP' 
AND DATE_FORMAT(module_date, '%Y %m') = DATE_FORMAT('2019-06-1', '%Y %m')