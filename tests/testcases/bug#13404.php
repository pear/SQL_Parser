<?php
$tests = array (
  0 => 
  array (
    'sql' => '-- SQL_PARSER_FLAG_MYSQL
SELECT x FROM y WHERE z > NOW()',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'x',
          'alias' => '',
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
            'column' => 'z',
            'alias' => '',
          ),
          1 => 
          array (
            'name' => 'now',
            'arg' => 
            array (
            ),
            'type' => 
            array (
            ),
          ),
        ),
        'ops' => 
        array (
          0 => '>',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
