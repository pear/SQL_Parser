<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
UNLOCK TABLES;

',
    'expect' => 
    array (
      'command' => 'unlock tables',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
LOCK TABLES `mpn_bannerfinish` WRITE;
',
    'expect' => 
    array (
      'command' => 'lock tables',
      'locks' => 
      array (
        0 => 
        array (
          'type' => 'write',
          'table' => 
          array (
            'database' => '',
            'table' => 'mpn_bannerfinish',
            'alias' => '',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
