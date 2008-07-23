<?php
$tests = array (
  0 => 
  array (
    'sql' => '
delete from dog where cat = 4 and horse <> "dead meat" or mouse = \'furry\';

',
    'expect' => 
    array (
      'command' => 'delete',
      'table_names' => 
      array (
        0 => 'dog',
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'cat',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'arg_1' => 
            array (
              'value' => 'horse',
              'type' => 'ident',
            ),
            'op' => '<>',
            'arg_2' => 
            array (
              'value' => 'dead meat',
              'type' => 'ident',
            ),
          ),
          'op' => 'or',
          'arg_2' => 
          array (
            'arg_1' => 
            array (
              'value' => 'mouse',
              'type' => 'ident',
            ),
            'op' => '=',
            'arg_2' => 
            array (
              'value' => 'furry',
              'type' => 'text_val',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
delete from;

',
    'expect' => 'Parse error: Expected a table name on line 2
-- SQL_PARSER_FLAG_FAIL
                                    ^ found: ";"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
delete from cat;

',
    'expect' => 
    array (
      'command' => 'delete',
      'table_names' => 
      array (
        0 => 'cat',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
delete from where cat = 53;

',
    'expect' => 'Parse error: Expected a table name on line 2
-- SQL_PARSER_FLAG_FAIL
                                     ^ found: "where"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
delete from dog where mouse is happy;
',
    'expect' => 'Parse error: Expected "null" on line 2
-- SQL_PARSER_FLAG_FAIL
                                                        ^ found: "happy"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
