<?php
$tests = array(
array(
'sql' => 'insert into dogmeat (\'horse\', \'hair\') values (2, 4)',
'expect' => array(
        'command' => 'insert',
        'table_name' => 'dogmeat',
        'column_names' => array(
            0 => 'horse',
            1 => 'hair'
            ),
        'values' => array(
            0 => array(
                'value' => 2,
                'type' => 'int_val'
                ),
            1 => array(
                'value' => 4,
                'type' => 'int_val'
                )
            )
        )
),
array(
'sql' => 'inSERT into dogmeat (horse, hair) values (2, 4)',
'expect' => array(
        'command' => 'insert',
        'table_name' => 'dogmeat',
        'column_names' => array(
            0 => 'horse',
            1 => 'hair'
            ),
        'values' => array(
            0 => array(
                'value' => 2,
                'type' => 'int_val'
                ),
            1 => array(
                'value' => 4,
                'type' => 'int_val'
                )
            )
        )
),
);
?>
