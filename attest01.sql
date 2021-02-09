-- select nmc42mdl_grade_grades.id,
--         date_format(from_unixtime(nmc42mdl_grade_grades.timemodified), '%d.%m.%Y'),
--         nmc42mdl_course.id,
--         nmc42mdl_course.fullname,
--         nmc42mdl_grade_items.itemname,
--         nmc42mdl_user.lastname, nmc42mdl_user.firstname,
--         nmc42mdl_grade_grades.finalgrade
-- from nmc42test.nmc42mdl_course, nmc42test.nmc42mdl_grade_items, nmc42test.nmc42mdl_grade_grades, nmc42test.nmc42mdl_user
-- where nmc42mdl_grade_items.id=nmc42mdl_grade_grades.itemid
--         and nmc42mdl_user.id=nmc42mdl_grade_grades.userid
--         and nmc42mdl_grade_grades.userid=55
-- --         and nmc42mdl_grade_items.courseid=4
-- 		and nmc42mdl_course.id=7
--         and nmc42mdl_grade_grades.finalgrade is not null
--         and nmc42mdl_grade_items.itemname is not null
-- --        AND nmc42test.nmc42mdl_grade_grades.timemodified >= (UNIX_TIMESTAMP(NOW())-TIME_TO_SEC(NOW()))
--         order by nmc42mdl_grade_items.id;
select nmc42test.nmc42mdl_grade_items.itemname,
	nmc42test.nmc42mdl_modules.name,
	nmc42test.nmc42mdl_course.fullname
from nmc42test.nmc42mdl_course, nmc42test.nmc42mdl_grade_items, nmc42test.nmc42mdl_course_modules, nmc42test.nmc42mdl_modules
where nmc42test.nmc42mdl_course.id=4;