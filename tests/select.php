Content-type: text/html
X-Powered-By: PHP/4.3.4RC3

<?php
$tests = array(
array(
'sql' => 'select * from dog where cat <> 4',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'dog'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'cat',
                'type' => 'ident'
                ),
            'op' => '<>',
            'arg_2' => array(
                'value' => 4,
                'type' => 'int_val'
                )
            )
        )
),
array(
'sql' => 'select legs, hairy from dog',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => '',
            1 => ''
            ),
        'column_names' => array(
            0 => 'legs',
            1 => 'hairy'
            ),
        'column_aliases' => array(
            0 => '',
            1 => ''
            ),
        'table_names' => array(
            0 => 'dog'
            ),
        'table_aliases' => array(
            0 => ''
            )
        )
),
array(
'sql' => 'select max(length) from dog',
'expect' => array(
        'command' => 'select',
        'set_function' => array(
            'name' => 'max',
            'arg' => 'length'
            ),
        'table_names' => array(
            0 => 'dog'
            ),
        'table_aliases' => array(
            0 => ''
            )
        )
),
array(
'sql' => 'select count(distinct country) from publishers',
'expect' => array(
        'command' => 'select',
        'set_function' => array(
            'name' => 'count',
            'distinct' => true,
            'arg' => 'country'
            ),
        'table_names' => array(
            0 => 'publishers'
            ),
        'table_aliases' => array(
            0 => ''
            )
        )
),
array(
'sql' => 'select one, two from hairy where two <> 4 and one = 2',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => '',
            1 => ''
            ),
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'column_aliases' => array(
            0 => '',
            1 => ''
            ),
        'table_names' => array(
            0 => 'hairy'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'two',
                    'type' => 'ident'
                    ),
                'op' => '<>',
                'arg_2' => array(
                    'value' => 4,
                    'type' => 'int_val'
                    )
                ),
            'op' => 'and',
            'arg_2' => array(
                'arg_1' => array(
                    'value' => 'one',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 2,
                    'type' => 'int_val'
                    )
                )
            )
        )
),
array(
'sql' => 'select one, two from hairy where two <> 4 and one = 2 order by two',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => '',
            1 => ''
            ),
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'column_aliases' => array(
            0 => '',
            1 => ''
            ),
        'table_names' => array(
            0 => 'hairy'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'two',
                    'type' => 'ident'
                    ),
                'op' => '<>',
                'arg_2' => array(
                    'value' => 4,
                    'type' => 'int_val'
                    )
                ),
            'op' => 'and',
            'arg_2' => array(
                'arg_1' => array(
                    'value' => 'one',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 2,
                    'type' => 'int_val'
                    )
                )
            ),
        'sort_order' => array(
            'two' => 'desc'
            )
        )
),
array(
'sql' => 'select one, two from hairy where two <> 4 and one = 2 limit 4 order by two ascending, dog descending',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => '',
            1 => ''
            ),
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'column_aliases' => array(
            0 => '',
            1 => ''
            ),
        'table_names' => array(
            0 => 'hairy'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'two',
                    'type' => 'ident'
                    ),
                'op' => '<>',
                'arg_2' => array(
                    'value' => 4,
                    'type' => 'int_val'
                    )
                ),
            'op' => 'and',
            'arg_2' => array(
                'arg_1' => array(
                    'value' => 'one',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 2,
                    'type' => 'int_val'
                    )
                )
            ),
        'limit_clause' => array(
            'start' => 0,
            'length' => 4
            ),
        'sort_order' => array(
            'two' => 'asc',
            'dog' => 'desc'
            )
        )
),
array(
'sql' => 'select foo.a from foo',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'foo.a'
            ),
        'column_aliases' => array(
            0 => ''
            ),
        'table_names' => array(
            0 => 'foo'
            ),
        'table_aliases' => array(
            0 => ''
            )
        )
),
array(
'sql' => 'select a as b from foo',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'a'
            ),
        'column_aliases' => array(
            0 => 'b'
            ),
        'table_names' => array(
            0 => 'foo'
            ),
        'table_aliases' => array(
            0 => ''
            )
        )
),
array(
'sql' => 'select a from foo as bar',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'a'
            ),
        'column_aliases' => array(
            0 => ''
            ),
        'table_names' => array(
            0 => 'foo'
            ),
        'table_aliases' => array(
            0 => 'bar'
            )
        )
),
array(
'sql' => 'select * from person where surname is not null and firstname = \'jason\'',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'person'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'surname',
                    'type' => 'ident'
                    ),
                'op' => 'is',
                'neg' => true,
                'arg_2' => array(
                    'value' => '',
                    'type' => 'null'
                    )
                ),
            'op' => 'and',
            'arg_2' => array(
                'arg_1' => array(
                    'value' => 'firstname',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 'jason',
                    'type' => 'text_val'
                    )
                )
            )
        )
),
array(
'sql' => 'select * from person where surname is null',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'person'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'surname',
                'type' => 'ident'
                ),
            'op' => 'is',
            'arg_2' => array(
                'value' => '',
                'type' => 'null'
                )
            )
        )
),
array(
'sql' => 'select * from person where surname = \'\' and firstname = \'jason\'',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'person'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'surname',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => '',
                    'type' => 'text_val'
                    )
                ),
            'op' => 'and',
            'arg_2' => array(
                'arg_1' => array(
                    'value' => 'firstname',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 'jason',
                    'type' => 'text_val'
                    )
                )
            )
        )
),
array(
'sql' => 'select table_1.id, table_2.name from table_1, table_2 where table_2.table_1_id = table_1.id',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => '',
            1 => ''
            ),
        'column_names' => array(
            0 => 'table_1.id',
            1 => 'table_2.name'
            ),
        'column_aliases' => array(
            0 => '',
            1 => ''
            ),
        'table_names' => array(
            0 => 'table_1',
            1 => 'table_2'
            ),
        'table_aliases' => array(
            0 => '',
            1 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'table_2.table_1_id',
                'type' => 'ident'
                ),
            'op' => '=',
            'arg_2' => array(
                'value' => 'table_1.id',
                'type' => 'ident'
                )
            )
        )
),
array(
'sql' => 'select a from table_1 where a not in (select b from table_2)',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'a'
            ),
        'column_aliases' => array(
            0 => ''
            ),
        'table_names' => array(
            0 => 'table_1'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'a',
                'type' => 'ident'
                ),
            'op' => 'not',
            'neg' => true,
            'arg_2' => array(
                'value' => array(
                    'command' => 'select',
                    'column_tables' => array(
                        0 => ''
                        ),
                    'column_names' => array(
                        0 => 'b'
                        ),
                    'column_aliases' => array(
                        0 => ''
                        ),
                    'table_names' => array(
                        0 => 'table_2'
                        ),
                    'table_aliases' => array(
                        0 => ''
                        )
                    ),
                'type' => 'command'
                )
            )
        )
),
array(
'sql' => 'select a from table_1 where a in (select b from table_2 where c not in (select d from table_3))',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'a'
            ),
        'column_aliases' => array(
            0 => ''
            ),
        'table_names' => array(
            0 => 'table_1'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'a',
                'type' => 'ident'
                ),
            'op' => 'in',
            'arg_2' => array(
                'value' => array(
                    'command' => 'select',
                    'column_tables' => array(
                        0 => ''
                        ),
                    'column_names' => array(
                        0 => 'b'
                        ),
                    'column_aliases' => array(
                        0 => ''
                        ),
                    'table_names' => array(
                        0 => 'table_2'
                        ),
                    'table_aliases' => array(
                        0 => ''
                        ),
                    'where_clause' => array(
                        'arg_1' => array(
                            'value' => 'c',
                            'type' => 'ident'
                            ),
                        'op' => 'not',
                        'neg' => true,
                        'arg_2' => array(
                            'value' => array(
                                'command' => 'select',
                                'column_tables' => array(
                                    0 => ''
                                    ),
                                'column_names' => array(
                                    0 => 'd'
                                    ),
                                'column_aliases' => array(
                                    0 => ''
                                    ),
                                'table_names' => array(
                                    0 => 'table_3'
                                    ),
                                'table_aliases' => array(
                                    0 => ''
                                    )
                                ),
                            'type' => 'command'
                            )
                        )
                    ),
                'type' => 'command'
                )
            )
        )
),
array(
'sql' => 'select a from table_1 where a in (1, 2, 3)',
'expect' => array(
        'command' => 'select',
        'column_tables' => array(
            0 => ''
            ),
        'column_names' => array(
            0 => 'a'
            ),
        'column_aliases' => array(
            0 => ''
            ),
        'table_names' => array(
            0 => 'table_1'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'a',
                'type' => 'ident'
                ),
            'op' => 'in',
            'arg_2' => array(
                'value' => array(
                    0 => 1,
                    1 => 2,
                    2 => 3
                    ),
                'type' => array(
                    0 => 'int_val',
                    1 => 'int_val',
                    2 => 'int_val'
                    )
                )
            )
        )
),
array(
'sql' => 'select count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id',
'expect' => array(
        'command' => 'select',
        'set_function' => array(
            'name' => 'count',
            'arg' => 'child_table.name'
            ),
        'table_names' => array(
            0 => 'parent_table',
            1 => 'child_table'
            ),
        'table_aliases' => array(
            0 => '',
            1 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'parent_table.id',
                'type' => 'ident'
                ),
            'op' => '=',
            'arg_2' => array(
                'value' => 'child_table.id',
                'type' => 'ident'
                )
            )
        )
),
array(
'sql' => 'select parent_table.name, count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id group by parent_table.name',
'expect' => 'Parse error: Expected "from" on line 1
select parent_table.name, count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id group by parent_table.name
                          ^ found: "count"'

),
array(
'sql' => 'select * from cats where furry = 1 group by name, type',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'cats'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'furry',
                'type' => 'ident'
                ),
            'op' => '=',
            'arg_2' => array(
                'value' => 1,
                'type' => 'int_val'
                )
            ),
        'group_by' => array(
            0 => 'name',
            1 => 'type'
            )
        )
),
array(
'sql' => 'select a, max(b) as x, sum(c) as y, min(d) as z from e',
'expect' => 'Parse error: Expected "from" on line 1
select a, max(b) as x, sum(c) as y, min(d) as z from e
          ^ found: "max"'

),
array(
'sql' => 'select clients_translation.id_clients_prefix, clients_translation.rule_number,
       clients_translation.pattern, clients_translation.rule
       from clients, clients_prefix, clients_translation
       where (clients.id_softswitch = 5)
         and (clients.id_clients = clients_prefix.id_clients)
         and clients.enable=\'y\'
         and clients.unused=\'n\'
         and (clients_translation.id_clients_prefix = clients_prefix.id_clients_prefix)
         order by clients_translation.id_clients_prefix,clients_translation.rule_number',
'expect' => 'Parse error: Expected an operator on line 4
       where (clients.id_softswitch = 5)
              ^ found: "clients.id_softswitch"'

),
array(
'sql' => '-- Test Comment',
'expect' => 'Parse error: Nothing to do on line 1
-- Test Comment
                ^ found: "*end of input*"'

),
array(
'sql' => '# Test Comment',
'expect' => 'Parse error: Nothing to do on line 1
# Test Comment
               ^ found: "*end of input*"'

),
);
?>
