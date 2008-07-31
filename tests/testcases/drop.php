<?php
$tests = array (
  0 => 
  array (
    'sql' => '
drop table dishes cascade;

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'drop_table',
        'table_names' => 
        array (
          0 => 'dishes',
        ),
        'drop_behavior' => 'cascade',
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  1 => 
  array (
    'sql' => '
drop table bondage restrict;

',
    'expect' => 
    array (
      0 => 
      array (
        'command' => 'drop_table',
        'table_names' => 
        array (
          0 => 'bondage',
        ),
        'drop_behavior' => 'restrict',
      ),
      1 => ';',
    ),
    'fail' => false,
    'dialect' => 'ANSI',
  ),
  2 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table bondage, dishes;

',
    'expect' => '
Caught exception: Parse error: Expected EOQ on line 3
drop table bondage, dishes;
                  ^ found: ","
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1783): SQL_Parser->raiseError(\'Expected EOQ\')
#1 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#2 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  3 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table play cascade restrict;

',
    'expect' => '
Caught exception: Parse error: Expected EOQ on line 3
drop table play cascade restrict;
                        ^ found: "restrict"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1783): SQL_Parser->raiseError(\'Expected EOQ\')
#1 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#2 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  4 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop table cat where mouse = floor;

',
    'expect' => '
Caught exception: Parse error: Expected EOQ on line 3
drop table cat where mouse = floor;
               ^ found: "where"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1783): SQL_Parser->raiseError(\'Expected EOQ\')
#1 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#2 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
  5 => 
  array (
    'sql' => '
-- SQL_PARSER_FLAG_FAIL
drop elephant;
',
    'expect' => '
Caught exception: Parse error: Unknown object to drop on line 3
drop elephant;
     ^ found: "elephant"
in: C:\\htdocs\\SQL_Parser\\Parser.php#318
from: 
#0 C:\\htdocs\\SQL_Parser\\Parser.php(1397): SQL_Parser->raiseError(\'Unknown object ...\')
#1 C:\\htdocs\\SQL_Parser\\Parser.php(1718): SQL_Parser->parseDrop()
#2 C:\\htdocs\\SQL_Parser\\Parser.php(1781): SQL_Parser->parseQuery()
#3 C:\\htdocs\\SQL_Parser\\tests\\generate_testcases.php(92): SQL_Parser->parse(\'??-- SQL_PARSER...\')
#4 {main}
',
    'fail' => true,
    'dialect' => 'ANSI',
  ),
);
?>
