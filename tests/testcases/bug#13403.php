<?php
$tests = array (
  0 => 
  array (
    'sql' => '-- SQL_PARSER_FLAG_MYSQL
SELECT x FROM y INNER JOIN z ON y.a + 1 = z.a',
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
                'column' => 'x',
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
                'table' => 'y',
                'alias' => '',
              ),
              1 => 
              array (
                'database' => '',
                'table' => 'z',
                'alias' => '',
              ),
            ),
            'table_join' => 
            array (
              0 => 'inner join',
            ),
            'table_join_clause' => 
            array (
              0 => 
              array (
                'args' => 
                array (
                  0 => 
                  array (
                    'database' => '',
                    'table' => 'y',
                    'column' => 'a',
                    'alias' => '',
                  ),
                  1 => 
                  array (
                    'value' => 1,
                    'type' => 'int_val',
                  ),
                  2 => 
                  array (
                    'database' => '',
                    'table' => 'z',
                    'column' => 'a',
                    'alias' => '',
                  ),
                ),
                'ops' => 
                array (
                  0 => '+',
                  1 => '=',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
