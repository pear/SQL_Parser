select * from dog where cat <> 4;
select legs, hairy from dog;
select max(length) from dog;
SELECT COUNT(DISTINCT country) FROM publishers;
select one, two from hairy where two <> 4 and one = 2;
select one, two from hairy where two <> 4 and one = 2 order by two;
select one, two from hairy where two <> 4 and one = 2 limit 4 order by two ascending, dog descending;
