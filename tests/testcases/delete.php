<?php
$tests = array (
  0 => 
  array (
    'sql' => '
delete from dog where cat = 4 and horse <> "dead meat" or mouse = \'furry\';

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'delete',
        'table_names' => 
        array (
          0 => 'dog',
        ),
        'where_clause' => 
        array (
          'args' => 
          array (
            0 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'cat',
              'alias' => '',
            ),
            1 => 
            array (
              'value' => 4,
              'type' => 'int_val',
            ),
            2 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'horse',
              'alias' => '',
            ),
            3 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'dead meat',
              'alias' => '',
            ),
            4 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'mouse',
              'alias' => '',
            ),
            5 => 
            array (
              'value' => 'furry',
              'type' => 'text_val',
            ),
          ),
          'ops' => 
          array (
            0 => '=',
            1 => 'and',
            2 => '<>',
            3 => 'or',
            4 => '=',
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
-- SQL_PARSER_FLAG_FAIL
delete from;

',
    'expect' => '
Caught exception: Parse error: Expected a table name on line 3
delete from;
           ^ found: ";"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1342): SQL_Parser->raiseError(\'Expected a tabl...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1712): SQL_Parser->parseDelete()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#3 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#4 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
delete from cat;

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'delete',
        'table_names' => 
        array (
          0 => 'cat',
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
-- SQL_PARSER_FLAG_FAIL
delete from where cat = 53;

',
    'expect' => '
Caught exception: Parse error: Expected a table name on line 3
delete from where cat = 53;
            ^ found: "where"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1342): SQL_Parser->raiseError(\'Expected a tabl...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1712): SQL_Parser->parseDelete()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#3 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#4 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
delete from dog where mouse is happy;
',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'delete',
        'table_names' => 
        array (
          0 => 'dog',
        ),
        'where_clause' => 
        array (
          'args' => 
          array (
            0 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'mouse',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'happy',
              'alias' => '',
            ),
          ),
          'ops' => 
          array (
            0 => 'is',
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
