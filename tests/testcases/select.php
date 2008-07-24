<?php
$tests = array (
  0 => 
  array (
    'sql' => '
select * from dog where cat <> 4;

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
              'table' => 'dog',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'cat',
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
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
select legs, hairy from dog;

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
          'column' => 'legs',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'hairy',
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
              'table' => 'dog',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
select max(length) from dog;

',
    'expect' => 
    array (
      'command' => 'select',
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'max',
          'arg' => 
          array (
            0 => 'length',
          ),
          'type' => 
          array (
            0 => 'ident',
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
              'table' => 'dog',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
select count(distinct country) from publishers;

',
    'expect' => 
    array (
      'command' => 'select',
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'count',
          'arg' => 
          array (
            0 => 'distinctcountry',
          ),
          'type' => 
          array (
            0 => 'distinctident',
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
              'table' => 'publishers',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
select one, two from hairy where two <> 4 and one = 2;

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
          'column' => 'one',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'two',
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
              'table' => 'hairy',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'two',
            'type' => 'ident',
          ),
          'op' => '<>',
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
            'value' => 'one',
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
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
select one, two from hairy where two <> 4 and one = 2 order by two;

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
          'column' => 'one',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'two',
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
              'table' => 'hairy',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'two',
            'type' => 'ident',
          ),
          'op' => '<>',
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
            'value' => 'one',
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
      'sort_order' => 
      array (
        'two' => 'asc',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  6 => 
  array (
    'sql' => '
select one, two from hairy where two <> 4 and one = 2 limit 4 order by two ascending, dog descending;

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
          'column' => 'one',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'two',
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
              'table' => 'hairy',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'two',
            'type' => 'ident',
          ),
          'op' => '<>',
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
            'value' => 'one',
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
      'limit_clause' => 
      array (
        'start' => 0,
        'length' => 4,
      ),
      'sort_order' => 
      array (
        'two' => 'asc',
        'dog' => 'desc',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  7 => 
  array (
    'sql' => '
select foo.a from foo;

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'foo',
          'column' => 'a',
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
              'table' => 'foo',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  8 => 
  array (
    'sql' => '
select a as b, min(a) as baz from foo;

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
          'column' => 'a',
          'alias' => 'b',
        ),
      ),
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'min',
          'arg' => 
          array (
            0 => 'a',
          ),
          'type' => 
          array (
            0 => 'ident',
          ),
          'alias' => 'baz',
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
              'table' => 'foo',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  9 => 
  array (
    'sql' => '
select a from foo as bar;

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
          'column' => 'a',
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
              'table' => 'foo',
              'alias' => 'bar',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  10 => 
  array (
    'sql' => '
select * from person where surname is not null and firstname = \'jason\';

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
              'table' => 'person',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'surname',
            'type' => 'ident',
          ),
          'op' => 'is',
          'neg' => true,
          'arg_2' => 
          array (
            'value' => '',
            'type' => 'null',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'firstname',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => 'jason',
            'type' => 'text_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  11 => 
  array (
    'sql' => '
select * from person where surname is null;

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
              'table' => 'person',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'surname',
          'type' => 'ident',
        ),
        'op' => 'is',
        'arg_2' => 
        array (
          'value' => '',
          'type' => 'null',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  12 => 
  array (
    'sql' => '
select * from person where surname = \'\' and firstname = \'jason\';

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
              'table' => 'person',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'surname',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => '',
            'type' => 'text_val',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'firstname',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => 'jason',
            'type' => 'text_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  13 => 
  array (
    'sql' => '
select table_1.id, table_2.name from table_1, table_2 where table_2.table_1_id = table_1.id;

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'table_1',
          'column' => 'id',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => 'table_2',
          'column' => 'name',
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
              'table' => 'table_1',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'table_2',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => ',',
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'table_2.table_1_id',
          'type' => 'ident',
        ),
        'op' => '=',
        'arg_2' => 
        array (
          'value' => 'table_1.id',
          'type' => 'ident',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  14 => 
  array (
    'sql' => '
select a from table_1 where a not in (select b from table_2);

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
          'column' => 'a',
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
              'table' => 'table_1',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'a',
          'type' => 'ident',
        ),
        'op' => 'in',
        'neg' => true,
        'arg_2' => 
        array (
          'value' => 
          array (
            'command' => 'select',
            'fields' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'b',
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
                    'table' => 'table_2',
                    'alias' => '',
                  ),
                ),
              ),
            ),
          ),
          'type' => 'command',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  15 => 
  array (
    'sql' => '
select a from table_1 where a in (select b from table_2 where c not in (select d from table_3));

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
          'column' => 'a',
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
              'table' => 'table_1',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'a',
          'type' => 'ident',
        ),
        'op' => 'in',
        'arg_2' => 
        array (
          'value' => 
          array (
            'command' => 'select',
            'fields' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'b',
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
                    'table' => 'table_2',
                    'alias' => '',
                  ),
                ),
              ),
            ),
            'where_clause' => 
            array (
              'arg_1' => 
              array (
                'value' => 'c',
                'type' => 'ident',
              ),
              'op' => 'in',
              'neg' => true,
              'arg_2' => 
              array (
                'value' => 
                array (
                  'command' => 'select',
                  'fields' => 
                  array (
                    0 => 
                    array (
                      'database' => '',
                      'table' => '',
                      'column' => 'd',
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
                          'table' => 'table_3',
                          'alias' => '',
                        ),
                      ),
                    ),
                  ),
                ),
                'type' => 'command',
              ),
            ),
          ),
          'type' => 'command',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  16 => 
  array (
    'sql' => '
select a from table_1 where a in (1, 2, 3);

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
          'column' => 'a',
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
              'table' => 'table_1',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'a',
          'type' => 'ident',
        ),
        'op' => 'in',
        'arg_2' => 
        array (
          'value' => 
          array (
            0 => 1,
            1 => 2,
            2 => 3,
          ),
          'type' => 
          array (
            0 => 'int_val',
            1 => 'int_val',
            2 => 'int_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  17 => 
  array (
    'sql' => '
select count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id;

',
    'expect' => 
    array (
      'command' => 'select',
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'count',
          'arg' => 
          array (
            0 => 'child_table.name',
          ),
          'type' => 
          array (
            0 => 'ident.ident',
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
              'table' => 'parent_table',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'child_table',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => ',',
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'parent_table.id',
          'type' => 'ident',
        ),
        'op' => '=',
        'arg_2' => 
        array (
          'value' => 'child_table.id',
          'type' => 'ident',
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  18 => 
  array (
    'sql' => '
select parent_table.name, count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id group by parent_table.name;

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'parent_table',
          'column' => 'name',
          'alias' => '',
        ),
      ),
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'count',
          'arg' => 
          array (
            0 => 'child_table.name',
          ),
          'type' => 
          array (
            0 => 'ident.ident',
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
              'table' => 'parent_table',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'child_table',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => ',',
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'parent_table.id',
          'type' => 'ident',
        ),
        'op' => '=',
        'arg_2' => 
        array (
          'value' => 'child_table.id',
          'type' => 'ident',
        ),
      ),
      'group_by' => 
      array (
        0 => 'parent_table.name',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  19 => 
  array (
    'sql' => '
select * from cats where furry = 1 group by name, type;

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
              'table' => 'cats',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'value' => 'furry',
          'type' => 'ident',
        ),
        'op' => '=',
        'arg_2' => 
        array (
          'value' => 1,
          'type' => 'int_val',
        ),
      ),
      'group_by' => 
      array (
        0 => 'name',
        1 => 'type',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  20 => 
  array (
    'sql' => '
select a, max(b) as x, sum(c) as y, min(d) as z from e;

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
          'column' => 'a',
          'alias' => '',
        ),
      ),
      'set_function' => 
      array (
        0 => 
        array (
          'name' => 'max',
          'arg' => 
          array (
            0 => 'b',
          ),
          'type' => 
          array (
            0 => 'ident',
          ),
          'alias' => 'x',
        ),
        1 => 
        array (
          'name' => 'sum',
          'arg' => 
          array (
            0 => 'c',
          ),
          'type' => 
          array (
            0 => 'ident',
          ),
          'alias' => 'y',
        ),
        2 => 
        array (
          'name' => 'min',
          'arg' => 
          array (
            0 => 'd',
          ),
          'type' => 
          array (
            0 => 'ident',
          ),
          'alias' => 'z',
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
              'table' => 'e',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  21 => 
  array (
    'sql' => '
select clients_translation.id_clients_prefix, clients_translation.rule_number,
       clients_translation.pattern, clients_translation.rule
       from clients, clients_prefix, clients_translation
       where (clients.id_softswitch = 5)
         and (clients.id_clients = clients_prefix.id_clients)
         and clients.enable=\'y\'
         and clients.unused=\'n\'
         and (clients_translation.id_clients_prefix = clients_prefix.id_clients_prefix)
         order by clients_translation.id_clients_prefix,clients_translation.rule_number;

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'clients_translation',
          'column' => 'id_clients_prefix',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => 'clients_translation',
          'column' => 'rule_number',
          'alias' => '',
        ),
        2 => 
        array (
          'database' => '',
          'table' => 'clients_translation',
          'column' => 'pattern',
          'alias' => '',
        ),
        3 => 
        array (
          'database' => '',
          'table' => 'clients_translation',
          'column' => 'rule',
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
              'table' => 'clients',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'clients_prefix',
              'alias' => '',
            ),
            2 => 
            array (
              'database' => '',
              'table' => 'clients_translation',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => ',',
            1 => ',',
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 
            array (
              'arg_1' => 
              array (
                'value' => 'clients.id_softswitch',
                'type' => 'ident',
              ),
              'op' => '=',
              'arg_2' => 
              array (
                'value' => 5,
                'type' => 'int_val',
              ),
            ),
            'type' => 'subclause',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'arg_1' => 
            array (
              'value' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'clients.id_clients',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => 'clients_prefix.id_clients',
                  'type' => 'ident',
                ),
              ),
              'type' => 'subclause',
            ),
          ),
          'op' => 'and',
          'arg_2' => 
          array (
            'arg_1' => 
            array (
              'arg_1' => 
              array (
                'value' => 'clients.enable',
                'type' => 'ident',
              ),
              'op' => '=',
              'arg_2' => 
              array (
                'value' => 'y',
                'type' => 'text_val',
              ),
            ),
            'op' => 'and',
            'arg_2' => 
            array (
              'arg_1' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'clients.unused',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => 'n',
                  'type' => 'text_val',
                ),
              ),
              'op' => 'and',
              'arg_2' => 
              array (
                'arg_1' => 
                array (
                  'value' => 
                  array (
                    'arg_1' => 
                    array (
                      'value' => 'clients_translation.id_clients_prefix',
                      'type' => 'ident',
                    ),
                    'op' => '=',
                    'arg_2' => 
                    array (
                      'value' => 'clients_prefix.id_clients_prefix',
                      'type' => 'ident',
                    ),
                  ),
                  'type' => 'subclause',
                ),
              ),
            ),
          ),
        ),
      ),
      'sort_order' => 
      array (
        'clients_translation.id_clients_prefix' => 'asc',
        'clients_translation.rule_number' => 'asc',
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  22 => 
  array (
    'sql' => '
SELECT column1,column2
FROM table1
WHERE (column1=\'1\' AND column2=\'1\') OR (column3=\'1\' AND column4=\'1\');

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
          'column' => 'column1',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'column2',
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
              'table' => 'table1',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 
            array (
              'arg_1' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'column1',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => '1',
                  'type' => 'text_val',
                ),
              ),
              'op' => 'and',
              'arg_2' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'column2',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => '1',
                  'type' => 'text_val',
                ),
              ),
            ),
            'type' => 'subclause',
          ),
        ),
        'op' => 'or',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 
            array (
              'arg_1' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'column3',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => '1',
                  'type' => 'text_val',
                ),
              ),
              'op' => 'and',
              'arg_2' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'column4',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => '1',
                  'type' => 'text_val',
                ),
              ),
            ),
            'type' => 'subclause',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  23 => 
  array (
    'sql' => '
SELECT name FROM people WHERE id > 1 AND (name = \'arjan\' OR name = \'john\');

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
          'column' => 'name',
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
              'table' => 'people',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'id',
            'type' => 'ident',
          ),
          'op' => '>',
          'arg_2' => 
          array (
            'value' => 1,
            'type' => 'int_val',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 
            array (
              'arg_1' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'name',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => 'arjan',
                  'type' => 'text_val',
                ),
              ),
              'op' => 'or',
              'arg_2' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'name',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => 'john',
                  'type' => 'text_val',
                ),
              ),
            ),
            'type' => 'subclause',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  24 => 
  array (
    'sql' => '
select * from test where (field1 = \'x\' and field2 <>\'y\') or field3 = \'z\';

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
              'table' => 'test',
              'alias' => '',
            ),
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 
            array (
              'arg_1' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'field1',
                  'type' => 'ident',
                ),
                'op' => '=',
                'arg_2' => 
                array (
                  'value' => 'x',
                  'type' => 'text_val',
                ),
              ),
              'op' => 'and',
              'arg_2' => 
              array (
                'arg_1' => 
                array (
                  'value' => 'field2',
                  'type' => 'ident',
                ),
                'op' => '<>',
                'arg_2' => 
                array (
                  'value' => 'y',
                  'type' => 'text_val',
                ),
              ),
            ),
            'type' => 'subclause',
          ),
        ),
        'op' => 'or',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'field3',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => 'z',
            'type' => 'text_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  25 => 
  array (
    'sql' => '
select a, d from b inner join c on b.a = c.a;

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
          'column' => 'a',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'd',
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
              'table' => 'b',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'c',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => 'inner join',
          ),
          'table_join_clause' => 
          array (
            0 => 
            array (
              'arg_1' => 
              array (
                'value' => 'b.a',
                'type' => 'ident',
              ),
              'op' => '=',
              'arg_2' => 
              array (
                'value' => 'c.a',
                'type' => 'ident',
              ),
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  26 => 
  array (
    'sql' => '
select a, d from b inner join c on b.a = c.a left outer join q on r < m;

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
          'column' => 'a',
          'alias' => '',
        ),
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'd',
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
              'table' => 'b',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'c',
              'alias' => '',
            ),
            2 => 
            array (
              'database' => '',
              'table' => 'q',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => 'inner join',
            1 => 'left outer join',
          ),
          'table_join_clause' => 
          array (
            0 => 
            array (
              'arg_1' => 
              array (
                'value' => 'b.a',
                'type' => 'ident',
              ),
              'op' => '=',
              'arg_2' => 
              array (
                'value' => 'c.a',
                'type' => 'ident',
              ),
            ),
            1 => 
            array (
              'arg_1' => 
              array (
                'value' => 'r',
                'type' => 'ident',
              ),
              'op' => '<',
              'arg_2' => 
              array (
                'value' => 'm',
                'type' => 'ident',
              ),
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  27 => 
  array (
    'sql' => '
select 4b from test where 7iModule_Solution = 3;

',
    'expect' => 'Parse error: Expected EOQ, found: ident on line 2
select 4b from test where 7iModule_Solution = 3;
                           ^ found: "iModule_Solution"',
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  28 => 
  array (
    'sql' => '
select Courses.* 
    from Courses, Student_Courses 
    where Courses.id=Student_Courses.courseid 
        and Student_Courses.studentid=\'10\';

',
    'expect' => 
    array (
      'command' => 'select',
      'fields' => 
      array (
        0 => 
        array (
          'database' => '',
          'table' => 'Courses',
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
              'table' => 'Courses',
              'alias' => '',
            ),
            1 => 
            array (
              'database' => '',
              'table' => 'Student_Courses',
              'alias' => '',
            ),
          ),
          'table_join' => 
          array (
            0 => ',',
          ),
        ),
      ),
      'where_clause' => 
      array (
        'arg_1' => 
        array (
          'arg_1' => 
          array (
            'value' => 'Courses.id',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => 'Student_Courses.courseid',
            'type' => 'ident',
          ),
        ),
        'op' => 'and',
        'arg_2' => 
        array (
          'arg_1' => 
          array (
            'value' => 'Student_Courses.studentid',
            'type' => 'ident',
          ),
          'op' => '=',
          'arg_2' => 
          array (
            'value' => '10',
            'type' => 'text_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  29 => 
  array (
    'sql' => '
SELECT *,a from Foo
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
        1 => 
        array (
          'database' => '',
          'table' => '',
          'column' => 'a',
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
              'table' => 'Foo',
              'alias' => '',
            ),
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
