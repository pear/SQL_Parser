-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
# Test Comment;
SELECT 'a';

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
SELECT 'a' # Test Comment;
, 'b';

-- SQL PARSER TESTCASE
SELECT 'a', -- Test Comment;
'b';

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
SELECT 'a' /* Test Comment; */, 'b'; -- Comment

