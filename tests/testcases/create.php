<?php
$tests = array (
  0 => 
  array (
    'sql' => '
CREATE TABLE albums (
    name varchar(60),
    directory varchar(60),
    rating enum (1,2,3,4,5,6,7,8,9,10) NOT NULL,
    category set(\'sexy\',\'\\\'family time\\\'\',"outdoors",\'generic\',\'very weird\') NULL,
    description text NULL,
    id int default 200 PRIMARY KEY
);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'albums',
        ),
        'column_defs' => 
        array (
          'name' => 
          array (
            'type' => 'varchar',
            'length' => 60,
          ),
          'directory' => 
          array (
            'type' => 'varchar',
            'length' => 60,
          ),
          'rating' => 
          array (
            'type' => 'enum',
            'domain' => 
            array (
              0 => 1,
              1 => 2,
              2 => 3,
              3 => 4,
              4 => 5,
              5 => 6,
              6 => 7,
              7 => 8,
              8 => 9,
              9 => 10,
            ),
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'not_null',
                'value' => true,
              ),
            ),
          ),
          'category' => 
          array (
            'type' => 'set',
            'domain' => 
            array (
              0 => 'sexy',
              1 => '\'family time\'',
              2 => 'outdoors',
              3 => 'generic',
              4 => 'very weird',
            ),
          ),
          'description' => 
          array (
            'type' => 'text',
          ),
          'id' => 
          array (
            'type' => 'int',
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'default_value',
                'value' => 200,
              ),
              1 => 
              array (
                'type' => 'primary_key',
                'value' => true,
              ),
            ),
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
CREATE TABLE photos (
    filename varchar(60) not NULL,
    name varchar(60) default \'no name\',
    album int,
    price float (4,2),
    description text default \'hello\',
    id int default 0 primary key not null,
);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'photos',
        ),
        'column_defs' => 
        array (
          'filename' => 
          array (
            'type' => 'varchar',
            'length' => 60,
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'not_null',
                'value' => true,
              ),
            ),
          ),
          'name' => 
          array (
            'type' => 'varchar',
            'length' => 60,
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'default_value',
                'value' => 'no name',
              ),
            ),
          ),
          'album' => 
          array (
            'type' => 'int',
          ),
          'price' => 
          array (
            'type' => 'float',
            'length' => 4,
          ),
          'description' => 
          array (
            'type' => 'text',
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'default_value',
                'value' => 'hello',
              ),
            ),
          ),
          'id' => 
          array (
            'type' => 'int',
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'default_value',
                'value' => 0,
              ),
              1 => 
              array (
                'type' => 'primary_key',
                'value' => true,
              ),
              2 => 
              array (
                'type' => 'not_null',
                'value' => true,
              ),
            ),
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
create table brent (
    filename varchar(10),
    description varchar(20),
);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'brent',
        ),
        'column_defs' => 
        array (
          'filename' => 
          array (
            'type' => 'varchar',
            'length' => 10,
          ),
          'description' => 
          array (
            'type' => 'varchar',
            'length' => 20,
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
CREATE TABLE films ( 
    code      CHARACTER(5) CONSTRAINT firstkey PRIMARY KEY, 
    title     CHARACTER VARYING(40) NOT NULL, 
    did       DECIMAL(3) NOT NULL, 
    date_prod DATE, 
    kind      CHAR(10), 
    len       INTERVAL HOUR TO MINUTE
    CONSTRAINT production UNIQUE(date_prod)
);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'films',
        ),
        'column_defs' => 
        array (
          'code' => 
          array (
            'type' => 'char',
            'length' => 5,
            'constraints' => 
            array (
              'firstkey' => 
              array (
                'type' => 'primary_key',
                'value' => true,
              ),
            ),
          ),
          'title' => 
          array (
            'type' => 'char',
            'length' => 40,
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'not_null',
                'value' => true,
              ),
            ),
          ),
          'did' => 
          array (
            'type' => 'numeric',
            'length' => 3,
            'constraints' => 
            array (
              0 => 
              array (
                'type' => 'not_null',
                'value' => true,
              ),
            ),
          ),
          'date_prod' => 
          array (
            'type' => 'date',
          ),
          'kind' => 
          array (
            'type' => 'char',
            'length' => 10,
          ),
          'len' => 
          array (
            'type' => 'interval',
            'constraints' => 
            array (
              0 => 
              array (
                'quantum_1' => 'hour',
                'quantum_2' => 'minute',
                'type' => 'values',
              ),
              'production' => 
              array (
                'type' => 'unique',
                'column_names' => 
                array (
                  0 => 'date_prod',
                ),
              ),
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
-- SQL_PARSER_FLAG_FAIL
CREATE TABLE films ( 
    code      CHARACTER(5) CONSTRAINT firstkey PRIMARY KEY, 
    title     CHARACTER VARYING(40) NOT NULL, 
    did       DECIMAL(3) NOT NULL, 
    date_prod DATE, 
    kind      CHAR(10), 
    len       INTERVAL minute to hour
    CONSTRAINT production UNIQUE(date_prod)
);

',
    'expect' => '
Caught exception: Parse error: hour is not smaller than minute on line 9
    len       INTERVAL minute to hour
                                 ^ found: "hour"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(574): SQL_Parser->raiseError(\'hour is not sma...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1006): SQL_Parser->parseFieldOptions()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1068): SQL_Parser->parseFieldList()
#3 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#4 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#5 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#6 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
CREATE TABLE distributors ( 
    did      DECIMAL(3) PRIMARY KEY DEFAULT NEXTVAL(\'serial\'), 
    name     VARCHAR(40) NOT NULL CHECK (name <> \'\') 
    CONSTRAINT con1 CHECK (did > 100 AND name > \'\') 
);

',
    'expect' => '
Caught exception: Parse error: Unexpected token name on line 4
    name     VARCHAR(40) NOT NULL CHECK (name <> \'\') 
    ^ found: "name"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(599): SQL_Parser->raiseError(\'Unexpected toke...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1006): SQL_Parser->parseFieldOptions()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1068): SQL_Parser->parseFieldList()
#3 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#4 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#5 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??CREATE TABLE ...\')
#6 {main}
',
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  6 => 
  array (
    'sql' => '
CREATE TABLE distributors ( 
    did      DECIMAL(3) PRIMARY KEY, 
    name     VARCHAR(40) 
);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'distributors',
        ),
        'column_defs' => 
        array (
          'did' => 
          array (
            'type' => 'numeric',
            'length' => 3,
            'constraints' => 
            array (
              0 => 
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
CREATE TABLE msgs ( user_id integer, msg_id integer, msg_text varchar, msg_title varchar(30), msg_date time);

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'create_table',
        'table_names' => 
        array (
          0 => 'msgs',
        ),
        'column_defs' => 
        array (
          'user_id' => 
          array (
            'type' => 'int',
          ),
          'msg_id' => 
          array (
            'type' => 'int',
          ),
          'msg_text' => 
          array (
            'type' => 'varchar',
          ),
          'msg_title' => 
          array (
            'type' => 'varchar',
            'length' => 30,
          ),
          'msg_date' => 
          array (
            'type' => 'time',
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
-- SQL_PARSER_FLAG_FAIL
create table nodefinitions;

',
    'expect' => '
Caught exception: Parse error: Expected ( on line 3
create table nodefinitions;
                          ^ found: ";"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(869): SQL_Parser->raiseError(\'Expected (\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1068): SQL_Parser->parseFieldList()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#3 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#4 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#5 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  9 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
create dogfood;

',
    'expect' => '
Caught exception: Parse error: Unknown object to create on line 3
create dogfood;
       ^ found: "dogfood"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1085): SQL_Parser->raiseError(\'Unknown object ...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#3 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#4 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  10 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
create table dunce (name varchar;

',
    'expect' => '
Caught exception: Parse error: Unexpected token ; on line 3
create table dunce (name varchar;
                                ^ found: ";"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(599): SQL_Parser->raiseError(\'Unexpected toke...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1006): SQL_Parser->parseFieldOptions()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1068): SQL_Parser->parseFieldList()
#3 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#4 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#5 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#6 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  11 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
create table dunce (name varchar(2,3));
',
    'expect' => '
Caught exception: Parse error: Expected 1 parameter on line 3
create table dunce (name varchar(2,3));
                                    ^ found: ")"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(984): SQL_Parser->raiseError(\'Expected 1 para...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1068): SQL_Parser->parseFieldList()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1715): SQL_Parser->parseCreate()
#3 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#4 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#5 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
