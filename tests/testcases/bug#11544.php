<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
update `zzz` set `kkk`=(`susus` + 1), `vvv1`=\'a1b\', `ccc`=\'bbb\' where `uccc`=\'aaa\'

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'zzz',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'kkk',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'vvv1',
          'alias' => '',
        ),
        2 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'ccc',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 'susus+1',
          'type' => 'ident+int_val',
        ),
        1 => 
        array (
          'value' => 'a1b',
          'type' => 'text_val',
        ),
        2 => 
        array (
          'value' => 'bbb',
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
            'column' => 'uccc',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'aaa',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => '=',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
update `zzz` set `kkk`=(1 + 1), `vvv1`=\'a1b\', `ccc`=\'bbb\' where `uccc`=\'aaa\'

',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'zzz',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'kkk',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'vvv1',
          'alias' => '',
        ),
        2 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'ccc',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => '1+1',
          'type' => 'int_val+int_val',
        ),
        1 => 
        array (
          'value' => 'a1b',
          'type' => 'text_val',
        ),
        2 => 
        array (
          'value' => 'bbb',
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
            'column' => 'uccc',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'aaa',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => '=',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  2 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
select * from `abc` where `abc`=\'tdd\' and `cbu`=(`lbu` - 1)

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => '*',
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
              'table' => 'abc',
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
            'column' => 'abc',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'tdd',
            'type' => 'text_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'cbu',
            'alias' => '',
          ),
          3 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'lbu',
                'alias' => '',
              ),
              1 => 
              array (
                'value' => 1,
                'type' => 'int_val',
              ),
            ),
            'ops' => 
            array (
              0 => '-',
            ),
          ),
        ),
        'ops' => 
        array (
          0 => '=',
          1 => 'and',
          2 => '=',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  3 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
update `abc` set `minus`=(`minus` - 2), `minus2`=(2 - 3) where `aaa`=\'bbb\'
',
    'expect' => 
    array (
      'command' => 'update',
      'tables' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'abc',
          'alias' => '',
        ),
      ),
      'columns' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'minus',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'minus2',
          'alias' => '',
        ),
      ),
      'values' => 
      array (
        0 => 
        array (
          'value' => 'minus-2',
          'type' => 'ident-int_val',
        ),
        1 => 
        array (
          'value' => '2-3',
          'type' => 'int_val-int_val',
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
            'column' => 'aaa',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'bbb',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => '=',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
