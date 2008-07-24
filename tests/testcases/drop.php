<?php
$tests = array (
  0 => 
  array (
    'sql' => '
drop table dishes cascade;

',
    'expect' => 
    array (
      'command' => 'drop_table',
      'table_names' => 
      array (
        0 => 'dishes',
      ),
      'drop_behavior' => 'cascade',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
drop table bondage restrict;

',
    'expect' => 
    array (
      'command' => 'drop_table',
      'table_names' => 
      array (
        0 => 'bondage',
      ),
      'drop_behavior' => 'restrict',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table bondage, dishes;

',
    'expect' => 'Parse error: Expected EOQ, found: , on line 3
drop table bondage, dishes;
                  ^ found: ","',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table play cascade restrict;

',
    'expect' => 'Parse error: Expected EOQ, found: restrict on line 3
drop table play cascade restrict;
                        ^ found: "restrict"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table cat where mouse = floor;

',
    'expect' => 'Parse error: Expected EOQ, found: where on line 3
drop table cat where mouse = floor;
               ^ found: "where"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop elephant;
',
    'expect' => 'Parse error: Expected EOQ, found: ident on line 3
drop elephant;
     ^ found: "elephant"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
