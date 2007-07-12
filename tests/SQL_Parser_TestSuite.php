<?php
// Call SOAP_BugsTest::main() if this source file is executed directly.
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'SQL_Parser_Test::main');
}
chdir(dirname(__FILE__) . '/../');

require_once 'PHPUnit/Framework/TestCase.php';
//require_once 'PHPUnit/Framework/TestSuite.php';

require_once 'SQL/Parser.php';

/**
 * Test class for SOAP bugs.
 */
class SQL_Parser_TestSuite extends PHPUnit_Framework_TestCase
{
    // contains the object handle of the parser class
    public $parser;

    function setUp()
    {
        $this->parser = new SQL_Parser();
    }

    function tearDown()
    {
        unset($this->parser);
    }

    function runTests($tests)
    {
        foreach ($tests as $number=>$test) {
            $result = $this->parser->parse($test['sql']);
            $expected = $test['expect'];
            $message = "\nSQL: " . $test['sql'] . "\n";
            if (PEAR::isError($result)) {
                $result = $result->getMessage();
                $message .= "\nError:\n" . var_export($result, true);
            } else {
                $message .= "\nExpected:\n" . var_export($expected, true);
                $message .= "\nResult:\n" . var_export($result, true);
            }
            $message .= "\n*********************\n";
            $this->assertEquals($expected, $result, $message, $number);
        }
    }

    function testSelect()
    {
        include 'tests/testcases/select.php';
        $this->runTests($tests);
    }

    function testUpdate()
    {
        include 'tests/testcases/update.php';
        $this->runTests($tests);
    }

    function testInsert()
    {
        include 'tests/testcases/insert.php';
        $this->runTests($tests);
    }

    function testDelete()
    {
        include 'tests/testcases/delete.php';
        $this->runTests($tests);
    }

    function testDrop()
    {
        include 'tests/testcases/drop.php';
        $this->runTests($tests);
    }

    function testCreate()
    {
        include 'tests/testcases/create.php';
        $this->runTests($tests);
    }

    function testEmployment()
    {
        include 'tests/testcases/employment.php';
        $this->runTests($tests);
    }

    function testTables()
    {
        include 'tests/testcases/tables.php';
        $this->runTests($tests);
    }
}

if (PHPUnit_MAIN_METHOD == 'SQL_Parser_Test::main') {
    SQL_Parser_Test::main();
}
?>