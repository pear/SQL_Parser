<?php
$tests = array (
  0 => 
  array (
    'sql' => '
insert into dogmeat (\'horse\', \'hair\') values (2, 4);

',
    'expect' => 
    array (
      'command' => 'insert',
      'table_names' => 
      array (
        0 => 'dogmeat',
      ),
      'column_names' => 
      array (
        0 => 'horse',
        1 => 'hair',
      ),
      'values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
          1 => 
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
  1 => 
  array (
    'sql' => '
inSERT into dogmeat (horse, hair) values (2, 4);

',
    'expect' => 
    array (
      'command' => 'insert',
      'table_names' => 
      array (
        0 => 'dogmeat',
      ),
      'column_names' => 
      array (
        0 => 'horse',
        1 => 'hair',
      ),
      'values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'value' => 2,
            'type' => 'int_val',
          ),
          1 => 
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
  2 => 
  array (
    'sql' => '
INSERT INTO mytable (foo, bar, baz) VALUES (NOW(), 1, \'text\');

',
    'expect' => 
    array (
      'command' => 'insert',
      'table_names' => 
      array (
        0 => 'mytable',
      ),
      'column_names' => 
      array (
        0 => 'foo',
        1 => 'bar',
        2 => 'baz',
      ),
      'values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'value' => 'NOW',
            'type' => 'ident',
          ),
          1 => 
          array (
            'value' => 1,
            'type' => 'int_val',
          ),
          2 => 
          array (
            'value' => 'text',
            'type' => 'text_val',
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
INSERT INTO mytable VALUES (\'a\', \'b\'), (\'c\', \'d\');

',
    'expect' => 
    array (
      'command' => 'insert',
      'table_names' => 
      array (
        0 => 'mytable',
      ),
      'values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'value' => 'a',
            'type' => 'text_val',
          ),
          1 => 
          array (
            'value' => 'b',
            'type' => 'text_val',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'value' => 'c',
            'type' => 'text_val',
          ),
          1 => 
          array (
            'value' => 'd',
            'type' => 'text_val',
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
INSERT INTO mytable (a, b) VALUES (\'a\', \'b\'), (\'c\', \'d\');
',
    'expect' => 
    array (
      'command' => 'insert',
      'table_names' => 
      array (
        0 => 'mytable',
      ),
      'column_names' => 
      array (
        0 => 'a',
        1 => 'b',
      ),
      'values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'value' => 'a',
            'type' => 'text_val',
          ),
          1 => 
          array (
            'value' => 'b',
            'type' => 'text_val',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'value' => 'c',
            'type' => 'text_val',
          ),
          1 => 
          array (
            'value' => 'd',
            'type' => 'text_val',
          ),
        ),
      ),
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
