<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2003 Brent Cook                                        |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the Free Software  |
// | Foundation, Inc., 59 Temple Place, Suite 330,Boston,MA 02111-1307 USA|
// +----------------------------------------------------------------------+
// | Author: Sebastian Mendel <info@sebastianmendel.e>                    |
// |         Brent Cook <busterb@mail.utexas.edu>                         |
// +----------------------------------------------------------------------+
//
// $Id$
//

// test functionality of the sql parser
chdir('..');

require_once 'PEAR.php';
require_once './Parser.php';

$parser = new Sql_Parser();

$progname = basename(array_shift($argv));

$argc = count($argv);
if ($argc > 3) {
    echo("Usage: generate_testcases.php <test_cases.sql <dialect>>\n");
    exit(-1);
}

// Preprocess the input file
if ($argc >= 1) {
    $files = $argv[0];
} else {
    $files = '*.sql';
}

// Set the dialect
if ($argc == 2) {
    $dialect = $argv[1];
} else {
    $dialect = 'ANSI';
}

$results = $parser->setDialect($dialect);
if (PEAR::isError($results)) {
    echo $results->getMessage();
    exit;
}

foreach (glob('tests/sql/' . $files) as $file) {
    echo '.';
    $source = file_get_contents($file);
    if (! $source) {
        echo("Could not load the SQL source file: $file\n");
        exit(-1);
    }

    $queries = explode("-- SQL PARSER TESTCASE", $source);

    $testcases = array();

    foreach ($queries as $query) {
        if ($query) {
            echo ':';

            if (strpos($query, '-- SQL_PARSER_FLAG_FAIL') !== false) {
                $fail = true;
            } else {
                $fail = false;
            }

            if (strpos($query, '-- SQL_PARSER_FLAG_MYSQL') !== false) {
                $_dialect = 'MySQL';
            } else {
                $_dialect = $dialect;
            }
            $parser->setDialect($_dialect);

            $results = $parser->parse($query);
            //if (PEAR::isError($results)) {
            if (false === $results) {
                $result = $parser->error_message;
            } else {
                $result = $results;
            }

            $testcases[] = array(
                'sql'     => $query,
            	'expect'  => $result,
            	'fail'    => $fail,
            	'dialect' => $_dialect,
            );
        }
    }

    $output = "<?php\n\$tests = " . var_export($testcases, true) . ";\n?>\n";
    $r = file_put_contents('tests/testcases/' . substr(basename($file), 0, -3) . 'php', $output);
}
?>
