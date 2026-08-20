-- ============================================================
-- Task 2 : Database (db.sql)
-- Study Plan Management System
-- ============================================================

-- Task 2 (a) : Create the database "study_plan" with collation utf8_general_ci
CREATE DATABASE IF NOT EXISTS `study_plan`
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;

USE `study_plan`;

-- Task 2 (b) : Create the "students" table
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` INT NOT NULL,
  `name` VARCHAR(100),
  `email` VARCHAR(100),
  `password` VARCHAR(255),
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Task 2 (c) : Create the "student_courses" table
-- student_id -> foreign key to students.student_id
-- course_id  -> foreign key to courses.course_id
--               (the "courses" table is imported from courses.sql)
-- Both columns together are the primary key, so one student can take many
-- courses and one course can be taken by many students.
CREATE TABLE IF NOT EXISTS `student_courses` (
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  PRIMARY KEY (`student_id`, `course_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`student_id`),
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Note 1: The MyISAM engine is used because the provided "courses.sql" also
--         uses MyISAM. Both tables must use the same engine.
-- Note 2: After running this file, import "courses.sql" into the "study_plan"
--         database to get the "courses" table.
