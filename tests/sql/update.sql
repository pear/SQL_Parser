-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
update dogmeat set horse=2 dog='forty' where moose <> 'howdydoo';

-- SQL PARSER TESTCASE
update dogmeat set horse=2, dog='forty' where moose != 'howdydoo';

-- SQL PARSER TESTCASE
update dogmeat set horse=2, dog='forty' where moose <> 'howdydoo';

-- SQL PARSER TESTCASE
update table1 set col=1 where not col = 2;

-- SQL PARSER TESTCASE
update table2 set col=1 where col > 2 and col <> 4;

-- SQL PARSER TESTCASE
update table2 set col=1 where col > 2 and col <> 4 or dog="Hello";

-- SQL PARSER TESTCASE
update table3 set col=1 where col > 2 and col < 30;
