<?php

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

include '../Sql_dialect_ansi.php';
foreach ($dialect as $tmp) {
    if (is_string($tmp)) {
        echo dump(array_flip(explode(' ',$tmp)), '', '', '')."\n";
    }
}

?>
