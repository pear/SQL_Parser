select * from dog where cat <> 4;
select legs, hairy from dog;
select max(length) from dog;
select count(distinct country) from publishers;
select one, two from hairy where two <> 4 and one = 2;
select one, two from hairy where two <> 4 and one = 2 order by two;
select one, two from hairy where two <> 4 and one = 2 limit 4 order by two ascending, dog descending;
select foo.a from foo;
select a as b, min(a) as baz from foo;
select a from foo as bar;
select * from person where surname is not null and firstname = 'jason';
select * from person where surname is null;
select * from person where surname = '' and firstname = 'jason';
select table_1.id, table_2.name from table_1, table_2 where table_2.table_1_id = table_1.id;
select a from table_1 where a not in (select b from table_2);
select a from table_1 where a in (select b from table_2 where c not in (select d from table_3));
select a from table_1 where a in (1, 2, 3);
select count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id;
select parent_table.name, count(child_table.name) from parent_table ,child_table where parent_table.id = child_table.id group by parent_table.name;
select * from cats where furry = 1 group by name, type;
select a, max(b) as x, sum(c) as y, min(d) as z from e;
select clients_translation.id_clients_prefix, clients_translation.rule_number,
       clients_translation.pattern, clients_translation.rule
       from clients, clients_prefix, clients_translation
       where (clients.id_softswitch = 5)
         and (clients.id_clients = clients_prefix.id_clients)
         and clients.enable='y'
         and clients.unused='n'
         and (clients_translation.id_clients_prefix = clients_prefix.id_clients_prefix)
         order by clients_translation.id_clients_prefix,clients_translation.rule_number;
SELECT column1,column2
FROM table1
WHERE (column1='1' AND column2='1') OR (column3='1' AND column4='1');
-- Test Comment;
# Test Comment;
SELECT name FROM people WHERE id > 1 AND (name = 'arjan' OR name = 'john');
select * from test where (field1 = 'x' and field2 <>'y') or field3 = 'z';
select a, d from b inner join c on b.a = c.a;
select a, d from b inner join c on b.a = c.a left outer join q on r < m;
select 4b from test where 7iModule_Solution = 3;
select Courses.* 
    from Courses, Student_Courses 
    where Courses.id=Student_Courses.courseid 
        and Student_Courses.studentid='10';
SELECT *,a from Foo