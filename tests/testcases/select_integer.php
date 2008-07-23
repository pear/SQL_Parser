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
        3 => '1',
      ),
      'column_tables' => 
      array (
        0 => '',
        1 => '',
        2 => '',
        3 => '',
      ),
      'column_aliases' => 
      array (
        0 => '',
        1 => '',
        2 => '',
        3 => '',
      ),
    ),
    'fail' => false,
  ),
);
?>
