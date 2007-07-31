<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'SQL_Parser_AllTests::main');
}
chdir(dirname(__FILE__) . '/../');

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'SQL/Parser.php';


class SQL_Parser_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('SQL_Parser_Test');

        /*
         * test files
         */
        $tests = array(
            'create'        => 'tests/testcases/create.php',
            'delete'        => 'tests/testcases/delete.php',
            'drop'          => 'tests/testcases/drop.php',
            'employment'    => 'tests/testcases/employment.php',
            'insert'        => 'tests/testcases/insert.php',
            'select'        => 'tests/testcases/select.php',
            'tables'        => 'tests/testcases/tables.php',
            'update'        => 'tests/testcases/update.php',
        );

        /*
         * add test cases
         */
        foreach ($tests as $name => $file) {
            include $file;
            foreach ($tests as $nr => $test) {
                $test_name = $name . ' #' . ($nr + 1);
                $test_case = new PHPUnit_Framework_TestCase_Sql_Parser($test, $test_name);
                $suite->addTest($test_case);
            }
        }

        return $suite;
    }
}

class PHPUnit_Framework_TestCase_Sql_Parser extends PHPUnit_Framework_TestCase
{
    protected $_test;

    public function __construct($test, $name)
    {
        $this->setName($name);
        if (isset($test['name'])) {
            $this->setName($test['name']);
        }
        $this->_test = $test;
    }

    public function runTest()
    {
        $parser   = new SQL_Parser();
        $result   = $parser->parse($this->_test['sql']);

        if (false === $result) {
            $result   = $parser->error_message;
        } else {
            $result   = $result;
        }

        // unify line endings in error messages
        if (is_string($this->_test['expect'])) {
            $expected = preg_replace('/[\r\n]+/', "\n", $this->_test['expect']);
        } else {
            $expected = $this->_test['expect'];
        }
        if (is_string($result)) {
            $result   = preg_replace('/[\r\n]+/', "\n", $result);
        }

        $message  = "\nSQL: " . $this->_test['sql'] . "\n";
        $message .= "\nExpected:\n" . var_export($expected, true);
        $message .= "\nResult:\n" . var_export($result, true);
        $message .= "\n*********************\n";

        $this->assertEquals($expected, $result, $message);
    }
}

if (PHPUnit_MAIN_METHOD == 'SQL_Parser_AllTests::main') {
    echo '<pre>';
    SQL_Parser_AllTests::main();
    echo '</pre>';
}
?>
