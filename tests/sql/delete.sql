-- SQL PARSER TESTCASE
delete from dog where cat = 4 and horse <> "dead meat" or mouse = 'furry';

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
delete from;

-- SQL PARSER TESTCASE
delete from cat;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
delete from where cat = 53;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
delete from dog where mouse is happy;
