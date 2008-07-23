-- SQL PARSER TESTCASE
CREATE TABLE parttime_employment (
    category enum('template','active','inactive'),
    department_id int,
    jobtitle varchar(40),
    available_hours varchar(40),
    available_dates varchar(40),
    pay varchar(40),
    description text,
    required_qualifications text,
    preferred_qualifications text,
    instructions text
);


-- SQL PARSER TESTCASE
create table departments (
    id int auto_increment default 0,
    title varchar(30)
);


-- SQL PARSER TESTCASE
insert into departments (title)	values ('Accounting Office');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Administrative Office');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Audio/Visual');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Building Management');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Building Services');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Cactus Cafe');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Cash Operations');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Commons Coffee Company');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Data Processing');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Housekeeping');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Human Resources');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Informal Classes');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Information Desk');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Jester Center Campus Store');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Maintenance');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Programming Office');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Reservation Office');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Union Campus Store');

-- SQL PARSER TESTCASE
insert into departments (title) values ('Union Underground');
