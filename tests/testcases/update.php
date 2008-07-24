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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'moose',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'howdydoo',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => '!=',
        ),
      ),
    ),
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'moose',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'howdydoo',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => '<>',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '>',
          1 => 'and',
          2 => '<>',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
          4 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'dog',
            'alias' => '',
          ),
          5 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'Hello',
            'alias' => '',
          ),
        ),
        'ops' => 
        array (
          0 => '>',
          1 => 'and',
          2 => '<>',
          3 => 'or',
          4 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'col',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 30,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '>',
          1 => 'and',
          2 => '<',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
