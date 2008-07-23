<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT "a" WHERE "b" BETWEEN "a" AND "c";',
    'expect' => 
    array (
      'command' => 'select',
      'column_tables' => 
      array (
        0 => '',
        1 => '',
        2 => '',
        3 => '',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => 'b',
        2 => 'a',
        3 => 'c',
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
