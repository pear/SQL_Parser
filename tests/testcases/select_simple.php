<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT abc',
    'expect' => 
    array (
      'command' => 'select',
      'column_tables' => 
      array (
        0 => '',
      ),
      'column_names' => 
      array (
        0 => 'abc',
      ),
      'column_aliases' => 
      array (
        0 => '',
      ),
    ),
    'fail' => false,
  ),
);
?>
