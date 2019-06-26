SELECT max(odate.prevdate) prevdate, max(odate.next_date)as next, d.KD_DEPO as kode_site,CASE
				      WHEN d.sta01 = 'PMA' THEN 'PINUS MERAH ABADI, PT'
				      ELSE d.NM_DEPO
				END AS nama_site,
				CASE
				      WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) = 'PMA' THEN trim(replace(replace(substr(d.NM_DEPO,5),'MT',''),'GT',''))
				      WHEN d.sta01 = 'PMA' AND substr(d.nm_depo,1,3) <> 'PMA' THEN trim(replace(replace(d.NM_DEPO,'MT',''),'GT',''))
				      ELSE d.NM_DEPO
				END AS area, d.divisi divisi,
				       COALESCE(MAX(CASE WHEN a.tgl = '01' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') as tanggal_01,
				       COALESCE(MAX(CASE WHEN a.tgl = '02' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') as tanggal_02,
				       COALESCE(MAX(CASE WHEN a.tgl = '03' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') as tanggal_03,
				       COALESCE(MAX(CASE WHEN a.tgl = '04' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') as tanggal_04,
				       COALESCE(MAX(CASE WHEN a.tgl = '05' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_05,
				       COALESCE(MAX(CASE WHEN a.tgl = '06' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_06,
				       COALESCE(MAX(CASE WHEN a.tgl = '07' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_07,
				       COALESCE(MAX(CASE WHEN a.tgl = '08' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_08,
				       COALESCE(MAX(CASE WHEN a.tgl = '09' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_09,
				       COALESCE(MAX(CASE WHEN a.tgl = '10' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_10,
				       COALESCE(MAX(CASE WHEN a.tgl = '11' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_11,
				       COALESCE(MAX(CASE WHEN a.tgl = '12' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_12,
				       COALESCE(MAX(CASE WHEN a.tgl = '13' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_13,
				       COALESCE(MAX(CASE WHEN a.tgl = '14' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_14,
				       COALESCE(MAX(CASE WHEN a.tgl = '15' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_15,
				       COALESCE(MAX(CASE WHEN a.tgl = '16' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_16,
				       COALESCE(MAX(CASE WHEN a.tgl = '17' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_17,
				       COALESCE(MAX(CASE WHEN a.tgl = '18' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_18,
				       COALESCE(MAX(CASE WHEN a.tgl = '19' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_19,
				       COALESCE(MAX(CASE WHEN a.tgl = '20' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_20,
				       COALESCE(MAX(CASE WHEN a.tgl = '21' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_21,
				       COALESCE(MAX(CASE WHEN a.tgl = '22' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_22,
				       COALESCE(MAX(CASE WHEN a.tgl = '23' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_23,
				       COALESCE(MAX(CASE WHEN a.tgl = '24' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_24,
				       COALESCE(MAX(CASE WHEN a.tgl = '25' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_25,
				       COALESCE(MAX(CASE WHEN a.tgl = '26' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_26,
				       COALESCE(MAX(CASE WHEN a.tgl = '27' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_27,
				       COALESCE(MAX(CASE WHEN a.tgl = '28' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_28,
				       COALESCE(MAX(CASE WHEN a.tgl = '29' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_29,
				       COALESCE(MAX(CASE WHEN a.tgl = '30' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_30,
				       COALESCE(MAX(CASE WHEN a.tgl = '31' AND a.bulan = '06' AND a.tahun ='2019' THEN STAT END),'') tanggal_31,
				       d.tanggal_live_depo,
				       d.status_system
				from rdepo as d
				left join 
				(
				select a.module_site as kode_site, a.module_name,
				       month(a.module_date) as bulan,
				       year(a.module_date) as tahun,
				       day(a.module_date) as tgl,
				       module_flag as STAT
				from rmodule_monitor a WHERE month(a.module_date) = '06'
            AND a.module_name = 'LBP' 
            and year(a.module_date) = '2019'
				) a
				on a.kode_site = d.KD_DEPO
        left join rops_date as odate on odate.depo = d.KD_DEPO
        # ALL
        WHERE d.status = 'A'
        AND d.status_system = 'SCYLLA'
		  GROUP BY d.KD_DEPO, a.bulan, a.tahun
        limit 0, 10
        