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

create table departments (
	id int auto_increment default 0,
	title varchar(30)
);

insert into departments (title)	values ('Accounting Office');
insert into departments (title) values ('Administrative Office');
insert into departments (title) values ('Audio/Visual');
insert into departments (title) values ('Building Management');
insert into departments (title) values ('Building Services');
insert into departments (title) values ('Cactus Cafe');
insert into departments (title) values ('Cash Operations');
insert into departments (title) values ('Commons Coffee Company');
insert into departments (title) values ('Data Processing');
insert into departments (title) values ('Housekeeping');
insert into departments (title) values ('Human Resources');
insert into departments (title) values ('Informal Classes');
insert into departments (title) values ('Information Desk');
insert into departments (title) values ('Jester Center Campus Store');
insert into departments (title) values ('Maintenance');
insert into departments (title) values ('Programming Office');
insert into departments (title) values ('Reservation Office');
insert into departments (title) values ('Union Campus Store');
insert into departments (title) values ('Union Underground');
