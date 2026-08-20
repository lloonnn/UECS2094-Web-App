-- =====================================================
-- Task 4 (a) & (b) - Database and table for UTAR Library Portal
-- How to run: phpMyAdmin -> Import -> choose this file -> Go
-- (or in the MySQL console:  SOURCE db.sql;)
-- =====================================================

-- (a) Create the database with collation utf8_general_ci
CREATE DATABASE IF NOT EXISTS utar_db
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE utar_db;

-- (b) Create the table
CREATE TABLE IF NOT EXISTS utar_table (
    ID              INT(11) NOT NULL AUTO_INCREMENT,
    Name            VARCHAR(255) NOT NULL,
    Email           TEXT,
    StudentStaffID  TEXT,
    Department      TEXT,
    Password        TEXT,
    PRIMARY KEY (ID),
    UNIQUE (Name)
);
