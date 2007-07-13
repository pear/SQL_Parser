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
$GLOBALS['save_path_sql']       = 'sql/';

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
 * whether $GLOBALS['save_path_sql'] is writable
 */
$can_save_sql        = is_writable($GLOBALS['save_path_sql']);

/**
 * whether $$save_path_result is writable
 */
$can_save_result     = is_writable($save_path_result);

/**
 * whether $$save_path_testcases is writable
 */
$can_save_test_case  = is_writable($save_path_testcases);

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
            $sql = loadSql($name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
    case 'sql_test':
        printPageHeader($name);
        try {
            printSqlSelectForm($name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
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
        try {
            printSqlSelectForm($name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($sql, $name);
        printPageFooter();
        break;
    case 'sql_view_stored':
        try {
            $sql = loadSql($name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
    default :
        printPageHeader($name);
        try {
            printSqlSelectForm($name);
        } catch (PEAR_Exception $e){
            printMessage($e->getMessage(), 'error');
        }
        printInputForm($sql, $name);
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
    echo '<label>Insert SQL:<br />';
    echo '<textarea name="sql">';
    echo  htmlspecialchars($sql);
    echo '</textarea>';
    echo '</label>';
    echo '<br />';
    echo '<button type="submit" name="action" value="sql_test">Test</button>';
    echo '<br />';
    echo '<label>Save SQL as:<br />';
    echo '<input type="text" name="name" value="' . htmlspecialchars($name) . '" />';
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
function printSqlSelectForm($name)
{
    $sql_list = getSqlList();
    
    echo '<form>';
    echo '<label>Select SQL:<br />';
    echo '<select name="name">';
    echo '<option value="">select stored SQL ...</option>';
    foreach ($sql_list as $sql) {
        echo '<option value="' . htmlspecialchars($sql) . '"';
        if ($name === $sql) {
            echo ' selected="selected"';
        }
        echo '>' . htmlspecialchars($sql) . '</option>';
    }
    echo '</select>';
    echo '</label>';
    echo '<button type="submit" name="action" value="sql_test_stored">Test</button>';
    echo '<button type="submit" name="action" value="sql_view_stored">View</button>';
    echo '</form>';    
}

/**
 * Retrieves list of stored SQLs from $GLOBALS['save_path_sql']
 * 
 * @return array SQL list
 * @throws PEAR_Exception
 * @uses $GLOBALS['save_path_sql']
 * @uses scandir()
 * @uses substr()
 */
function getSqlList()
{
    if (! is_readable($GLOBALS['save_path_sql'])) {
        throw new PEAR_Exception('cannot read from "' . $GLOBALS['save_path_sql'] . '"');
    }
    
    $sql_list = scandir($GLOBALS['save_path_sql']);
    
    if (false === $sql_list) {
        throw new PEAR_Exception('cannot read from "' . $GLOBALS['save_path_sql'] . '"');
    }
    
    // filter all non .sql files
    foreach ($sql_list as $key => $sql_file) {
        if (substr($sql_file, -4) !== '.sql') {
            unset($sql_list[$key]);
        } else {
            $sql_list[$key] = substr($sql_file, 0, -4);
        }
    }
    
    return $sql_list;
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
    echo 'input[type=text], select, textarea { width: 40em; max-width: 75%; }';
    echo 'textarea { height: 30em; }';
    echo '</style>';
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
        throw new PEAR_Exception('cannot write into "' . $GLOBALS['save_path_sql'] . '"');
    }
    
    if (empty($name)) {
        throw new PEAR_Exception('name must not be empty', E_USER_ERROR);
    }

    $name = $GLOBALS['save_path_sql'] . $name . '.sql';
    
    if (false === file_put_contents($name, $sql)) {
        throw new PEAR_Exception('cannot write file "' . $name . '"');
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
        throw new PEAR_Exception('cannot write into "' . $GLOBALS['save_path_result'] . '"');
    }
    
    if (empty($name)) {
        throw new PEAR_Exception('name must not be empty');
    }
    
    $name = $GLOBALS['save_path_result'] . $name . '.php';
    
    $php = "<?php\n" . var_export($result, true) . "\n?>\n";
    
    if (false === file_put_contents($name, $php)) {
        throw new PEAR_Exception('cannot write file "' . $name . '"');
    }
    
    return true;
}

/**
 * Updates anexisting result
 * 
 * usually done when SQL_Parser otuput format has changed or enhanced
 * 
 * @todo finish
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

/**
 * loads SQL from file
 * 
 * @param string $name name of SQL to be loaded
 * @return string the loaded SQL
 * @throws PEAR_Exception
 * @uses $GLOBALS['save_path_sql']
 * @uses is_readable()
 * @uses file_get_contents()
 */
function loadSql($name)
{
    $file_name = $GLOBALS['save_path_sql'] . $name . '.sql';
    if (! is_readable($file_name)) {
        throw new PEAR_Exception('cannot read "' . $file_name . '"');
    }
    
    $sql = file_get_contents($file_name);
    
    if (false === $sql) {
        throw new PEAR_Exception('cannot read "' . $file_name . '"');
    }
    
    return $sql;
}
?>
