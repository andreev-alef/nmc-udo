-- SELECT nmc42test.nmc42mdl_grade_grades.userid,
-- 		nmc42test.nmc42mdl_grade_grades.finalgrade,
-- 		nmc42test.nmc42mdl_grade_items.itemname,
-- 		FROM_UNIXTIME(nmc42test.nmc42mdl_grade_grades.timemodified)
-- 	FROM 
-- 		nmc42test.nmc42mdl_grade_grades,
-- 		nmc42test.nmc42mdl_grade_items
-- 	WHERE 
-- 		nmc42mdl_grade_items.id=nmc42mdl_grade_grades.itemid
-- 		AND nmc42test.nmc42mdl_grade_grades.timemodified IS not NULL
-- 		AND nmc42test.nmc42mdl_grade_grades.timemodified >= (UNIX_TIMESTAMP(NOW())-TIME_TO_SEC(NOW()))
-- 		AND nmc42mdl_grade_grades.userid=69
-- 	ORDER BY  nmc42test.nmc42mdl_grade_grades.timemodified;

-- SELECT
-- 	DATE_FORMAT(FROM_UNIXTIME(nmc42test.nmc42mdl_grade_grades.timemodified),'%d.%m.%Y'),
-- 	nmc42test.nmc42mdl_grade_grades.itemid,
-- 	nmc42test.nmc42mdl_grade_items.itemname
-- FROM 
-- 	nmc42test.nmc42mdl_grade_grades,
-- 	nmc42test.nmc42mdl_grade_items
-- WHERE
-- 	nmc42test.nmc42mdl_grade_grades.timemodified IS NOT NULL
-- 	AND nmc42test.nmc42mdl_grade_items.id = nmc42test.nmc42mdl_grade_grades.itemid
-- 	AND nmc42test.nmc42mdl_grade_items.itemname IS NOT NULL
-- ORDER BY
-- 	nmc42test.nmc42mdl_grade_grades.timemodified DESC

SELECT NOW(), UNIX_TIMESTAMP('2021-01-27 10:53:00'), UNIX_TIMESTAMP('1970-01-01 14:00:00'),   FROM_UNIXTIME(1611705600-25200);