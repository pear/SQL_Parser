<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
UNLOCK TABLES;

',
    'expect' => 'Parse error: Unknown action: unlock on line 3
UNLOCK TABLES;
^ found: "UNLOCK"',
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
LOCK TABLES `mpn_bannerfinish` WRITE;
',
    'expect' => 'Parse error: Unknown action: lock on line 3
LOCK TABLES `mpn_bannerfinish` WRITE;
^ found: "LOCK"',
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
