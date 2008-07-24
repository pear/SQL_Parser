-- SQL PARSER TESTCASE
insert into dogmeat ('horse', 'hair') values (2, 4);

-- SQL PARSER TESTCASE
inSERT into dogmeat (horse, hair) values (2, 4);

-- SQL PARSER TESTCASE
INSERT INTO mytable (foo, bar, baz) VALUES (NOW(), 1, 'text');

-- SQL PARSER TESTCASE
INSERT INTO mytable VALUES ('a', 'b'), ('c', 'd');

-- SQL PARSER TESTCASE
INSERT INTO mytable (a, b) VALUES ('a', 'b'), ('c', 'd');
