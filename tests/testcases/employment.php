<?php
$tests = array (
  0 => 
  array (
    'sql' => '
CREATE TABLE parttime_employment (
    category enum(\'template\',\'active\',\'inactive\'),
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


',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'parttime_employment',
        ),
        'column_defs' => 
        array (
          'category' => 
          array (
            'type' => 'enum',
            'domain' => 
            array (
              0 => 'template',
              1 => 'active',
              2 => 'inactive',
            ),
          ),
          'department_id' => 
          array (
            'type' => 'int',
          ),
          'jobtitle' => 
          array (
            'type' => 'varchar',
            'length' => 40,
          ),
          'available_hours' => 
          array (
            'type' => 'varchar',
            'length' => 40,
          ),
          'available_dates' => 
          array (
            'type' => 'varchar',
            'length' => 40,
          ),
          'pay' => 
          array (
            'type' => 'varchar',
            'length' => 40,
          ),
          'description' => 
          array (
            'type' => 'text',
          ),
          'required_qualifications' => 
          array (
            'type' => 'text',
          ),
          'preferred_qualifications' => 
          array (
            'type' => 'text',
          ),
          'instructions' => 
          array (
            'type' => 'text',
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
create table departments (
    id int auto_increment default 0,
    title varchar(30)
);


',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'departments',
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
                'type' => 'default_value',
                'value' => 0,
              ),
            ),
          ),
          'title' => 
          array (
            'type' => 'varchar',
            'length' => 30,
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
insert into departments (title)	values (\'Accounting Office\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Accounting Office',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
insert into departments (title) values (\'Administrative Office\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Administrative Office',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
insert into departments (title) values (\'Audio/Visual\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Audio/Visual',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
insert into departments (title) values (\'Building Management\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Building Management',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  6 => 
  array (
    'sql' => '
insert into departments (title) values (\'Building Services\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Building Services',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  7 => 
  array (
    'sql' => '
insert into departments (title) values (\'Cactus Cafe\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Cactus Cafe',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  8 => 
  array (
    'sql' => '
insert into departments (title) values (\'Cash Operations\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Cash Operations',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  9 => 
  array (
    'sql' => '
insert into departments (title) values (\'Commons Coffee Company\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Commons Coffee Company',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  10 => 
  array (
    'sql' => '
insert into departments (title) values (\'Data Processing\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Data Processing',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  11 => 
  array (
    'sql' => '
insert into departments (title) values (\'Housekeeping\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Housekeeping',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  12 => 
  array (
    'sql' => '
insert into departments (title) values (\'Human Resources\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Human Resources',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  13 => 
  array (
    'sql' => '
insert into departments (title) values (\'Informal Classes\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Informal Classes',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  14 => 
  array (
    'sql' => '
insert into departments (title) values (\'Information Desk\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Information Desk',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  15 => 
  array (
    'sql' => '
insert into departments (title) values (\'Jester Center Campus Store\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Jester Center Campus Store',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  16 => 
  array (
    'sql' => '
insert into departments (title) values (\'Maintenance\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Maintenance',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  17 => 
  array (
    'sql' => '
insert into departments (title) values (\'Programming Office\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Programming Office',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  18 => 
  array (
    'sql' => '
insert into departments (title) values (\'Reservation Office\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Reservation Office',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  19 => 
  array (
    'sql' => '
insert into departments (title) values (\'Union Campus Store\');

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Union Campus Store',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  20 => 
  array (
    'sql' => '
insert into departments (title) values (\'Union Underground\');
',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'insert',
        'table_names' => 
        array (
          0 => 'departments',
        ),
        'column_names' => 
        array (
          0 => 'title',
        ),
        'values' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'value' => 'Union Underground',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
