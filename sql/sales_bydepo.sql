-- GET TRANSACTION /MONTH
SELECT *
FROM Sum_SLS_BYDEPO_DAILY
WHERE DATE_FORMAT(INV_DATE, '%Y %m') = DATE_FORMAT('2019-07-01', '%Y %m');

SELECT KD_DEPO,NM_DEPO, (PENJ-POT_PENJ) AS SALES, (RETUR+POT_RET) AS RETUR, DAY(INV_DATE) AS tanggal, MONTH(INV_DATE) AS bulan, YEAR(INV_DATE) AS tahun 
FROM Sum_SLS_BYDEPO_DAILY
WHERE MONTH(INV_DATE) = '07' AND YEAR(INV_DATE) = '2019';

-- GET TRANSACTION SALES /DATE
SELECT (PENJ-POT_PENJ) AS penjualan, (RETUR+POT_RET) AS retur
FROM Sum_SLS_BYDEPO_DAILY
WHERE DAY(INV_DATE) = '10' AND MONTH(INV_DATE) = '06' AND YEAR(INV_DATE) = '2019' 
AND KD_DEPO = '111';

-- GET TRANSACTION /DATE
SELECT max(odate.prevdate) prevdate, max(odate.next_date)as next, d.KD_DEPO as kode_site,
					CASE
				      WHEN d.sta01 = 'PMA' THEN 'PINUS MERAH ABADI, PT'
				      ELSE d.NM_DEPO
				END AS nama_site,
				CASE
				      WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) = 'PMA' THEN trim(replace(replace(substr(d.NM_DEPO,5),'MT',''),'GT',''))
				      WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) <> 'PMA' THEN trim(replace(replace(d.NM_DEPO,'MT',''),'GT',''))
				      ELSE d.NM_DEPO
				END AS area, d.divisi divisi,
						COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_1,
						COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_1,
						COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_1,
						COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_2,
						COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_2,
						COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_2,
						COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_3,
						COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_3,
						COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_3,
						COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_4,
						COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_4,
						COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_4,
						COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_5,
						COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_5,
						COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_5,
						COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_6,
						COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_6,
						COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_6,
						COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_7,
						COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_7,
						COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_7,
						COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_8,
						COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_8,
						COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_8,
						COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_9,
						COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_9,
						COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_9,
						COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_10,
						COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_10,
						COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_10,
						COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_11,
						COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_11,
						COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_11,
						COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_12,
						COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_12,
						COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_12,
						COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_13,
						COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_13,
						COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_13,
						COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_14,
						COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_14,
						COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_14,
						COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_15,
						COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_15,
						COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_15,
						COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_16,
						COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_16,
						COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_16,
						COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_17,
						COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_17,
						COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_17,
						COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_18,
						COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_18,
						COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_18,
						COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_19,
						COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_19,
						COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_19,
						COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_20,
						COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_20,
						COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_20,
						COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_21,
						COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_21,
						COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_21,
						COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_22,
						COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_22,
						COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_22,
						COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_23,
						COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_23,
						COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_23,
						COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_24,
						COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_24,
						COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_24,
						COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_25,
						COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_25,
						COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_25,
						COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_26,
						COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_26,
						COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_26,
						COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_27,
						COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_27,
						COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_27,
						COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_28,
						COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_28,
						COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_28,
						COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_29,
						COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_29,
						COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_29,
						COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '06' AND a.tahun ='2019' THEN 'DONE' END),'') AS tanggal_30,
						COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '06' AND a.tahun ='2019' THEN a.sales END),'') as penjualan_30,
						COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '06' AND a.tahun ='2019' THEN a.retur END),'') as retur_30,
						 d.tanggal_live_depo,
						 d.status_system
				FROM rdepo AS d
				LEFT JOIN 
					(SELECT a.KD_DEPO as kode_site, a.NM_DEPO, (PENJ-POT_PENJ) AS sales, (RETUR+POT_RET) AS retur, DAY(a.INV_DATE) AS tgl, MONTH(a.INV_DATE) AS bulan, YEAR(a.INV_DATE) AS tahun 
					FROM Sum_SLS_BYDEPO_DAILY AS a
					WHERE MONTH(a.INV_DATE) = '06' AND YEAR(a.INV_DATE) = '2019') AS a ON a.kode_site = d.KD_DEPO
				LEFT JOIN rops_date AS odate ON odate.depo = d.KD_DEPO
				# ALL
				WHERE d.status = 'A' AND d.status_system = 'SCYLLA'
				GROUP BY d.KD_DEPO, a.bulan, a.tahun
				LIMIT 0, 100;
				
				
				
			-- GET STATUS DOTS
			SELECT KD_DEPO NM_DEPO, INV_DATE,
			(SELECT count(*)
			FROM Sum_SLS_BYDEPO_DAILY
			WHERE DATE_FORMAT(INV_DATE, '%Y %m %d') = DATE_FORMAT('2019-06-01', '%Y %m %d')) as data_done, 
			(select COUNT(*) from rdepo where status_system = 'SCYLLA' AND status ='A')-(SELECT count(*)
			FROM Sum_SLS_BYDEPO_DAILY
			WHERE DATE_FORMAT(INV_DATE, '%Y %m %d') = DATE_FORMAT('2019-06-01', '%Y %m %d')) as data_undone
			FROM Sum_SLS_BYDEPO_DAILY
			WHERE DATE_FORMAT(INV_DATE, '%Y %m') = DATE_FORMAT('2019-06-01', '%Y %m');