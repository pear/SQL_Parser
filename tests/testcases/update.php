<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
update dogmeat set horse=2 dog=\'forty\' where moose <> \'howdydoo\';

',
    'expect' => '
Caught exception: Parse error: Expected EOQ on line 3
update dogmeat set horse=2 dog=\'forty\' where moose <> \'howdydoo\';
                           ^ found: "dog"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1783): SQL_Parser->raiseError(\'Expected EOQ\')
#1 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#2 {main}
',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 2,
                  'type' => 'int_val',
                ),
              ),
            ),
          ),
          1 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 'forty',
                  'type' => 'text_val',
                ),
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
      1 => ';',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 2,
                  'type' => 'int_val',
                ),
              ),
            ),
          ),
          1 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 'forty',
                  'type' => 'text_val',
                ),
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
      1 => ';',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 1,
                  'type' => 'int_val',
                ),
              ),
            ),
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
      1 => ';',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 1,
                  'type' => 'int_val',
                ),
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
      1 => ';',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 1,
                  'type' => 'int_val',
                ),
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
      1 => ';',
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
      0 => 
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
        'sets' => 
        array (
          0 => 
          array (
            'column' => 
            array (
              'args' => 
              array (
                0 => 
                array (
                  'value' => 1,
                  'type' => 'int_val',
                ),
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
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
);
?>
