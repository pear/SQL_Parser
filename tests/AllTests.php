<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'SQL_Parser_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'SQL_Parser_TestSuite.php';

class SQL_Parser_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('SQL_Parser_Test');
        /** Add testsuites.  */

        $suite->addTestSuite('SQL_Parser_TestSuite');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'SQL_Parser_AllTests::main') {
    SQL_Parser_AllTests::main();
}
?>