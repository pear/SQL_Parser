<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT 1;
SELECT "1";',
    'expect' => 
    array (
      'command' => 'select',
      'column_values' => 
      array (
        0 => 1,
        1 => ';',
        2 => 'SELECT',
      ),
      'column_names' => 
      array (
        0 => 1,
        1 => ';',
        2 => 'SELECT',
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
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => '1',
          'alias' => '',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
