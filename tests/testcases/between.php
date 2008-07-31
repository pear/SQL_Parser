<?php
$tests = array (
  0 => 
  array (
    'sql' => '
SELECT "a" FROM mytable WHERE "b" BETWEEN "a" AND "c";

',
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
                'column' => 'a',
                'alias' => '',
              ),
            ),
          ),
        ),
        'from' => 
        array (
          'table_references' => 
          array (
            'table_factors' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => 'mytable',
                'alias' => '',
              ),
            ),
          ),
        ),
        'where_clause' => 
        array (
          'args' => 
          array (
            0 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'b',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'a',
              'alias' => '',
            ),
            2 => 
            array (
              'database' => '',
              'table' => '',
              'column' => 'c',
              'alias' => '',
            ),
          ),
          'ops' => 
          array (
            0 => 'and',
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
SELECT "b" BETWEEN "a" AND "c" FROM mytable;',
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
                'column' => 'b',
                'alias' => '',
              ),
              1 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'a',
                'alias' => '',
              ),
              2 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'c',
                'alias' => '',
              ),
            ),
            'ops' => 
            array (
              0 => 'and',
            ),
          ),
        ),
        'from' => 
        array (
          'table_references' => 
          array (
            'table_factors' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => 'mytable',
                'alias' => '',
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
