<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT "a" WHERE "b" BETWEEN "a" AND "c";',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'a',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'b',
          'alias' => '',
        ),
        2 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'a',
          'alias' => '',
        ),
        3 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'c',
          'alias' => '',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
