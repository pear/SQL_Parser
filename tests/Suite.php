<?php
/**
 *
 */

/**
 *
 */
require_once dirname(__FILE__) . '/Case.php';

/**
 *
 *
 */
class SQL_Parser_Test_Suite
{
    /**
     * name of test suite
     *
     * @var string
     */
    protected $_name = '';

    protected $_path = '';

    protected $_tests = array();

    const FILENAME_LENGTH_MIN = 3;
    const FILENAME_LENGTH_MAX = 25;

    public function __construct($name = null)
    {
        if (null !== $name && ! $this->setName($name)) {
            // throw ...
        }

        $this->_path = dirname(__FILE__) . '/testcases/';
    }

    public function setName($name)
    {
        if (! is_String($name)) {
            return false;
        }

        $name = preg_replace('/[a-z0-9_]+/', '_', $name);

        if (strlen($name) < SQL_Parser_Test_Suite::FILENAME_LENGTH_MIN
         || strlen($name) > SQL_Parser_Test_Suite::FILENAME_LENGTH_MAX) {
            return false;
        }
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getFile()
    {
        return $this->_path . $this->getName() . '.php';
    }

    public function load($name = null)
    {
        if (null !== $name && ! $this->setName($name)) {
            // throw ...
            return false;
        }

        include $this->getFile();

        if (! isset($tests) || ! is_array($tests)) {
            // throw ...
            return false;
        }

        return $this->setTests($tests);
    }

    public function setTests($tests)
    {
        if (is_array($tests)) {
            // throw ...
            return false;
        }

        $this->_tests = array();

        foreach ($tests as $test) {
            $this->_tests[] = new SQL_Parser_Test_Case($test);
        }

        return true;
    }

    public function update($name = null)
    {
        if (null !== $name && ! $this->setName($name)) {
            // throw ...
            return false;
        }

        include $this->getFile();

        if (! isset($tests) || ! is_array($tests)) {
            // throw ...
            return false;
        }

        if (! $this->setTests($tests)) {
            return false;
        }

        foreach ($this->_tests as $test) {
            $test->updateExpect();
        }

        $this->save();
    }

    public function save()
    {
        $suite = array();
        foreach ($this->_tests as $test) {
            $suite[] = $test->getAsArray();
        }

        return $this->_saveFile($suite);
    }

    protected function _saveFile($suite)
    {
        return file_put_contents($this->getFile(),
            '<?php' . var_export($suite, true) . '?>');
    }
}
?>