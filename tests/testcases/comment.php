<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
# Test Comment;
SELECT \'a\';

',
    'expect' => 
    array (
      'command' => 'select',
      'column_values' => 
      array (
        0 => 'a',
        1 => ';',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => ';',
      ),
      'column_tables' => 
      array (
        0 => '',
        1 => '',
      ),
      'column_aliases' => 
      array (
        0 => '',
        1 => '',
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
SELECT \'a\' # Test Comment;
, \'b\';

',
    'expect' => 
    array (
      'command' => 'select',
      'column_values' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_tables' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
      'column_aliases' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  2 => 
  array (
    'sql' => '
SELECT \'a\' -- Test Comment;
\'b\';

',
    'expect' => 
    array (
      'command' => 'select',
      'column_values' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_tables' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
      'column_aliases' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
SELECT \'a\' /* Test Comment; */, \'b\'; -- Comment

',
    'expect' => 
    array (
      'command' => 'select',
      'column_values' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => ';',
      ),
      'column_tables' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
      'column_aliases' => 
      array (
        0 => '',
        1 => '',
        2 => '',
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
