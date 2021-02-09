SELECT nmc42test.nmc42mdl_user.lastname,
	nmc42test.nmc42mdl_user.firstname,
	nmc42test.nmc42mdl_grade_grades.finalgrade,
	DATE_FORMAT(FROM_UNIXTIME(nmc42test.nmc42mdl_grade_grades.timemodified), '%d.%m.%Y') AS date,
	nmc42test.nmc42mdl_grade_items.itemname,
	nmc42test.nmc42mdl_course.fullname
FROM nmc42test.nmc42mdl_grade_grades
INNER JOIN nmc42test.nmc42mdl_user ON nmc42test.nmc42mdl_user.id = nmc42test.nmc42mdl_grade_grades.userid
INNER JOIN nmc42test.nmc42mdl_grade_items ON nmc42test.nmc42mdl_grade_items.id = nmc42test.nmc42mdl_grade_grades.itemid
INNER JOIN nmc42test.nmc42mdl_course ON nmc42test.nmc42mdl_course.id = nmc42test.nmc42mdl_grade_items.courseid
WHERE nmc42test.nmc42mdl_grade_items.itemname IS NOT NULL
	AND nmc42test.nmc42mdl_grade_grades.finalgrade IS NOT NULL 
	AND nmc42test.nmc42mdl_user.id=173
ORDER BY nmc42test.nmc42mdl_user.lastname;