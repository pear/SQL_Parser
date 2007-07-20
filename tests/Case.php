<?php
/**
 *
 *
 */

/**
 *
 */
require_once dirname(__FILE__) . '/../Parser.php';
require_once dirname(__FILE__) . '/Sql.php';

/**
 *
 *
 */
class SQL_Parser_Test_Case
{
    protected $_sql     = null;
    protected $_expect  = '';
    protected $_dialect = 'ANSI';
    protected $_error   = '';

    /**
     * name of this testcase
     *
     * @var string name of testcase
     */
    protected $_name = '';

    public function __construct($name = null)
    {

        if (is_array($name)) {
            if (isset($name['name'])) {
                $this->setName($name['name']);
            }
            if (isset($name['dialect'])) {
                $this->setDialect($name['dialect']);
            }
            if (isset($name['sql'])) {
                $this->setSql($name['sql']);
            }
            if (isset($name['expect'])) {
                $this->setExpect($name['expect']);
            }
            if (isset($name['error'])) {
                $this->setError($name['error']);
            }
        }
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getSql()
    {
        return $this->_sql;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getDialect()
    {
        return $this->_dialect;
    }

    public function getExpect()
    {
        return $this->_expect;
    }

    public function getError()
    {
        return $this->_error;
    }

    public function setSql($sql)
    {
        if (is_string($sql)) {
            $sql = SQL_Parser_Test_Sql($sql);
        }

        if ($sql instanceof SQL_Parser_Test_Sql) {
            return $this->_sql = $sql;
        }

        return false;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setDialect($dialect)
    {
        $this->_dialect = $dialect;
    }

    public function setExpect($expect)
    {
        $this->_expect = $expect;
    }

    public function setError($error)
    {
        $this->_error = $error;
    }

    public function updateExpect()
    {
        $sql_parser = new SQL_Parser;
        $this->setExpect($sql_parser->parse($this->getSql()));
        $this->setError($sql_parser->error_message);
    }

    public function getAsArray()
    {
        $test = array(
            'name' => $this->getName(),
            'dialect' => $this->getDialect(),
            'sql' => $this->getSql(),
            'expect' => $this->getExpect(),
            'error' => $this->getError(),
        );

        return $test;
    }
}
?>