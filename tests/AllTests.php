<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'SQL_Parser_AllTests::main');
}
chdir(dirname(__FILE__) . '/../');

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once './Parser.php';

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
        $tests = glob('tests/testcases/*.php');
        //$tests[] = 'tests/testcases/comment.php';

        /*
         * add test cases
         */
        foreach ($tests as $file) {
            include $file;
            foreach ($tests as $nr => $test) {
                $test_name = substr(basename($file), 0, -4) . ' #' . ($nr + 1);
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
        $parser->setDialect($this->_test['dialect']);
        $result   = $parser->parse($this->_test['sql']);

        if (false === $result) {
            $result   = $parser->error_message;
        } else {
            $result   = $result;
        }

        // unify line endings in error messages
        if (is_string($this->_test['expect']) && is_string($result)) {
            if (false === $this->_test['fail']) {
                //$expected = preg_replace('/[\r\n]+/', "\n", $this->_test['expect']);
                //$result   = preg_replace('/[\r\n]+/', "\n", $result);
                $message  = 'SQL still fails to be parsed';
                $message .= "\nSQL: " . $this->_test['sql'] . "\n";
                $message .= "\nExpected:\n [array with parsed SQL]";
                $message .= "\nResult:\n" . $result;
                $message .= "\n*********************\n";
                $this->fail($message);
            }
        } elseif (is_string($this->_test['expect'])) {
            // a prior failed test now runs fine
            $this->fail('SQL seems to run fine now, please update the expected test result!');
        } elseif (is_string($result)) {
            // a prior successful test now failed
            $this->fail($result);
        } else {
            $expected = $this->_test['expect'];
            $result   = $result;
            $message  = 'Output format has changed';
            $message .= "\nSQL: " . $this->_test['sql'] . "\n";
            $message .= PHPUnit_Framework_TestCase_Sql_Parser::sideBySide($expected, $result);
            $message .= "\n*********************\n";
            $this->assertEquals($expected, $result, $message);
        }
    }

    function sideBySide($array1, $array2)
    {
        $text1 = var_export($array1, true);
        $text2 = var_export($array2, true);
        $text1 = wordwrap($text1, 40, "\n", true);
        $text2 = wordwrap($text2, 40, "\n", true);

        $text1 = preg_split('/\n/', $text1);
        $text2 = preg_split('/\n/', $text2);

        $lines = max(count($text1), count($text2));

        $message = '';
        for ($i = 0; $i < $lines; $i++) {
            if (empty($text1[$i])) {
                $text1[$i] = '';
            }
            if (empty($text2[$i])) {
                $text2[$i] = '';
            }

            $message .= str_pad($text1[$i], 40, ' ');

            if ($text1[$i] === $text2[$i]) {
                $message .= ' = ';
            } else {
                $message .= ' ! ';
            }

            $message .= $text2[$i] . "\n";
        }

        return $message;
    }
}

if (PHPUnit_MAIN_METHOD == 'SQL_Parser_AllTests::main') {
    echo '<pre>';
    SQL_Parser_AllTests::main();
    echo '</pre>';
}
?>
