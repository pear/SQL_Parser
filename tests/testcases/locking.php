<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
LOCK TABLES mytable READ, db.mytable AS mytab2 WRITE

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'lock tables',
        'locks' => 
        array (
          0 => 
          array (
            'type' => 'read',
            'table' => 
            array (
              'database' => '',
              'table' => 'mytable',
              'alias' => '',
            ),
          ),
          1 => 
          array (
            'type' => 'write',
            'table' => 
            array (
              'database' => 'db',
              'table' => 'mytable',
              'alias' => 'mytab2',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
UNLOCK TABLES

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'unlock tables',
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  2 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
-- SQL_PARSER_FLAG_FAIL
UNLOCK TABLES mytable',
    'expect' => '
Caught exception: Parse error: Expected EOQ on line 4
UNLOCK TABLES mytable
              ^ found: "mytable"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1783): SQL_Parser->raiseError(\'Expected EOQ\')
#1 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#2 {main}
',
    'fail' => true,
    'dialect' => 'MySQL',
  ),
);
?>
