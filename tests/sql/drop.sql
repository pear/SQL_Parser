-- SQL PARSER TESTCASE
drop table dishes cascade;

-- SQL PARSER TESTCASE
drop table bondage restrict;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
drop table bondage, dishes;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
drop table play cascade restrict;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
drop table cat where mouse = floor;

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_FAIL
drop elephant;
