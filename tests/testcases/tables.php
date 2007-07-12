<?php
$tests = array(
array(
'sql' => 'CREATE TABLE event (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	foreign_id INTEGER,
	active BOOLEAN DEFAULT \'true\',
	status SET(\'canceled\',\'sold out\',\'rescheduled\',\'changed location\'),
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
	flags SET(\'interpreter\',\'childcare\')
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 2
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE event_category (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30)
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 3
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE notice (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(50),
	description TEXT,
	uri VARCHAR(30),
	link_only BOOLEAN,
	image VARCHAR(30),
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 3
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE schedule (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	event_id INTEGER,
	date_start DATE,
	date_finish DATE,
	time_start TIME,
	time_finish TIME,
	repeats ENUM(\'once\',\'daily\',\'weekly\',\'monthly\'),
	type ENUM(\'event\', \'notice\', \'location\'),
	spotlight BOOLEAN
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 3
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE contacts (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(40),
	email VARCHAR(40),
	organization VARCHAR(40),
	phone VARCHAR(16)
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 3
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE location (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(40),
	description VARCHAR(40),
	address TEXT,
	capacity INTEGER,
)',
'expect' => 'Parse error: Unexpected token AUTO_INCREMENT on line 3
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
            ^ found: "AUTO_INCREMENT"'

),
array(
'sql' => '
CREATE TABLE room (
	id INTEGER,
	description VARCHAR(50),
	shape enum(\'round\', \'square\', \'rectangular\'),
	capacity_min INTEGER,
	capacity_max INTEGER,
	dimension_x INTEGER,
	dimension_y INTEGER,
	furniture VARCHAR(60),
	image VARCHAR(50),
	notes VARCHAR(50),
)',
'expect' => array(
        'command' => 'create_table',
        'table_names' => array(
            0 => 'room'
            ),
        'column_defs' => array(
            'id' => array(
                'type' => 'int'
                ),
            'description' => array(
                'type' => 'varchar',
                'length' => 50
                ),
            'shape' => array(
                'type' => 'enum',
                'domain' => array(
                    0 => 'round',
                    1 => 'square',
                    2 => 'rectangular'
                    )
                ),
            'capacity_min' => array(
                'type' => 'int'
                ),
            'capacity_max' => array(
                'type' => 'int'
                ),
            'dimension_x' => array(
                'type' => 'int'
                ),
            'dimension_y' => array(
                'type' => 'int'
                ),
            'furniture' => array(
                'type' => 'varchar',
                'length' => 60
                ),
            'image' => array(
                'type' => 'varchar',
                'length' => 50
                ),
            'notes' => array(
                'type' => 'varchar',
                'length' => 50
                )
            )
        )
),
array(
'sql' => '
CREATE TABLE room_uses (
	id INTEGER,
	room_id INTEGER,
	description VARCHAR(50),
	capacity_min INTEGER,
	capacity_max INTEGER,
)',
'expect' => array(
        'command' => 'create_table',
        'table_names' => array(
            0 => 'room_uses'
            ),
        'column_defs' => array(
            'id' => array(
                'type' => 'int'
                ),
            'room_id' => array(
                'type' => 'int'
                ),
            'description' => array(
                'type' => 'varchar',
                'length' => 50
                ),
            'capacity_min' => array(
                'type' => 'int'
                ),
            'capacity_max' => array(
                'type' => 'int'
                )
            )
        )
),
);
?>
