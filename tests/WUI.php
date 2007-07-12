<?php
/**
 * Web User Interface to SQL_Parser testing
 */

/**
 * 
 */
require_once '../Parser.php';
require_once 'PEAR/Exception.php';

/**
 * 
 */
$save_path_sql       = 'sql/';
$save_path_result    = 'results/';
$save_path_testcases = 'testcases/';

$can_save_sql        = is_writable($save_path_sql);
$can_save_result     = is_writable($save_path_result);
$can_save_test_case  = is_writable($save_path_testcases);


if (! empty($_REQUEST['sql']) && is_string($_REQUEST['sql'])) {
    $sql = $_REQUEST['sql'];
} else {
    $sql = '';
}

if (! empty($_REQUEST['name']) && is_string($_REQUEST['name'])) {
    $name = preg_replace('/[^a-z0-9]/', '_', strtolower($_REQUEST['name']));
} else {
    $name = '';
}

if (! empty($_REQUEST['action']) && is_string($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = '';
}

unset($_REQUEST, $_POST, $_FILES, $_GET, $_COOKIE);

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

function parseSql($sql)
{
    $parser = new SQL_Parser;
    return $parser->parse($sql);
}

/**
 * 
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

function printSelectForm()
{
    
}

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

function printPageHeader($name = '')
{
    echo '<html>';
    echo '<title>';
    echo htmlspecialchars($name);
    echo '</title>';
    echo '<body>';
}

function printPageFooter()
{
    echo '</body>';
    echo '</html>';
}

function printResult($result)
{
    echo '<pre class="result">';
    var_export($result);
    echo '</pre>';
}

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

function updateResult()
{
    
}

function createTestCase($name, $sql = '')
{
    if (! saveSql($sql, $name)) {
        return false;
    }
    
    return saveResult(parseSql($sql), $name);
}
?>
