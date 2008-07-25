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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'cat',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 4,
            'type' => 'int_val',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'two',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'one',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '<>',
          1 => 'and',
          2 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'two',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'one',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '<>',
          1 => 'and',
          2 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'two',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 4,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'one',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
        ),
        'ops' => 
        array (
          0 => '<>',
          1 => 'and',
          2 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'surname',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'null',
            'type' => 'null',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'firstname',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 'jason',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => 'is not',
          1 => 'and',
          2 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'surname',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 'null',
            'type' => 'null',
          ),
        ),
        'ops' => 
        array (
          0 => 'is',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'surname',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => '',
            'type' => 'text_val',
          ),
          2 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'firstname',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 'jason',
            'type' => 'text_val',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => 'table_2',
            'column' => 'table_1_id',
            'alias' => '',
          ),
          1 => 
          array (
            'database' => '',
            'table' => 'table_1',
            'column' => 'id',
            'alias' => '',
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
        'args' => 
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
          2 => 
          array (
            'value' => ')',
            'type' => ')',
          ),
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
        'args' => 
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
              'args' => 
              array (
                0 => 
                array (
                  'database' => '',
                  'table' => '',
                  'column' => 'c',
                  'alias' => '',
                ),
                1 => 
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
                2 => 
                array (
                  'value' => ')',
                  'type' => ')',
                ),
              ),
            ),
          ),
          2 => 
          array (
            'value' => ')',
            'type' => ')',
          ),
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
        'args' => 
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
            'values' => 
            array (
              0 => 1,
              1 => 2,
              2 => 3,
            ),
            'types' => 
            array (
              0 => 'int_val',
              1 => 'int_val',
              2 => 'int_val',
            ),
          ),
          2 => 
          array (
            'value' => ')',
            'type' => ')',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => 'parent_table',
            'column' => 'id',
            'alias' => '',
          ),
          1 => 
          array (
            'database' => '',
            'table' => 'child_table',
            'column' => 'id',
            'alias' => '',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => 'parent_table',
            'column' => 'id',
            'alias' => '',
          ),
          1 => 
          array (
            'database' => '',
            'table' => 'child_table',
            'column' => 'id',
            'alias' => '',
          ),
        ),
        'ops' => 
        array (
          0 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'furry',
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
          0 => '=',
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
        'args' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => 'clients',
                'column' => 'id_softswitch',
                'alias' => '',
              ),
              1 => 
              array (
                'value' => 5,
                'type' => 'int_val',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
            ),
          ),
          1 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => 'clients',
                'column' => 'id_clients',
                'alias' => '',
              ),
              1 => 
              array (
                'database' => '',
                'table' => 'clients_prefix',
                'column' => 'id_clients',
                'alias' => '',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
            ),
          ),
          2 => 
          array (
            'database' => '',
            'table' => 'clients',
            'column' => 'enable',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => 'y',
            'type' => 'text_val',
          ),
          4 => 
          array (
            'database' => '',
            'table' => 'clients',
            'column' => 'unused',
            'alias' => '',
          ),
          5 => 
          array (
            'value' => 'n',
            'type' => 'text_val',
          ),
          6 => 
          array (
            'args' => 
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
                'table' => 'clients_prefix',
                'column' => 'id_clients_prefix',
                'alias' => '',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
            ),
          ),
        ),
        'ops' => 
        array (
          0 => 'and',
          1 => 'and',
          2 => '=',
          3 => 'and',
          4 => '=',
          5 => 'and',
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
        'args' => 
        array (
          0 => 
          array (
            'args' => 
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
                'value' => '1',
                'type' => 'text_val',
              ),
              2 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'column2',
                'alias' => '',
              ),
              3 => 
              array (
                'value' => '1',
                'type' => 'text_val',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
              1 => 'and',
              2 => '=',
            ),
          ),
          1 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'column3',
                'alias' => '',
              ),
              1 => 
              array (
                'value' => '1',
                'type' => 'text_val',
              ),
              2 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'column4',
                'alias' => '',
              ),
              3 => 
              array (
                'value' => '1',
                'type' => 'text_val',
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
        'ops' => 
        array (
          0 => 'or',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'id',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 1,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'name',
                'alias' => '',
              ),
              1 => 
              array (
                'value' => 'arjan',
                'type' => 'text_val',
              ),
              2 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'name',
                'alias' => '',
              ),
              3 => 
              array (
                'value' => 'john',
                'type' => 'text_val',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
              1 => 'or',
              2 => '=',
            ),
          ),
        ),
        'ops' => 
        array (
          0 => '>',
          1 => 'and',
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
        'args' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'field1',
                'alias' => '',
              ),
              1 => 
              array (
                'value' => 'x',
                'type' => 'text_val',
              ),
              2 => 
              array (
                'database' => '',
                'table' => '',
                'column' => 'field2',
                'alias' => '',
              ),
              3 => 
              array (
                'value' => 'y',
                'type' => 'text_val',
              ),
            ),
            'ops' => 
            array (
              0 => '=',
              1 => 'and',
              2 => '<>',
            ),
          ),
          1 => 
          array (
            'database' => '',
            'table' => '',
            'column' => 'field3',
            'alias' => '',
          ),
          2 => 
          array (
            'value' => 'z',
            'type' => 'text_val',
          ),
        ),
        'ops' => 
        array (
          0 => 'or',
          1 => '=',
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
              'args' => 
              array (
                0 => 
                array (
                  'database' => '',
                  'table' => 'b',
                  'column' => 'a',
                  'alias' => '',
                ),
                1 => 
                array (
                  'database' => '',
                  'table' => 'c',
                  'column' => 'a',
                  'alias' => '',
                ),
              ),
              'ops' => 
              array (
                0 => '=',
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
              'args' => 
              array (
                0 => 
                array (
                  'database' => '',
                  'table' => 'b',
                  'column' => 'a',
                  'alias' => '',
                ),
                1 => 
                array (
                  'database' => '',
                  'table' => 'c',
                  'column' => 'a',
                  'alias' => '',
                ),
              ),
              'ops' => 
              array (
                0 => '=',
              ),
            ),
            1 => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'database' => '',
                  'table' => '',
                  'column' => 'r',
                  'alias' => '',
                ),
                1 => 
                array (
                  'database' => '',
                  'table' => '',
                  'column' => 'm',
                  'alias' => '',
                ),
              ),
              'ops' => 
              array (
                0 => '<',
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
-- SQL_PARSER_FLAG_MYSQL
select 4b from test where 7iModule_Solution = 3;

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
          'column' => '4b',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => '',
            'column' => '7iModule_Solution',
            'alias' => '',
          ),
          1 => 
          array (
            'value' => 3,
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
    'dialect' => 'MySQL',
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
        'args' => 
        array (
          0 => 
          array (
            'database' => '',
            'table' => 'Courses',
            'column' => 'id',
            'alias' => '',
          ),
          1 => 
          array (
            'database' => '',
            'table' => 'Student_Courses',
            'column' => 'courseid',
            'alias' => '',
          ),
          2 => 
          array (
            'database' => '',
            'table' => 'Student_Courses',
            'column' => 'studentid',
            'alias' => '',
          ),
          3 => 
          array (
            'value' => '10',
            'type' => 'text_val',
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
