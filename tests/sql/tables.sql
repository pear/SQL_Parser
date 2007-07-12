CREATE TABLE event (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	foreign_id INTEGER,
	active BOOLEAN DEFAULT 'true',
	status SET('canceled','sold out','rescheduled','changed location'),
	category_id VARCHAR(10),
	status_desc VARCHAR(40),
	title VARCHAR(40),
	featuring VARCHAR(40),
	sponsors VARCHAR(40),
	uri VARCHAR(30),
	image VARCHAR(30),
	description TEXT,
	location_id_primary INTEGER,
	location_id_secondary INTEGER,
	cost VARCHAR(30),
	contact_id INTEGER,
	flags SET('interpreter','childcare')
);

CREATE TABLE event_category (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30)
);

CREATE TABLE notice (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(50),
	description TEXT,
	uri VARCHAR(30),
	link_only BOOLEAN,
	image VARCHAR(30),
);

CREATE TABLE schedule (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	event_id INTEGER,
	date_start DATE,
	date_finish DATE,
	time_start TIME,
	time_finish TIME,
	repeats ENUM('once','daily','weekly','monthly'),
	type ENUM('event', 'notice', 'location'),
	spotlight BOOLEAN
);

CREATE TABLE contacts (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(40),
	email VARCHAR(40),
	organization VARCHAR(40),
	phone VARCHAR(16)
);

CREATE TABLE location (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(40),
	description VARCHAR(40),
	address TEXT,
	capacity INTEGER,
);

CREATE TABLE room (
	id INTEGER,
	description VARCHAR(50),
	shape enum('round', 'square', 'rectangular'),
	capacity_min INTEGER,
	capacity_max INTEGER,
	dimension_x INTEGER,
	dimension_y INTEGER,
	furniture VARCHAR(60),
	image VARCHAR(50),
	notes VARCHAR(50),
);

CREATE TABLE room_uses (
	id INTEGER,
	room_id INTEGER,
	description VARCHAR(50),
	capacity_min INTEGER,
	capacity_max INTEGER,
);
