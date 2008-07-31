<?php
$tests = array (
  0 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
# Test Comment;
SELECT \'a\';

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'select',
        'select_expressions' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'a',
                'type' => 'text_val',
              ),
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  1 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_MYSQL
SELECT \'a\' # Test Comment;
, \'b\';

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'select',
        'select_expressions' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'a',
                'type' => 'text_val',
              ),
            ),
          ),
          1 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'b',
                'type' => 'text_val',
              ),
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
  2 => 
  array (
    'sql' => '
SELECT \'a\', -- Test Comment;
\'b\';

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'select',
        'select_expressions' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'a',
                'type' => 'text_val',
              ),
            ),
          ),
          1 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'b',
                'type' => 'text_val',
              ),
            ),
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
-- SQL_PARSER_FLAG_MYSQL
SELECT \'a\' /* Test Comment; */, \'b\'; -- Comment

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'select',
        'select_expressions' => 
        array (
          0 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'a',
                'type' => 'text_val',
              ),
            ),
          ),
          1 => 
          array (
            'args' => 
            array (
              0 => 
              array (
                'value' => 'b',
                'type' => 'text_val',
              ),
            ),
          ),
        ),
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'MySQL',
  ),
);
?>
