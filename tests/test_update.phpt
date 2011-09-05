--TEST--
Update Test: test_update.html
--FILE--
<?php
require_once 'testsuite.php';

$parser = new SQL_Parser("update `table` set name='abc' where xyz is null;", 'MySQL');

print_r($parser->parseQuery());

?>
--EXPECTF--
Array
(
    [0] => Array
        (
            [command] => update
            [tables] => Array
                (
                    [0] => Array
                        (
                            [database] => 
                            [table] => table
                            [alias] => 
                        )

                )

            [sets] => Array
                (
                    [0] => Array
                        (
                            [name] => Array
                                (
                                    [database] => 
                                    [table] => 
                                    [column] => name
                                    [alias] => 
                                )

                            [value] => Array
                                (
                                    [args] => Array
                                        (
                                            [0] => Array
                                                (
                                                    [value] => abc
                                                    [type] => text_val
                                                )

                                        )

                                )

                        )

                )

            [where_clause] => Array
                (
                    [args] => Array
                        (
                            [0] => Array
                                (
                                    [database] => 
                                    [table] => 
                                    [column] => xyz
                                    [alias] => 
                                )

                            [1] => Array
                                (
                                    [value] => null
                                    [type] => null
                                )

                        )

                    [ops] => Array
                        (
                            [0] => is
                        )

                )

        )

    [1] => ;
)
