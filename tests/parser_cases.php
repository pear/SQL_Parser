<?php
require_once 'SQL/Parser.php';
require_once 'PHPUnit.php';
require_once 'dumper.php';

/**
 * SQL Parser tests
 *
 * @author  Brent Cook <busterbcook@yahoo.com>
 * @version 0.5
 * @access  public
 * @package SQL_Parser
 */

class SqlParserTest extends PHPUnit_TestCase {
    // contains the object handle of the parser class
    var $parser;

    //constructor of the test suite
    function SqlParserTest($name) {
        $this->PHPUnit_TestCase($name);
    }

    function setUp() {
        $this->parser = new Sql_parser();
    }

    function tearDown() {
        unset($this->parser);
    }

    function runTests($tests) {
        foreach ($tests as $number=>$test) {
            $result = $this->parser->parse($test['sql']);
            $expected = $test['expect'];
            $message = "\nSQL: {$test['sql']}\n";
            if (PEAR::isError($result)) {
                $result = $result->getMessage();
                $message .= "\nError:\n".dump($result);
            } else {
                $message .= "\nExpected:\n".dump($expected);
                $message .= "\nResult:\n".dump($result);
            }
            $message .= "\n*********************\n";
            $this->assertEquals($expected, $result, $message, $number);
        }
    }

    function testSelect() {
        include 'select.php';
        $this->runTests($tests);
    }

    function testUpdate() {
        include 'update.php';
        $this->runTests($tests);
    }

    function testInsert() {
        include 'insert.php';
        $this->runTests($tests);
    }

    function testDelete() {
        include 'delete.php';
        $this->runTests($tests);
    }

    function testDrop() {
        include 'drop.php';
        $this->runTests($tests);
    }

    function testCreate() {
        include 'create.php';
        $this->runTests($tests);
    }

    function testEmployment() {
        include 'employment.php';
        $this->runTests($tests);
    }
}
