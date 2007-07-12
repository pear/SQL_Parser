#!/bin/bash
for i in `find . -name "sql/*.sql" | sed "s/\.sql//g"`;
do
    echo "Generating $i case"
    php generate_testcases.php sql/$i.sql > testcases/$i.php;
done
