<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | Copyright (c) 2002 Brent Cook                                        |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the Free Software  |
// | Foundation, Inc., 59 Temple Place, Suite 330,Boston,MA 02111-1307 USA|
// +----------------------------------------------------------------------+
// | Author: Brent Cook <busterb@mail.utexas.edu>                         |
// +----------------------------------------------------------------------+
//
// $Id$
//

// test functionality of the sql parser

require_once 'PEAR.php';
require_once 'SQL/Parser.php';

// based on DataDumper by Matt Durell <matt@specialsource.net>
function dump($input, $tab = "\t", $newline = "\n",
               $space = ' ', $padding = '')
{
    if (is_array($input)) {
        $padding .= $tab;
        $output = "array(".$newline;
        $numElems = count($input);
        $count = 0;
        foreach($input as $k => $v) {
            if (is_string($k)) {
                $output .= "$padding'".
                            preg_replace("/([\'\\\])/", "\\\\\\1", $k).
                            "'".$space."=>".$space;
            } else {
                $output .= $padding.$k.$space."=>".$space;
            }
            $output .= dump($v, $tab, $newline, $space, $padding);
            if (++$count < $numElems) {
                $output .= ",";
            }
            $output .= $newline;
        }
        return $output."$padding)";
    } elseif (is_bool($input)) {
        return $input ? "true" : "false";
    } elseif (is_string($input)) {
        return "'".preg_replace("/([\'\\\])/", "\\\\\\1", $input)."'";
    } elseif (is_numeric($input)) {
        return $input;
    } elseif (is_null($input)) {
        return 'null';
    } else {
        return 'unknown';
    }
}

$parser = new Sql_Parser();

$progname = basename(array_shift($argv));

echo(count($argv));
if (count($argv) != 2) {
    echo("Usage: generate_testcases.php test_cases.sql\n");
    exit(-1);
}

$file = $argv[1];

if (!$fd = @fopen($file, 'r')) {
    echo("Could not load the SQL source file: $file\n");
    exit;
}
$source = '';
while ($data = fread($fd, 2048)) {
    $source .= $data;
}
fclose($fd);

$queries = explode(";\n", $source);

echo "<?php\n";
echo '$tests = array('."\n";

foreach ($queries as $query) {
    if ($query) {
        echo "array(\n";
        echo "'sql' => '".preg_replace("/([\'\\\])/", "\\\\\\1", $query)."',\n";
        $results = $parser->parse($query);
        echo "'expect' => ";
        if (PEAR::isError($results)) {
            echo "'".preg_replace("/([\'\\\])/", "\\\\\\1", $results->getMessage())."'\n";
        } else {
            echo dump($results, '    ', "\n", ' ', '    ');
        }
        echo "\n),\n";
    }
}

echo ");\n";
echo "?>\n";

?>
