<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
update dogmeat set horse=2 dog=\'forty\' where moose <> \'howdydoo\';

',
    'expect' => 'Parse error: Expected EOQ, found: ident on line 3
update dogmeat set horse=2 dog=\'forty\' where moose <> \'howdydoo\';
                           ^ found: "dog"',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
update dogmeat set horse=2, dog=\'forty\' where moose != \'howdydoo\';

',
    'expect' => 'Parse error: Expected EOQ, found: != on line 2
update dogmeat set horse=2, dog=\'forty\' where moose != \'howdydoo\';
                                                    ^ found: "!="',
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
update dogmeat set horse=2, dog=\'forty\' where moose <> \'howdydoo\';

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'dogmeat',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'horse',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'dog',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 2,
          'type' => 'int_val',
        ),
        1 => 
        array (
          'value' => 'forty',
          'type' => 'text_val',
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'moose',
          'type' => 'ident',
        ),
        'op' => '<>',
        'arg_2' => 
        array (
          'value' => 'howdydoo',
          'type' => 'text_val',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
update table1 set col=1 where not col = 2;

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'table1',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'col',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 1,
          'type' => 'int_val',
        ),
      ),
      'where_clause' => 
      array (
        'neg' => true,
        'arg_1' => 
        array (
          'value' => 'col',
          'type' => 'ident',
        ),
        'op' => '=',
        'arg_2' => 
        array (
          'value' => 2,
          'type' => 'int_val',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
update table2 set col=1 where col > 2 and col <> 4;

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'table2',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'col',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 1,
          'type' => 'int_val',
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'col',
            'type' => 'ident',
          ),
          'op' => '>',
          'arg_2' => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'col',
            'type' => 'ident',
          ),
          'op' => '<>',
          'arg_2' => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
update table2 set col=1 where col > 2 and col <> 4 or dog="Hello";

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'table2',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'col',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 1,
          'type' => 'int_val',
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'col',
            'type' => 'ident',
          ),
          'op' => '>',
          'arg_2' => 
          array (
            'value' => 2,
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
              'value' => 'col',
              'type' => 'ident',
            ),
            'op' => '<>',
            'arg_2' => 
            array (
              'value' => 4,
              'type' => 'int_val',
            ),
          ),
          'op' => 'or',
          'arg_2' => 
          array (
            'arg_1' => 
            array (
              'value' => 'dog',
              'type' => 'ident',
            ),
            'op' => '=',
            'arg_2' => 
            array (
              'value' => 'Hello',
              'type' => 'ident',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  6 => 
  array (
    'sql' => '
update table3 set col=1 where col > 2 and col < 30;
',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'table3',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'col',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 1,
          'type' => 'int_val',
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'col',
            'type' => 'ident',
          ),
          'op' => '>',
          'arg_2' => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'col',
            'type' => 'ident',
          ),
          'op' => '<',
          'arg_2' => 
          array (
            'value' => 30,
            'type' => 'int_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
