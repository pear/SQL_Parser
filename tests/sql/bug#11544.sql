-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
update `zzz` set `kkk`=(`susus` + 1), `vvv1`='a1b', `ccc`='bbb' where `uccc`='aaa'

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
update `zzz` set `kkk`=(1 + 1), `vvv1`='a1b', `ccc`='bbb' where `uccc`='aaa'

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
select * from `abc` where `abc`='tdd' and `cbu`=(`lbu` - 1)

-- SQL PARSER TESTCASE
-- SQL_PARSER_FLAG_MYSQL
update `abc` set `minus`=(`minus` - 2), `minus2`=(2 - 3) where `aaa`='bbb'
