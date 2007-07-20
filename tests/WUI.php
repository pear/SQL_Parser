<?php
/**
 * Web User Interface to SQL_Parser testing
 *
 * a very simple interface to the testing suite for SQL_Parser, currently it
 * allows to display the parse result of an inserted SQL query
 *
 * PHP versions 5
 *
 * LICENSE: This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; If not, see <http://www.gnu.org/licenses/>.
 *
 * @todo select SQL syntax
 * @todo select existing SQL files
 * @todo compare generated result with stored result
 * @category  Database
 * @package   SQL_Parser
 * @subpackage Testsuite
 * @author    Sebastian Mendel <info@sebastianmendel.de>
 * @copyright 2007 Sebastian Mendel
 * @license   http://www.gnu.org/licenses/lgpl.html GNU Lesser GPL 3
 * @version   CVS: $Id$
 * @link      http://pear.php.net/package/SQL_Parser
 * @since     File available since Release 0.5.1
 */

/**
 *
 */
require_once dirname(__FILE__) . '/../Parser.php';
require_once dirname(__FILE__) . '/Case.php';
require_once dirname(__FILE__) . '/Suite.php';
require_once dirname(__FILE__) . '/Sql.php';
require_once dirname(__FILE__) . '/../../PEAR/Exception.php';

/**
 * the name for the SQL query
 */
if (! empty($_REQUEST['name']) && is_string($_REQUEST['name'])) {
    $name = preg_replace('/[^a-z0-9]/', '_', strtolower($_REQUEST['name']));
} else {
    $name = '';
}

/**
 * the SQL query to parse/save
 */
if (! empty($_REQUEST['sql']) && is_string($_REQUEST['sql'])) {
    $sql = $_REQUEST['sql'];
} else {
    $sql = '';
}

$sql = new SQL_Parser_Test_Sql($name, $sql);

/**
 * the SQL dialect to use
 */
if (! empty($_REQUEST['dialect']) && is_string($_REQUEST['dialect'])) {
    $dialect = $_REQUEST['dialect'];
} else {
    $dialect = 'ANSI';
}

$case = new SQL_Parser_Test_Case($name);
$case->setDialect($dialect);
$case->setSql($sql);

/**
 * the action requested
 */
if (! empty($_REQUEST['action']) && is_string($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = '';
}

/*
 * cleanup
 */
unset($_REQUEST, $_POST, $_FILES, $_GET, $_COOKIE);

/*
 * do what was requested to do
 */
switch ($action) {
    case 'sql_test_stored':
        try {
            $sql->load();
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
    case 'sql_test':
        printPageHeader($case);
        try {
            printSqlSelectForm($case);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($case);
        printResult(parseSql($case));
        printPageFooter();
        break;
    case 'sql_save':
        printPageHeader($case);
        try {
            $sql->save();
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        try {
            printSqlSelectForm($case);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($case);
        printPageFooter();
        break;
    case 'sql_view_stored':
        try {
            $sql->load();
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
    default :
        printPageHeader($case);
        try {
            printSqlSelectForm($case);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($case);
        printPageFooter();
}

/**
 * Parse the SQL and rturns the result as array
 *
 * @param string $sql the SQL query
 * @return array parsed SQL data
 * @uses SQL_Parser
 * @uses SQL_Parser::parse()
 * @uses $GLOBALS['dialect']
 */
function parseSql($case)
{
    $parser = new SQL_Parser($case->getSql()->getSql(), $case->getDialect());
    return $parser->parse();
}

/**
 * Print the form for submitting a SQL query
 *
 * @param string $sql  the pre-filled SQL query
 * @param string $naem name for this SQL query
 * @return void
 * @uses htmlspecialchars()
 */
function printInputForm($case)
{
    echo '<form>';
    echo '<label>Insert SQL:<br />';
    echo '<textarea name="sql">';
    echo  htmlspecialchars($case->getSql());
    echo '</textarea>';
    echo '</label>';
    echo '<br />';
    printDialectSelection($case);
    echo '<button type="submit" name="action" value="sql_test">Test</button>';
    echo '<br />';
    echo '<label>Save SQL as:<br />';
    echo '<input type="text" name="name" value="' . htmlspecialchars($case) . '" />';
    echo '</label>';
    echo '<button type="submit" name="action" value="sql_save">Save</button>';
    echo '</form>';
}

/**
 * Print the SQL select from
 *
 * This form allows to select from already existant SQL queries
 *
 * @return void
 * @uses $GLOBALS['save_path_sql']
 * @uses getSqlList()
 * @uses htmlspecialchars()
 */
function printSqlSelectForm($case)
{
    echo '<form>';
    echo '<label>Select SQL: ';
    echo '<select name="name">';
    echo '<option value="">select stored SQL ...</option>';
    foreach ($case->getSql()->getNameList() as $each_sql_name) {
        echo '<option value="' . htmlspecialchars($each_sql_name) . '"';
        if ($case->getName() === $each_sql_name) {
            echo ' selected="selected"';
        }
        echo '>' . htmlspecialchars($each_sql_name) . '</option>';
    }
    echo '</select>';
    echo '</label>';
    printDialectSelection($case);
    echo '<button type="submit" name="action" value="sql_test_stored">Test</button>';
    echo '<button type="submit" name="action" value="sql_view_stored">View</button>';
    echo '</form>';
}

/**
 * prints dialect select box
 *
 * @return void
 * @uses $GLOBALS['dialect']
 * @uses htmlspecialchars()
 */
function printDialectSelection($case)
{
    echo '<label>SQL dialect: ';
    echo '<select name="dialect">';
    foreach (SQL_Parser::$dialects as $each_dialect) {
        echo '<option value="' . htmlspecialchars($each_dialect) . '"';
        if ($case->getDialect() === $each_dialect) {
            echo ' selected="selected"';
        }
        echo '>' . htmlspecialchars($each_dialect) . '</option>';
    }
    echo '</select>';
    echo '</label>';
}

/**
 * Print a message
 *
 * Prints out a given message, and adds the $type as calls to the message
 * container, usually for displaying erros or success messages
 *
 * @param string $text the message
 * @param string $type the optional class
 * @return void
 * @uses htmlspecialchars()
 */
function printMessage($text, $type = 'note')
{
    if (true === $text) {
        $text = 'Success';
        $type = 'success';
    } elseif (false === $text) {
        $text = 'Failure';
        $type = 'error';
    }

    echo '<div class="' . htmlspecialchars($type) . '">'
        . htmlspecialchars($text) . '</div>';
}

/**
 * Prints HTML page header with optinal title
 *
 * $title is usually the SQL name
 *
 * @param string $$title optional page title
 * @return void
 * @uses htmlspecialchars()
 */
function printPageHeader($title = '')
{
    echo '<html>';
    echo '<style type="text/css">';
    echo 'input[type=text], textarea { width: 40em; max-width: 75%; }';
    echo 'textarea { height: 30em; }';
    echo '</style>';
    echo '<title>';
    echo htmlspecialchars($title);
    echo '</title>';
    echo '<body>';
}

/**
 * Prints HTML page foot
 *
 * @return void
 */
function printPageFooter()
{
    echo '</body>';
    echo '</html>';
}

/**
 * Prints out the $result
 *
 * @param array $result the result from SQL_Parser::parse()
 * @return void
 * @uses var_export()
 */
function printResult($result)
{
    echo '<pre class="result">';
    var_export($result);
    echo '</pre>';
}
?>
