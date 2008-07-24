<?php
$tests = array (
  0 => 
  array (
    'sql' => '
delete from dog where cat = 4 and horse <> "dead meat" or mouse = \'furry\';

',
    'expect' => 
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
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
delete from;

',
    'expect' => 'Parse error: Expected a table name on line 3
delete from;
           ^ found: ";"',
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
      'command' => 'delete',
      'table_names' => 
      array (
        0 => 'cat',
      ),
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
    'expect' => 'Parse error: Expected EOQ, found: where on line 3
delete from where cat = 53;
            ^ found: "where"',
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
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
