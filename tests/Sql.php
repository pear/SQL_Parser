<?php
/**
 *
 */

/**
 *
 *
 */
class SQL_Parser_Test_Sql
{
    protected $_path = '';

    protected $_name = '';

    protected $_sql = '';

    public function __construct($name = null, $sql = null)
    {
        if (null !== $name && ! $this->setName($name)) {
            // throw ...
        }

        if (null !== $sql && ! $this->setSql($sql)) {
            // throw ...
        }

        $this->_path = dirname(__FILE__) . '/sql/';
    }

    public function __toString()
    {
        return $this->getSql();
    }

    public function getSql()
    {
        return $this->_sql;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setSql($sql)
    {
        $this->_sql = $sql;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getFile()
    {
        return $this->_path . $this->getName() . '.sql';
    }

    public function load($name = null)
    {
        if (null !== $name && ! $this->setName($name)) {
            // throw ...
            return false;
        }

        $this->setSql(file_get_contents($this->getFile()));

        if (! isset($tests) || ! is_array($tests)) {
            // throw ...
            return false;
        }

        return $this->setTests($tests);
    }

    public function save()
    {
        return file_put_contents($this->getFile(), $this->getSql());
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
    public function getFileList()
    {
        if (! is_readable($this->_path)) {
            throw new PEAR_Exception('cannot read from "' . $this->_path . '"');
        }

        $file_list = scandir($this->_path);

        if (false === $file_list) {
            throw new PEAR_Exception('cannot read from "' . $this->_path . '"');
        }

        // filter all non .sql files
        foreach ($file_list as $key => $sql_file) {
            if (substr($sql_file, -4) !== '.sql') {
                unset($file_list[$key]);
            }
        }

        return $file_list;
    }

    /**
     * Retrieves list of stored SQLs from $GLOBALS['save_path_sql']
     *
     * @return array SQL list
     * @uses substr()
     */
    public function getNameList()
    {
        $sql_list = array();

        // remove .sql
        foreach ($this->getFileList() as $sql_file) {
            $sql_list[] = substr($sql_file, 0, -4);
        }

        return $sql_list;
    }
}
?>