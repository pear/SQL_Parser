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
        'arg_1' => 
        array (
          'value' => 'z',
          'type' => 'ident',
        ),
        'op' => '>',
        'arg_2' => 
        array (
          'value' => 
          array (
            'name' => 'now',
            'arg' => 
            array (
            ),
            'type' => 
            array (
            ),
          ),
          'type' => 'function',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
