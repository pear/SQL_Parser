<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT abc',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'select',
        'select_expressions' => 
        array (
          0 => 
          array (
            'args' => 
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
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
