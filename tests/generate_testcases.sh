#!/bin/bash
for i in `find . -name "*.sql" | sed "s/\.sql//g"`;
do
    echo "Generating $i case"
    php generate_testcases.php $i.sql > $i.php;
done
