<?php
$tests = array(
array(
'sql' => 'CREATE TABLE parttime_employment (
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
)',
'expect' => array(
        'command' => 'create_table',
        'table_names' => array(
            0 => 'parttime_employment'
            ),
        'column_defs' => array(
            'category' => array(
                'type' => 'enum',
                'domain' => array(
                    0 => 'template',
                    1 => 'active',
                    2 => 'inactive'
                    )
                ),
            'department_id' => array(
                'type' => 'int'
                ),
            'jobtitle' => array(
                'type' => 'varchar',
                'length' => 40
                ),
            'available_hours' => array(
                'type' => 'varchar',
                'length' => 40
                ),
            'available_dates' => array(
                'type' => 'varchar',
                'length' => 40
                ),
            'pay' => array(
                'type' => 'varchar',
                'length' => 40
                ),
            'description' => array(
                'type' => 'text'
                ),
            'required_qualifications' => array(
                'type' => 'text'
                ),
            'preferred_qualifications' => array(
                'type' => 'text'
                ),
            'instructions' => array(
                'type' => 'text'
                )
            )
        )
),
array(
'sql' => '
create table departments (
	id int auto_increment default 0,
	title varchar(30)
)',
'expect' => 'Parse error: Unexpected token auto_increment on line 3
	id int auto_increment default 0,
        ^ found: "auto_increment"'

),
array(
'sql' => '
insert into departments (title)	values (\'Accounting Office\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Accounting Office',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Administrative Office\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Administrative Office',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Audio/Visual\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Audio/Visual',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Building Management\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Building Management',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Building Services\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Building Services',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Cactus Cafe\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Cactus Cafe',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Cash Operations\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Cash Operations',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Commons Coffee Company\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Commons Coffee Company',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Data Processing\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Data Processing',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Housekeeping\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Housekeeping',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Human Resources\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Human Resources',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Informal Classes\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Informal Classes',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Information Desk\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Information Desk',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Jester Center Campus Store\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Jester Center Campus Store',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Maintenance\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Maintenance',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Programming Office\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Programming Office',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Reservation Office\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Reservation Office',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Union Campus Store\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Union Campus Store',
                'type' => 'text_val'
                )
            )
        )
),
array(
'sql' => 'insert into departments (title) values (\'Union Underground\')',
'expect' => array(
        'command' => 'insert',
        'table_names' => array(
            0 => 'departments'
            ),
        'column_names' => array(
            0 => 'title'
            ),
        'values' => array(
            0 => array(
                'value' => 'Union Underground',
                'type' => 'text_val'
                )
            )
        )
),
);
?>
