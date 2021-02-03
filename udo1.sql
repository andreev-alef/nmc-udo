LOAD DATA LOW_PRIORITY LOCAL INFILE 'D:\\udo.txt'
	REPLACE INTO TABLE `udo`.`tmp_gos_udo2` CHARACTER SET utf8
	FIELDS TERMINATED BY '\t'
	OPTIONALLY ENCLOSED BY '"' ESCAPED BY '"'
	LINES TERMINATED BY '\r\n'
	(`zakazchik`, `vydano_data`, `gos_nomer`, `reg_nomer`,
	`fam`, `im`, `otch`, `period_obuch`,
	`programma`, `objem`, `brak`, `provereno`, tmp_gos_udo.fisfrdo_opublikovano);