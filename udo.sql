-- LOAD DATA LOW_PRIORITY LOCAL INFILE 'D:\\udo.txt'
-- 	REPLACE INTO TABLE `udo`.`tmp_gos_udo` CHARACTER SET utf8
-- 	FIELDS TERMINATED BY '\t'
-- 	OPTIONALLY ENCLOSED BY '"' ESCAPED BY '"'
-- 	LINES TERMINATED BY '\r\n'
-- 	(`zakazchik`, `vydano_data`, `gos_nomer`, `reg_nomer`,
-- 	`fam`, `im`, `otch`, `period_obuch`,
-- 	`programma`, `objem`, `brak`, `provereno`, tmp_gos_udo.fisfrdo_opublikovano);
SELECT
	udo.tmp_gos_udo.id,
	udo.tmp_gos_udo.id,
	udo.tmp_gos_udo.gos_nomer,
	CONVERT(udo.tmp_gos_udo.gos_nomer, UNSIGNED INT),
	UNIX_TIMESTAMP(STR_TO_DATE(tmp_gos_udo.vydano_data, '%d.%m.%Y'))
FROM udo.tmp_gos_udo
-- WHERE tmp_gos_udo.fam LIKE 'Каза%'
-- DELETE FROM tmp_gos_udo WHERE tmp_gos_udo.gos_nomer LIKE '';