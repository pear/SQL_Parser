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
      'command' => 'unlock tables',
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
    'expect' => 'Parse error: Expected EOQ, found: ident on line 4
UNLOCK TABLES mytable
              ^ found: "mytable"',
    'fail' => true,
    'dialect' => 'MySQL',
  ),
);
?>
