<?php
$tests = array (
  0 => 
  array (
    'sql' => '
(SELECT a);',
    'expect' => 
    array (
      0 => 
      array (
        0 => 
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
                    'column' => 'a',
                    'alias' => '',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
