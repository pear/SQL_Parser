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
        'column_names' => array(
            0 => 'legs',
            1 => 'hairy'
            ),
        'table_names' => array(
            0 => 'dog'
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
            )
        )
),
array(
'sql' => 'select one, two from hairy where two <> 4 and one = 2',
'expect' => array(
        'command' => 'select',
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'table_names' => array(
            0 => 'hairy'
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
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'table_names' => array(
            0 => 'hairy'
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
        'column_names' => array(
            0 => 'one',
            1 => 'two'
            ),
        'table_names' => array(
            0 => 'hairy'
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
);
?>
