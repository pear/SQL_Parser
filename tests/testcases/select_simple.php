<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT abc',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'abc',
          'alias' => '',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
