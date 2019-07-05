SELECT *
FROM Sum_SLS_BYDEPO_DAILY
WHERE DATE_FORMAT(INV_DATE, '%Y %m') = DATE_FORMAT('2019-06-01', '%Y %m')
group by kd_depo;

SELECT KD_DEPO,NM_DEPO, DAY(INV_DATE) AS tanggal, MONTH(INV_DATE) AS bulan, YEAR(INV_DATE) AS tahun 
FROM Sum_SLS_BYDEPO_DAILY
WHERE MONTH(INV_DATE) = '06' AND YEAR(INV_DATE) = '2019'
group by kd_depo;


SELECT d.KD_DEPO as kode_site, 
						 COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') as tanggal_01,
				       COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') as tanggal_02,
				       COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') as tanggal_03,
				       COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') as tanggal_04,
				       COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_05,
				       COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_06,
				       COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_07,
				       COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_08,
				       COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_09,
				       COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_10,
				       COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_11,
				       COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_12,
				       COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_13,
				       COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_14,
				       COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_15,
				       COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_16,
				       COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_17,
				       COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_18,
				       COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_19,
				       COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_20,
				       COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_21,
				       COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_22,
				       COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_23,
				       COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_24,
				       COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_25,
				       COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_26,
				       COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_27,
				       COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_28,
				       COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_29,
				       COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_30,
				       COALESCE(MAX(CASE WHEN a.tgl = '31' AND a.bulan = '06' AND a.tahun ='2019' THEN 'ada' END),'') tanggal_31,
						 d.tanggal_live_depo,
						 d.status_system
				FROM rdepo AS d
				LEFT JOIN 
					(SELECT a.KD_DEPO as kode_site, a.NM_DEPO, DAY(a.INV_DATE) AS tgl, MONTH(a.INV_DATE) AS bulan, YEAR(a.INV_DATE) AS tahun 
FROM Sum_SLS_BYDEPO_DAILY AS a
WHERE MONTH(a.INV_DATE) = '06' AND YEAR(a.INV_DATE) = '2019'
group by a.kd_depo) AS a ON a.kode_site = d.KD_DEPO
				LEFT JOIN rops_date AS odate ON odate.depo = d.KD_DEPO
				# ALL
				WHERE d.status = 'A' AND d.status_system = 'SCYLLA'
				GROUP BY d.KD_DEPO, a.bulan, a.tahun
				LIMIT 0, 1000