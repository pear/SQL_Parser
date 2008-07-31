<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT 1;
SELECT "1";',
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
                'value' => 1,
                'type' => 'int_val',
              ),
            ),
          ),
        ),
      ),
      1 => ';',
      2 => 
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
                'column' => '1',
                'alias' => '',
              ),
            ),
          ),
        ),
      ),
      3 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
