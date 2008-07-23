<?php
$tests = array (
  0 => 
  array (
    'sql' => '
CREATE TABLE event (
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
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'event',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'foreign_id' => 
        array (
          'type' => 'int',
        ),
        'active' => 
        array (
          'type' => 'bool',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'default_value',
              'value' => 'true',
            ),
          ),
        ),
        'status' => 
        array (
          'type' => 'set',
          'domain' => 
          array (
            0 => 'canceled',
            1 => 'sold out',
            2 => 'rescheduled',
            3 => 'changed location',
          ),
        ),
        'category_id' => 
        array (
          'type' => 'varchar',
          'length' => 10,
        ),
        'status_desc' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'featuring' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'sponsors' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'uri' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
        'image' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'location_id_primary' => 
        array (
          'type' => 'int',
        ),
        'location_id_secondary' => 
        array (
          'type' => 'int',
        ),
        'cost' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
        'contact_id' => 
        array (
          'type' => 'int',
        ),
        'flags' => 
        array (
          'type' => 'set',
          'domain' => 
          array (
            0 => 'interpreter',
            1 => 'childcare',
          ),
        ),
      ),
    ),
    'fail' => false,
  ),
  1 => 
  array (
    'sql' => '
CREATE TABLE event_category (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30)
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'event_category',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'name' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
      ),
    ),
    'fail' => false,
  ),
  2 => 
  array (
    'sql' => '
CREATE TABLE notice (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT,
    uri VARCHAR(30),
    link_only BOOLEAN,
    image VARCHAR(30),
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'notice',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'title' => 
        array (
          'type' => 'varchar',
          'length' => 50,
        ),
        'description' => 
        array (
          'type' => 'text',
        ),
        'uri' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
        'link_only' => 
        array (
          'type' => 'bool',
        ),
        'image' => 
        array (
          'type' => 'varchar',
          'length' => 30,
        ),
      ),
    ),
    'fail' => false,
  ),
  3 => 
  array (
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
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'schedule',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'event_id' => 
        array (
          'type' => 'int',
        ),
        'date_start' => 
        array (
          'type' => 'date',
        ),
        'date_finish' => 
        array (
          'type' => 'date',
        ),
        'time_start' => 
        array (
          'type' => 'time',
        ),
        'time_finish' => 
        array (
          'type' => 'time',
        ),
        'repeats' => 
        array (
          'type' => 'enum',
          'domain' => 
          array (
            0 => 'once',
            1 => 'daily',
            2 => 'weekly',
            3 => 'monthly',
          ),
        ),
        'type' => 
        array (
          'type' => 'enum',
          'domain' => 
          array (
            0 => 'event',
            1 => 'notice',
            2 => 'location',
          ),
        ),
        'spotlight' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'fail' => false,
  ),
  4 => 
  array (
    'sql' => '
CREATE TABLE contacts (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    email VARCHAR(40),
    organization VARCHAR(40),
    phone VARCHAR(16)
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'contacts',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'name' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'email' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'organization' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'phone' => 
        array (
          'type' => 'varchar',
          'length' => 16,
        ),
      ),
    ),
    'fail' => false,
  ),
  5 => 
  array (
    'sql' => '
CREATE TABLE location (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    description VARCHAR(40),
    address TEXT,
    capacity INTEGER,
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'location',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
          'constraints' => 
          array (
            0 => 
            array (
              'type' => 'auto_increment',
              'value' => true,
            ),
            1 => 
            array (
              'type' => 'primary_key',
              'value' => true,
            ),
          ),
        ),
        'name' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'description' => 
        array (
          'type' => 'varchar',
          'length' => 40,
        ),
        'address' => 
        array (
          'type' => 'text',
        ),
        'capacity' => 
        array (
          'type' => 'int',
        ),
      ),
    ),
    'fail' => false,
  ),
  6 => 
  array (
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
);

',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'room',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
        ),
        'description' => 
        array (
          'type' => 'varchar',
          'length' => 50,
        ),
        'shape' => 
        array (
          'type' => 'enum',
          'domain' => 
          array (
            0 => 'round',
            1 => 'square',
            2 => 'rectangular',
          ),
        ),
        'capacity_min' => 
        array (
          'type' => 'int',
        ),
        'capacity_max' => 
        array (
          'type' => 'int',
        ),
        'dimension_x' => 
        array (
          'type' => 'int',
        ),
        'dimension_y' => 
        array (
          'type' => 'int',
        ),
        'furniture' => 
        array (
          'type' => 'varchar',
          'length' => 60,
        ),
        'image' => 
        array (
          'type' => 'varchar',
          'length' => 50,
        ),
        'notes' => 
        array (
          'type' => 'varchar',
          'length' => 50,
        ),
      ),
    ),
    'fail' => false,
  ),
  7 => 
  array (
    'sql' => '
CREATE TABLE room_uses (
    id INTEGER,
    room_id INTEGER,
    description VARCHAR(50),
    capacity_min INTEGER,
    capacity_max INTEGER,
);
',
    'expect' => 
    array (
      'command' => 'create_table',
      'table_names' => 
      array (
        0 => 'room_uses',
      ),
      'column_defs' => 
      array (
        'id' => 
        array (
          'type' => 'int',
        ),
        'room_id' => 
        array (
          'type' => 'int',
        ),
        'description' => 
        array (
          'type' => 'varchar',
          'length' => 50,
        ),
        'capacity_min' => 
        array (
          'type' => 'int',
        ),
        'capacity_max' => 
        array (
          'type' => 'int',
        ),
      ),
    ),
    'fail' => false,
  ),
);
?>
