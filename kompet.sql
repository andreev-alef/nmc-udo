LOAD DATA LOW_PRIORITY LOCAL INFILE 'D:/ÐÈÄ/Munitcip testirovanie.txt'
	REPLACE INTO TABLE `kompet`.`cert` CHARACTER SET utf8 
		FIELDS TERMINATED BY '\t'
		OPTIONALLY ENCLOSED BY '"'
		ESCAPED BY '"'
		LINES TERMINATED BY '\r\n'
		IGNORE 1 LINES (`regnum`, `unix_regdate`, `regdate_str`, `unix_stopdate`, `stopdate_str`, `familija`, `imja`, `otchestvo`, `dolznost`, `mesto_raboty`);