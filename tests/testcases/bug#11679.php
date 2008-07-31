<?php
$tests = array (
  0 => 
  array (
    'sql' => '-- SQL_PARSER_FLAG_MYSQL
select tab.row_one as row_show from `tables` as tab',
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
                'table' => 'tab',
                'column' => 'row_one',
                'alias' => 'row_show',
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
                'table' => 'tables',
                'alias' => 'tab',
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
