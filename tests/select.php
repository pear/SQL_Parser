2<?php
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
'sql' => 'SELECT COUNT(DISTINCT country) FROM publishers',
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
            0 => 'foo'
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
'sql' => 'SELECT * FROM PERSON WHERE SURNAME IS not NULL AND FIRSTNAME = \'Jason\'',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'PERSON'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'SURNAME',
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
                    'value' => 'FIRSTNAME',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 'Jason',
                    'type' => 'text_val'
                    )
                )
            )
        )
),
array(
'sql' => 'SELECT * FROM PERSON WHERE SURNAME IS NULL',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'PERSON'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'value' => 'SURNAME',
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
'sql' => 'SELECT * FROM PERSON WHERE SURNAME = \'\' AND FIRSTNAME = \'Jason\'',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => '*'
            ),
        'table_names' => array(
            0 => 'PERSON'
            ),
        'table_aliases' => array(
            0 => ''
            ),
        'where_clause' => array(
            'arg_1' => array(
                'arg_1' => array(
                    'value' => 'SURNAME',
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
                    'value' => 'FIRSTNAME',
                    'type' => 'ident'
                    ),
                'op' => '=',
                'arg_2' => array(
                    'value' => 'Jason',
                    'type' => 'text_val'
                    )
                )
            )
        )
),
);
?>
