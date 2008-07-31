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
      0 => 
      array (
        'command' => 'unlock tables',
      ),
      1 => ';',
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
      0 => 
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
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
