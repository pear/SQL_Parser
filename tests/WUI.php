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
require_once '../Parser.php';
require_once 'PEAR/Exception.php';

/**
 * path to SQL files
 * @global $GLOBALS['save_path_sql'] string
 */
$save_path_sql       = 'sql/';

/**
 * path to SQL-Parser results
 * @global $GLOBALS['save_path_result'] string
 */
$save_path_result    = 'results/';

/**
 * path to complete testcases
 * @global $GLOBALS['save_path_testcases'] string
 */
$save_path_testcases = 'testcases/';

/**
 * whether $save_path_sql is writable
 */
$can_save_sql        = is_writable($save_path_sql);

/**
 * whether $$save_path_result is writable
 */
$can_save_result     = is_writable($save_path_result);

/**
 * whether $$save_path_testcases is writable
 */
$can_save_test_case  = is_writable($save_path_testcases);

/**
 * the SQL query to parse/save
 */
if (! empty($_REQUEST['sql']) && is_string($_REQUEST['sql'])) {
    $sql = $_REQUEST['sql'];
} else {
    $sql = '';
}

/**
 * the name for the SQL query
 */
if (! empty($_REQUEST['name']) && is_string($_REQUEST['name'])) {
    $name = preg_replace('/[^a-z0-9]/', '_', strtolower($_REQUEST['name']));
} else {
    $name = '';
}

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
    case 'sql_test':
        printPageHeader($name);
        printInputForm($sql, $name);
        printResult(parseSql($sql));
        printPageFooter();
        break;
    case 'sql_save':
        printPageHeader($name);
        try {
            saveSql($sql, $name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($sql, $name);
        printPageFooter();
        break;
    default :
        printPageHeader();
        printInputForm();
        printPageFooter();
}

/**
 * Parse the SQL and rturns the result as array
 * 
 * @param string $sql the SQL query
 * @return array parsed SQL data
 * @uses SQL_Parser
 * @uses SQL_Parser::parse()
 */
function parseSql($sql)
{
    $parser = new SQL_Parser;
    return $parser->parse($sql);
}

/**
 * Print the form for submitting a SQL query
 * 
 * @param string $sql  the pre-filled SQL query
 * @param string $naem name for this SQL query
 * @return void
 * @uses htmlspecialchars()
 */
function printInputForm($sql = '', $name = '')
{
    echo '<form>';
    echo '<label>Name';
    echo '<input type="text" name="name" value="' . htmlspecialchars($name) . '" />';
    echo '</label>';
    echo '<br />';
    echo '<label>SQL';
    echo '<textarea name="sql">';
    echo  htmlspecialchars($sql);
    echo '</textarea>';
    echo '</label>';
    echo '<br />';
    echo '<button type="submit" name="action" value="sql_test">Test</button>';
    echo '<button type="submit" name="action" value="sql_save">Save</button>';
    echo '</form>';
}

/**
 * Print the SQL select from
 * 
 * This form allows to select from the already existant SQL queries in 
 * $save_path_sql
 * 
 * @uses $GLOBALS['save_path_sql']
 * @return void
 */
function printSelectForm()
{
    
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
    echo '<title>';
    echo htmlspecialchars($name);
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

/**
 * Saves given $sql with $name in $GLOBALS['save_path_sql']
 * 
 * @param string $sql  SQL to save
 * @param string $name naem for this SQL
 * @return boolean success
 * @throws PEAR_Exception
 * @uses $GLOBALS['can_save_sql']
 * @uses $GLOBALS['save_path_sql']
 * @uses E_USER_ERROR
 * @uses file_put_contents()
 */
function saveSql($sql, $name)
{
    if (! $GLOBALS['can_save_sql']) {
        throw PEAR_Exception('cannot write into "' . $GLOBALS['save_path_sql'] . '"');
    }
    
    if (empty($name)) {
        throw new PEAR_Exception('name must not be empty', E_USER_ERROR);
    }

    $name = $GLOBALS['save_path_sql'] . $name . '.sql';
    
    if (false === file_put_contents($name, $sql)) {
        throw PEAR_Exception('cannot write file "' . $name . '"');
    }
    
    return true;
}

/**
 * Save SQL_Parser result into file
 * 
 * @param array $result result from SQL_Parser
 * @param strin $name   name of SQL parsed
 * @return boolean success
 * @throws PEAR_Exception
 * @uses $GLOBALS['can_save_result']
 * @uses $GLOBALS['save_path_result']
 * @uses var_export()
 * @uses file_put_contents()
 */
function saveResult($result, $name)
{
    if (! $GLOBALS['can_save_result']) {
        throw PEAR_Exception('cannot write into "' . $GLOBALS['save_path_result'] . '"');
    }
    
    if (empty($name)) {
        throw PEAR_Exception('name must not be empty');
    }
    
    $name = $GLOBALS['save_path_result'] . $name . '.php';
    
    $php = "<?php\n" . var_export($result, true) . "\n?>\n";
    
    if (false === file_put_contents($name, $php)) {
        throw PEAR_Exception('cannot write file "' . $name . '"');
    }
    
    return true;
}

/**
 * Updates anexisting result
 * 
 * usually done when SQL_Parser otuput format has changed or enhanced
 * 
 * 
 */
function updateResult()
{
    
}

/**
 * Creates new testcase $name from $sql
 * 
 * @param string $name name of new tescase
 * @param string $sql  SQL query
 * @throws PEAR_Exception
 * @return boolean success
 * @uses saveSql()
 * @uses saveResult()
 * @uses parseSql()
 */
function createTestCase($name, $sql = '')
{
    if (! saveSql($sql, $name)) {
        return false;
    }
    
    return saveResult(parseSql($sql), $name);
}
?>
